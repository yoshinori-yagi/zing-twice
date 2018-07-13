<?php

namespace App;

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

use App\Seat;

class Tetoris extends Model
{
   protected $fillable = ['tetoris' ,'updated_at','created_at'];
   
   public function user()
   {
       return $this->belongsTo(User::class);
   }
}
