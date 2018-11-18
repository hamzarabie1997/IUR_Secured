<?php

//db Connection
$servername = "localhost";
$username_db 	= "root";
$password_db 	= "";
$dbname 	= "contacts";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db,$dbname);


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $sql = "SELECT id, first_name, last_name , phone_title , phone_number FROM contact , phone_numbers WHERE id = contact_id ";
  $con_results = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($con_results)){
    print_r(json_encode($row));
  }
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $phone = $_POST['phone'];


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
        .$_POST['phone']
        .","
        ."1"
        .","
        .$contactID
        .");";

        $con_results = mysqli_query($conn, $sql);

        echo "Record Added";

        if(!$con_results){
          die("SQL error " . mysqli_error($conn));
        }
      }else{
        die("SQL error " . mysqli_error($conn));

      }

}



if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

  $id = json_decode(file_get_contents('php://input'))->id;

  $sql = "DELETE FROM contact WHERE id = '$id'";

  $con_results = mysqli_query($conn, $sql);

echo "Record Deleted";
}



if ($_SERVER['REQUEST_METHOD'] === 'PUT') {

  $id = json_decode(file_get_contents('php://input'))->id;
  $firstname = json_decode(file_get_contents('php://input'))->first_name;
  $lastname = json_decode(file_get_contents('php://input'))->last_name;
  $phone = json_decode(file_get_contents('php://input'))->phone_number;


  $sql = "UPDATE contact SET first_name = '$firstname',last_name = '$lastname' WHERE id ='$id' ";
  $results = mysqli_query($conn, $sql);
  if ($results) {
   echo "contact updated ";
 }else {
   die(" data not updated ".mysqli_error($conn));
 }

  $sql = "UPDATE phone_numbers SET phone_number = '$phone' WHERE contact_id = '$id' ";
  $results = mysqli_query($conn, $sql);
  if ($results) {
   echo "Phone Updated ";
 }else {
   die(" data not updated ".mysqli_error($conn));
 }

}








 ?>
