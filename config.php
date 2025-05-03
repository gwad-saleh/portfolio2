<?php
$host = 'localhost';
$dbname = 'flower_shop_db';
$username = 'root';
$password = '';

// try {
//     $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION);
//     $conn->exec("SET NAMES utf8mb4");
// } catch(PDOException $e) {
//     die("Connection failed: " . $e->getMessage());
// }

$conn = mysqli_connect($host,$username,$password,$dbname);

if(!$conn){
    echo 'error';
}

?>