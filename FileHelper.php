<?php

namespace App\Helpers;

use stdClass;

class FileHelper
{
    public static function save($file, $path){
        // $fileName = 'file-'.time().'.'.$file->getClientOriginalExtension();
        
        // $file->storeAs($path, $fileName);

        // dd($path.$fileName);

        // return $path.$fileName;

            $filename = $file->getClientOriginalName();
            $Path = public_path().$path;
             $file->move($Path, $filename);
             return $path.$filename;
    } 

    public static function saveFiles($files){
        $savedFiles = [];
        foreach ($files as $key => $file)
        {
            // Generate a file name with extension
            $fileName = 'file-'.time().$key.'.'.$file->getClientOriginalExtension();
            // Save the file

            $object = new stdClass();
            $object->name = 'File-'.($key+1);
            $object->handle = $file->storeAs('files', $fileName);
            $savedFiles[] = $object;
        }
        return $savedFiles;
    }
    
    public static function saveFile($file,$path){
        // Generate a file name with extension
        $fileName = 'file-'.time().'.'.$file->getClientOriginalExtension();
        // Save the file

        $object = new stdClass();
        $object->name = 'File-'. uniqid();
        $object->handle = $file->storeAs($path, $fileName);
        return $object->handle;
    }

   
    
}
