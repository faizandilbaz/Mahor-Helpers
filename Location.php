<?php

namespace App\Helpers;

use Exception;

class Location
{
    public static function isWithInRadius($target ,$origin, $radius){
            $longitude1 = self::getCoordinate($target,'x');
            $latitude1 = self::getCoordinate($target,'y');
            $longitude2 = self::getCoordinate($origin,'x');
            $latitude2 = self::getCoordinate($origin,'y');
            $earth_radius = 6371;  
              
            $dLat = deg2rad($latitude2 - $latitude1);  
            $dLon = deg2rad($longitude2 - $longitude1);  
              
            $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);  
            $c = 2 * asin(sqrt($a));  
            $d = $earth_radius * $c;  
            
            return $d<$radius? true:false;
    }
    
    public static function diatance($target ,$origin){
        try{
            $longitude1 = self::getCoordinate($target,'x');
            $latitude1 = self::getCoordinate($target,'y');
            $longitude2 = self::getCoordinate($origin,'x');
            $latitude2 = self::getCoordinate($origin,'y');
            $earth_radius = 6371;  
              
            $dLat = deg2rad($latitude2 - $latitude1);  
            $dLon = deg2rad($longitude2 - $longitude1);  
              
            $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);  
            $c = 2 * asin(sqrt($a));  
            $d = $earth_radius * $c;  
            
            return $d;
        } catch(Exception $e) {
            return false;
        }
            
    }

    private static function getCoordinate($location,$option){
        $index = $option == 'x'?0:1;
        return explode(",",$location)[$index];
    }


}