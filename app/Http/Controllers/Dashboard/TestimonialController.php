<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Testimonials\CreateTestimonialRequest;
use App\Http\Requests\Dashboard\Testimonials\UpdateTestimonialRequest;
use App\Models\Testimonial;
use App\Models\User;
use App\Services\Dashboard\TestimonialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TestimonialController extends Controller
{
    private $testimonialService;

    public function __construct()
    {
        $this->testimonialService = new TestimonialService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::query()->select('id', 'title_'.App::getLocale(). ' as title', 'author')->paginate(20);
        return view('dashboard.testimonials.index')->with("testimonials", $testimonials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.testimonials.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTestimonialRequest $request)
    {
        $data = $request->validated();
        $this->testimonialService->store($data);
        toastr()->success('Testimonial created successfully');
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
        return Testimonial::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view("dashboard.testimonials.edit")
            ->with("testimonial", $testimonial);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        $data = $request->validated();
        $this->testimonialService->update($testimonial->id, $data);
        toastr()->success('Testimonial udpdated successfully');
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
    	$testimonials = $this->testimonialService->delete($request);
        toastr()->success('Testimonial deleted successfully');
        return redirect()->back();
    }
}
