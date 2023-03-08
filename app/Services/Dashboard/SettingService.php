<?php

namespace App\Services\Dashboard;

use App\Models\Media;
use App\Models\Setting;
use App\Traits\UploadImage;

class SettingService
{
    use UploadImage;

    public function store($data)
    {
        if (isset($data['profile'])) {
            $data['profile'] = $this->uploadImage($data['profile'], "settings");
        }

        $settings = Setting::first();

        if ($settings) {
            return Setting::where('id', $settings->id)->update($data);
        }

        return Setting::create($data);
    }

    public function delete($request)
	{
        $project = Setting::find($request->input('user_id'));
        if ($project->image != null) {
            $file = public_path($project->image);
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $project->delete();
	}
}