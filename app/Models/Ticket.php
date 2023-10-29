<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;


    public function task(){
        return $this->belongsTo(Task::class,"reference_task_id",'id');
    }
}
