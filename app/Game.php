<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

use App\Seat;

use App\Number;

class Game extends Model
{
    protected $fillable = ['user_id' , 'team_id', 'user_id_score', 'team_id_score', 'updated_at' ,'created_at'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
    
    public function number()
    {
        return $this->belongsTo(Number::class);
    }
    
}
