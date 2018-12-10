<?php

$id = $_GET['id'];

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "contacts";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db,$dbname);

$sql = "DELETE FROM contact WHERE id = '$id'";

$con_results = mysqli_query($conn, $sql);

echo "Record Deleted";

 ?>
