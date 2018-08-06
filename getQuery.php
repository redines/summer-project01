<?php
header('Content-Type: application/json');
require_once 'connect.php';

$dsn='mysql:host='.$hostName.';dbname='.$db;

$conn = new PDO($dsn, $userName, $pw);
if ($conn->connect_error) die("Connection to DB failed: ".$conn->connect_error);

$stmt = $conn->prepare("SELECT word FROM users ORDER BY countword DESC LIMIT 5");
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_OBJ);

$json = json_encode($result);
echo $json;
?>