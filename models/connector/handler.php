<?php

try {
        $pdo = new PDO($dsn, $db_user, $db_pass);

        if (!$pdo) {
                echo "Can't Connect to the $db_name database !";
        }   
} catch (PDOException $e) {
        echo $e->getMessage();
}


