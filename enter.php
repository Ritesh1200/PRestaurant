
<?php
session_start();

if($_SESSION['username'] == true){

}
else{
   header("location:http:login.php");
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
  <a class="navbar-brand" href="#"> Welcome <?php  echo $_SESSION['firstname'];   ?>  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="profile.php"> Profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="sorry.php"> Notification <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="sorry.php"> Settings </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php"> Logout </a>
      </li>
    </ul>
    
  </div>
</nav>


<div class="text-center " >
  <div class = "col-lg-4 col-md-4 col-12 mx-auto">
    <img src="image\logo.jpg" class="img-fluid pb-3">
  </div>
  <h3> Get the best food in time </h3>
  

  <br><br>

  <div class= "container-fluid">
      <div class="row">
        <div class = "col-lg-4 col-md-4 col-12 " >
          <figure class="figure">
            <img src="image\order_online.jpg" class="figure-img img-fluid rounded" style="height: 300px; width: 600; object-fit: cover;" alt="photo of a bowl of rice">
            <figcaption class="figure-caption text-center"> <h3> Order Food Online </h3></figcaption>
          </figure>
        </div>
        <div class = "col-lg-4 col-md-4 col-12 " >
          <figure class="figure">
            <img src="image\go_out.jpg" class="figure-img img-fluid rounded" style="height: 300px; width: 600; object-fit: cover;" alt="photo of food in a plate">
            <figcaption class="figure-caption text-center"> <h3> Go out for a meal  </h3></figcaption>
          </figure>
        </div>
        <div class = "col-lg-4 col-md-4 col-12 " >
          <figure class="figure">
            <img src="image\nightlife.jpg" class="figure-img img-fluid rounded" style="height: 300px; width: 600; object-fit: cover;" alt="photo of wiskey">
            <figcaption class="figure-caption text-center"> <h3> Nightlife & Club  </h3></figcaption>
          </figure>
        </div>
      </div>

  </div>

  <br><br>  

    <h2> Collection's </h2> <br>
    <div class= "container-fluid">
      <div class="row">
      <?php
        $q = "select * from food "  ;
        $result = $conn->query($q) ;
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
      ?>
            <div class = "col-lg-4 col-md-4 col-12 " >
            <figure class="figure">
              <a href='order_details.php?food=<?php  echo $row['fname'];  ?>'><img src="  <?php  echo $row['fimage'];  ?>  " class="figure-img img-fluid rounded" style="height: 300px; width: 600; object-fit: cover;" alt="photo of wiskey"></a>
              <figcaption class="figure-caption text-center"> <h3> <?php  echo $row['fname'];  ?>  </h3></figcaption>
            </figure>
            </div>
      <?php
        }
        } else {
            echo "<h3> there are no food </h3>";
          }
      ?>

      </div>

    </div>
</div>



</body>
</html>

