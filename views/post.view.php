<?php require_once('inc/header.php'); ?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('<?php echo $url ?><?php echo '/'.$post['image_path']; ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1><?php echo htmlspecialchars($post['title']); ?></h1>
                    <h2 class="subheading"><?php echo htmlspecialchars($post['subtitle']); ?></h2>
                    <span class="meta">
                        Posted by
                        <a href="#!"><?php echo htmlspecialchars($post['name']); ?></a>
                        on <?php echo date("F d, Y", strtotime($post['created_at'])); ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
            </div>
        </div>
    </div>
</article>

<?php require_once('inc/footer.php'); ?>
