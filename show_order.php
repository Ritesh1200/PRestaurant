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

  <style>
  .class a:hover{
    text-decoration: none;
  }
  </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">  Profile  </a>
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

<br><br>

<div class = "text-center container-fluid">
   <div class = "row">
      <div class = "col-6 mx-auto">
        <?php
        $email =  $_SESSION['username'] ;
        $qy = "select Image from Acc where Email= '$email' ";
        $qy = $conn->query($qy) ;
        $qy = mysqli_fetch_row($qy) ;
        $image = $qy[0] ;
        ?>
        <img class = "rounded-circle  " src = "<?php  echo $image;   ?>" style="height: 190px; width: 200; object-fit: cover;">
        <h3> <?php echo $_SESSION['firstname']." ". $_SESSION['lastname']; ?> </h3>
      </div>
   </div>
</div>

<br><br>

<div class = "container-fluid row class">
  <div class = "col-lg-5 col-md-5 col-12  ">
    <table class = " table table-hover">
      <thead>
        <tr><th><h3 style= "font-family :New Century Schoolbook, TeX Gyre Schola, serif;"> Online ordering </h3></th></tr>
      </thead>
      <tbody>
        <tr><td> <a class = " bg-white text-dark border-0" href = "show_order.php"> <h3  style= "font-family :Bradley Hand, cursive ;">All Order history <h3> </a> </td> </tr>
        <tr><td> <a class = " bg-white text-dark border-0" href = "sorry.php"> <h3 style= "font-family :Bradley Hand, cursive ;">Favorite orders  </h3> </a> </td></tr>
        <tr><td> <a class = " bg-white text-dark border-0" href = "sorry.php"> <h3 style= "font-family :Bradley Hand, cursive ;"> My address </h3> </a> </td></tr>

      </tbody>
    </table>
  </div>
  <div class = "col-lg-7 col-md-7 col-12   ">

  <div class ="container row">

<?php
$q = "select * from delivery where email = '$email' " ;
$result = $conn->query($q) ;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
      <div class = "col-lg-4 col-md-4 col-12 ">
        <div class="card bg-dark text-white" >
          <div class="card-body">
            <h4 class="card-title"> <?php  echo  $row["fname"] ;  ?> </h4>
            <p class="card-text"> <?php  echo "Price :" .$row["price"]  ?> </p>
            <p class="card-text"> <?php  echo "Piece/Plate: ".$row["piece"]  ?> </p>
            <p class="card-text"> <?php  echo "Total amount: ".$row["total"]  ?> </p>
            <p class="card-text"> <?php  echo "Status: ".$row["acticity"]  ?> </p>

          </div>
        </div>
      </div>
        
<?php
    }
} else {
    echo "<h3> there are no order yet </h3>";
}
?>


</div>




  </div>
</div>

</body>
</html>