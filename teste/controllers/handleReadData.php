<?php

    include('../config.php');

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $query = "SELECT * FROM users";
        $stmt = $conn->query($query);
    
        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
    
        //echo json_encode($data);
    } catch (PDOException $e) {
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    }
 ?>



