<?php
$mysql = "CREATE TABLE IF NOT EXISTS `categories` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL
)";
$result = $pdo->prepare($mysql);
$result -> execute();
if($result -> execute()){
    echo "Table categories created successfully <br>";
}
