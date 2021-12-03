<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];
   // protected $table = 'departments';
    protected $fillable = ["name","slug_name","description","cover_image_path","parent_id"];

    public function subdepartment(){

        return $this->hasMany('App\Models\Department', 'parent_id', 'id');

    }
}
