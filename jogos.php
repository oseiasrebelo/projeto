<?php
    require "conexao.php";

    echo "<br>Meu sistema está conectado!";

     $sql = "CREATE TABLE IF NOT EXISTS jogos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100),
        genero VARCHAR(100),
        nota INT
        ano_lancamento INT
    )";

    $pdo->exec($sql);

    echo "<br>Tabela criada com sucesso!";

    $nome = "";
    $genero = "";
    $nota = 0;
    $ano_lancamento = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"] ?? 'Não informado';
        $genero = $_POST["genero"] ?? 'Não informada';
        $nota = $_POST["nota"] ?? 'Não informada';
        $ano_lancamento = $_POST["ano_lancamento"] ?? 'Não informada';

        $sql = "INSERT INTO jogos (nome, genero, nota, ano_lancamento)
        VALUES ('$nome', '$genero', '$nota', '$ano_lancamento')";

        $pdo->exec($sql);

        echo "<br>Jogo cadastrado com sucesso!";
    }
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

        <input type="text"
            id="nome" name="nome"
            placeholder="Digite o nome do jogo">

        <input type="text"
            id="genero" name="genero"
            placeholder="Digite o genero">
        
        <input type="number"
            id="nota" name="nota"
            placeholder="Digite a nota">

        <input type="number"
            id="ano_lancamento" name="ano_lancamento"
            placeholder="Digite o ano de lançamento">


        <button type="submit">Cadastrar</button>

    </form>
    
</body>
</html>
