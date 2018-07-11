<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

use App\Seat;

class Number extends Model
{
    protected $fillable = ['number' ,'updated_at','created_at'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
