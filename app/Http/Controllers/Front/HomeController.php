<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Page;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\SocialMedia;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    private $clientService;

    public function __construct()
    {
        // $this->clientService = new ClientService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $pages = Page::select('title_'.App::getLocale().' as title', 'slug')->orderBy('created_at', 'asc')->get();
        $sliders = Slider::select('link', 'image', 'title_'.App::getLocale().' as title', 'content_'.App::getLocale().' as content')->get();
        $about = Page::where('slug', 'about-us')->select('content_'.App::getLocale().' as content')->first();
        $project_count = Project::count();
        $settings = Setting::first();
        $clients = Client::all();
        $social_media = SocialMedia::all();
        $testimonials = Testimonial::select('author', 'title_'.App::getLocale().' as title', 'source_'.App::getLocale().' as source', 'content_'.App::getLocale().' as content')
            ->orderBy('created_at', 'desc');
        return view('front.home', compact('sliders', 'social_media', 'about', 'project_count', 'settings', 'clients', 'pages', 'testimonials'));
    }

    public function about()
    {
        $pages = Page::select('title_'.App::getLocale().' as title', 'slug')->orderBy('created_at', 'asc')->get();
        $about = Page::where('slug', 'about-us')->select('content_'.App::getLocale().' as content')->first();
        $setting = Setting::select('who_are_we_'.App::getLocale().' as who_are_we', 'about_us_'.App::getLocale().' as about_us', 'vision_'.App::getLocale().' as vision',
        'mission_'.App::getLocale().' as mission')->first();
        $settings = Setting::first();
        $social_media = SocialMedia::all();
        $settings = Setting::first();
        return view('front.aboutUs', compact('about', 'social_media', 'settings', 'setting', 'settings', 'pages'));
    }

    public function our_services()
    {
        $social_media = SocialMedia::all();
        $settings = Setting::first();
        $pages = Page::select('title_'.App::getLocale().' as title', 'slug')->orderBy('created_at', 'asc')->get();
        $services = Page::where('slug', 'services')->select('content_'.App::getLocale().' as content')->first();
        $service_information = Service::select('content_'.App::getLocale().' as content', 'image', 'title_'.App::getLocale().' as title')->get();
        return view('front.OurServices', compact('services', 'social_media', 'settings', 'service_information', 'pages'));
    }

    public function our_projects()
    {
        $social_media = SocialMedia::all();
        $settings = Setting::first();
        $pages = Page::select('title_'.App::getLocale().' as title', 'slug')->orderBy('created_at', 'asc')->get();
        $projects = Page::where('slug', 'projects')->select('content_'.App::getLocale().' as content')->first();
        $project_information = Project::select('id', 'content_'.App::getLocale().' as content', 'title_'.App::getLocale().' as title',
            'date', 'scope_'.App::getLocale().' as scope', 'client', 'file')->get();
        return view('front.ourProjects', compact('projects', 'social_media', 'settings', 'project_information', 'pages'));
    }

    public function contact_us()
    {
        $social_media = SocialMedia::all();
        
        $settings = Setting::first();
        $pages = Page::select('title_'.App::getLocale().' as title', 'slug')->orderBy('created_at', 'asc')->get();
        return view('front.contactUs', compact('pages', 'social_media', 'settings'));
    }

    public function download()
    {
        $profile = Setting::first();
        if ($profile) {
            if ($profile->profile != null) {
                $file = $profile->profile;
            } else {
                $file = public_path('uploads/sample.pdf');
            }
            return response()->download($file);
        }
        return redirect()->back();
        toastr()->error(__('no_file_found'));
    }

    public function downloadProject($id)
    {
        $project = Project::find($id);
        if ($project) {
            if ($project->file != null) {
                $file = $project->file;
            } else {
                $file = public_path('uploads/sample.pdf');
            }
            return response()->download($file);
        }
        return redirect()->back();
        toastr()->error(__('no_file_found'));
    }
}
