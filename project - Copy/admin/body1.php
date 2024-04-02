<?php 
include_once('../landing/dbcon.php');
$obj = new crud;   
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trek Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .sidebar {
      height: 100vh;
      overflow-y: auto;
    }
    .form-section {
      padding-top: 20px;
    }
  </style>
</head>
<body>



    <!-- Main content -->
    <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <h2>Upcoming Treks</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Trek Id</th>
              <th>Trek Name</th>
              <th>Cost</th>
              <th>Guide Id</th>
              <th>No of people</th>
            </tr>
          </thead>
          <tbody><tr>
            <?php
          $sql = "SELECT trek_id,trek_name,cost,guide_id FROM treks GROUP BY trek_id";


// execute the query

  $result = $obj->sql($sql);

  if($result){
      while ($row = mysqli_fetch_assoc($result)) {
          $trek_id=$row['trek_id'];
          $guide_id=$row['guide_id'];
          $trek_name=$row['trek_name'];
          $cost=$row['cost'];


          $sql2="SELECT sum(no_of_people) as people FROM trek_details where trek_id='$trek_id'";
          $result2 = $obj->sql($sql2);
          $row2 = mysqli_fetch_assoc($result2);
          $no_of_people = $row2['people'];
          
          echo '<td>'.$trek_id.'</td>
          <td>'.$trek_name.'</td>
          <td>'.$cost.'</td>
          <td>'.$guide_id.'</td>
          <td>'.$no_of_people.'</td>
          </tr>
          ';

       }
} else {
    echo("Error creating table: ");
}


?>
    </tbody>
        </table>
      </div>
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
          <tbody>
          <?php
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
    echo("Error creating table: ");
}


?>
          </tbody>
        </table>
      </div>
      </div>
    </main>
  </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
