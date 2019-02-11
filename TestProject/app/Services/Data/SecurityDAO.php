<?php 
namespace App\Services\Data;
use \PDO;
use PDOException;
use App\Models\UserModel;
use Illuminate\Support\Facades\Log;
use App\Services\Utility\DatabaseException;


class SecurityDAO
{
    private $conn = NULL;
    
    //Best Practice: do not crate database connections in a dao
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function findByUser(UserModel $user)
    {
        try {
            
        
        Log:info("Entering SecurityDAO .findByUser()");
            $username = $user->getUsername();
            $password = $user->getPassword();
            $sth = $this->conn->prepare('SELECT ID, USERNAME, PASSWORD FROM ICA4.users WHERE BINARY USERNAME = :username AND BINARY PASSWORD = :password');
            $sth->bindParam(':username', $username);
            $sth->bindParam(':password', $password);
            $sth->execute();
        
        
             if ($sth->rowCount() ==1)
             {
                 Log::info("Exit SecurityDAO.findByUser() with true");
                 return true;
             }
            else 
             {
                 Log::info("Exit SecurityDAO.findByUser() with false");
                 return false;
             }
        }
        catch (PDOException $e) {
            Log::error("Exception: ", array("message" => $e->getMessage()));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
        
        
    }
}



?>