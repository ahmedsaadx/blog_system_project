<?php

session_start();
define("BASE_PATH", __DIR__.DIRECTORY_SEPARATOR);
require_once BASE_PATH.'vendor/autoload.php';
use Dotenv\Dotenv;

$faker = Faker\Factory::create();
$envPath = BASE_PATH.'.env';
if (!file_exists($envPath)) {
    die(".env file doesn't exist. Please create a new one.");
} else {
    $dotenv = Dotenv::createImmutable(dirname($envPath));
    $dotenv->load();
    $db_host = $_ENV['DB_HOST'] ?? 'localhost';
    $db_user = $_ENV['DB_USERNAME'] ?? 'root';
    $db_pass = $_ENV['DB_PASSWORD'] ?? '123456';
    $db_name = $_ENV['DB_NAME'] ?? 'blog';
    $url = $_ENV['BASE_URL'] ?? 'http://localhost:5000/';
    $dsn = "mysql:host=$db_host;dbname=$db_name;charset=UTF8";
    require_once BASE_PATH.'models/connector/handler.php';
}
$page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home';
try {
    $valid_pages = [
        'home' => 'home.controller.php',
        'about' => 'about.controller.php',
        'post' => 'list_post.controller.php',
        'contact' => 'contact.controller.php',
        'login' => 'login.controller.php',
        'signup' => 'signup.controller.php',
        'logout' => 'logout.controller.php',
        'create_post' => 'create_post.controller.php',
        'view_post' => 'view_post.controller.php'
    ];

    if (array_key_exists($page, $valid_pages)) {
        require_once  BASE_PATH.'controllers/'.$valid_pages[$page];
    } else {
        throw new Exception('Page not found');
    }
} catch (Throwable $e) {
    require_once BASE_PATH.'views/404.view.php';
}
