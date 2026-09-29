<?php
    require "conexao.php";

    echo "<br>Meu sistema está conectado!";

     $sql = "CREATE TABLE IF NOT EXISTS jogos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100),
        genero VARCHAR(100),
        nota INT
    )";

    $pdo->exec($sql);

    echo "<br>Tabela criada com sucesso!";

?>

<?php
    $nomeJogo = "";
    $genro = "";
    $nota = 0;

    $nomeJogo = $_POST["nomeJogo"];
    $genero = $_POST["genero"];
    $nota = $_POST["nota"];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogos</title>
    <link rel="stylesheet" href="jogos.css">
</head>
<body>

    <form method="POST">

        <input type="text" id="nome" name="nome" placeholder="Digite o nome do jogo">

        <input type="text" id="genero" name="genero" placeholder="Digite o genero">
        
        <input type="number" id="nota" name="nota" placeholder="Digite a nota">

        <button type="submit">Enviar</button>

    </form>
    
</body>
</html>
