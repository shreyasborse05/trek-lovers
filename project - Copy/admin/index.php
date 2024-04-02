<?php 
session_start();
  if($_SESSION){
include_once("header.php");
include_once("navbar.php");
include_once("body1.php");
include_once("footer.php");
}
else{?>
     <script>
     alert("You are not authorized to view this page");
     </script>
<?php
    header('Location: login.php');
}?>