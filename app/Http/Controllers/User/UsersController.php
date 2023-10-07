<?php

namespace App\Http\Controllers\User;

use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProjectCategories;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users= User::orderBy("id", "desc")->paginate(20);
        return view("pm-dashboard.user.all-users", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles= Role::where("status","active")->get();
        $teams= Team::all();
        return view("pm-dashboard.user.add-user", compact('roles','teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                "name" => 'required',
                "role_id" => "required",
                "email" => "required|email|unique:users,email",
                "team_id" => "nullable",
                "phone" => "required",
                "profile_image" => "nullable"
            ],
            [
                "name.required" => 'User Name is required',
                "role_id.required" => "User Role is required",
                "email.required" => "Email is required",
                "phone.required" => "User Phone is required"
            ]
        );

        $randPass=Random::generate(10);
        $validated['password']= Hash::make($randPass);
        $user=  User::create($validated);

        return redirect()->back()->with(["message" => "<b>User added successfully.</b><br><b>Email:</b> {$validated['email']}<br><b>Password:</b> {$randPass}<br><br><b>NOTE:</b> Provide these credentials to the user and ask them to change the password.",
         "result" => "success"]);        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getUsers(Request $request){

        $role_id= $request->get("user_id");

        if($role_id){
            return User::where("role_id", $role_id)->get();
        }
        else{
            return  User::all();
        }

    }
}