<?php
include('../config.php');

if($_SERVER['REQUEST_METHOD'] === 'GET'){

    $id = $_GET['id'];
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {

        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $conn->prepare($query);
        $params = [':id' => $id];
        $stmt->execute($params);

        header('location: ../views/viewIndex.php');

    }catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>