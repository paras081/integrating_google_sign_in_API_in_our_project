<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table

$sql = "CREATE TABLE lab1 (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
UserName VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL
)";


if (mysqli_query($conn, $sql)) {
    echo "Table lab1 created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
