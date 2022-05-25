<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Project extends Model
{

    protected $table = 'project';
    protected $fillable = ["name","client_id", "leader_id", "start_date", "end_date", "progress"];

    protected $dates = ['start_date', 'end_date'];

    //tabel project punya fk dari client
    public function client()
    {
        return $this->belongsTo('App\Models\Client','client_id');
    }

    //tabel project punya fk dari leader
    public function leader()
    {
        return $this->belongsTo('App\Models\Leader','leader_id');
    }
}
