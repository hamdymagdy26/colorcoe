<?php

namespace App\Services\Dashboard;

use App\Models\Slider;
use App\Traits\UploadImage;

class SliderService
{
    use UploadImage;

    public function store($data)
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image'], "sliders");
        }

        return Slider::create($data);      
    }

    public function update($id, $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image'], "sliders");
        }
        
        return Slider::where('id', $id)->update($data);
    }

    public function delete($request)
	{
        $slider = Slider::find($request->input('user_id'));
        if ($slider->image != null) {
            $file = public_path($slider->image);
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $slider->delete();
	}
}