<?php
require('../database_connection.php');

$name = $_POST['name'];
$subject = $_POST['subject'];
$mark = $_POST['mark'];

$insert_data = mysqli_query(
    $connect,
    "INSERT INTO 
        `student` ( `name`, `subject`, `mark` ) 
            VALUES ( '$name','$subject','$mark' )"
);
if ($insert_data == true) {
    echo 1;
} else {
    echo 0;
}
