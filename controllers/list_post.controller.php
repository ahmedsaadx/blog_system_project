<?php
$userId = $_SESSION['user_id']; 

try {
    $stmt = $pdo->prepare("SELECT p.title, p.content, p.created_at, u.name FROM posts p JOIN users u ON p.user_id = u.id WHERE p.user_id = :user_id ORDER BY p.created_at DESC");
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
require_once BASE_PATH.'views/list_post.view.php';
