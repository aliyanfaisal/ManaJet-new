<?php

namespace App\Models;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable= [
        "project_id",
        "task_name",
        "task_lead_id",
        'task_description',
        'task_deadline',
        'priority',
        'task_step_no',
        "status"
    ];

    public function project()
    {
        return $this->belongsTo( Project::class, 'project_id');
    }


    public function taskLead(){
        return $this->belongsTo(User::class,"task_lead_id",'id');
    }

    public function message($user_id){
        return Option::where("option_key","task_submit_message_".$user_id)->pluck("option_value")[0];
    }
}
