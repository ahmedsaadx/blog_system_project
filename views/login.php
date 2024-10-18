 <!-- Page Header-->
 <header class="masthead" style="background-image: url('assets/img/login-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Login to Your Account</h1>
                        <span class="subheading">Please enter your credentials to continue.</span>
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
                        <form action="../controllers/login_validation.php" method="POST">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="Enter your email..." required />
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" type="password" placeholder="Enter your password..." required />
                                <label for="password">Password</label>
                            </div>
                            <button class="btn btn-primary text-uppercase" type="submit">Login</button>
                        </form>
                        <div class="mt-3">
                            <p>Don't have an account? <a href="index.php?page=signup">Create an account here</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>