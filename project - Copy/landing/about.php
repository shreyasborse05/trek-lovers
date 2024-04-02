<?php

include_once('dbcon.php');
$obj = new crud;

$trek_cat=$_POST['explore'];
// var_dump($trek_cat);

include_once("header.php");
include_once("navbar.php");
echo "<center><h2>{$trek_cat}</h2></center>";
echo '<div style="margin-top: 100px;" class="card1">
  
        <div class="container mt-3 my-5 py-4">
        <div class="row align-items-start">';


        $sql = "SELECT trek_name,cost,trek_info,trek_id from treks where trek_cat ='$trek_cat' or trek_cat_reg='$trek_cat'";
        $result = $obj->sql($sql) ;
    
        if($result){
            while ($row = mysqli_fetch_assoc($result)) {
                $trek_name=$row['trek_name'];
                $cost=$row['cost'];
                $trek_info=$row['trek_info'];
                $trek_id=$row['trek_id'];
                
                echo '<div class="col">
                        <div class="card" style="margin-bottom: 100px; width: 18rem; border: none; box-shadow: 1px 1px 10px 0 #a2a0a0;;">
                        <img style="height: 50vh;" src="../images/'.$trek_name.'.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'.$trek_name.'</h5>
                            <p class="card-text">'.$trek_info.'</p>
                            <form method="post" action="info.php">
                            <input type="hidden" value='.$trek_id.' name="trek_id">
                            <input type="submit" class="btn btn-primary" value=Rs.'.$cost.' name="card_submit">
                            </form>
                        </div>
                        </div>
                    </div>';
                    //give trek id as name so when we will submit then it will be helpful to fetch all the details
             }
        }
        else{
            echo "Database was not created Successfully because -->";
        
        }
    
echo'</div</div</div>';
include_once("footer.php");

?>
<!-- 
                            <a href="#" class="btn btn-primary">'.$cost.'</a> -->