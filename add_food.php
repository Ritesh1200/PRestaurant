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
  <a class="navbar-brand" href="#">Add</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href=""> Setting <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
    
  </div>
</nav>

<br><br>

<div class="container-fluid text-left w-80 col-lg-8 col-md-8 col-sm-12">
<form action="conn_add_food.php" class="needs-validation" method="POST" novalidate enctype="multipart/form-data">
  <div class="form-group">
    <label for="uname">Food name:</label>
    <input type="text" class="form-control" id="uname" placeholder="Enter name" name="fname" required>  
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlFile1">Food picture :</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name = "food_pic">
  </div>

  <div class="form-group">
    <label for="pwd">Price:</label>
    <input type="number" class="form-control" id="pwd" placeholder="set price in rupee" name="price" required>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>

  <button type="submit" class="btn btn-primary"> Submit</button>
</form>

    <!-- JavaScript for disabling form submissions if there are invalid fields -->

    <script>
        // Self-executing function
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

<?php
if(isset($_GET['message']))
  {  
  $message = $_GET['message'];
  $_GET["message"] = null;
  echo "<br><h5> <font color = red >  $message </h5> <br>" ;
  $_GET["message"] = null;
}
?>

</div>

</body>
</html>