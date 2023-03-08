<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Users\CreateUserRequest;
use App\Http\Requests\Dashboard\Users\UpdateUserRequest;
use App\Models\Salon;
use App\Models\User;
use App\Services\Dashboard\UserService;
use App\Utility\UserTypes;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('dashboard.users.index')->with("users", $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salons = Salon::all();
        $types = UserTypes::typeName();
        return view("dashboard.users.create", compact('types', 'salons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();
        $this->userService->store($data);
        toastr()->success('User created successfully');
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
        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $salons = Salon::all();
        $types = UserTypes::typeName();
        $salon = "";
        if ($user->type == UserTypes::TYPE_SALON) {
            $salon = $this->userService->edit($user);
        }
        return view("dashboard.users.edit", compact("salons", "salon", "types", "user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        $this->userService->update($user->id, $data);
        toastr()->success('User udpdated successfully');
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
    	$users = $this->userService->delete($request);
        toastr()->success('User deleted successfully');
        return redirect()->back();
    }
}
