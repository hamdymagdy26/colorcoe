<?php

namespace App\Services\Dashboard;

use App\Models\Testimonial;
use App\Traits\UploadImage;

class TestimonialService
{
    use UploadImage;

    public function store($data)
    {
        return Testimonial::create($data);      
    }

    public function update($id, $data)
    {
        return Testimonial::where('id', $id)->update($data);
    }

    public function delete($request)
	{
        $testimonial = Testimonial::find($request->input('user_id'));
        if ($testimonial->image != null) {
            $file = public_path($testimonial->image);
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $testimonial->delete();
	}
}