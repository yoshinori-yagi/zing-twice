<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Seat;

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
    
    public function show($id) 
    {
        $data = [];
        if (\Auth::check()) {
            
            $user = \Auth::user();
            $seats = Seat::All('id');
          

            $data = [
                'user' => $user,
                'seats' => $seats,
                
            ];
            
            return view('offence.offence', $data);
        }
        else {
            return redirect('welcome');  
        }
        
    }
} 