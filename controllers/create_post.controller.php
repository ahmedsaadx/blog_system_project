<?php
require_once BASE_PATH."core/helpers.php";
is_authecticated();
if($_SERVER['REQUEST_METHOD'] !== "POST"){
    require_once BASE_PATH.'views/create_post.view.php';
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

        if (empty($_SESSION["errors_post"])) {
            $uploadDir = 'public/uploads/'; 
            $filePath = $uploadDir . basename($fileName);

            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $filePath)) {
                $_SESSION["errors_post"]["post_image_upload"] = "Failed to upload image.";
            }
        }
    }
    if(!empty($_SESSION["errors_post"])){
        header("location: index.php?page=create_post");
        exit;
 
    }else{
        $userId = $_SESSION['user_id'];
        try {
            $sql = "INSERT INTO posts (title, content, image_path, user_id ) VALUES (:title, :content, :image_path, :user_id  )";
            $stmt = $pdo->prepare($sql); 
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':content', $content, PDO::PARAM_STR);
            $stmt->bindParam(':image_path', $filePath, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            if ($stmt->execute()) {
               $_SESSION["post_successfully"] = "Post created successfully!";
               header("location: index.php?page=create_post");
                exit;
            } else {
                $_SESSION["errors_post"]["db_error"] = "Failed to create post. Please try again.";
                header("location: index.php?page=create_post");
                exit;
            }
        } catch (PDOException $e) {
            $_SESSION["errors_post"]["db_error"] = "Database error: " . $e->getMessage();
            header("location: index.php?page=create_post");
            exit;
        }
    }
     
}

