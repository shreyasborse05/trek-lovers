<?php
if (isset($_SESSION['message'])) {
  echo '<div class="alert alert-' . $_SESSION['message_type'] . '">' . $_SESSION['message'] . '</div>';
  unset($_SESSION['message']);
  unset($_SESSION['message_type']);
}
session_start();
if ($_SESSION) {
  include_once('../landing/dbcon.php');
  $obj = new crud;














  if (isset($_POST['submit'])) {
    $trek_name1 = $_POST['trekname'];
    $trek_cat1 = $_POST['trekcat'];
    $cost1 = $_POST['cost'];
    $guide_id1 = $_POST['guideid'];
    $trek_cat_reg = $_POST['trekcatreg'];
    $trek_info1 = $_POST['trekinfo'];
    $trek_date = $_POST['trekdate'];
    $trek_end_date = $_POST['enddate'];

    $sql2 = "INSERT INTO `treks`(`trek_name`, `trek_cat`,`trek_cat_reg`, `cost`, `trek_info`, `guide_id`) VALUES ('$trek_name1','$trek_cat1','$trek_cat_reg','$cost1','$trek_info1','$guide_id1')";

    $rezult = $obj->sql($sql2);
    if ($rezult) {
      echo "the data inserted successfully";
      echo '<script>alert("The data added successfully")</script>';
      header("Location:index.php");
    }
  }


  include_once('header.php');
?>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#editTrekModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var trek_id = button.data('trek-id');
        var modal = $(this);
        modal.find('.modal-body #trek_id').val(trek_id);
      });
    });
  </script>
  <?php
  include_once('navbar.php');

  ?>
  <!-- Main content -->
  <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <h2>Trek Information</h2>

    <?php
    // Check if the form is submitted
    if (isset($_POST['updateTrek'])) {
      // Retrieve the form data
      $trek_id = $_POST['trek_id'];
      $trek_name = $_POST['trek_name'];
      $trek_cat = $_POST['trek_cat'];
      $trek_cat_reg = $_POST['trek_cat_reg'];
      $cost = $_POST['cost'];
      // Update the trek details
      // $sql_update = "UPDATE treks SET trek_name = '$trek_name', trek_cat = '$trek_cat', trek_categ_reg = '$trek_cat_reg', cost = '$cost' WHERE trek_id = '$trek_id'";
      $res = $obj->Update('treks', ['trek_name' => $trek_name, 'trek_cat' => $trek_cat, 'cost' => $cost], "trek_id = '$trek_id'");
      // $res=$obj->sql($sql_update);
      if ($res) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Holy guacamole!</strong> You should check in on some of those fields below.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
        // echo "Data changed successfully";
      } else {
        echo "Unsuccessfull";
      }
    } ?>
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
        <tbody>
          <tr>
            <?php

            $sql = "SELECT trek_id,trek_name,cost,guide_id FROM treks GROUP BY trek_id";


            // execute the query

            $result = $obj->sql($sql);

            if ($result) {
              while ($row = mysqli_fetch_assoc($result)) {
                $trek_id = $row['trek_id'];
                $guide_id = $row['guide_id'];
                $trek_name = $row['trek_name'];
                $cost = $row['cost'];


                $sql2 = "SELECT sum(no_of_people) as people FROM trek_details where trek_id='$trek_id'";
                $result2 = $obj->sql($sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $no_of_people = $row2['people'];

                if (isset($_POST["delete"])) {
                  $sql3 = "DELETE FROM treks WHERE `trek_id` = $trek_id";
                  $result3 = $obj->sql($sql3);
                  if ($result3) {
                    echo "<script>alert('The row deleted successfully');</script>";
                    break;
                  } else {
                    echo "<script>alert('The row is not deleted ');</script>";
                    break;
                  }
                }


                echo '<td>' . $trek_id . '</td>
          <td>' . $trek_name . '</td>
          <td>' . $cost . '</td>
          <td>' . $guide_id . '</td>
          <td>' . $no_of_people . '</td>
          <td><form method="post">
          
          <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editTrekModal" data-trek-id="' . $row['trek_id'] . '">Edit</button>
        <button type="submit" name="delete" class="btn btn-danger" value="$trek_id" data-trek-id="$trek_id">Delete</button></form>
        
        </td>
          </tr>
          </tr>

         
          ';
              }
            } else {
              echo ("Error creating table: ");
            } ?>


        </tbody>
      </table>
    </div>

    <!-- Modal to edit trek details -->
    <div class="modal fade" id="editTrekModal" tabindex="-1" role="dialog" aria-labelledby="editTrekModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editTrekModalLabel">Edit Trek</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="post">
            <div class="modal-body">
              <input type="hidden" name="trek_id" id="trek_id">
              <div class="form-group">
                <label for="trek_name">Trek Name</label>
                <input type="text" class="form-control" name="trek_name" id="trek_name" value="<?php echo $trek_name;?>" required>
              </div>
              <div class="form-group">
                <label for="trek_cat">Trek Category</label>
                <input type="text" class="form-control" name="trek_cat" id="trek_cat" required>
              </div>
              <div class="form-group">
                <label for="trek_cat_reg">Trek Category 2</label>
                <input type="text" class="form-control" name="trek_cat_reg" id="trek_cat_reg" required>
              </div>
              <div class="form-group">
                <label for="cost">Cost</label>
                <input type="number" step="0.01" class="form-control" name="cost" id="cost" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="updateTrek" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- end of modal -->




    <!-- Form to add treks -->
    <div class="form-section">
      <h2 class="m-auto">Add a Trek</h2>
      <form method="post" class="row g-3 my-3">
        <div class="col-md-6">
          <label for="trekName" class="form-label">Trek Name</label>
          <select class="form-select" id="trekName" name="trekname" required>
            <option value="Harishchandra Gad">Harishchandra Gad</option>
            <option value="Harihar Gad">Harihar Gad</option>
            <option value="RajGad">RajGad</option>
            <option value="Alibag">Alibag</option>
            <option value="Raigad">Raigad</option>
            <option value="Vasota">Vasota</option>
            <option value="Kalsubai">Kalsubai</option>
            <option value="Spiti Valley">Spiti Valley</option>
            <option value="Pondycherry">Pondycherry</option>
            <option value="Vishakhapattanam">Vishakhapattanam</option>
            <option value="Daman">Daman</option>
            <option value="Ooty">Ooty</option>
            <option value="Munnar">Munnar</option>
            <option value="Kedarnath">Kedarnath</option>
            <option value="Kodaikanal">Kodaikanal</option>
            <option value="Rishikesh">Rishikesh</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="cost" class="form-label">Cost</label>
          <input type="number" class="form-control" id="cost" name="cost" required>
        </div>
        <div class="col-md-6">
          <label for="trekCategory" class="form-label">Trek Region Category</label>
          <select class="form-select" id="trekCategory" name="trekcat" required>
            <option value="Explore Western Ghats">Explore Western Ghats</option>
            <option value="Explore North">Explore North</option>
            <option value="Explore South">Explore South</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="trekCategory" class="form-label">Trek Category</label>
          <select class="form-select" id="trekCatreg" name="trekcatreg" required>
            <option value="Beach">Beach</option>
            <option value="Mountains">Mountains</option>
            <option value="Jungle">Jungle</option>
            <option value="River Side">River Side</option>
          </select>
        </div>
        <div class="col-md-12">
          <label for="trekInfo" class="form-label">Trek Info</label>
          <textarea class="form-control" id="trekInfo" rows="3" name="trekinfo" required></textarea>
        </div>
        <div class="col-md-3">
          <label for="guideId" class="form-label">Guide ID</label>
          <input type="text" class="form-control" id="guideId" name="guideid" required>
        </div>
        <div class="col-md-3">
          <label for="trekDate" class="form-label">Trek Date</label>
          <input type="date" class="form-control" id="trekDate" name="trekdate" required>
        </div>
        <div class="col-md-3">
          <label for="endDate" class="form-label">End Date</label>
          <input type="date" class="form-control" id="endDate" name="enddate" required>
        </div>
        <div class="col-10">
          <center><button type="submit" name="submit" class="btn btn-primary">Submit</button></center>
        </div>
      </form>

    </div>
  </main>
  </div>
  </div>




<?php
  include_once('footer.php');
} else {
  echo "You are not authorized to view this page";
} ?>