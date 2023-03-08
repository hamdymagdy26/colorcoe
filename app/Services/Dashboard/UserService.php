<?php

namespace App\Services\Dashboard;

use App\Models\Salon;
use App\Models\SalonUser;
use App\Models\User;
use App\Traits\UploadImage;
use App\Transformers\User\UserTransformer;
use App\Utility\UserTypes;

class UserService
{
    use UploadImage;

    public function store($data)
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image'], "users");
        }

        $user = User::create($data);  
        
        if ($data['type'] == UserTypes::TYPE_SALON) {
            $salonUsers = UserTransformer::transformToCreateSalonUser($user, $data['salon_id']);
            SalonUser::create($salonUsers);
        }
    }

    public function edit($user)
    {
        $salonUser = SalonUser::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
        return Salon::find($salonUser->salon_id);
    }

    public function update($id, $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image'], "users");
        }

        SalonUser::where('user_id', $id)->update(["salon_id" => $data['salon_id']]);
        unset($data['salon_id']);

        return User::where('id', $id)->update($data);
    }

    public function delete($request)
	{
        $user = User::find($request->input('user_id'));
        if ($user->image != null) {
            $file = public_path($user->image);
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $user->delete();
	}
}