<?php
$id = $_POST['id'];
require('../database_connection.php');
$sql = "DELETE FROM student WHERE id = {$id} ";
$result  = mysqli_query($connect,$sql);
if($result){
	echo 1;
}else{
	echo 0;
}
?>