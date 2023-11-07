<?php
   include('../config.php');

   if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $idade = (int)$_POST['idade'];
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "UPDATE users SET nome = :nome, idade = :idade WHERE id = :id";
        
        $stmt = $conn->prepare($query);
        $params = [
            'id' => $id,
            'nome' => $nome,
            'idade' => $idade
        ];
        $stmt->execute($params);

        header('location: ../views/viewIndex.php');
    
    } catch (PDOException $e) {
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    }

}



?>