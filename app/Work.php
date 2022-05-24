<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'project_id','teacher_id','status',
    ];

    public function projects(){
        return $this->belongsTo(Project::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

}
