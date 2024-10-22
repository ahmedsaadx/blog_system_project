<?php  require_once('inc/header.php'); ?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('<?php echo $url?>public/img/404-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>404 - Page Not Found</h1>
                    <span class="subheading">Oops! It looks like you got lost.</span>
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
                <p>We couldn't find the page you were looking for. It might have been removed, renamed, or did not exist in the first place.</p>
                <p>Here are some helpful links instead:</p>
                <ul>
                    <li><a href="index.php?page=home">Home</a></li>
                    <li><a href="index.php?page=about">About Us</a></li>
                    <li><a href="index.php?page=contact">Contact Us</a></li>
                </ul>
                <div class="my-5">
                    <p>If you think this is a mistake, please <a href="index.php?page=contact">contact us</a>.</p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php  require_once('inc/footer.php'); ?>