<?php

session_start();
if($_SESSION['username'] == true){
  

}
else{
   header("location:http:admin.php");
}


$fname = $_POST['fname'];
$fprice = $_POST['price'];


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


$query = "select * from food where fname = '$fname'" ;
$result = $conn->query($query);
$num = mysqli_num_rows($result);

if($num != 0 )
{   
    header('location:add_food.php?message=Already registered that food') ;
    exit();

}
else{

    if ($_FILES["food_pic"]["error"] != 0){
        header('location:add_food.php?message=Enter your image') ;
        exit();
    }
    else{
        if ($_FILES["food_pic"]["type"] != "image/jpeg" && $_FILES["food_pic"]["type"] != "image/jpg" && $_FILES["food_pic"]["type"] != "image/png") {
        header('location:add_food.php?message=Only image is acceptable') ;
        exit();
        }
        if ($_FILES["food_pic"]["size"] > 5000000) {
        header('location:add_food.php?message=Size of photo is too big') ;
        exit();
        }
    }

    $vall = "food_images/".$fname  . $_FILES["food_pic"]["name"] ;

   $stmt = $conn->prepare ( "insert into food (fname,fImage,fprice) values (?,?,?)");
   $stmt->bind_param("sss",$fname,$vall,$fprice);
   $stmt->execute() ;
   $stmt->close();
   move_uploaded_file($_FILES["food_pic"]["tmp_name"],"food_images/". $fname.$_FILES["food_pic"]["name"]);

    
   header('location:admin_profile.php');
    
}
$conn->close();


?>