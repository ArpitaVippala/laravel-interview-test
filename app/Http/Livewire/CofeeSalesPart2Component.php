<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductsModel;
use App\Models\SalesModel;

class CofeeSalesPart2Component extends Component
{
    public $quantity;
    public $unitcost;
    public $itemcost;
    public $itemsellingcost;
    public $shippingcost = 10;
    public $selItem;
    public $items;

    protected $rules = [
        'quantity' => 'required|numeric|gt:0',
        'unitcost' => 'required|numeric|gt:0',
        'selItem' => 'required',
    ];

    protected $messages = [
        'quantity.required' => "Please enter quantity",
        'quantity.numeric' => "Quantity should be integer value",
        'quantity.gt'   => "Quantity should be greater than 0",
        'unitcost.required' => "Please enter unit cost",
        'unitcost.numeric' => "Unit cost should be integer value",
        'unitcost.gt'   => "Unit cost should be greater than 0",
        'selItem.required' => "Please select item",
    ];

    public function mount(){
        $this->items = ProductsModel::get();
    }

    public function render()
    {
        return view('livewire.cofee-sales-part2-component');
    }

    public function updatedQuantity(){
        $this->calculatePrice();
    }

    public function updatedUnitCost(){
        $this->calculatePrice();
    }

    public function updatedSelItem(){
        $this->calculatePrice();
    }

    public function calculatePrice(){
        if(!empty($this->selItem) && !empty($this->quantity) && !empty($this->unitcost)){
            //unit cost in pounds
            $this->itemcost = number_format(($this->quantity * $this->unitcost), 2);
            if($this->selItem == 1){ //Gold coffee
                $this->itemsellingcost = number_format((($this->itemcost /(1- 0.25)) + $this->shippingcost), 2);
            }
            if($this->selItem == 2){// Arabic coffee
                $this->itemsellingcost = number_format((($this->itemcost /(1- 0.15)) + $this->shippingcost), 2);
            }            
        }else{
            $this->reset('itemcost', 'itemsellingcost');
        }
    }

    public function saveSale(){
        $validate = $this->validate();
        if($validate){
            $salesObj = new SalesModel();
            $salesObj->item_id = $this->selItem;
            $salesObj->quantity = $this->quantity;
            $salesObj->unit_cost = $this->unitcost;
            $salesObj->item_cost = $this->itemcost;
            $salesObj->item_selling_price = $this->itemsellingcost;
            $salesObj->save();
            $this->emit('pg:eventRefresh-saleslistingparttwo');
            $this->reset(['selItem', 'quantity', 'unitcost', 'itemcost', 'itemsellingcost']);
            $this->dispatchBrowserEvent('alert', ['type'=>'success', 'message'=>"Price generated successfully"]);
        }
    }
}
