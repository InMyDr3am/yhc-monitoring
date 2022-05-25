<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';
    protected $fillable = ["name", "address", "phone"];

    //1 client bisa ada di banyak project 
    public function project()
    {
        return $this->hasMany('App\Models\Project');
    }
}
