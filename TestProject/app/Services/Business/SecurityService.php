<?php 

namespace App\Services\Business;

use \PDO;
use Illuminate\Support\Facades\Log;
use App\Models\UserModel;
use App\Services\Data\SecurityDAO;


class SecurityService
{
    public function login(UserModel $user)
    {
        Log::info("Entering SecurityService.login()");
        
        //get credentials for accessing database
        $servername = config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.dbname");
        
        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //create new secuirty service dao with this connection and try to find the password in user
        $service = new SecurityDAO($conn);
        $flag = $service->findByUser($user);
        
        Log::info("Exit SecuirtyService.login() with " . $flag);
        return $flag;
    }
}



?>