<?php


namespace App\Helpers;

use App\Models\Wholesaler_order;
use Carbon\Carbon;
use stdClass;

class GraphHelper
{
    public static function monthlySale($month){
        // dd($month);

        $start = $month->startOfMonth();
        $end = $month->endOfMonth();
        $days = [];
        while($start <= $end){
            $obj = new stdClass();
            $clone = clone $start;
            // dd($clone);
            $obj->date = $start->day;
            
            $obj->amount = Wholesaler_order::whereBetween('created_at', [$start, $clone->endOfDay()])->sum('amount');
            $days[] = $obj;
            $start->addDay();
        }
        return $days;
    }
   

    
   
}
