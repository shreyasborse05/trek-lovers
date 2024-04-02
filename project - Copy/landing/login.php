<?php
include_once("header.php");
include_once("navbar.php");

if(isset($_POST['adminlogin'])){
  header('Location: ../admin/login.php');
}
if(isset($_POST['signup'])){
  header('Location: register.php');
}
  echo '
  <section class="bg-light py-3 py-md-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
            <div class="card border border-light-subtle rounded-3 shadow-sm">
              <div class="card-body p-3 p-md-4 p-xl-5">
                <div class="text-center mb-3">
                
                
                </div>
                <form method="post">
                <div class="col-12">
                <div class="col-6">
                    <div class="d-grid">
                    <input name="userlogin" class="btn btn-primary btn-lg" type="submit" value="User Login">
                    </div>
                    <div class="col-6" style="margin-left:220px; margin-top:-65px;">
                    <div class="d-grid my-3">
                    <input name="adminlogin" class="btn btn-primary btn-lg" type="submit" value="Admin Login">
                    </div>
                  </div>
                  </div>
               </form>
                <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Sign in to your account</h2>
                <form method="post" action="login_logic.php">
                  <div class="row gy-2 overflow-hidden">
                    <div class="col-12">
                      <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                        <label for="email" class="form-label">Email</label>
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
                <form method="post">
                <div class="col-12">
                    <div class="col-6" style="margin-top:18px;">
                      <label>Not Registered Yet</Label>
                    </div>
                    <div class="col-6" style="margin-left:50%; margin-top:-46px;">
                    <div class="d-grid my-3">
                    <input name="signup" class="btn btn-primary btn-lg" type="submit" value="Sign Up">
                    </div>
                  </div>
                  </div>
               </form>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>';

    
    include_once("footer.php");

?>