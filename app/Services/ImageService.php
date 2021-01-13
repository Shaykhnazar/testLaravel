<?php


namespace App\Services;


use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImageService
{

    /**
     *  Upload and move to storage path the image
     * @param $file
     * @param string $directory
     * @return string
     */
    public static function uploadWithCrop($file, $directory=''){
        $file_orginal_name = $file->getClientOriginalName();
        $type = $file->getClientOriginalExtension();
        $file_name = time().'_'.$file_orginal_name;
        $file_path = storage_path('/app/public/'.$directory.'/images');
        if(!File::exists($file_path)){
            File::makeDirectory($file_path);
        }
        if($type=="jpg" || $type=="jpeg" || $type=="png" || $type=="bmp") {
            $thumbs = Image::make($file);
            $thumbs->fit(213, 189, function ($constraint) {
                $constraint->aspectRatio();
            })->save($file_path.'/'.$file_name);
        }
        return $file_name;
    }
}
