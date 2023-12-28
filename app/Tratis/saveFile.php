<?php
namespace App\Tratis;

trait saveFile{
    protected function saveimage1($file){
        $image_name=time().'.'.$file->extension();
        $file->move(public_path('images/'),$image_name);
        return $image_name;
    }

}