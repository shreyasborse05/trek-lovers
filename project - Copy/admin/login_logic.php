<?php
// include_once('../landing/dbcon.php');
// $obj = new crud; 
$hostname = "localhost:3308";
$username = "root";
$password = "";
$dbname = "trek_info";




if(isset($_POST['login'])){
    $username1 = $_POST['username'];
    $password1 = $_POST['password'];
}


    $conn = new mysqli($hostname,$username,$password,$dbname);
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    } 
    else{
        $sql = "SELECT password FROM adminlogin WHERE username='$username1'";
        $result = mysqli_query($conn,$sql) ;
    
        if($result){
            $row = mysqli_fetch_assoc($result);
             $password_database=$row['password'];
           
            if($password1 === $password_database){
                session_start();
                $_SESSION['username'] = $username;
                echo "You have logged in successfully";
                header('Location: index.php');
    }
    else{
        echo"un success";
    }
        }
        
        else{
            echo "Database was not created Successfully because -->". mysqli_error($conn);
        
        }
    }


    
//     $result = $obj->sql("SELECT pass FROM adminlogin WHERE username='$username'");
//     $row = mysqli_fetch_assoc($result);
//         $password_database=$row['pass'];
//         echo $password_database;
//         echo $password1;
//     if($result)
//     {
        // $row = mysqli_fetch_assoc($result);
        // $password_database=$row['pass'];

        //         if($password1 === $password_database){
        //             session_start();
        //             $_SESSION['username'] = $username;
        //             echo "You have logged in successfully";
        //             header('Location: index.php');
        // }
        // else{
        //     echo"un success";
        // }
// }









    
?>
