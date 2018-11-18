  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (isset($_POST['username'])) {
  $username = $_POST['username'];
}
  if (isset($_POST['password'])) {
  $password = $_POST['password'];
}
  //db Connection
  $servername = "localhost";
  $username_db 	= "root";
  $password_db 	= "";
  $dbname 	= "contacts";

  // Create connection
  $conn = new mysqli($servername, $username_db, $password_db,$dbname);

  //Checkong Connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  if( !empty($username) && !empty($password))  {

    $result1 = mysqli_query($conn, "SELECT username, password FROM admin WHERE username = '".$username."' AND  password = '".$password."'");

          if(mysqli_num_rows($result1) > 0 )
          {
            echo "user found :";
            $sql = "SELECT * FROM admin WHERE username = '{$username}' AND password = '{$password}'";
            $con_results = mysqli_query($conn, $sql);
            $users = array();
            $row = mysqli_fetch_assoc($con_results);
              print_r(json_encode($row));

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
