<DOCTYPE HTML>
	<!DOCTYPE html>
	<html>
	<head>

<link rel="stylesheet" type="text/css" href="artists.css" media="screen">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<title>Banana Hill Art Gallery</title>
	<header>
  <h1 style="font-size: 50px; text-align: center; font-family: sans-serif; color: #ff9900;" class="logo" > Banana Hill Art Gallery</h1>
  <h2 style="text-align: center; color: #800000;"><i>Contemporary African Art Gallery in Nairobi, Kenya</i></h2>
  </header>
	


	</head>
	<body bgcolor="#ffd9b3">
		<nav>
  <div class="topnav" data-spy="affix" data-offset-top="197" >
  
  <ul style="float:left">
    <li><a class="active" href="bananahill.html" style="color:#e6b800; background:#b32d00; font-weight: bold">Home</a></li>  
    <li><a href="artists.html">Our Artists</a></li>
    <!-- <li><a href="#events">Events</a></li> -->
    <li><a href="#gallery">Gallery</a></li>
    <li><a href="about.html">About us</a></li>
  </ul> 
  
  <ul style="float:right">
    <li><a href="login.html" class="login" style="background: #4CAF50">Login</a></li>

  

  </ul>

  </div>
 </nav>
 <br>




<h2 style="text-align: center; color:#e6b800; background:#333; font-family: Arial ;margin-left:150px margin-right: 150px">Art Exhibition Reservation </h2>

<form  method="post" action="tickets.php">






<?php  
            include "connection.php";
$sql = "INSERT INTO tickets (f_name, l_name, phone,email,artist,date_visit,tickets) VALUES ('$_POST[f_name]', '$_POST[l_name]', '$_POST[phone]','$_POST[email]','$_POST[artist]','$_POST[date_visit]','$_POST[tickets]')";

if (mysqli_query($conn, $sql)) {
      echo "Ticket Reserved Succesfully";
} else {
      echo "Error: Try Again ";
}
mysqli_close($conn);



?>


  <div style="width: 400px;">
  </div>
<div style="display: flex; padding-bottom: 18px;width : 450px;">
    <div style=" margin-left : 0; margin-right : 1%; width : 49%;">First name<span style="color: red;"> *</span><br/>
      <input type="text" id="f_name" name="f_name" style="width: 100%;" class="form-control"/>
    </div>
        <div style=" margin-left : 1%; margin-right : 0; width : 49%;">Last name<span style="color: red;"> *</span><br/>
          <input type="text" id="l_name" name="l_name" style="width: 100%;" class="form-control"/>
        </div>
</div>
  <div style="padding-bottom: 18px;">Phone<span style="color: red;"> *</span><br/>
    <input type="text" id="phone" name="phone" style="width : 450px;" class="form-control"/>
  </div>
      <div style="padding-bottom: 18px;">Email<span style="color: red;"> *</span><br/>
        <input type="text" id="email" name="email" style="width : 450px;" class="form-control"/>
      </div>
          <div style="padding-bottom: 18px;">Pick the Artist<span style="color: red;"> *</span><br/>
            <select id="artist" id="artist" name="artist" style="width : 450px;" class="form-control">
                <option>Arlene Wandera</option>
                <option>Alex Wainaina</option>
                <option>Gor Souda</option>
            </select>
          </div>
        <div style="padding-bottom: 18px;">Date of Visit<span style="color: red;"> *</span><br/>
            <input type="text" id="date_visit" name="date_visit" style="width : 250px;" class="form-control"/>
        </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.4.0/pikaday.min.js" type="text/javascript"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.4.0/css/pikaday.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">new Pikaday({ field: document.getElementById('date_visit') });</script>

      <div style="padding-bottom: 18px;">Number of Tickets<span style="color: red;"> *</span><br/>
        <input type="number" id="tickets" name="tickets" style="width : 250px;" class="form-control"/>
      </div>

        <div style="padding-bottom: 18px;">
	         <input class="submit" name="submit_data" type="submit" value="Reserve Tickets" />


        </div>

<div>


</form>

<script type="text/javascript">
function validateForm() {
if (isEmpty(document.getElementById('f_name').value.trim())) {
alert('First name is required!');
return false;
}
if (isEmpty(document.getElementById('l_name').value.trim())) {
alert('Last name is required!');
return false;
}
if (isEmpty(document.getElementById('phone').value.trim())) {
alert('Phone is required!');
return false;
}
if (isEmpty(document.getElementById('email').value.trim())) {
alert('Email is required!');
return false;
}
if (!validateEmail(document.getElementById('email').value.trim())) {
alert('Email must be a valid email address!');
return false;
}
if (isEmpty(document.getElementById('date_visit').value.trim())) {
alert('Date of Visit is required!');
return false;
}
if (isEmpty(document.getElementById('tickets').value.trim())) {
alert('Number of Tickets is required!');
return false;
}
return true;
}
function isEmpty(str) { return (str.length === 0 || !str.trim()); }
function validateEmail(email) {
var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,15}(?:\.[a-z]{2})?)$/i;
return isEmpty(email) || re.test(email);
}
</script>



<a href="https://www.facebook.com/BananaHillArtGalleryInNairobi/" class="fa fa-facebook"></a>
<a href="https://twitter.com/BananaHillArt" class="fa fa-twitter"></a>
<a href="https://plus.google.com/108819026650804640672" class="fa fa-google"></a>

 <br>
  <section3>
    <div class="wraper3">
   <h3>Contact us</h3>
   <p>Email: info@bananahillartgallery.com</p>
   <p>Phone: +254 711756911, +254 733882660, +254700807362</p>
   <p>Address: 14312 00100 Nairobi</p>
   <p4><pre style="font-family: " Times New Roman";"><b>OUR OPENING HOURS:</b>

       Monday - Saturday  10:00 - 18:00
       Sunday  12:00 - 18:00
     </pre></p4>

    </div>
  </section3>





	</body>
	</html>


