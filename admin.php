<html>
<head>
   <title> Project </title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"> Home <span class="sr-only">(current)</span></a>
      </li>
   </ul>
  </div> 
</nav>

<br><br>
<div class="container-fluid text-left w-80 col-lg-8 col-md-8 col-sm-12">
<form action="conn_admin.php" class="needs-validation" method="post" novalidate>
   <div class="form-group">
    <label for="uname">Admin Username:</label>
    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="admname" required>  
    <div class="invalid-feedback">Please fill out this field.</div>
   </div>
   <div class="form-group">
    <label for="pass">Admin Password:</label>
    <input type="password" class="form-control" id="pass" placeholder="Enter password" name="admpass" required>
    <div class="invalid-feedback">Please fill out this field.</div>
   </div>

   <button type="submit" class="btn btn-primary">Login</button>
   <br>

<?php
if(isset($_GET['message'])){  
  $message = $_GET['message'];
  echo "<br><h5> <font color = red >  $message </h5>" ;

}
$_SESSION['count'] = 0 ;

?>
</form>
</div>



</body>
</html>