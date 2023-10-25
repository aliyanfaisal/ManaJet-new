<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view("pm-dashboard.task.all-tasks");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!isset($_GET['project_id'])) {
            return redirect()->back()->with(['message' => "No Project ID Provided, try again!"]);
        }

        $project_id = $_GET['project_id'];

        $project = Project::findOrFail($project_id);
        $team_members = $project->team->membersData;

        return view("pm-dashboard.task.add-task", compact("project", "team_members"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!isset($request->project_id)) {
            return redirect()->back()->with(['message' => "Project ID required", "result" => "danger"]);
        }

        $project = Project::findOrFail($request->project_id);
        if (!Auth::user()->userCan("can_add_tasks") && !Auth::user()->isTeamLead($project->team_id)) {
            abort(403);
        }

        $validated = $request->validate(
            [
                "task_name" => "required|unique:tasks,task_name",
                "task_lead_id" => "required",
                'task_description' => "required",
                'task_deadline' => "required",
                'priority' => "required",
                'task_step_no' => "nullable",
                "project_id"=>"required"

            ],
            [
                "task_name.required" => "Task Name is required",
                "task_name.unique" => strtoupper($request->task_name) . " is already added",
                "task_description.required" => "Task description is required",
                "task_lead_id.required" => "Team Lead is required",
                "budget.numeric" => "task budget must be a number",
                "priority.required" => "You must select a Priority",
            ]

        );

        if ($validated['task_step_no'] == null) {
            $last_no = Task::where("project_id", $request->project_id)->orderBy("task_step_no", "desc")->first();
            if ($last_no !== null) {
                $last_no = intval($last_no->task_step_no);
                $validated['task_step_no'] = $last_no + 1;
            } else {
                $validated['task_step_no'] = 1;
            }

        } else {
            $step_no = intval($validated['task_step_no']);

            $all_tasks_after_this= Task::where("project_id",$request->project_id)->where("task_step_no",">=",$step_no)->get();
            
            if(!$all_tasks_after_this->isEmpty()){
                foreach($all_tasks_after_this as $task){
                    $task= Task::findOrFail($task->id);
                    $task->task_step_no= ++$step_no;
                    $task->save();
                }
            }

        }

        $validated['status']="pending";
        $task = Task::create($validated);

        return redirect()->route("tasks.create",['project_id'=>$request->project_id])->with(['message' => 'Task Added Successfully!', 'result' => 'success']);

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
}
