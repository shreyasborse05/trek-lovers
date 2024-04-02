<?php

include_once('dbcon.php');
$obj = new crud; 
    $trek_id = $_POST['trek_id'];
    session_start();
    $_SESSION['trek_id']=$trek_id;
    include_once("header.php");
    echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .jumbotron {
            background-image: url("https://source.unsplash.com/1600x900/?mountains,nature,landscape");
            background-size: cover;
            background-position: center;
            color: white;
            padding: 50px;
            text-align: center;
        }
        .container {
            padding: 30px;
        }
    </style>';
    include_once("navbar.php");
    
        $sql = "SELECT * FROM treks WHERE trek_id=$trek_id";
        $result = $obj->sql($sql) ;
        
        
        if($result){
           
            $row = mysqli_fetch_assoc($result);
            $trek_name=$row['trek_name'];
           
            $cost=$row['cost'];
            $trek_cat_reg=$row['trek_cat_reg'];
            $trek_cat=$row['trek_cat'];
            $category = explode(" ",$trek_cat);
            $trek_info=$row['trek_info'];
            $guide_id=$row['guide_id'];

            $sql2="SELECT * FROM guide WHERE guide_id=$guide_id";
            $result2 = $obj->sql($sql2);

            $res=mysqli_fetch_assoc($result2);
            $guide_name = $res['guide_name'];
            $guide_contact =$res['contact'];
            $skills=$res['skills'];
            // echo $trek_name.'<br>'.$cost.'<br>'.$trek_info.'<br>'.$guide_name.'<br>'.$guide_contact.'<br>'.$skills;
            
            echo '
            <body>
                <div class="jumbotron">
                <h1 class="text-center">'.$trek_name.'</h1>
                <p class="lead text-center">'.$trek_info.'</p>
                </div>
                <div class="container">
                    
                    
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Trek Info</h5>
                            <p>The '.$trek_name.' Trek is a 2-day journey that takes you to the base camp of '.$trek_cat_reg.'. Youll experience breathtaking views, rich culture, and challenging terrain along the way.</p>
                            <h5>Price: '.$cost.' per person</h5>
                            <p>The cost of the trek includes guide services, accommodation, and meals.</p>
                        </div>
                        <div class="col-md-4">
                            <h5>Guide Name: '.$guide_name.'</h5>
                            <p>Your guide for this trek is '.$guide_name.'. He has been leading treks in the '.$category[1].' for over 10 years and is known for his expertise and friendly demeanor.</p>
                            <h5>Contact Information:<a href="mailto:'.$guide_contact.'"> '.$guide_contact.'</a></h5>
                        </div>
                        <div class="col-md-4">
                            <h5>Skills</h5>
                            <p>'.$guide_name.' is fluent in English, has extensive knowledge of the local culture and terrain, and is trained in wilderness first aid.</p>
                            <p><strong>Languages:</strong> English, Nepali, Marathi</p>
                            <p><strong>Expertise:</strong> '.$skills.'</p>
                        </div>
                    </div>
                    <form method="post" action="book.php">
                        <input type="hidden" value="'.$trek_id.'" name="trek_id">
                        <input type="hidden" value="'.$trek_name.'" name="trek_name">
                        <input type="submit" class="btn btn-primary" value="Book Your Seats" name="trek_submit">
                    </form>
                </div>
            </body>
            </html>';

            
             
        }
        else{
            echo "OOPS!! an error occured -->";
        
        }


    include_once("footer.php");
?>

