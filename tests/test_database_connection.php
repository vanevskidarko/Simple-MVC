<?php

require_once __DIR__ . '/../vendor/autoload.php';

use mvc\BaseModel;

try {
    // Instantiate the BaseModel to test the database connection
    $baseModel = new BaseModel();

    // If instantiation is successful, the database connection is established
    echo "Database connection successful!";
} catch (PDOException $e) {
    // If there's an exception, display the error message
    echo "Database connection failed: " . $e->getMessage();
}
