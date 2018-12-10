<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <title>Update</title>
</head>
<body>
       <center><div class="jumbotron">
         <h1>Welcome</h1>
         <h1>Please fill all the blanks to update your data</h1>
       </div></center>
<form  method="POST">
<div class="form-group">
  <label >First Name:</label>
  <input type="text" class="form-control" name="firstname">
</div>
<div class="form-group">
  <label >Last Name:</label>
  <input type="text" class="form-control" name="lastname">
</div>
<div class="form-group">
  <label >Phone Number:</label>
  <input type="number" class="form-control" name="phone_number">
</div>
<input type="submit" value="Update" name="submit" />
</form>

<?php

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone_number'];


$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "contacts";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db,$dbname);

$sql = "UPDATE contact SET first_name = '$firstname',last_name = '$lastname'  WHERE id ='$id' ";
$results = mysqli_query($conn, $sql);
if ($results) {
}else {
 die(" data not updated ".mysqli_error($conn));
}

$sql = "UPDATE phone_numbers SET phone_number = '$phone' WHERE contact_id = '$id' ";
$results = mysqli_query($conn, $sql);
if ($results) {
 echo "Record Updated ";
}else {
 die(" data not updated ".mysqli_error($conn));
}

}



?>


</body>
</html>
