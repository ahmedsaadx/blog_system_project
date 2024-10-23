<?php
require_once BASE_PATH."core/helpers.php";
is_authecticated();
$_SESSION = [];
session_destroy();
header("Location: index.php?page=home " );
exit();