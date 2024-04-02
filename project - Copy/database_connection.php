<?php
$hostname = "localhost:3308";
$username = "root";
$password = "";
$dbname = "trek_info";


try {
    $conn = new mysqli($hostname,$username,$password);
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    } 
    else{
        $sql = "CREATE DATABASE $dbname";
        $result = mysqli_query($conn,$sql) ;
    
        if($result){
            echo "Database is created Successfully ";
        }
        
        else{
            echo "Database was not created Successfully because -->". mysqli_error($conn);
        
        }
    }
} 
catch (Exception $e) {
    echo ("Connection failure: ". $conn->connect_error);
}
$conn->close();
?>