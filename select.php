<?php
$servername = "localhost";
$username = "admin";
$password = "Hacker@123!";
$dbname = "profile";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM people";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       echo "id: " . $row["id"]. " - Name: " . $row["name"]. "Gender:" . $row["gender"]. "status: " . $row["status"]. " age: " . $row["age"]. "Date of Detention" . $row["dod"]. "Charges:" . $row["charges"]. "Category:" . $row["category"]. "<br>";
   }
} else {
   echo "0 results";
}
$conn->close();
?>
