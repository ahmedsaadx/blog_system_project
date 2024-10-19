<?php
session_start();
require_once('models/connector/handler.php');
require_once('assets/header.php');
$page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home'; 
try {

    $valid_pages = [
        'home' => 'views/home.php',
        'about' => 'views/about.php',
        'post' => 'views/list_post.php',
        'contact' => 'views/contact.php',
        'login' => 'views/login.php',
        'signup' => 'views/signup.php',
        'logout' => 'views/logout.php',
        'create_post' => 'views/create_post.php'
    ];

    if (array_key_exists($page, $valid_pages)) {
        include $valid_pages[$page];
    } else {
        throw new Exception('Page not found');
    }
} catch (Throwable $e) {
    include 'views/404.php'; 
}


require_once('assets/footer.php');