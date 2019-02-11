<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhatsMyNameController extends Controller
{
    public function index(Request $request)
    {
        
        
        
        
        $firstName = $request->input('firstname');
        $lastName = $request->input('lastname');
        echo "Your name is: " . $firstName . " " . $lastName; //do not use echo in milestone
        echo '<br>';
        
        $data = ['firstName' => $firstName, 'lastName' => $lastName];
        return view('hello World')->with($data); 
        
        $data = ['firstName' => $firstName2, 'lastName' => $lastName2];
        return view('thatswhoiam')->with($data);
        
    }
}
