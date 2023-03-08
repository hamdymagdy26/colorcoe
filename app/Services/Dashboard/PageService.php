<?php

namespace App\Services\Dashboard;

use App\Models\Page;
use App\Traits\UploadImage;

class PageService
{
    use UploadImage;

    public function store($data)
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image'], "pages");
        }

        if (isset($data['banner'])) {
            $data['banner'] = $this->uploadImage($data['banner'], "pages");
        }

        return Page::create($data);      
    }

    public function update($id, $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image'], "pages");
        }
        
        if (isset($data['banner'])) {
            $data['banner'] = $this->uploadImage($data['banner'], "pages");
        }

        return Page::where('id', $id)->update($data);
    }

    public function delete($request)
	{
        $page = Page::find($request->input('user_id'));
        if ($page->image != null) {
            $file = public_path($page->image);
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $page->delete();
	}
}