<?php 
require('controllers/auth.php');
is_authecticated();
?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/create-bg.png')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Create Post</h1>
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
                    <?php if (isset($_SESSION['post_successfully'])): ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['post_successfully']; ?>
                        </div>
                        <?php unset($_SESSION['post_successfully']); ?>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['errors_post']) && !empty(isset($_SESSION['errors_post']))) :?>
                        <div class="alert alert-danger">
                            <ul>
                            <?php foreach ($_SESSION['errors_post'] as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                            </ul>
                        </div>
                         <?php unset($_SESSION['errors_post']);?>
                    <?php endif ?>
                    <form action="controllers/post_validation.php" method="POST" enctype="multipart/form-data">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="title" type="text" name="title" placeholder="Enter the post title..."  />
                            <label for="title">Post Title</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="content" name="content" placeholder="Enter the post content..." style="height: 12rem" ></textarea>
                            <label for="content">Post Content</label>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input class="form-control" id="image" type="file" name="image" accept="image/*" />
                        </div>
                        <button class="btn btn-primary text-uppercase" type="submit">Create Post</button>
                    </form>
                    <div class="mt-3">
                        <p><a href="index.php?page=post">Back to Posts</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>