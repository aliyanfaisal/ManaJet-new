<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategories;
use Illuminate\Http\Request;

class ProjectCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $p_cats = ProjectCategories::orderBy("id", "desc")->paginate(20);
        return view("pm-dashboard.project.all-project-categories", compact("p_cats"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pm-dashboard.project.add-project-category");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $post = $request->post();
        $request->validate(
            [
                "cat_name" => "required|unique:project_categories",
                "parent_cat_id" => "nullable",
                "cat_description" => "required",

            ],
            [
                "cat_name.required" => "Category Name is required",
                "cat_name.unique" => strtoupper($post['cat_name']) . " is already added",
                "cat_description.required" => "Category description is required",
            ]

        );

        unset($post['_token']);
        $p_cat = ProjectCategories::create($post);

        return redirect()->back()->with(["message" => "Category added successfully", "result" => "success"]);
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