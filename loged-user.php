<?php
  session_start();
  $uname=$_SESSION["username"];
  if (empty($uname))
  {
    header('location: index.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Musette</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="icon.png">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/theme.css">
  <link rel="stylesheet" type="text/css" href="css/loged-user.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/theme.js"></script>
    <script src="js/iframe.js"></script>
</head>
<body>
<div class="container-fluid">
	<nav class="navbar navbar-default navbar-fixed-top" id="header">
	<img src="logo.png" alt="logo" id="logo">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">MUSETTE</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
          	  <li>
          	  	<form class="navbar-form navbar-left">
            		<input type="text" class="form-control" placeholder="Search...">
          		</form>
          	  </li>
              <li class="dropdown" id="theme">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Theme
                    <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li onclick="changeDefault()"><a href="#">Default</a></li>
                    <li onclick="changeMidnightBlack()"><a href="#">Midnight Black</a></li>
                    <li onclick="changeRed()"><a href="#">Royal Red</a></li>
                    <li onclick="changeBlue()"><a href="#">Blue</a></li>
                    <li onclick="changeCyan()"><a href="#">Cyan</a></li>
                    <li onclick="changeAuto()"><a href="#">Choose</a></li>
                  </ul>
              </li>
              <li id="theme"><a href="php/logout.php"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
</div>
<!--begins the body-->
<div class="container-fluid jumbotron">
    <div class="col-sm-3">
      <div class="artist-p">
        <h2 align="center" style="background:#B0E0E6;"><strong>POPULAR ARTISTS</strong></h2>
<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "musette";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql= 'SELECT * FROM artist';
        $result = $conn->query($sql);
          if ($result->num_rows > 0) 
          {    
              while($row = $result->fetch_assoc())
                 {
                  echo " <a href='#'><li align='center'><strong> ".$row['First Name']." ".$row['Middle Name']." ".$row['Last Name']."</strong></li></a>";
                  echo "<br>";

                 }
          }
?>
      </div>
      <div class="artist-f">
        <h2 align="center" style="background:#B0E0E6;"><strong>FEATURED ARTISTS</strong></h2>
<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "musette";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql= 'SELECT * FROM artist';
        $result = $conn->query($sql);
          if ($result->num_rows > 0) 
          {    
              while($row = $result->fetch_assoc())
                 {
                  echo " <a href='#'><li align='center'><strong> ".$row['First Name']." ".$row['Middle Name']." ".$row['Last Name']."</strong></li></a>";
                  echo "<br>";

                 }
          }
?>
      </div>
    </div>
    <div class="col-sm-9">
        <div class="iframe" style="margin: 0 auto;width:100%">
          <iframe id="ifrm" src="php/video.php" onload="setIframeHeight(this.id)" style="width:100%;border: none;"></iframe>
        </div>         
    </div>    	
</div>
</body>
</html>
