<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$servername = 'sql12.freemysqlhosting.net';
$username = 'sql12347421';
$password = 'TjkWAcBiWL';
$DBNAME = 'sql12347421';

$conn = mysqli_connect($servername,$username,$password,$DBNAME );
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
}

$piece = $_POST['piece'];
$add = $_POST['address'];
$activity = 'active' ;
$email = $_SESSION['username'];
$name = $_GET['nfood'];
$q = "select fprice from food where fname = '$name'" ;
$result = $conn->query($q);
$result = mysqli_fetch_row($result);
$price = $result[0];
$total = $piece * $price ;

$stmt = $conn->prepare ( "insert into delivery (email,fname,price,piece,address,total,acticity) values (?,?,?,?,?,?,?)");
$stmt->bind_param("ssiisis",$email,$name,$price,$piece,$add,$total,$activity);
$stmt->execute() ;
echo $conn->error;

$stmt->close();

header("location:delivered.php?total='$total'");

?>