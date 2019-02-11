<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\UserModel;
use App\Services\Business\SecurityService;
use Dotenv\Exception\ValidationException;

class Login2Controller extends Controller
{
    
    public function index(Request $request)
    {
        try {
         
        //get the posted form data
        $username = $request->input('username');
        $password = $request->input('password');
        //save posted form data in user object model
        $user = new UserModel(-1, $username, $password);
        
        //call security business service
        $service = new SecurityService();
        $status = $service->login($user);
        
        if($status)
        {
            $data = ['UserModel' => $user];
            return view('LoginPassed2')->with($data);   
        }
        else
        {
            return view('loginFailed2');
        }
        } 
        catch (Exception $e2) 
        {
           // Log::error("Exception: ", array("message" => $e->getMessage()));
           // $data = ['errorMsg' =>$e->getMessage()];
            return view('exception')->with($data);
        }
    }
    
}
