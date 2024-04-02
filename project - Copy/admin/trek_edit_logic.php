<?php
session_start();
include_once('../landing/dbcon.php');
  $obj = new crud;


// Check if the form is submitted
if (isset($_POST['updateTrek'])) {
    // Retrieve the form data
    $trek_id = $_POST['trek_id'];
    $trek_name = $_POST['trek_name'];
    $trek_cat = $_POST['trek_cat'];
    $trek_cat_reg = $_POST['trek_cat_reg'];
    $cost = $_POST['cost'];
  
    
  
    // Update the trek details
    $sql_update = "UPDATE treks SET trek_name = '$trek_name', trek_cat = '$trek_cat', trek_categ_reg = '$trek_cat_reg', cost = '$cost' WHERE trek_id = '$trek_id'";
    
    $res=$obj->sql($sql_update);
  
    if ($res) {
      echo "Data changed successfully";
    } else {
      echo "Unsuccessfull";
    }
  
  }

?>