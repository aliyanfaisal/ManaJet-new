<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['role_name', 'parent_id', 'role_description', 'status'];


    public function parentRole()
    {

        if ($this->parent_id) {
            return self::find($this->parent_id);
        } else {
            return false;
        }
    }
}