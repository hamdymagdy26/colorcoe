<?php

namespace App\Services\Dashboard;

use App\Models\Media;
use App\Models\Project;
use App\Traits\UploadImage;

class ProjectService
{
    use UploadImage;

    public function store($data)
    {
        if (isset($data['file'])) {
            $data['file'] = $this->uploadImage($data['file'], "projects");
        }

        $project = Project::create($data);
        if (isset($data['images'])) {
            foreach ($data['images'] as $key => $image) {
                $image_information = $this->uploadImage($image, "projects");
                Media::create([
                    'image' => $image_information,
                    'model_type' => 'project',
                    'model_id' => $project->id
                ]);
            }
        }
        return $project;
    }

    public function update($id, $data)
    {
        if (isset($data['file'])) {
            $data['file'] = $this->uploadImage($data['file'], "projects");
        }
        
        return Project::where('id', $id)->update($data);
    }

    public function delete($request)
	{
        $project = Project::find($request->input('user_id'));
        if ($project->image != null) {
            $file = public_path($project->image);
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $project->delete();
	}
}