<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Seat extends Model
{
    protected $fillable = ['id','team_id'];
    
    public function user() {
        return $this->belongToMany(User::class);
    }
}
