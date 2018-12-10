<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Retrieve Page</title>
    <style type="text/css">
*
{
    margin: 0px;
    padding: 0px;
}
html, body
{
    height: 100%;
}
    tr:nth-child(even) {background-color: #f2f2f2;}
    th {
    background-color: #4CAF50;
    color: white;
  }
  button {
margin-left :5px }
    </style>
  <body>
    <table width="100%" height="100%">
  <tr>
    <th>Id</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Phone Title</th>
    <th>Phone Number</th>
    <th>Choose Action</th>
  </tr>


<?php


$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "contacts";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db,$dbname);
$sql = "SELECT id, first_name, last_name, phone_title, phone_number FROM contact, phone_numbers WHERE id = contact_id ";
$con_results = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($con_results)) {
  $id = $row['id'];
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['first_name'] . "</td>";
  echo "<td>" . $row['last_name'] . "</td>";
  echo "<td>" . $row['phone_title'] . "</td>";
  echo "<td>" . $row['phone_number'] . "</td>";
  echo "<td>" .'<a href="Delete.php?id='.$id.'">Delete</a>'."    ".'<a href="Update.php?id='.$id.'">Update</a>'. "</td>";
  echo "</tr>";
  }
echo "</table>";




 ?>

  </body>
</html>
