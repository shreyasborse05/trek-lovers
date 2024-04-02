<?php 
include_once('../landing/dbcon.php');
$obj = new crud; 
session_start();
  if($_SESSION){

if(isset( $_POST['submit'])){
          $guide_name1 = $_POST['GuideName'];
          $contact1 = $_POST['contact'];
          $email = $_POST['email'];
          $skills1 = $_POST['skills'];

          $sql2="INSERT INTO `guide`(`guide_name`, `contact`, `email`, `skills`) VALUES ('$guide_name1','$contact1','$email','$skills1')";
    
          $rezult=$obj->sql($sql2);
          if($rezult){
              echo"the data inserted successfully";
              echo'<script>alert("The data added successfully")</script>';
              header("Location:index.php");
          }
}


include_once('header.php');
include_once('navbar.php'); 



   
    echo '<!-- Main content -->
    <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h2>Guide Information</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Guide Id</th>
              <th>Guide Name</th>
              <th>Contact</th>
              <th>Skills</th>
            </tr>
          </thead>
          <tbody>';
          $sql = "SELECT guide_id,guide_name,contact,skills FROM guide GROUP BY guide_id";


// execute the query

  $result = $obj->sql($sql);

  if($result){
      while ($row = mysqli_fetch_assoc($result)) {
          $guide_id = $row['guide_id'];
          $guide_name = $row['guide_name'];
          $contact = $row['contact'];
          $skills = $row['skills'];
          
          echo '<tr><td>'.$guide_id.'</td>
          <td>'.$guide_name.'</td>
          <td>'.$contact.'</td>
          <td>'.$skills.'</td>
          </tr>
          ';

       }
} else {
    echo("Error creating table: " . $conn->error);
}


echo '
          </tbody>
        </table>
      </div>

      <!-- Form to add treks -->
      <div class="form-section">
        <h2>Add a Guide</h2>
        <form method="post">
          <div class="form-group">
            <label for="trekName">Guide Name</label>
            <input type="text" class="form-control" name="GuideName" required>
          </div>
        
          <div class="form-group">
            <label for="cost">Contact</label>
            <input type="number" class="form-control" id="contact" name="contact" required>
          </div>
          <div class="form-group">
            <label for="cost">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="trekInfo">Skills</label>
            <input type="text" class="form-control" id="skills" name="skills" required>
          </div><br>
          
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </main>
  </div>
</div>';
include_once('footer.php');}
else{
  echo "You are not authorized to view this page";

}
?>