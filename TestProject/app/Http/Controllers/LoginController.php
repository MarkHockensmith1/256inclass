<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\UserModel;
use App\Services\Business\SecurityService;

class LoginController extends Controller
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
            $data = ['model' => $user];
            return view('loginPassed')->with($data);   
        }
        else
        {
            $data[] = ["status" => $status];
            return view('loginFailed')->with($data);
        }
        } 
        catch (Exception $e) 
        {
            Log::error("Exception: ", array("message" => $e->getMessage()));
            $data = ['errorMsg' =>$e->getMessage()];
            return view('exception')->with($data);
        }
    }
}
