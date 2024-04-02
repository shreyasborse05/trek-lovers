<?php
include_once('dbcon.php');
$obj = new crud;
if(isset($_POST['register'])){
    $user_name11 =$_POST['username'];
    $contact1 =$_POST['contact'];
    $email1 =$_POST['email'];
    $age = $_POST['age'];
    $gender= $_POST['gender'];
    $address=$_POST['address'];
    $alt_contact=$_POST['alt_contact'];
    $password_to_database = $_POST['password'];
    session_start();
    $_SESSION['email']=$email;
    $_SESSION['password']=$password_to_database;
    header('Location: index.php');
    //  echo $user_id.$user_name.$contact.$email;
    



    // $hostname = "localhost:3308";
    // $username = "root";
    // $password = "";
    // $dbname = "trek_info";

    // try {
    //     $conn = new mysqli($hostname, $username, $password, $dbname);

    //     // Check connection
    //     if ($conn->connect_error) {
    //         throw new Exception("Connection failed: " . $conn->connect_error);
    //     } 


        $sql = "INSERT INTO user_details (user_name, contact, email, age, gender, Address, Alternate_Contact) VALUES ('$user_name11', '$contact1', '$email1','$age','$gender','$address','$alt_contact')";
      
        
        // execute the query
        if ($obj->sql($sql) === TRUE) {
            echo "Data fetched successfully";
        } else {
            throw new Exception("Error: " . $conn->error);
        }
        



    //     $sql2="INSERT INTO users(`user_id`, `pass`) VALUES ('$userid','$password_to_database');";
    //     if ($conn->query($sql2) === TRUE) {
    //         echo "Data fetched successfully";
    //     } else {
    //         throw new Exception("Error: " . $conn->error);
    //     }
    //     $conn->close();
    // } catch (Exception $e) {
    //     echo $e->getMessage();
    // }

    try{
        // $sql3="INSERT INTO users(`user_id`, `pass`) VALUES ('$userid','$password_to_database');";
        $res = $obj->insert('users', ['email' => "$email", 'pass' => "$password_to_database"]);
        if($res)
        {
            echo"succcess";
        }
        else{
            echo"un success";
        }
    }
    catch(Exception $e){
        echo $e->getMessage();
        
    }
    }

?>