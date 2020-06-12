<?php
session_start();

if($_SESSION['Ausername'] == true){
  

}
else{
   header("location:admin.php");
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

  <style>
  .class a:hover{
    text-decoration: none;
  }
  </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">  All accounts  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href=".php"> Notification <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href=".php"> Settings </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php"> Logout </a>
      </li>
    </ul>
    
  </div>
</nav>



<div class ="container">
<div class = "row">

<?php
$q = "select * from Acc " ;
$result = $conn->query($q) ;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
      <div class = "col-lg-4 col-md-4 col-12 ">
        <div class="card" >
          <img class="card-img-top" src="   <?php   echo $row["Image"] ;   ?>" style = "height: 300px; object-fit: cover;" alt="Card image">
          <div class="card-body">
            <h4 class="card-title"> <?php  echo $row["First_name"]." ". $row["Last_name"] ;  ?> </h4>
            <p class="card-text"> <?php  echo "Email: ".$row["Email"]  ?> </p>
            <p class="card-text"> <?php  echo "Mobile no: ".$row["Mobile"]  ?> </p>
            <p class="card-text"> <?php  echo "Gender: ".$row["Gender"]  ?> </p>

            <a href="deleteacc.php?del= <?php  echo $row["Email"]  ?> " class="btn btn-primary btn-danger"> Delete account </a>
          </div>
        </div>
      </div>
        
<?php
    }
} else {
    echo "<h3> there are no accounts </h3>";
}
?>


</div>
</div>

</body>
</html>



