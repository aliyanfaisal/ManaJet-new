<?php

namespace App\Models;

use App\Models\User;
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
        return $this->belongsTo('App\Project', 'project_id');
    }


    public function teamLead(){
        return $this->belongsTo(User::class,"task_lead_id",'id');
    }
}
