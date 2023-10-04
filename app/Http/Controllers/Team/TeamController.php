<?php

namespace App\Http\Controllers\Team;

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
        
        return view("pm-dashboard.team.all-teams");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $p_cats = ProjectCategories::all();
        
        return view("pm-dashboard.team.add-team", compact('p_cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
