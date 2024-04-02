<?php
session_start();
$email=$_SESSION['email'];

if($_SESSION['email']){
include_once("header.php");
echo("Hello ".$email);
include_once('../landing/dbcon.php');
$obj = new crud; 


        if(isset($_POST['trek_submit'])){
            $trek_name=$_POST['trek_name'];
            $_SESSION['trek_name']=$trek_name;
            $trek_id=$_POST['trek_id'];
        }
        if(isset($_POST['confirm'])){
            $no_of_people = $_POST['num_people'];
            $trek_id=$_POST['trek_id'];

            // $sql3="SELECT SUM(no_of_people) as people FROM  GROUP BY 'trek_name'";
            
                $sql = "INSERT INTO `trek_details`(`trek_id`,`email`,`no_of_people`) VALUES ('$trek_id','$email','$no_of_people')";
            
                
                // execute the query
                if ($obj->sql($sql) === TRUE) {
                    echo'<div class="container mt-5">
                    <div class="alert alert-success" role="alert">
                      <h4 class="alert-heading">Success!!</h4>
                      <p>Hi '.$email.'You have successfully registered for the trek '.$_SESSION['trek_name'].'</p>
                      <hr>
                      <p class="mb-0">Thank you for booking. Your booking id is <strong>'.$trek_id.'</strong>.</p>
                    </div>
                  </div>
                  '; 
                  echo '<script> setTimeout(function() {
                    window.location.href = "index.php";
                  }, 5000);</script>';
                  exit();
                } else {
                    throw new Exception("Error creating table: ");
                }
            

            // $to=$_SESSION['email'];
            // echo $to;
            // $subject='Trek Confirmation';
            // $message="Thank you For registering. Your booking id is $trek_id. Your total amount is Rs. 2000";
            // $header="From:2329250@cognizant.com";
            // mail($to,$subject,$message,$header);
            // if( $result == true ){  
            //     echo "Message sent successfully...";  
            //  }else{  
            //     echo "Sorry, unable to send mail...";  
            //  } 


            
            // echo '<script> setTimeout(function() {
            //     window.location.href = "index.php";
            //   }, 2000);</script>';
        }


        echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            .jumbotron {
                background-image: url("https://source.unsplash.com/1600x900/?mountains,nature,landscape");
                background-size: cover;
                background-position: center;
                color: white;
                padding: 50px;
                text-align: center;
                margin-bottom: 50px;
            }
        </style>';
        include_once("navbar.php");

        $sql2="SELECT * FROM agenda WHERE trek_name='$trek_name'";
        
        $res=$obj->sql( $sql2 );
        if($res){
            $row=mysqli_fetch_assoc($res);
            $pickuptime=$row['pickuptime'];
            $trek_info=$row['trek_info'];
            $activity1=$row['activity1'];
            $activity2=$row['activity2'];
        }

        

        echo '<div class="jumbotron">
        <h1 class="display-4">Trek to '.$trek_name.'</h1>
        <p class="lead">Join us for a once-in-a-lifetime adventure!!</p>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-md-8">
            <div class="container">
            <h2>'.$trek_name.'</h2>
            <p>Pickup Time: '.$pickuptime.'</p>
            <p>'.$trek_info.'</p>
            
            <h3>Day 1 Activities:</h3>
            <p>'.$activity1.'</p>
            
            <h3>Day 2 Activities:</h3>
            <p>'.$activity2.'</p>
          </div>
          
                </div>
            <div class="col-md-4">
                <h2>Book Your Spot</h2>
                <form method="post" action="book.php">
                    <div class="form-group">
                        <label for="num_people">Number of People</label>
                        <input type="number" class="form-control" id="num_people" name="num_people" required>
                    </div>
                       
                        <input type="hidden" value="'.$trek_id.'" name="trek_id">
                    <input type="submit" class="btn btn-primary" value="Book Now" name="confirm">
                </form>
            </div>
        </div>';
        include_once("footer.php");
}
else{
    echo "Sorry u r not logged in<br>";
    header('Location: login.php');
}
?>
