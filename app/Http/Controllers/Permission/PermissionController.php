<?php

namespace App\Http\Controllers\Permission;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\RolePermission;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::where("parent_id",null)->paginate(10);
        $permissions_all= Permission::all();
        return view("pm-dashboard.permission.all-permissions", compact("roles", "permissions_all"));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validated = $request->validate(
            [
                "permissions" => 'nullable',
                "id" => "required"
            ],
            [
                "name.required" => 'User Name is required'
            ]
        );


        //add user to teans
        $old_permissions_ids = [];
        if ($request->old_permissions != "") {
            
            $old_permissions_ids = (array) json_decode($request->old_permissions);
            $old_permissions_ids = array_unique($old_permissions_ids);
        }

        $permissions_to_remove = $old_permissions_ids;

        if (isset($validated['permissions']) && $validated['permissions'] != $old_permissions_ids) {
            $validated['permissions'] = array_map("intval", $validated['permissions']);

            $permissions_to_remove = array_diff($old_permissions_ids, $validated['permissions']);

            $permissions_to_add = array_diff($validated['permissions'], $old_permissions_ids);

            foreach ($permissions_to_add as $per_id) {
                $team_users = RolePermission::create([
                    "permission_id" => $per_id,
                    "role_id" => $validated['id']
                ]);
            }
        }

        RolePermission::whereIn("permission_id", $permissions_to_remove)->where("role_id", $validated['id'])->delete();


        return redirect()->back()->with([
            "message" => "Permissions Updated!",
            "result"=>"success"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::where("status", "active")->get();
        $teams = Team::all();
        return view("pm-dashboard.user.edit-user", compact('user', "roles", 'teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                "id" => "required",
                "name" => 'required',
                "role_id" => "required",
                "email" => "required|email",
                "team_ids" => "nullable",
                "phone" => "required",
                "profile_picture" => "nullable",
                "password"=>"nullable"
            ],
            [
                "id.required" => 'Failed to get User ID. Refresh page and try again!',
                "name.required" => 'User Name is required',
                "role_id.required" => "User Role is required",
                "email.required" => "Email is required",
                "phone.required" => "User Phone is required"
            ]
        );
 
        if( isset($validated['password']) && $validated['password'] !==""){
            $validated['password']= Hash::make($validated['password']);
        }
        else{
            unset($validated['password']);
        }

        $user = User::findOrFail($validated['id']);

        $user = $user->update($validated);

        if (!$user) {
            return redirect()->back()->with([
                "message" => "Failed to add user, try again!.",
                "result" => "danger"
            ]);
        }
        $user = User::findOrFail($validated['id']);

        if ($request->hasFile("profile_picture")) {
            $image = $request->file("profile_picture");

            $upload = $image->storePublicly("/public/user_profile_pictures");
            $old_profile = UserProfile::where("user_id", $user->id)->where("meta_key", "profile_picture")->first();

            if (null !== $old_profile) {
                Storage::delete($old_profile->meta_value);

                $old_profile->update([
                    "meta_value" => $upload
                ]);

            } else {
                $profile = UserProfile::create(
                    [
                        "user_id" => $user->id,
                        "meta_key" => "profile_picture",
                        "meta_value" => $upload
                    ]
                );
            }



        }


        //add user to teans
        $old_team_ids = [];
        if ($request->old_team_ids != "") {
            $old_team_ids = (array) json_decode($request->old_team_ids);
            $old_team_ids = array_unique($old_team_ids);
        }

        $team_to_remove_user = $old_team_ids;



        if (isset($validated['team_ids']) && $validated['team_ids'] != $old_team_ids) {
            $validated['team_ids'] = array_map("intval", $validated['team_ids']);

            $team_to_remove_user = array_diff($old_team_ids, $validated['team_ids']);

            $team_to_add_user = array_diff($validated['team_ids'], $old_team_ids);

            foreach ($team_to_add_user as $team) {
                $team_users = TeamUsers::create([
                    "team_id" => $team,
                    "user_id" => $user->id
                ]);
            }
        }

        TeamUsers::whereIn("team_id", $team_to_remove_user)->where("user_id", $user->id)->delete();

        return redirect()->back()->with(["message" => "User Updated Successfully!", "result" => "success"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user= User::findOrFail($id);
        $user->delete();

        return redirect()->route("users.index")->with(["message" => "User Updated Successfully!", "result" => "success"]);
    }

}
