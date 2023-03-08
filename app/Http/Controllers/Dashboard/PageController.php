<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Pages\CreatePageRequest;
use App\Http\Requests\Dashboard\Pages\UpdatePageRequest;
use App\Models\Page;
use App\Models\User;
use App\Services\Dashboard\PageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    private $pageService;

    public function __construct()
    {
        $this->pageService = new PageService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::query()->select('id', 'title_'.App::getLocale(). ' as title', 'image')->paginate(20);
        return view('dashboard.pages.index')->with("pages", $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.pages.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePageRequest $request)
    {
        $data = $request->validated();
        $this->pageService->store($data);
        toastr()->success('Page created successfully');
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
        return Page::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view("dashboard.pages.edit")
            ->with("page", $page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $data = $request->validated();
        $this->pageService->update($page->id, $data);
        toastr()->success('Page udpdated successfully');
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
    	$pages = $this->pageService->delete($request);
        toastr()->success('Page deleted successfully');
        return redirect()->back();
    }
}
