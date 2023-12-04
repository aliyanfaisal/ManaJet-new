<?php

namespace App\Http\Controllers\dashboard;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function superDashboard(){

        $total_projects= Project::count();
        $total_tickets = Ticket::where("status")->count();
        $total_tasks = Task::where("status","complete")->whereMonth("task_deadline","=", Carbon::now()->month)->count();
        $best_team= Project::select("team_id")->where("project_status","complete")->groupBy("team_id")->orderByRaw("Count(*) DESC")->first();
        $best_team_projects=null;
        
        if($best_team!=null){
            $best_team= Team::find($best_team->team_id);
            $best_team_projects= Project::Where("team_id","=",$best_team->id)
                ->where("project_status","complete")->count();
        } 

        $total_income= Project::where("project_status","complete")->sum("budget");
        $total_users= User::count();

        return view("pm-dashboard.home",
                compact(
                    "total_projects",
                    "total_tickets",
                    "total_tasks",
                    "best_team",
                    "total_income",
                    "best_team_projects",
                    "total_users"
                )
            );
    }
 }
