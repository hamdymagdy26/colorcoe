<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Sliders\CreateSliderRequest;
use App\Http\Requests\Dashboard\Sliders\UpdateSliderRequest;
use App\Models\Slider;
use App\Models\User;
use App\Services\Dashboard\SliderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SliderController extends Controller
{
    private $sliderService;

    public function __construct()
    {
        $this->sliderService = new SliderService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::query()->select('id', 'title_'.App::getLocale(). ' as title', 'image')->paginate(20);
        return view('dashboard.sliders.index')->with("sliders", $sliders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.sliders.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSliderRequest $request)
    {
        $data = $request->validated();
        $this->sliderService->store($data);
        toastr()->success('Slider created successfully');
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
        return Slider::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view("dashboard.sliders.edit")
            ->with("slider", $slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $data = $request->validated();
        $this->sliderService->update($slider->id, $data);
        toastr()->success('Slider udpdated successfully');
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
    	$sliders = $this->sliderService->delete($request);
        toastr()->success('Slider deleted successfully');
        return redirect()->back();
    }
}
