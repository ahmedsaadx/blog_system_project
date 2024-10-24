<?php
require_once('inc/header.php');
?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('<?php echo  $url?>/public/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Your Posts</h1>
                    <span class="subheading">Here are your latest posts</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">

            <?php if (!empty($posts)) : ?>
                <?php foreach ($posts as $post): ?>
                    <div class="post-preview">
                        <a href="index.php?page=view_post&post_id=<?php echo $post['id'];?>">
                            <h2 class="post-title"><?php echo htmlspecialchars($post['title']); ?></h2>
                            <h3 class="post-subtitle"><?php echo htmlspecialchars(substr($post['content'], 0, 100)) . '...'; ?></h3>
                        </a>

                        <!-- Edit Button -->
                        <a href="index.php?page=edit_post&post_id=<?php echo $post['id'];?>" class="btn btn-warning btn-sm mt-2">Edit</a>
                        
                        <!-- Delete Button (form to handle delete request) -->
                        <form action="index.php?page=delete_post" method="POST" style="display:inline;">
                            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                            <button type="submit" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                        </form>
                    </div>
                    <hr class="my-4" />
                <?php endforeach; ?>
            <?php else: ?>
                <p>No posts available. Be the first to create a post!</p>
            <?php endif; ?>

            <hr class="my-4" />
            
            <div class="d-flex justify-content-end mb-4">
                <a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a>
            </div>

        </div>
    </div>
</div>
<?php
require_once('inc/footer.php');
?>
