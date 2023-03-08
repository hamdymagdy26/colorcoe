<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SocialMedias\CreateSocialMediaRequest;
use App\Http\Requests\Dashboard\SocialMedias\UpdateSocialMediaRequest;
use App\Models\SocialMedia;
use App\Models\User;
use App\Services\Dashboard\SocialMediaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SocialMediaController extends Controller
{
    private $socialMediaService;

    public function __construct()
    {
        $this->socialMediaService = new SocialMediaService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialMedias = SocialMedia::paginate(20);
        return view('dashboard.socialMedias.index')->with("socialMedias", $socialMedias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.socialMedias.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSocialMediaRequest $request)
    {
        $data = $request->validated();
        $this->socialMediaService->store($data);
        toastr()->success('SocialMedia created successfully');
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
        return SocialMedia::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialMedia $socialMedia)
    {
        return view("dashboard.socialMedias.edit")
            ->with("socialMedia", $socialMedia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSocialMediaRequest $request, SocialMedia $socialMedia)
    {
        $data = $request->validated();
        $this->socialMediaService->update($socialMedia->id, $data);
        toastr()->success('SocialMedia udpdated successfully');
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
    	$socialMedias = $this->socialMediaService->delete($request);
        toastr()->success('SocialMedia deleted successfully');
        return redirect()->back();
    }
}
