<?php 
    $host= 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'popcornandmovies';
    
    $dsn = "mysql:host=$host;dbname=$dbname";

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) { 
        die("DATABASE CONNECTION ERROR: </br></br>". $e->getMessage());
    }

?>