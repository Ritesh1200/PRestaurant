<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$pass = $_POST['pswd'];


$servername = 'sql12.freemysqlhosting.net';
$username = 'sql12347421';
$password = 'TjkWAcBiWL';
$DBNAME = 'sql12347421';


$conn = mysqli_connect($servername,$username,$password,$DBNAME );
if ($conn->connect_error) {
    die("Connectddddddion failed: " . $conn->connect_error);
}else{
	echo "connectaion coaaaaannected <br>";
}

$stmt = $conn->prepare ( "insert into createacc (First_name,Last_name,Email,Mobile,Gender,Pass) values (?,?,?,?,?,?)");
$stmt->bind_param("sssiss",$fname,$lname,$email,$mobile,$gender,$pass);

$stmt->execute();
header('location:acc_created.php');
$stmt->close();
$conn->close();
exit;

?> 
