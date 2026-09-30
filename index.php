<?php
    require "conexao.php";

    echo "<br>Meu sistema está conectado!";

     $sql = "CREATE TABLE IF NOT EXISTS testes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100),
        idade INT
    )";

    $pdo->exec($sql);

    echo "<br>Tabela criada com sucesso!";

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nome e Idade</title>

    <link rel="stylesheet" href="./style.css">
</head>

<body>

<a href="idade.php">Verificador de idade</a>
<a href="notas.php">Notas</a>
<a href="jogos.php">Jogos</a>
<a href="login-basico.php">Login básico</a>


</body>
</html>
