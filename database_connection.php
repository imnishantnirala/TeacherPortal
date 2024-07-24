<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "tportal";
$connect = mysqli_connect( $servername,$username,$password,$database );
if (!$connect){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}else{
    // echo "Connection was successful";
}

?>