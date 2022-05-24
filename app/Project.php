<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    protected $fillable = [
        'project_name','description',
    ];

    // public function users(){
    //     return $this->belongsTo(User::class);
    // }

    public function works(){
        return $this->hasMany(Work::class);
    }

}
