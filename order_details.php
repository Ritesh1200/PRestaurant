<?php
session_start();

if($_SESSION['username'] == true){
  

}
else{
   header("location:login.php");
}

$servername = 'sql12.freemysqlhosting.net';
$username = 'sql12347421';
$password = 'TjkWAcBiWL';
$DBNAME = 'sql12347421';

$conn = mysqli_connect($servername,$username,$password,$DBNAME );
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
}
?>

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
  <a class="navbar-brand" href="#">Order</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href=""> Setting <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
    
  </div>
</nav>

<br><br>

<?php  $name =  $_GET['food'];  
$q = "select fprice from food where fname = '$name'" ;
$result = $conn->query($q);
$resul =mysqli_fetch_row($result);
$price = $resul[0];

?>

<div class="container-fluid text-left w-80 col-lg-8 col-md-8 col-sm-12">
<form action="conn_order.php?nfood=<?php  echo $name; ?>" class="needs-validation" method="POST" novalidate enctype="multipart/form-data">
  <div class="form-group">
    <label for="uname">Name:  <?php  echo $name;   ?></label>
    
  </div>
  <div class="form-group">
    <label for="uname">Price :<?php  echo $price ;?></label>
  </div>
  <div class="form-group">
    <label for="inputEmail">Piece:</label>
    <input type="text" class="form-control" id="inputEmail" placeholder="enter no of piece/plate" name="piece" required>
    <div class="invalid-feedback">Please enter a valid email address.</div>
  </div>
  <div class="form-group">
    <label for="mob">Address:</label>
    <input type="text" class="form-control" id="mob" placeholder="enter address" name="address" required>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <button type="submit" class="btn btn-primary"> Order </button>
</form>

    <!-- JavaScript for disabling form submissions if there are invalid fields -->

    <script>
        // Self-executing function
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

<?php
if(isset($_GET['message']))
  {  
  $message = $_GET['message'];
  $_GET["message"] = null;
  echo "<br><h5> <font color = red >  $message </h5> <br>" ;
  $_GET["message"] = null;
}
?>

</div>

</body>
</html>