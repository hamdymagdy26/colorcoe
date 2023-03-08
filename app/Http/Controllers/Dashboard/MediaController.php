<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Medias\CreateMediaRequest;
use App\Http\Requests\Dashboard\Medias\UpdateMediaRequest;
use App\Models\Media;
use App\Models\User;
use App\Services\Dashboard\MediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MediaController extends Controller
{
    private $mediaMedia;

    public function __construct()
    {
        $this->mediaMedia = new MediaService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Media::paginate(20);
        return view('dashboard.medias.index')->with("medias", $medias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.medias.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMediaRequest $request)
    {
        $data = $request->validated();
        $this->mediaMedia->store($data);
        toastr()->success('Media created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Media::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        $images = Media::where('model_id', $media->id)->get();
        return view("dashboard.medias.edit")
            ->with("media", $media)
            ->with("images", $images);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMediaRequest $request, Media $media)
    {
        $data = $request->validated();
        $this->mediaMedia->update($media->id, $data);
        toastr()->success('Media udpdated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
    	$medias = $this->mediaMedia->delete($request);
        toastr()->success('Media deleted successfully');
        return redirect()->back();
    }
}
