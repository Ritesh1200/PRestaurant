<?php
session_start();


$servername = 'sql12.freemysqlhosting.net';
$username = 'sql12347421';
$password = 'TjkWAcBiWL';
$DBNAME = 'sql12347421';

$conn = mysqli_connect($servername,$username,$password,$DBNAME );
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
	echo "connection connected <br>";
}

$uname = $_REQUEST["uname"];
$pass = $_REQUEST["pass"];

$q = "select * from Acc where Email = '$uname' && pass = '$pass'" ;
$result = $conn->query($q) ;
$num = mysqli_num_rows($result) ;

if($num != 0){
   $_SESSION['username'] = $uname ;
   $query = $conn->query( "select First_name,Last_name from Acc where Email = '$uname'" ) ;
   $query = mysqli_fetch_row($query) ;
   $fname = $query[0] ;
   $lname = $query[1];
   $_SESSION['firstname'] = $fname ;
   $_SESSION['lastname'] = $lname ;
   header('location:enter.php') ;
}
else{
   header('location:login.php?message= Incorrect password') ;
}


?>
