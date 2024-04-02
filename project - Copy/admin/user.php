<?php 
session_start();
if($_SESSION){
include_once('../landing/dbcon.php');
$obj = new crud;   

include_once('header.php');
include_once('navbar.php');

echo '
    <!-- Main content -->
    <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <h2>User Information</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
            <th>User Id</th>
              <th>Name</th>
              <th>Contact</th>
              <th>Eamil Id</th>
              <th>Age</th>
              <th>gender</th>
              <th>Alternate Contact </th>
              <th>Address</th>
            </tr>
          </thead>
          <tbody>
          <tr>';

          $sql = "SELECT user_id,user_name,contact,email,Alternate_Contact,gender,age,Address FROM user_details";


// execute the query

  $result = $obj->sql($sql);

  if($result){
      while ($row = mysqli_fetch_assoc($result)) {
          $user_id=$row['user_id'];
          $user_name=$row['user_name'];
          $contact=$row['contact'];
          $email=$row['email'];
          $altcontact=$row["Alternate_Contact"];
          $gender=$row['gender'];
          $age=$row['age'];
          $address=$row['Address'];
        
          echo '<td>'.$user_id.'</td>
          <td>'.$user_name.'</td>
          <td>'.$contact.'</td>
          <td>'.$email.'</td>
          <td>'.$age.'</td>
          <td>'.$gender.'</td>
          <td>'.$altcontact.'</td>
          <td>'.$address.'</td>
          </tr>
          ';

       }
} else {
    echo("Error creating table: " . $conn->error);
}


echo '
          </tbody>
        </table>
      </div>';

      

include_once('footer.php');
}
else{
  echo "You are not authorized to view this page";
}?>