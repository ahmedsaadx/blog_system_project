<?php

function is_authecticated()
{
    if (!isset($_SESSION['user_id'])) {
        header("location: ../index.php?page=home");
        exit;
    }
}
function not_authecticated()
{
    if (isset($_SESSION['user_id'])) {
        header("Location: ../index.php?page=home");
        exit;
    }
}
function test_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}
