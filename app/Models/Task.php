<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
