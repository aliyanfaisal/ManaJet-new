<?php

namespace App\Http\Controllers\Project;

use App\Models\File;
use App\Models\Team;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ProjectCategories;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects= Project::orderBy("updated_at","desc")->paginate(20);
        return view("pm-dashboard.project.all-projects",['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $p_cats= ProjectCategories::select("id","cat_name")->get();
        $teams= Team::all();
        return view("pm-dashboard.project.add-project",compact("p_cats", 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated= $request->validate(
            [
                "project_name" => "required|unique:projects",
                "project_category" => "required",
                "project_condition" => "required",
                "budget" => "required|numeric",
                "team_id" => "required",
                "project_image" => "nullable|image",
                'project_description'=>"required"

            ],
            [
                "project_name.required" => "Project Name is required",
                "project_name.unique" => strtoupper($request->project_name) . " is already added",
                "project_description.required" => "Project description is required",
                "project_status.required" => "Project Status is required",
                "budget.required" => "Project budget is required",
                "budget.numeric" => "Project budget must be a number",
                "team_id.required" => "You must select a Team",
                "project_category.required" => "Project Category is required",
                "project_image.image"=>"Project Image must be Image Type"
            ]

        );
 
       
        $project= Project::create($validated);

        if($request->file("project_image")){
        
            $path= $request->file("project_image")->storePublicly("public/project/images");
            if($path){
                $project_image= File::create([
                    "file_name"=>$request->file("project_image")->getClientOriginalName(),
                    "file_path"=> $path,
                    "file_type"=>$request->file("project_image")->getClientOriginalExtension(),
                    "parent_id"=> $project->id,
                    "model"=> Project::class   
                ]);

                if($project_image){
                    $project->project_image_id= $project_image->id;
                    $project->save();
                }
            }
        }


        return redirect()->route("project.edit",['project'=>$project->id])->with(["message" => "Project added successfully", "result" => "success"]);
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
        $p_cats= ProjectCategories::select("id","cat_name")->get();
        $teams= Team::all();
        $project= Project::findOrFail($id);
        return view("pm-dashboard.project.edit-project",compact("p_cats", 'teams','project'));
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
        echo "sdfg";
    }
}
