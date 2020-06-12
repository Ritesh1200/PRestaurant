<?php
session_start();

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
    die("Connection failed: " . $conn->connect_error);
}else{
    echo "connectaion connected <br>";
}

$query = "select * from Acc where email = '$email'" ;
$result = $conn->query($query);
$num = mysqli_num_rows($result);

if($num != 0)
{   
    header('location:createacc.php?message=Already registered') ;
    exit();

}
else{

    if ($_FILES["profile_pic"]["error"] != 0){
        header('location:createacc.php?message=Enter your image') ;
        exit();
    }
    else{
        if ($_FILES["profile_pic"]["type"] != "image/jpeg" && $_FILES["profile_pic"]["type"] != "image/jpg" && $_FILES["profile_pic"]["type"] != "image/png") {
        header('location:createacc.php?message=Only image is acceptable') ;
        exit();
        }
        if ($_FILES["profile_pic"]["size"] > 5000000) {
        header('location:createacc.php?message=Size of photo is too big') ;
        exit();
        }
    }

    $val = "profile_pic_image/".$email  . $_FILES["profile_pic"]["name"] ;

   $stmt = $conn->prepare ( "insert into Acc (First_name,Last_name,Email,Mobile,Gender,Pass,Image) values (?,?,?,?,?,?,?)");
   $stmt->bind_param("sssssss",$fname,$lname,$email,$mobile,$gender,$pass,$val);
   $stmt->execute() ;
   $stmt->close();
   move_uploaded_file($_FILES["profile_pic"]["tmp_name"],"profile_pic_image/". $email  . $_FILES["profile_pic"]["name"]);

    
   header('location:acc_created.php');
    
}
$conn->close();


?>