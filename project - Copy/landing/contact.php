<?php
include_once("header.php");
include_once("navbar.php");
echo '<div class="container py-5">
<div class="row justify-content-center text-center mb-5">
    <div class="col-md-10">
        <h3 class="display-4 mb-5">Contact Us</h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 mb-5">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6 mt-4">
                    <input type="text" class="form-control" placeholder="First name">
                </div>
                <div class="form-group col-md-6 mt-4">
                    <input type="text" class="form-control" placeholder="Last name">
                </div>
            </div>
            <div class="form-group col-md-6 mt-4">
                <input type="email" class="form-control" placeholder="Email address">
            </div>
            <div class="form-group col-md-6 mt-4">
                <textarea class="form-control" placeholder="Write your message." rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Send Message</button>
        </form>
    </div>
    <div class="col-lg-4 ml-auto">
        <div class="card border-0 shadow p-3">
            <h3 class="card-title">Contact Info</h3>
            <ul class="list-unstyled">
                <li class="mb-3">
                    <strong class="d-block mb-1">Address:</strong>
                    <span>24, ABC, Rajiv Gandhi Salai, Chennai, India</span>
                </li>
                <li class="mb-3">
                    <strong class="d-block mb-1">Phone:</strong>
                    <span>+1 242 4942 290</span>
                </li>
                <li class="mb-3">
                    <strong class="d-block mb-1">Email:</strong>
                    <span>treklovers@gmail.com</span>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>';
include_once("footer.php");
?>