<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

use function PHPUnit\Framework\directoryExists;

trait UploadImage 
{
    public function uploadImage($image, $directory)
    {
        $path = public_path('uploads/images/'. $directory);

        if ( ! file_exists($path) ) {
            mkdir($path, 0777, true);
        }

        $input['imagename'] = time().'.'.$image->extension();
     
        $destinationPath = public_path('uploads/images/'. $directory);
        if ($image->extension() == 'jpg' || $image->extension() == 'png' || $image->extension() == 'jpeg') {
            $img = Image::make($image->path());

            $img->resize(1920, 877, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);    
        } else {
            $fileName = time().'.'.$image->extension();  
            $image->move($destinationPath, $fileName);        
        }
        
        return 'uploads/images/'. $directory .'/'. $input['imagename'];
    }
}