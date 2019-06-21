<?php
$link = mysqli_connect('localhost', 'root', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
//echo "Connect Successfully!";
$dbselect = mysqli_select_db($link,'Amazing');
mysqli_query($link,"SET NAME 'utf8'");
?>