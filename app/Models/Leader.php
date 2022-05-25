<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    protected $table = 'leader';
    protected $fillable = ["name", "email", "phone"];

    //1 leader bisa ada di banyak project 
    public function project()
    {
        return $this->hasMany('App\Models\Project');
    }
}
