<?php
/*
TODO:
INPUT SANITAZION
*/
//require_one will generate error if file does not exist or can not connect to DB
//Will prevent files to use connect.php more than necessary
require_once 'connect.php';

$conn = new mysqli($hostName, $userName, $pw, $db);
if ($conn->connect_error) die("Connection to DB failed: ".$conn->connect_error);

$stmt = $conn->prepare('INSERT INTO users (username,word,countword) VALUES(?,?,?)');
$stmt->bind_param('ssi', $username, $word, $countword);

if(isset($_POST['fname'])){
    $username = $_POST['fname'];
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

printf("%d Row inserted.\n", $stmt->affected_rows);
$stmt->close();
$conn->close();
?>