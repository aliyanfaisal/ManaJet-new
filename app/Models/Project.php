<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "project_name",
        "project_category",
        "project_status",
        "budget",
        "team_id",
        "project_image_id",
        'project_description'
    ];

    public function category(){
        return $this->belongsTo(ProjectCategories::class,"project_category","id");
    }

    public function team(){
        return $this->belongsTo(Team::class,"project_category","id");
    }

    public function projectImage(){
        return $this->belongsTo(File::class,"project_image_id",'id');
    }

    public function projectImageUrl(){

        $path= ($this->projectImage)? $this->projectImage->file_path : "default-image.png";

        return Storage::url($path);
    }
}
