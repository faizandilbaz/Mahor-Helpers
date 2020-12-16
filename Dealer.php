<?php

namespace App\Helpers;

use App\Models\Product;
use App\Models\RetailerProduct;
use App\Models\Wholesaler_product;
use Illuminate\Support\Facades\Auth;

class Dealer
{

    public static function current()
    {
        $user = Auth::user();
        $class = get_class($user);
        if ($class == 'App\Models\Wholesaler') {
            return Product::class;
        }
        elseif ($class == 'App\Models\Retailer') {
            return Wholesaler_product::class;
        }
        else
        
        return RetailerProduct::class;
    }
}
