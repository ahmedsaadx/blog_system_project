<?php
try {
    $sql = "SELECT p.id, p.title, p.content, p.created_at, u.name 
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

require_once BASE_PATH.'views/home.view.php';

