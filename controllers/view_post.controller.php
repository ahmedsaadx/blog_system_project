<?php

if (!isset($_GET['post_id']) || !is_numeric($_GET['post_id'])) {
    header('Location: index.php?page=home');
    exit;
} else {
    $post_id = (int)$_GET['post_id'];  
    $sql = "SELECT p.id, p.title, p.content, p.created_at, p.image_path, u.name 
            FROM posts p 
            JOIN users u ON p.user_id = u.id 
            WHERE p.id = :post_id";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['post_id' => $post_id]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$post) {
        header('Location: index.php?page=home');
        exit;
    }
    require_once BASE_PATH . 'views/post.view.php';
}
