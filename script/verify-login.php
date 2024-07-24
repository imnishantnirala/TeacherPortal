<?php 
$login = false;
$showError = false;
if($_SERVER['REQUEST_METHOD']=='POST'){
	require('./database_connection.php');
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM `users` WHERE username = '$username' ";
	$result = mysqli_query($connect,$sql);
	$nums = mysqli_num_rows($result);
	
	if($nums == 1){
		while ($row = mysqli_fetch_assoc($result)) {
			if(password_verify($password, $row['password'])){
				$login=true;
				session_start();
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $username;
				header("location: index.php");
			}else{ $showError = "Password is Wrong !"; }
		}
	}else{ $showError = "Username is Wrong !";	}
}
?>