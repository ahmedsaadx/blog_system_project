<?php
require_once BASE_PATH."core/helpers.php";
not_authecticated();
if($_SERVER['REQUEST_METHOD'] !== "POST"){
    require_once BASE_PATH.'views/signup.view.php';
    exit;
}else{
    $_SESSION["errors_signup"] = [];
    if (empty($_POST["name"])) {
        $_SESSION["errors_signup"]["signup_name_required"] = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]+$/", $name)) {
            $_SESSION["errors_signup"]["signup_name_match_rules"] = "Only letters, hyphens, and white space are allowed";
        }
    }
    if (empty($_POST["email"])) {
        $_SESSION["errors_signup"]["email"] = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["errors_signup"]["email"] = "Invalid email format";
        }
    }

    if (!empty($_POST["password"]) && !empty($_POST["confirm_password"])) {
        $password = test_input($_POST["password"]);
        $confirm_password = test_input($_POST["confirm_password"]);
        $password_pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$!%*?&._`|^])[A-Za-z\d@$!%*?&|^._`#]{8,}$/';
        if ($password != $confirm_password) {
            $_SESSION["errors_signup"]['passwordError_notMatch'] = "Passwords are not same.";
        }
        if (!preg_match($password_pattern, $password)) {
            $_SESSION["errors_signup"]['passwordError_notMatchRule'] = "Password must be at least 8 characters long, and include at least one uppercase letter, one lowercase letter, one number, and one special character.";
        }
        $hash_password=password_hash($password,PASSWORD_BCRYPT);
        
    }else{
        $_SESSION["errors_signup"]["passwordError_required"] = "Enter password and confirm.";
    }  
    
    if(!empty($_SESSION["errors_signup"])){
        header("location: $url/index.php?page=signup");
        exit;
    }else{
        $check_user_exists_query = "SELECT name,email FROM users WHERE email = :email  OR name = :name  ";
        $stmt_check_exists = $pdo->prepare($check_user_exists_query);
        $stmt_check_exists->bindParam(':email', $email);
        $stmt_check_exists->bindParam(':name', $name);
        $stmt_check_exists->execute();
        if ($stmt_check_exists->rowCount() > 0) {
            $result = $stmt_check_exists->fetch(PDO::FETCH_ASSOC);
    
            if ($result['email'] === $email) {
                $_SESSION["errors_signup"]["email_exists"] = "Email is already registered. Please use a different email.";
            }
            
            if ($result['name'] === $name) {
                $_SESSION["errors_signup"]["name_exists"] = "Name is already taken. Please choose a different name.";
            }
            header("location: $url/index.php?page=signup");
            exit;  

        } else { 
            $insert_user_query = "INSERT INTO users (`name`, `email`, `password`) VALUES (:name, :email, :password)";
            $stmt = $pdo->prepare($insert_user_query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hash_password);
            if ($stmt->execute()) {
                $_SESSION['signup_success'] = 'Sign up successful! you can now sign in . Please go to the <a href="../index.php?page=login">login page</a>. ';
                header("location: $url/index.php?page=signup");
                exit;
            } else {
                $_SESSION["errors_signup"]["db_error"] = "Error signing up, please try again.";
                header("location: $url/index.php?page=signup");
                exit;
            }
        }
    }
}

