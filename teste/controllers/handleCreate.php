<?php
    include('../config.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nome = $_POST['nome'];
        $idade = (int)$_POST['idade'];
        
        if (!empty($nome) && !empty($idade)) {
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "INSERT INTO users (nome, idade) VALUES (:nome, :idade)";
            
            $stmt = $conn->prepare($query);
            $params = [
                'nome' => $nome,
                'idade' => $idade
            ];
            $stmt->execute($params);

            header('location: ../views/viewIndex.php');
        
        } catch (PDOException $e) {
            echo "Erro na conexão com o banco de dados: " . $e->getMessage();
        }
    }else {
        echo "Erro, você precisar inserir ambos os campos!";
    }
}
?>
