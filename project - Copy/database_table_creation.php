<?php 
$hostname = "localhost:3308";
$username = "root";
$password = "";
$dbname = "trek_info";

try {
    $conn = new mysqli($hostname, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    } 

    // sql to create table
    // $sql = "CREATE TABLE treks (
    // trek_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    // trek_name VARCHAR(30) NOT NULL,
    // cost VARCHAR(30) NOT NULL
    // )";

    $sql = "CREATE TABLE guide
    (guide_id INT(5) NOT NULL ,
    trek_id INT(5) NOT NULL ,
    guide_name VARCHAR(50) NOT NULL ,
    PRIMARY KEY (guide_id),
    FOREIGN KEY (trek_id) REFERENCES treks(trek_id))";


    // execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Table dates created successfully";
    } else {
        throw new Exception("Error creating table: " . $conn->error);
    }

    $conn->close();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
