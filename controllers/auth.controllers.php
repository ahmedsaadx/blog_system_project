<?php
session_start();

function is_authecticated(){
    if(!isset($_SESSION['user_id'])){
        header("location: ../index.php?page=home");
        exit;
    }
}

