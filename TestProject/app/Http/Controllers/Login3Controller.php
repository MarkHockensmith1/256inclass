<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\UserModel;
use App\Services\Business\SecurityService;
use Dotenv\Exception\ValidationException;

class Login3Controller extends Controller
{
   
    /*private function validationForm(Request $request)
    {
        //Best practice: centralizze rules so that yuou havae cpnsotent architecture and can reuse rul;es
        //bad to not use defined data validation framework, and putting rules all over cpde in client side and database
        $rules = ['username' => 'Required | Between:4,10 | Alpha',
                  'password' => 'Required | Between:4,10'];
        $this->validate($request, $rules);
    }
    */
    
    public function index(Request $request)
    {
        try {
            //runs validation from above function
            //$this->validateForm($request);
           
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
        //catch exception from data validation
        //throws the exception again
        catch(ValidationException $e1)
        {
            throw $e1;
        }
        
        /*catch (Exception $e2) 
        {
           // Log::error("Exception: ", array("message" => $e->getMessage()));
           // $data = ['errorMsg' =>$e->getMessage()];
            return view('exception')->with($data);
        }*/
        
    }
    
}
