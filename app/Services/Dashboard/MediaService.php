<?php

namespace App\Services\Dashboard;

use App\Models\Media;
use App\Traits\UploadImage;

class MediaService
{
    use UploadImage;

    public function store($data)
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image'], "medias");
        }

        return Media::create($data);      
    }

    public function update($id, $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image'], "medias");
        }
        
        return Media::where('id', $id)->update($data);
    }

    public function delete($request)
	{
        $media = Media::find($request->input('user_id'));
        if ($media->image != null) {
            $file = public_path($media->image);
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $media->delete();
	}
}