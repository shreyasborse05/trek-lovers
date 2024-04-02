<?php
include_once("header.php");
include_once("navbar.php");
  echo '
  <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <section class="bg-light py-3 py-md-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
            <div class="card border border-light-subtle rounded-3 shadow-sm">
              <div class="card-body p-3 p-md-4 p-xl-5">
                <div class="text-center mb-3">
                
                </div>
                <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Sign in to your admin account</h2>
                <form method="post" action="login_logic.php">
                  <div class="row gy-2 overflow-hidden">
                    <div class="col-12">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" id="username"  placeholder="Username" required>
                        <label for="username" class="form-label">Username</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        <label for="password" class="form-label">Password</label>
                      </div>
                    </div>
                        
                    <div class="col-12">
                      <div class="d-grid my-3">
                        <input name="login" class="btn btn-primary btn-lg" type="submit" value="Log in">
                      </div>
                    </div>
                    
                  </div>
                </form>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </section></main>';

    
    include_once("footer.php");

?>