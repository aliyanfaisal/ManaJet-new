<?php

namespace App\Http\Controllers\Task;

use App\Models\Task;
use App\Models\Option;
use App\Models\Project;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use \Mastashake\LaravelOpenaiApi\LaravelOpenaiApi; 

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

        $tasks= Task::where("project_id",$project->id)->paginate(10);

        
        $generated_tasks=  Option::where("option_key","project_".($project->id)."_generated_tasks")->orderBy("id","desc")->first();
       
        if($generated_tasks!=null){
            $generated_tasks= ($generated_tasks->option_value);
        }
        else{
            $generated_tasks="";
        }
        

        return view("pm-dashboard.task.add-task", compact("project", "team_members","tasks", "generated_tasks"));

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
        if (!Auth::user()->userCan("can_add_task") && !Auth::user()->isTeamLead($project->team_id)) {
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


    public function getTasksGPT(Request $request){
        
        if(!isset($request->project)){
            return false;
        }

        $request->project= (object) $request->project;
     
        $result = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            "prompt" => "Act as a Project Lead in an IT company. Project name is '{$request->project->project_name}' and Category is {$request->project->project_category} and Description is {$request->project->project_description}. Write Tasks for this project with task_name,task_description,days_needed,priority as high,low,medium. Follow Agile Method. Return this data only and in Json format like this [{ \"task_name\": .... },{....}]. Hints: {$request->hints} ",
            "n" => 1,
            "max_tokens" => 1600
        ]);

        $res=  $result['choices'][0]['text'];
   

        // $res= '[{ "task_name": "Project Planning","task_description": "Plan the scope and timeline of the project","days_needed": 5, "priority": "High"},
        // { "task_name": "Register Domain Name","task_description": "Register a domain name for project website","days_needed": 1, "priority": "Low"},
        // { "task_name": "Design Website","task_description": "Design and plan the front-end user interface of the website","days_needed": 7, "priority": "Medium"},
        // { "task_name": "Develop Website","task_description": "Write programms and HTML to bring the planned design to life","days_needed": 15, "priority": "High"},
        // { "task_name": "Test Website","task_description": "Test the website to ensure smooth operation","days_needed": 5, "priority": "Medium"},
        // { "task_name": "Deploy Website","task_description": "Publish website and make it publicly available","days_needed": 2, "priority": "High"}]
        // ';

        Option::create([
            "option_key"=>"project_".($request->project->id)."_generated_tasks",
            "option_value"=> ($res),
            "active"=> true
        ]);

        echo ($res);
        die();
    }


    public function addAllTasks(Request $request){
        
        if(isset($request['all_tasks'])){

            $tasks=($request['all_tasks']);

            foreach($tasks as $task){

                $task= (array) $task;
                // $task['']

                // $tk = Task::create($task);
            }
        }
    }
}
