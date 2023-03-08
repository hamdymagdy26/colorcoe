<?php

namespace App\Services\Dashboard;

use App\Models\Client;
use App\Traits\UploadImage;

class ClientService
{
    use UploadImage;

    public function store($data)
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image'], "clients");
        }

        return Client::create($data);      
    }

    public function update($id, $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image'], "clients");
        }
        
        return Client::where('id', $id)->update($data);
    }

    public function delete($request)
	{
        $client = Client::find($request->input('user_id'));
        if ($client->image != null) {
            $file = public_path($client->image);
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $client->delete();
	}
}