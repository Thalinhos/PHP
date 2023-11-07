<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Dados</title>
</head>
<body>
    <h1>Editar Dados</h1>
    <form action="../controllers/handleEdit.php" method="POST">
        <?php
        $id = $_GET['id'];
        $nome = $_GET['nome'];
        $idade = $_GET['idade'];
        ?>

        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" name="nome" value="<?php echo $nome; ?>">
        <input type="number" name="idade" value="<?php echo $idade; ?>">
        <button type="submit">Salvar</button>
    </form>
</body>
</html>