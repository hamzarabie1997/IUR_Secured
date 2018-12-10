<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <title>Login Page</title>
</head>
<body>
       <center><div class="jumbotron">
         <h1>Welcome</h1>
       </div></center>
<form  method="POST">
<div class="form-group">
  <label >Username:</label>
  <input type="text" class="form-control" name="username">
</div>
<div class="form-group">
  <label >Password:</label>
  <input type="text" class="form-control" name="password">
</div>
<input type="submit" value="Login" name="submit" />
</form>

<form action="New_User.php">
    <input type="submit" value="New User" />
</form>

<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['username'])) {
    $username = $_POST['username'];
  }

  if (isset($_POST['password'])) {
    $password = $_POST['password'];
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

  if( !empty($username) && !empty($password))  {

          $result1 = mysqli_query($conn, "SELECT username, password FROM admin WHERE username = '".$username."' AND  password = '".$password."'");

          if(mysqli_num_rows($result1) > 0 )
          {
            echo "user found :";
            header('Location:http://localhost/Secured_Web/Projects/project2/Retrieve.php ');
            }


          else
          {
              echo "{\"error_code\":101,\"error_message\":\"User not found\",}";
          }
  }
  else {
  echo "Empty username or password";
  }
}
?>
</body>
</html>
