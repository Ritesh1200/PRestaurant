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

if(isset($_REQUEST['del']))
  {
   $email = $_REQUEST['del'] ;
   $email = ltrim($email, ' ');

   $q = "select Image from Acc where Email = '$email'" ;
   $res = $conn->query($q);
   $res = mysqli_fetch_row($res);
   $ress = $res[0];
   @unlink($ress);

   $qq = "delete from Acc where Email='$email'" ;
   $result = $conn->query($qq);
   $_REQUEST["del"] = null;
   header("location:all_account.php");
   exit;
   $conn->close();
}

?>