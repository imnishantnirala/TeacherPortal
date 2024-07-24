<?php 
require('../database_connection.php');

$id = $_POST['id'];
$name = $_POST['name'];
$subject = $_POST['subject'];
$mark = $_POST['mark'];

$update_sql = "UPDATE `student` SET `name` = '$name', `subject` = '$subject', `mark`='$mark' WHERE `id` = '$id' ";

$result = mysqli_query( $connect, $update_sql);

if($result){
	echo 1;
}else{
	echo 0;
}

?>