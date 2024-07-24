<?php require('./layout/header.php') ?>

<?php
$showError = false;
$showAlert = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    require('./database_connection.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Chacke username is exists
    $exist_username = "SELECT * FROM `users` WHERE username='$username' ";
    $result_username = mysqli_query($connect, $exist_username);
    $user_count = mysqli_num_rows($result_username);

    // Condiction if user exits count 1 
    if ($user_count > 0) {
        $showError = "User Alredy Exists !";
    } else {

        if ($password == $cpassword) {

            $hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `users` (`username`, `password`) VALUES('$username', '$hash')";
            $result = mysqli_query($connect, $sql);

            if ($result) {
                $showAlert = true;
                echo "<script> alert('sign up successful !'); window.location.href = 'login.php'; </script>";
            }
        } else {
            $showError = "Password Donot Match";
        }
    }
}

?>


<div class="container col-12 col-sm-12 col-md-5">
    <div class="row align-items-center formRow">
        <div class=" text-center">
            <h2 class="titleText"> tailwebs. </h2>
        </div>
        <div class="col mt-4 border border-light shadow-lg loginForm p-5">

            <?php
            if (isset($showError)) {
                echo '<p class="text-center text-danger"> ' . $showError . ' </p>';
            }
            ?>
            <form method="post" action="signup.php">

                <label class="form-label">Username</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username">
                </div>

                <label class="form-label">Password</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
                </div>

                <label class="form-label">Confirm Password</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="cpassword" class="form-control" placeholder="Confirm password" aria-label="Password">
                </div>

                <div class="d-flex justify-content-end">
                    <a href="login.php">
                        <p>Login </p>
                    </a>
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button type="submit" class="btn btn-dark col-6 p-3 m-auto rounded-0">Signup</button>
                </div>

            </form>

        </div>
    </div>
</div>

<?php require('./layout/footer.php') ?>