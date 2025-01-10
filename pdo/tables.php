<?php

// файл db/tables.php

require_once 'connection.php';

try {
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        age VARCHAR(3) NOT NULL UNIQUE,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )";

    $pdo->exec($sql);
    // echo "Table 'users' created successfully.";
} catch (PDOException $e) {
    echo $e->getMessage();
}