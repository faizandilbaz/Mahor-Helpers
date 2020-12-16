<?php


namespace App\Helpers;

use App\Models\Manufacturer;
use App\Models\Order;
use App\Models\Retailer;
use App\Models\RetailerOrder;
use App\Models\Wholesaler;
use App\Models\Wholesaler_order;

class Dashboard{

    public static function requests(){
        $manufacturers = Manufacturer::where('status', 0)->get();
            // dd($manufacturers);
            $wholesalers = Wholesaler::where('status', 0)->get();
            $retailers = Retailer::where('status', 0)->get();
           
            return view('admin.dashboard')->with('manufacturers',$manufacturers)->with('wholesalers',$wholesalers)->with('retailers',$retailers);
    }
    
}