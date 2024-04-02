<?php
include_once("header.php");
include_once("navbar.php");
echo '
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
      }
      
      .container {
        width: 80%;
        margin: 0 auto;
        padding: 2rem;
        background-color: #fff;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }
      
      h1 {
        font-size: 2rem;
        margin-top: 0;
      }
      
      label {
        display: block;
        margin-top: 1rem;
        font-weight: bold;
      }
      
      input[type="text"],
      input[type="email"],
      input[type="password"],input[type="number"],textarea {
        width: 100%;
        padding: 0.5rem;
        margin-top: 0.25rem;
        border-radius: 4px;
        border: 1px solid #ccc;
      }
      input[type="radio"]{
        margin-top:14px;
      }
      input[type="submit"] {
        width: 100%;
        padding: 0.5rem;
        margin-top: 1rem;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }
      
      input[type="submit"]:hover {
        background-color: #45a049;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Register</h1>
      <form action="register_logic.php" method="post">
        
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Enter a Password</label>
        <input type="password" id="password" name="password" required>

        <label for="username">Confirm Password</label>
        <input type="password" id="password_conf" name="password_conf" required>
        
        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="alt_contact">Alternative Contact:</label>
        <input type="text" id="alt_contact" name="alt_contact">


        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>

        <div style="display:flex;">
        <label for="gender">Gender:</label>&nbsp;&nbsp;
        <input type="radio" id="male" name="gender" value="male" required>&nbsp;&nbsp;
        <label for="male">Male</label>&nbsp;&nbsp;
        <input type="radio" id="female" name="gender" value="female" required>&nbsp;&nbsp;
        <label for="female">Female</label></div>

        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>

        
        <input type="submit" name="register" value="Register">
      </form>
    </div>';

include_once("footer.php");
?>