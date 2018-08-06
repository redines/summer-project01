<?php
require_once 'connect.php';

$conn = new mysqli($hostName, $userName, $pw, $db);
if ($conn->connect_error) die("Connection to DB failed: ".$conn->connect_error);

$stmt = $conn->prepare('INSERT INTO users (username,word,countword) VALUES(?,?,?)');
$stmt->bind_param('ssi', $username, $word, $countword);

if(isset($_POST['name'])){
    $username = $_POST['name'];
}else {
    $username = "(Not entered)";
}

if(isset($_POST['word'])){
    $word = $_POST['word'];
}else {
    $word = "(Not entered)";
}

if(isset($_POST['count'])){
    $countword = $_POST['count'];
}else {
    $countword = "(Not entered)";
}

$stmt->execute();

$stmt->close();
$conn->close();
?>