<?php require('./layout/header.php') ?>
<?php require('./script/verify-login.php') ?>

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
            <form method="post" action="login.php">

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

                <div class="d-flex justify-content-end">
                    <a href="signup.php">
                        <p>User Registration </p>
                    </a>
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button type="submit" class="btn btn-dark col-6 p-3 m-auto rounded-0">Login</button>
                </div>

            </form>

        </div>
    </div>
</div>

<?php require('./layout/footer.php') ?>