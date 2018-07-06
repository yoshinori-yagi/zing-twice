<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Seat;

use App\User;

class SeatsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');

            $data = [
                'user' => $user,
                'seats' => $seats,
            ];
        
            return view('welcome',$data);
        }
        else {
            return redirect('welcome');  
        }
    
    }
    
   
    public function update()
    {
        if (\Auth::check()) {
            return view ('seat.update');
        }
        else {
            return redirect('welcome');  
        }
    }
    
} 