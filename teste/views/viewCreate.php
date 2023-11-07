<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Criar Novo Usuário</h1>
    <form action="../controllers/handleCreate.php" method="POST">
        <label>Nome</label>
        <input type="text" name="nome">
        <label>Idade</label>
        <input type="number" name="idade">
        <button type="submit">Enviar</button>
    </form>

</body>
</html>