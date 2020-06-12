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
	echo "connectaion connected <br>";
}

$uname = $_REQUEST["admname"];
$pass = $_REQUEST["admpass"];

$q = "select * from AAcc where AEmail = '$uname' && Apass = '$pass'" ;
$result = $conn->query($q) ;
$num = mysqli_num_rows($result) ;

if($num != 0){
   $_SESSION['Ausername'] = $uname ;
   $query = $conn->query( "select AFirst_name,ALast_name from AAcc where AEmail = '$uname'" ) ;
   $query = mysqli_fetch_row($query) ;
   $fname = $query[0] ;
   $lname = $query[1];
   $_SESSION['Afirstname'] = $fname ;
   $_SESSION['Alastname'] = $lname ;
   header('location:admin_profile.php') ;
}
else{
   header('location:admin.php?message= Incorrect password') ;
}


?>