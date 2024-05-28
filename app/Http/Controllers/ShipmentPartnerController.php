<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProductsModel;

class ShipmentPartnerController extends Controller
{
    public function save(Request $request){
        if(!empty($request)){
            $productObj = new ProductsModel();
            $productObj->product_name = $request->partner;
            // $productObj->shipping_cost = $request->shippingcost;
            $productObj->created_at = date('Y-m-d H:i:s');
            if($productObj->save()){
                return "1";
            }else{
                return "0";
            }

        }
    }
}
