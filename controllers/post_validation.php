<?php 
session_start();
require_once('../models/connector/handler.php');


if($_SERVER['REQUEST_METHOD'] !== "POST"){
    header('location: ../index.php?page=create_post');
    exit;
}else{ 
    $_SESSION["errors_post"] = [];
    if (empty($_POST["title"])) {
        $_SESSION["errors_post"]["post_name_required"] = "Name is required";
    } else {
        $title = test_input($_POST["title"]);
        if (!preg_match("/^[\p{Arabic}\p{Latin}\-' ]{1,45}$/u", $title)) {
            $_SESSION["errors_post"]["post_name_match_rules"] = "Only letters, hyphens, and white space are allowed, and the name must be between 1 and 45 characters.";
        }
    }
    if (empty($_POST['content'])) {
        $_SESSION["errors_post"]["post_content_required"] = "Content is required.";
    }else{
        $content = test_input($_POST["content"]);
    }
   
    if (!isset($_FILES["image"]) || $_FILES["image"]["error"] !== UPLOAD_ERR_OK) {
        $_SESSION["errors_post"]["post_image"] = "There was an error uploading the file. Please choose a valid image.";
    } else {
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        $maxFileSize = 5 * 1024 * 1024; 
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if (!in_array($fileType, $allowedTypes)) {
            $_SESSION["errors_post"]["post_photo_ext"]="Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
        if ($fileSize > $maxFileSize) {
            $_SESSION["errors_post"]["post_photo_size"]="File size exceeds the maximum limit of 25";
        }

    }
    if(!empty($_SESSION["errors_post"])){
        header("location: ../index.php?page=create_post");
        exit;
 
    }else{
        $_SESSION["post_successfully"]="Post created successfully!";
        header("location: ../index.php?page=create_post");
        exit;
     
    }
}
function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
 }