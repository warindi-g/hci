<?php
$output = NULL;


if (isset($_POST['submit'])) {
  $mysqli = NEW MySQLi('localhost','root','','bananahill');

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $uname = $_POST['uname'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $password = $_POST['password'];
  $rpassword = $_POST['rpassword'];

  $query = $mysqli->query("SELECT * FROM users WHERE uname = '$uname'");

  if(empty($uname) or empty($fname) or empty($lname) or empty($email) or empty($address) or empty($password)){
    $output = "Please fill in all the fields.";
  }
  elseif($query->num_rows != 0) {
    $output = "That username is taken already";
  }
  elseif ($rpassword != $password) {
    $output = "Your passwords do not match";
  }
  elseif (strlen($password) <6) {
    $output = "Your passwords must be at least 5 characters ";
  }
  else {
    //encryption of the passwords
    $password = md5($password);
    //Insertion of the record
    $insert = $mysqli->query("INSERT INTO users(firstname,lastname,username,email,address,password) VALUES('$fname','$lname','$uname','$email','$address','$password')");

      if($insert != TRUE){
        $output = "There was a problem <br />";
        $output .= $mysqli->error;
      }else {
        $output = "You have been rightfully registered!";
      }
  }
}

 ?>

 <DOCTYPE html>
 <html>
 <head>

 <link rel="stylesheet" type="text/css" href="style.css" media="screen">


   <title>Banana Hill Art Gallery</title>
   <header>
   <h1 style="font-size: 50px; text-align: center; font-family: sans-serif; color: #ff9900;" class="logo" > Banana Hill Art Gallery</h1>
   <h2 style="text-align: center; color: #800000;"><i>Contemporary African Art Gallery in Nairobi, Kenya</i></h2>
   </header>

   <style>
 body {
   font-family: Arial, Helvetica, sans-serif;
 }
 form {
   border: 3px solid #333 /*#f1f1f1*/;
   width: 300px;
   margin: 0 auto;
 }
 input[type=text], input[type=password] {
     width: 100%;
     padding: 12px 20px;
     margin: 8px 0;
     display: inline-block;
     border: 1px solid #ccc;
     box-sizing: border-box;
 }
 button {
     background-color: #4CAF50;
     color: white;
     padding: 14px 20px;
     margin: 8px 0;
     border: none;
     cursor: pointer;
     width: 100%;
 }
 button:hover {
     opacity: 0.8;
 }
 .cancelbtn {
     width: auto;
     padding: 10px 18px;
     background-color: #f44336;
 }
 .imgcontainer {
     text-align: center;
     margin: 24px 0 12px 0;
 }
 img.avatar {
     width: 40%;
     border-radius: 50%;
 }
 .container {
     padding: 16px;
 }
 span.psw {
     float: right;
     padding-top: 16px;
 }
 /* Change styles for span and cancel button on extra small screens */
 @media screen and (max-width: 300px) {
     span.psw {
        display: block;
        float: none;
     }
     .cancelbtn {
        width: 100%;
     }
 }
 </style>
   </head>

 <body bgcolor="#ffd9b3">
 <nav>
   <div class="topnav" data-spy="affix" data-offset-top="197" >

   <ul style="float:left">
     <li><a class="active" href="bananahill.html" style="color:#e6b800; background:#b32d00; font-weight: bold">Home</a></li>
     <li><a href="artists.html">Our Artists</a></li>
     <!-- <li><a href="#events">Events</a></li> -->
     <li><a href="gallery.php">Gallery</a></li>

     <li><a href="about.html">About us</a></li>


     <div class="dropdown">
      <button class="dropbtn">Follow us
       <i class="fa fa-caret-down"></i>
      </button>
       <div class="dropdown-content">
       <a href="https://www.facebook.com/BananaHillArtGalleryInNairobi" target="_blank">Facebook</a>
       <a href="https://twitter.com/BananaHillArt" target="_blank">Twitter</a>
       <a href="https://plus.google.com/108819026650804640672" target="_blank">Google+</a>
       </div>
     </div>
   </ul>

   <ul style="float:right">
     <li><a href="shopping_cart.php" class="cart" style="background: #5C6475">Shopping Cart</a></li>
   </ul>

   </div>
  </nav>
  <br>
   <form action="register.php" method="post">

   <div class="container">
     <label for="fname"><b>First name</b></label>
     <input type="text" placeholder="Enter First Name" name="fname" required>

     <label for="lname"><b>Last name</b></label>
     <input type="text" placeholder="Enter Last name" name="lname" required>

     <label for="uname"><b>Username</b></label>
     <input type="text" placeholder="Enter Username" name="uname" required>

     <label for="email"><b>Email</b></label><br>
     <input type="email" placeholder="Enter Email" name="email" required><br>

     <label for="address"><b>Address</b></label>
     <input type="text" placeholder="Enter Address" name="address" required>

     <label for="password"><b>Password</b></label>
     <input type="password" placeholder="Enter Password" name="password" required>

     <label for="rpassword"><b>Confirm Password</b></label>
     <input type="password" placeholder="Retype password" name="rpassword" required>

     <input type="submit" name="submit" value="register" /><br>


     <a href="login.php">Log in</a>
   </div>


 </form>
 </body>
 </html>
 </DOCTYPE>
