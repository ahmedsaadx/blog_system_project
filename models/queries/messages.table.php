<?php
$mysql = "CREATE TABLE IF NOT EXISTS `messages` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(100) NOT NULL ,
    `subject` VARCHAR(255) NOT NULL ,
    `content` TEXT  NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `update_at`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$result = $pdo->prepare($mysql);
$result -> execute();
if($result -> execute()){
    echo "Table messages   created successfully<br> ";
}
for ($i = 0; $i < 10; $i++) {
    $name = $faker->name; 
    $email = $faker->email; 
    $subject = $faker->sentence(6); 
    $content = $faker->paragraph(4);  
    $stmt = $pdo->prepare("INSERT INTO messages (name, email, subject, content) VALUES (:name, :email, :subject, :content)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':subject', $subject);
    $stmt->bindParam(':content', $content);
    $stmt->execute();
}

echo "Database seeded with fake messages!<br>";