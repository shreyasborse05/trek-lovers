
<!DOCTYPE html>
<html>
<head>
  <title>Edit Trek</title>
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
</head>
<body>

<div class="container">
  <?php
  if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-' . $_SESSION['message_type'] . '">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
  }
  ?>
  <h1>Upcoming Treks</h1>
  <table class="table">
    <thead>
      <tr>
        <th>Trek ID</th>
        <th>Trek Name</th>
        <th>Trek Category</th>
        <th>Trek Category 2</th>
        <th>Cost</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $conn = mysqli_connect('localhost:3308', 'root', '', 'trek_info');

      $query = "SELECT * FROM treks";
      $result = mysqli_query($conn, $query);


      

      while ($row = mysqli_fetch_assoc($result)) {

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

        echo "<tr>";
        echo "<td>" . $row['trek_id'] . "</td>";
        echo "<td>" . $row['trek_name'] . "</td>";
        echo "<td>" . $row['trek_cat'] . "</td>";
        echo "<td>" . $row['trek_cat_reg'] . "</td>";
        echo "<td>" . $row['cost'] . "</td>";
        echo '<td><button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#editTrekModal" data-trek-id="' . $row['trek_id'] . '">Edit</button>
        <button type="submit" name="delete" class="btn btn-danger" value="$trek_id" data-trek-id="$trek_id">Delete</button></form>
        </td>';
        echo "</tr>";
      }

      ?>
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
      <form action="update_trek.php" method="post">
        <div class="modal-body">
          <input type="hidden" name="trek_id" id="trek_id">
          <div class="form-group">
            <label for="trek_name">Trek Name</label>
            <input type="text" class="form-control" name="trek_name" id="trek_name" required>
          </div>
<div class="form-group">
            <label for="trek_category">Trek Category</label>
            <input type="text" class="form-control" name="trek_category" id="trek_category" required>
          </div>
          <div class="form-group">
            <label for="trek_category2">Trek Category 2</label>
            <input type="text" class="form-control" name="trek_category2" id="trek_category2" required>
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

<div class="form-section">
    <h2 class="m-auto">Add a Trek</h2>
    <form method="post" class="row g-3 my-3">
      <div class="col-md-6">
        <label for="trekName" class="form-label">Trek Name</label>
        <select class="form-select" id="trekName" name="trekname" required>
          <option value="Harishchandra Gad">Harishchandra Gad</option>
          <option value="Harihar Gad">Harihar Gad</option>
          <option value="RajGad">RajGad</option>
          <option value="Raigad">Raigad</option>
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
        <select class="form-select" id="trekCategory" name="trekcatact" required>
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

</body>
</html>


<?php
    // if(isset($_POST['edittrek'])){
    //   $trek_id=$_POST['trek_id'];
    //   $sql4="SELECT trek_name,trek_cat,trek_cat_reg,cost FROM treks WHERE trek_id='$trek_id'";
    //   $res=$obj->sql($sql4);
    //   if($res){
    //     $list=mysqli_fetch_assoc($res);
    //     $trek_name=$list["trek_name"];
    //     $category=$list["trek_cat"];
    //     $sub_category=$list["trek_cat_reg"];
    //     $price=$list["cost"];
    //   }
    // }
    ?>