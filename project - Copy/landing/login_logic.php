<?php
include_once('dbcon.php');
$obj = new crud;


if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password1 = $_POST['password'];
}
if(isset($_POST['trek_id'])){
    $trek_id=$_POST['trek_id'];
}



    
    $result = $obj->sql("SELECT pass FROM users WHERE email='$email'");
    if($result)
    {
        $row = mysqli_fetch_assoc($result);
        $password_database=$row['pass'];


            if(isset($_POST['login'])){
                $email = $_POST['email'];
                $password_to_match = $_POST['password'];

                if($password_database===$password_to_match){
                    session_start();
                    $_SESSION['email'] = $email;
                   
                    if($trek_id){
                        echo'<div class="container mt-5">
                        <div class="alert alert-success" role="alert">
                          <h4 class="alert-heading">Success!!</h4>
                          <p>Hi '.$email.'You have successfully Logged in</p>
                        </div>
                      </div>
                      '; 
                      echo '<script> setTimeout(function() {
                        window.location.href = "index.php";
                      }, 5000);</script>';
                      exit();
                    }
                    else{
                        echo'<div class="container mt-5">
                <div class="alert alert-success" role="alert">
                  <h4 class="alert-heading">Success!!</h4>
                  <p>Hi '.$email.'You have successfully Logged in</p>
                </div>
              </div>
              '; 
              echo '<script> setTimeout(function() {
                window.location.href = "index.php";
              }, 5000);</script>';
              exit();
                    }
                    
            }
    }

            if($password1 === $password_database){
                session_start();
                $_SESSION['email'] = $email;
                echo'<div class="container mt-5">
                <div class="alert alert-success" role="alert">
                  <h4 class="alert-heading">Success!!</h4>
                  <p>Hi '.$email.'You have successfully Logged in</p>
                </div>
              </div>
              '; 
              echo '<script> setTimeout(function() {
                window.location.href = "index.php";
              }, 5000);</script>';
              exit();
    }
    else{
        echo"un success";
    }
}









    
?>
