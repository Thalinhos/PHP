<?php
require_once './JWT.php';
require_once './mongodb.php';

header('Content-Type: application/json; charset=UTF-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
// app.post('/handleLogin')
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/handleLogin'){
    $data = json_decode(file_get_contents('php://input'), true);
    $usuario = $data['usuario'];
    $senha = $data['senha'];

    $user = $userCollection->findOne(['nome' => $usuario]);

    if (!$user) {
        header('Content-Type: application/json; charset=UTF-8', true , 400);
        return json_encode(['errorMessage' => "Usuário não encontrado."], JSON_UNESCAPED_UNICODE);
    }

    if (!password_verify($senha, $user['senha'])) {
        header('Content-Type: application/json; charset=UTF-8', true , 400);
        return json_encode(['errorMessage' => "Credenciais inválidas."], JSON_UNESCAPED_UNICODE);
    }

    $token = setToken($user['nome']);
    echo json_encode(['token' => $token]);
}

// app.post('/verifyLogin')
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/verifyToken') {    
@@ -78,27 +84,51 @@
    if (!$date) {
        header('Content-Type: application/json; charset=UTF-8', true , 400);
        echo json_encode(['errorMessage' => "Formato de data inválido. Use DD/MM/YYYY."], JSON_UNESCAPED_UNICODE);
        return;
    }

    $formattedDate = $date->format('d/m/Y');

    $postToAdd = [
        'descricao' => $data['descricao'],
        'data' => $formattedDate,
        'hora' => $data['hora']
    ];

    try {
        $postCollection->insertOne($postToAdd);
        header('Content-Type: application/json; charset=UTF-8', true , 200);
        echo json_encode(['message' => "Evento inserido com sucesso!"], JSON_UNESCAPED_UNICODE);
    } catch (Exception $e) {
        header('Content-Type: application/json; charset=UTF-8', true , 400);
        echo json_encode(['errorMessage' => "Erro ao inserir valores. Erro: " . $e->getMessage()]);
    }
}

