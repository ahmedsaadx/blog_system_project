<?php


try {
    $sql = "SELECT p.id, p.title, p.content, p.image_path, p.created_at, u.name 
            FROM posts p 
            JOIN users u ON p.user_id = u.id 
            ORDER BY p.created_at DESC"; 
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php foreach ($posts as $post): ?>
                <!-- Post preview -->
                <div class="post-preview">
                    <a href="view_post.php?post_id=<?php echo $post['post_id']; ?>">
                        <h2 class="post-title"><?php echo htmlspecialchars($post['title']); ?></h2>
                        <h3 class="post-subtitle"><?php echo htmlspecialchars(substr($post['content'], 0, 100)) . '...'; ?></h3>
                    </a>
                    <p class="post-meta">
                        Posted by <a href="#!"><?php echo htmlspecialchars($post['name']); ?></a>
                        on <?php echo date("F d, Y", strtotime($post['created_at'])); ?>
                    </p>
                </div>
                <!-- Divider -->
                <hr class="my-4" />
            <?php endforeach; ?>
            <!-- Pager -->
            <div class="d-flex justify-content-end mb-4">
                <a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a>
            </div>
        </div>
    </div>
</div>

