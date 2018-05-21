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
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin panel</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    <title></title>
  </head>
  <body>
    <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
      <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="admin.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">USER ACTIONS</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Users</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="adminview.php">View Users</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="adminadd.php">Add Users</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">GALLERY ACTIONS</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Gallery</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="galleryview.php">View Gallery</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="galleryadd.php">Add to Gallery</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">EVENT ACTIONS</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Events</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="eventview.php">View Events</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="eventadd.php">Add Events</a></li>
                        </ul>
                    </li>
            </div><!-- /.navbar-collapse -->
    </nav>
  </aside>
  <div class="right-panel" id="right-panel">
    <header id="header" class="header">
      <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                      </div>

    </header>
    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add Users</h1>
                    </div>
                </div>
            </div>


  </div>
  <div class="col-lg-6">
                      <div class="card">
                        <div class="card-header">
                          <strong>Register a user</strong>
                        </div>
                        <div class="card-body card-block">
                          <form action="adminadd.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">First Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="fname" placeholder="First Name" class="form-control"><small class="form-text text-muted">Enter first name</small></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Last Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="lname" placeholder="Last Name" class="form-control"><small class="form-text text-muted">Enter Last Name</small></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Username</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="uname" placeholder="Username" class="form-control"><small class="form-text text-muted">Enter Username</small></div>
                          </div>
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email Input</label></div>
                            <div class="col-12 col-md-9"><input type="email" id="email-input" name="email" placeholder="Enter Email" class="form-control"><small class="form-text text-muted">Please enter your email</small></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Address</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="address" placeholder="Address" class="form-control"><small class="form-text text-muted">Enter Address</small></div>
                          </div>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Password</label></div>
                            <div class="col-12 col-md-9"><input type="password" id="password-input" name="password" placeholder="Password" class="form-control"><small class="form-text text-muted">Please enter password</small></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="password-input" class=" form-control-label">Password</label></div>
                            <div class="col-12 col-md-9"><input type="password" id="password-input" name="rpassword" placeholder="Password" class="form-control"><small class="form-text text-muted">Please retype password</small></div>
                          </div>
                          <div class="row form-group">
                            <div class="col-12 col-md-9"><input type="submit" id="password-input" name="submit" placeholder="Password" class="form-control"></div>
                          </div>
                          </div>
                        </div>

                      </div>






    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>
  </body>
</html>
