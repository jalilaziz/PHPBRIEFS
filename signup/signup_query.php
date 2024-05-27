<?php
session_start();
require_once 'conn.php';

$nbrErr =0;
$emailExist = $emptyFields = "";

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if(isset($_POST['signup'])){

    if(!empty($_POST['fullname'])  && !empty($_POST['username'])  && !empty($_POST['email'])  && !empty($_POST['password'])  && !empty($_POST['repeat_password'])){
    
        $fullname = validate($_POST['fullname']);
        $username = validate($_POST['username']);
        $email = validate($_POST['email']);
        //$password = validate($_POST['password']);
        $repeat_password = md5(validate($_POST['repeat_password']));

        $password = md5(validate($_POST['password']));
    
        // validate password
        if(strlen($password) < 4){
            $nbrErr++;
            echo "Password must be longer than 8 characters";

        }else if($password !=  $repeat_password){
            $nbrErr++;
            echo "Passwords do not match";

        }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //validate email
            $nbrErr++;
            echo "Invalid email format";

        }else{
            try{
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $usrname, $pass);
                $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stm = $conn->prepare("SELECT * FROM `users` WHERE email=:email");
                $stm->bindParam(":email", $email);
                $stm->execute();
    
                if($stm->rowCount() >0){
                    $nbrErr++;
                    // echo "Email already exist!";
                    $emailExist = "Email already exist!";
                }
                
                //insert data of user
    
                if($nbrErr<=0){
                    $stm = $conn->prepare("INSERT INTO `users` (fullname,email,username,password) VALUES(:fullname, :email,:username, :password)");
                    $stm->bindParam(":fullname", $fullname);
                    $stm->bindParam(":email", $email);
                    $stm->bindParam(":username", $username);
                    $stm->bindParam(":password", $password);
                    $stm->execute();
    
                    //echo "Successfuully registr";
                    $crSuccess = "You successfully signed up your account";
                }
            }catch(PDOException $e){
                //echo "There was an error while registring. " . $e->getMessage();
                $crFailed = "There was an error while registring. " . $e->getMessage();;

            }
        }
    }else{
        //echo "Please fill out all the fields!";
        $emptyFields = "Please fill out all the fields!";
    }
}
?>