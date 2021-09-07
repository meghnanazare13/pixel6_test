<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "animal";


$name=$_POST["name"];
$category=$_POST["category"];
$comment=$_POST["comment"];
$life=$_POST["life"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO animal (name, category, comment,life)
VALUES ('$name', '$category', '$comment' , '$life')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>