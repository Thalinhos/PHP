<?php
include("../controllers/handleReadData.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listar dados</h1>
    <?php
    foreach($data as $row){
        $id = $row['id'];
        $nome = ucwords($row['nome']);
        $idade = $row['idade'];

        echo "<div>
        <p>Id: {$id} - Nome: {$nome} - Idade: {$idade}.
            <button><a href='viewEdit.php?id={$id}&nome={$nome}&idade={$idade}' style='text-decoration: none; color: black;'>Editar</a></button>
            <button onclick='confirmDelete($id, \"$nome\")' style='text-decoration: none; color: black;'>Excluir</button>
        </p>
      </div>"; 
        }
    ?>

    <button> <a href="viewCreate.php" style='text-decoration: none; color: black;'>Criar novo usuário</a></button>
    
    <script>
        function confirmDelete(id, nome) {
            if (confirm("Tem certeza que deseja excluir este item " + nome + "?")){
                window.location = '../controllers/handleDelete.php?id=' + id;
            }
        }
    </script>
</body>
</html>