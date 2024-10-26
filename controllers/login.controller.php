<?php

require_once BASE_PATH."core/helpers.php";
not_authecticated();
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    require_once BASE_PATH.'views/login.view.php';
    exit;
} else {
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $check_account_email_query = "select * from users where email = :email";
    $stmt = $pdo->prepare($check_account_email_query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION["user_name"] = $user['name'];
            header("location: $url/index.php?page=home");
            exit;
        } else {
            $_SESSION['sign_in_error'] = "Email or password is incorrect.";
            header("location: $url/index.php?page=login");
            exit;
        }
    } else {
        $_SESSION['sign_in_error'] = "Email or password is incorrect";
        header("location: $url/index.php?page=login");
        exit;
    }


}
