<?php
//require_one will generate error if file does not exist or can not connect to DB
//Will prevent files to use connect.php more than necessary
require_once 'connect.php';

$conn = new mysqli($hostName, $userName, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$sql = "INSERT INTO users
VALUES (NULL,'Kalle', 'klubba', '25')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

/*
 <?php
function mysql_fix_string($conn, $string)
{
if (get_magic_quotes_gpc()) $string = stripslashes($string);
return $conn->real_escape_string($string);
}
?>
 */


/*
function get_post($conn, $var)
{
return $conn->real_escape_string($_POST[$var]);
}
*/


$result->close();
$conn->close();

?>