<?php

namespace App\Services\Dashboard;

use App\Models\Service;
use App\Traits\UploadImage;

class ServiceService
{
    use UploadImage;

    public function store($data)
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image'], "services");
        }

        return Service::create($data);      
    }

    public function update($id, $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image'], "services");
        }
        
        return Service::where('id', $id)->update($data);
    }

    public function delete($request)
	{
        $service = Service::find($request->input('user_id'));
        if ($service->image != null) {
            $file = public_path($service->image);
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $service->delete();
	}
}