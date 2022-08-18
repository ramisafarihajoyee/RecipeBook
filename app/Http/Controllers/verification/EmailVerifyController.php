<?php

namespace App\Http\Controllers\verification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailVerifyController extends Controller
{

    public function check(Request $data){

        session_start(); 
     
        if (isset($_POST['email']) && isset($_POST['password'])) {
    
            function validate($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
    
        $email = validate($_POST['email']);
        $pass = validate($_POST['password']);
    
        if (empty($email)) {
            header("Location: login.blade.php?error=Email is required");
            exit();
        }else if(empty($pass)){
            header("Location: login.blade.php?error=Password is required");
            exit();
        }else{
            $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
    
            $result = mysqli_query($conn, $sql);
    
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['Email'] === $email && $row['Password'] === $pass) {
                    $_SESSION['Email'] = $row['Email'];
                    $_SESSION['Name'] = $row['Name'];
                    $_SESSION['ID'] = $row['ID'];
                    header("Location: about.blade.php");
                    exit();
                }else{
                    header("Location: login.blade.php?error=Incorect Email or Password");
                    exit();
                }
            }else{
                header("Location: login.blade.php?error=Incorect Email or password");
                exit();
            }
        }
        
        }else{
        header("Location: signup.blade.php");
        exit();
        }
    } 
}

?>