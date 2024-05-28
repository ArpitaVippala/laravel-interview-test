<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SalesModel;

class CofeeSalesComponent extends Component
{
    public $quantity;
    public $unitcost;
    public $itemcost;
    public $itemsellingcost;
    public $shippingcost = 10;

    protected $rules = [
        'quantity' => 'required|numeric|gt:0',
        'unitcost' => 'required|numeric|gt:0',
    ];

    protected $messages = [
        'quantity.required' => "Please enter quantity",
        'quantity.numeric' => "Quantity should be integer value",
        'quantity.gt'   => "Quantity should be greater than 0",
        'unitcost.required' => "Please enter unit cost",
        'unitcost.numeric' => "Unit cost should be integer value",
        'unitcost.gt'   => "Unit cost should be greater than 0",
    ];

    public function render()
    {
        return view('livewire.cofee-sales-component');
    }

    public function updatedQuantity(){
        $this->calculatePrice();
    }

    public function updatedUnitCost(){
        $this->calculatePrice();
    }

    public function calculatePrice(){
        if(!empty($this->quantity) && !empty($this->unitcost)){
            //unit cost in pounds
            $this->itemcost = number_format(($this->quantity * $this->unitcost), 2);
            //here shipping cost is considered as static which is 10
            $this->itemsellingcost = number_format((($this->itemcost /(1- 0.25)) + $this->shippingcost), 2);
        }else{
            $this->reset('itemcost', 'itemsellingcost');
        }
    }

    public function saveSale(){
        $validate = $this->validate();

        if($validate){

            $salesObj = new SalesModel();
            $salesObj->item_id = 1;
            $salesObj->quantity = $this->quantity;
            $salesObj->unit_cost = $this->unitcost;
            $salesObj->item_cost = $this->itemcost;
            $salesObj->item_selling_price = $this->itemsellingcost;
            $salesObj->save();
            $this->emit('pg:eventRefresh-saleslisting');
            $this->reset(['quantity', 'unitcost', 'itemcost', 'itemsellingcost']);
            $this->dispatchBrowserEvent('alert', ['type'=>'success', 'message'=>"Price generated successfully"]);
        }
    }
}
