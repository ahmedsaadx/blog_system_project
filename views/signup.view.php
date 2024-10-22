
<!-- //  if (isset($_SESSION['user_id'])) {
//     header("Location: ../index.php?page=home"); 
//     exit;
// } -->
<?php  require_once('inc/header.php'); ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('<?php echo  $url?>/public/img/login-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Create an Account</h1>
                    <span class="subheading">Fill out the form below to sign up.</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="my-5">

                    <!-- Success Message -->
                    <?php if (isset($_SESSION['signup_success'])): ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['signup_success']; ?>
                        </div>
                        <?php unset($_SESSION['signup_success']); ?>
                    <?php endif; ?>

                    <!-- Error Messages -->
                    <?php if (isset($_SESSION['errors_signup']) && !empty($_SESSION['errors_signup'])): ?>
                        <div class="alert alert-danger">
                            <ul>
                            <?php foreach ($_SESSION['errors_signup'] as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php unset($_SESSION['errors_signup']); ?>
                    <?php endif; ?>

                    <form action="index.php?page=signup" method="POST">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="username" type="text" name="name" placeholder="Enter your username..."  required/>
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" type="email" name="email" placeholder="Enter your email..." required />
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="password" type="password" name="password" placeholder="Enter your password..." required />
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="confirm_password" type="password" name="confirm_password" placeholder="Confirm your password..."  required/>
                            <label for="confirm_password">Confirm Password</label>
                        </div>
                        <button class="btn btn-primary text-uppercase" type="submit">Sign Up</button>
                    </form>
                    <div class="mt-3">
                        <p>Already have an account? <a href="index.php?page=login">Login here</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php  require_once('inc/footer.php'); ?>