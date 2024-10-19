<?php 
require('controllers/auth.php');
is_authecticated();

session_destroy();


header("Location: index.php?page=home");
exit;