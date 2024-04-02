<?php
  include_once('dbcon.php');
  $obj = new crud;


                if(isset($_POST['explore'])){
                  header("Location:about.php");
                }
            ?>

<div class="ftco-blocks-cover-1">
    <div class="site-section-cover overlay" style="background-image: url('../images/hero_1.jpg');
          background-size: cover; 
          background-position: center;
          margin-left: 5%; 
          
          width: 90%; 
          height: 90vh;">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-5">
            <h1 class="mb-3 text-black">Let's Enjoy The Wonders of Nature</h1>
            <p>
            Embark on a journey with us, where every step brings you closer to nature’s heart.
            it’s not just a trail, but a path to rediscover the wonders of the wild.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- corousals -->

  <div style="margin-top: 100px;" class="site-section">

    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-md-7">
          <div class="heading-39101 mb-5">
            <span class="subtitle-39191">Journey</span>
            <h3>Best Places in India</h3>
          </div>
        </div>
      </div>


      <!-- corousals -->

      <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../images/indiatrek1.jpg" style="height: 80vh;" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>North Side Trek</h5>
              <p>The young Himalaya sure knows how to have FUN! This long chain of mountains have good terms with
                adventure freaks, nature lovers and wildlife conservationists…it’s like the charm of these
                Himalayan mountains is so irresistible that one can’t help being drawn towards it time and time
                again</p>
                <form method="post" action="about.php">
                <input type="submit" name="explore" class="btn btn-primary" value="Explore North">
                </form>
            
              
            </div>
          </div>
          <div class="carousel-item">
            <img src="../images/Rajmachi-Trek-to-Fort.jpg" style="height: 80vh;" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Western Ghats</h5>
              <p>The monsoon season in West brings forth a vibrant and lush landscape, offering a unique
                opportunity for nature enthusiasts and adventure seekers to embark on thrilling treks. With its
                Sahyadri mountain range and numerous forts</p>
                <form method="post" action="about.php">
                <input type="submit" name="explore" class="btn btn-primary" value="Explore Western Ghats">
                </form>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../images/indiatrek2.jpg" style="height: 80vh;" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>South Indian Trek</h5>
              <p>‘Southern India’ may conjure up images of exotic locations and delightfully subtle cuisine in
                the minds of people who have yet to visit this treasure at the tip of the continent.</p>
                <form method="post" action="about.php">
                <input type="submit" name="explore" class="btn btn-primary" value="Explore South">
                </form>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div class="row justify-content-center text-center my-5">
        <div class="col-md-7">
          <div class="heading-39101 mb-5">
            <span class="subtitle-39191">Journey</span>
            <h3>Explore By Category</h3>
          </div>
        </div>
    
  <div class="d-flex justify-content-evenly">
    <form method="post" action="about.php">
    <button type="submit" class="btn me-5" value="Beach" name="explore"><img src="../images/vecteezy_jet-sky-sport-on-the-beach-illustration_8148402.jpg" class="rounded" width="195rem" alt="..."></button>
    <button type="submit" class="btn me-5" value="Mountains" name="explore"><img src="../images/mountain-climbing.jpg" class="rounded" width="195rem" height="140px" alt="..."></button>
    <button type="submit" class="btn btn-primary me-5" value="Jungle" name="explore"><img src="../images/vecteezy_sea-turtle-under-the-coconut-tree-illustration_8148424.jpg" class="rounded" width="195rem" alt="..."></button>
    <button type="submit" class="btn me-5" value="River Side" name="explore"><img src="../images/image-river.jpg" class="rounded" width="195rem" alt="..."></button>
    </form>

    <!-- <img src="../images/vecteezy_beach-icon-or-logo-isolated-sign-symbol-vector-illustration_4897354.svg" class="rounded" width="195rem" alt="...">
    <img src="../images/vecteezy_jet-sky-sport-on-the-beach-illustration_8148402.jpg" class="rounded" width="195rem" alt="...">
    <img src="../images/vecteezy_sea-turtle-under-the-coconut-tree-illustration_8148424.jpg" class="rounded" width="195rem" alt="...">
    <img src="../images/image-river.jpg" class="rounded" width="195rem" alt="..."> -->

    
  </div>
</div>



  </div>
  <div class="row justify-content-center text-center my-5">
        <div class="col-md-7">
          <div class="heading-39101 mb-5">
            <span class="subtitle-39191">Journey</span>
            <h3>Customer's Favourite</h3>
          </div>
        </div>
  <!-- journey -->
 
<?php

echo '<div style="margin-top: 10px;" class="card1">
      <div class="container mt-3 my-5 py-4">
      <div class="row align-items-start">';


        $sql = "SELECT trek_name,cost,trek_info,trek_id from treks limit 6";
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
?>