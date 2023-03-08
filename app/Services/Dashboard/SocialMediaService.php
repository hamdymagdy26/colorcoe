<?php

namespace App\Services\Dashboard;

use App\Models\SocialMedia;
use App\Traits\UploadImage;

class SocialMediaService
{
    use UploadImage;

    public function store($data)
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image'], "socialMedias");
        }

        return SocialMedia::create($data);      
    }

    public function update($id, $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image'], "socialMedias");
        }
        
        return SocialMedia::where('id', $id)->update($data);
    }

    public function delete($request)
	{
        $socialMedia = SocialMedia::find($request->input('user_id'));
        if ($socialMedia->image != null) {
            $file = public_path($socialMedia->image);
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $socialMedia->delete();
	}
}