<?php

use App\Models\Shipping;

function shippingCharge(){
    $shippings=Shipping::where('user_id',auth()->user()->id)->first();
   if($shippings){
       if($shippings->city=='Dhaka'){
           $shipCost=70;
       }else{
           $shipCost=120;
       }
       return $shipCost;
   }
}






