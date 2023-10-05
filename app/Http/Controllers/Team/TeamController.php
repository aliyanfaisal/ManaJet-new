<?php

namespace App\Http\Controllers\Team;

use App\Models\Task;
use App\Models\Team;
use App\Models\TeamUsers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProjectCategories;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams= Team::paginate(20);
        return view("pm-dashboard.team.all-teams", compact("teams"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $p_cats = ProjectCategories::all();
        $users = User::all();
        return view("pm-dashboard.team.add-team", compact('p_cats', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                "team_name" => "required|unique:teams,team_name",
                "category_id" => "required",
                "team_lead_id" => "required",
                'team_description' => 'required'

            ],
            [
                "team_name.required" => "Team Name is required",
                "team_name.unique" => "Team Name <b>({$request->team_name})</b> is already used",
                "team_lead_id.required" => "Team Lead is required",
                "team_category.required" => "Team description is required",
                "team_description.required" => "Team description is required",
            ]

        );

        $team = Team::create($validated);

        return redirect()->route('teams.edit', ["team" => $team->id])->with(["message" => "Team added successfully", "result" => "success"]);
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
        $p_cats = ProjectCategories::all();
        $users = User::all();
        $team = Team::findOrFail($id);
        return view("pm-dashboard.team.edit-team", compact('p_cats', 'users', 'team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                "team_name" => "required",
                "category_id" => "required",
                "team_lead_id" => "required",
                'team_description' => 'required'

            ],
            [
                "team_name.required" => "Team Name is required",
                "team_lead_id.required" => "Team Lead is required",
                "team_category.required" => "Team description is required",
                "team_description.required" => "Team description is required",
            ]

        );

        $team = Team::findOrFail($id);
        $update = $team->update($validated);

        return redirect()->route('teams.edit', ["team" => $team->id])->with(["message" => "Team updated successfully", "result" => "success"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function updateMembers(Request $request, $team_id)
    {

        $team_members = $request->team_members;

        if (!isset($team_members)) {
            $team_members = [];
        }

        $userToDelete = TeamUsers::where("team_id", $team_id)->whereNotIn('user_id', $team_members)->pluck("user_id")->toArray();

        $usersWithPendingTasks = [];

        foreach ($userToDelete as $mem) {
            //checl if tje user has any pending tasks in team
            $hasPendingTasks = Task::select('tasks.project_id', 'projects.team_id', 'projects.id')
                ->where("tasks.task_lead_id", $mem)
                ->join('projects', 'tasks.project_id', '=', 'projects.id')
                ->where('projects.team_id', '=', $team_id)
                ->count();

            if ($hasPendingTasks > 0) {
                $usersWithPendingTasks[] = $mem;
                continue;
            }

        }

 

        $userToDelete = array_diff($userToDelete, $usersWithPendingTasks);

        $delete = TeamUsers::where("team_id", $team_id)->whereIn('user_id', $userToDelete)->delete();


        $usersToAdd = array_diff($team_members, $userToDelete);

        foreach ($usersToAdd as $mem) {

            $userExists = TeamUsers::where("team_id", $team_id)->where("user_id", $mem)->first();
            if ($userExists) {
                continue;
            }

            $tm = TeamUsers::create(
                [
                    "team_id" => $team_id,
                    "user_id" => $mem
                ]
            );

        }

        if (count($usersWithPendingTasks) > 0) {

            $usersWithPendingTasks = User::whereIn("id", $usersWithPendingTasks)->pluck("name")->toArray();
            return redirect()->back()->with([
                "message" => "These members have pending tasks, so they can not be removed.<br><ul><li>" . implode("</li><li>", $usersWithPendingTasks) . "</li></ul>",
                "result" => "danger"
            ]);

        }

        return redirect()->back()->with(["message" => "Members updated successfully", "result" => "success"]);
    }
}