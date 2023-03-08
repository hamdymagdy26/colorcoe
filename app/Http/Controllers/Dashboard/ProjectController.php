<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Projects\CreateProjectRequest;
use App\Http\Requests\Dashboard\Projects\UpdateProjectRequest;
use App\Models\Project;
use App\Models\User;
use App\Services\Dashboard\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProjectController extends Controller
{
    private $projectProject;

    public function __construct()
    {
        $this->projectProject = new ProjectService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::query()->select('id', 'client', 'title_'.App::getLocale(). ' as title', 'scope_'.App::getLocale(). ' as scope')->paginate(20);
        return view('dashboard.projects.index')->with("projects", $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.projects.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        $data = $request->validated();
        $this->projectProject->store($data);
        toastr()->success('Project created successfully');
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
        return Project::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view("dashboard.projects.edit")
            ->with("project", $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $this->projectProject->update($project->id, $data);
        toastr()->success('Project udpdated successfully');
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
    	$projects = $this->projectProject->delete($request);
        toastr()->success('Project deleted successfully');
        return redirect()->back();
    }
}
