<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <title>Register</title>
</head>
<body>
       <center><div class="jumbotron">
         <h1>Welcome</h1>
         <h2>Please fill all the blanks to complete Registeration</h2>
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
<input type="submit" value="Register" name="submit" />
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['firstname'])) {
    $firstname = $_POST['firstname'];
  }

  if (isset($_POST['lastname'])) {
    $lastname = $_POST['lastname'];
  }

  if (isset($_POST['phone_number'])) {
    $phonenumber = $_POST['phone_number'];
  }

    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "contacts";

    // Create connection
    $conn = new mysqli($servername, $username_db, $password_db,$dbname);

    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
     // The request is using the POST method

  if( !empty($firstname) && !empty($lastname) && !empty($phonenumber)){

    $sql = "INSERT INTO contact"
        ." (first_name,last_name)"
        ." VALUES ('"
        .$_POST['firstname']
        ."' , '"
        .$_POST['lastname']
        ."');";

        $con_results = mysqli_query($conn, $sql);

        if($con_results){
          $contactID = mysqli_insert_id($conn);

          $sql = "INSERT INTO phone_numbers"
          ." (phone_title,phone_number, default_num ,contact_id)"
          ." VALUES ("
          ."'HOME'"
          .","
          .$_POST['phone_number']
          .","
          ."1"
          .","
          .$contactID
          .");";

          $con_results = mysqli_query($conn, $sql);

          echo "Record Added";
  }
}
   else {
  echo "You left one or more of the blanks empty";
  }
}
?>

</body>
</html>
