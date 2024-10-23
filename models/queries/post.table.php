<?php 
$mysql = "CREATE TABLE IF NOT EXISTS `posts` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `content` TEXT NOT NULL ,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `update_at`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `user_id` INT NOT NULL ,
    `category_id` INT NOT NULL
)";
$result = $pdo->prepare($mysql);
if($result -> execute()){
    echo "Table posts created successfully<br> ";
}
$mysql = "SELECT CONSTRAINT_NAME 
FROM information_schema.KEY_COLUMN_USAGE 
WHERE TABLE_NAME = 'posts' AND CONSTRAINT_NAME = 'fk_user'";
$stmt = $pdo->prepare($mysql);
$stmt->execute();

if ($stmt->rowCount() == 0) {
// If 'fk_user' does not exist, add it
$mysql = "ALTER TABLE `posts` 
ADD CONSTRAINT `fk_user`
FOREIGN KEY (`user_id`) 
REFERENCES `users`(`id`) 
ON DELETE CASCADE 
ON UPDATE CASCADE";

$result = $pdo->prepare($mysql);
$result->execute();

if ($result) {
echo "Foreign key 'fk_user' added successfully<br>";
}
}

$mysql = "SELECT CONSTRAINT_NAME 
FROM information_schema.KEY_COLUMN_USAGE 
WHERE TABLE_NAME = 'posts' AND CONSTRAINT_NAME = 'fk_category'";
$stmt = $pdo->prepare($mysql);
$stmt->execute();

if ($stmt->rowCount() == 0) {
$mysql = "ALTER TABLE `posts` 
ADD CONSTRAINT `fk_category`
FOREIGN KEY (`category_id`) 
REFERENCES `categories`(`id`) 
ON UPDATE CASCADE";

$result = $pdo->prepare($mysql);
$result->execute();

if ($result) {
echo "Foreign key 'fk_category' added successfully<br>";
}
}