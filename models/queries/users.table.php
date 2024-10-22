<?php 
$mysql = "CREATE TABLE IF NOT EXISTS `users` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(100) NOT NULL ,
    `password` VARCHAR(255) NOT NULL ,
    `roles` ENUM('admin','user') NOT NULL DEFAULT 'user' ,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `update_at`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$result = $pdo->prepare($mysql);
$result -> execute();
if($result -> execute()){
    echo "Table users  created successfully<br> ";
}
for ($i = 0; $i < 10; $i++) {
    $name = $faker->name;
    $email = $faker->email;
    $password = password_hash('password123', PASSWORD_DEFAULT);  
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
}

echo "Database seeded with fake users!<br>";