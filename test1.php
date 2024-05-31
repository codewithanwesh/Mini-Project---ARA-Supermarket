<?php
$name = $_POST['name'];
$email = $_POST['email'];
$pass = ($_POST['password']);

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "form1";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo "Connection was successful<br>";
}

// Sql query to be executed
$sql = "INSERT INTO `registration` (`name`, `email`,`password`) VALUES ('$name', '$email', '$pass')";
$result = mysqli_query($conn, $sql);


if($result){
    echo "The record has been inserted successfully successfully!<br>";
    header("Location:http://localhost/login%20copy/loginfinal.php");
    exit;
}
else{
    echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
}
?>