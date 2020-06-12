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

if(isset($_REQUEST['sta']))
  {
   $id = $_REQUEST['sta'] ;
   $email = ltrim($email, ' ');
   $qq = "update delivery set acticity = 'Delivered' where id='$id'" ;
   $result = $conn->query($qq);
   $_REQUEST["del"] = null;
   header("location:admin_show_order.php");
   exit;
   $conn->close();
}

?>