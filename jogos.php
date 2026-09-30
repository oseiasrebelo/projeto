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

    $sql = "ALTER TABLE jogos ( 
            ADD COLUMN ano_lancamento INT)";
            $pdo->exec($sql);



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"] ?? 'Não informado';
        $genero = $_POST["genero"] ?? 'Não informada';
        $nota = $_POST["nota"] ?? 'Não informada';

    
        $sql = "INSERT INTO jogos (nome, genero, nota)
        VALUES ('$nome', '$genero', '$nota')";

        $pdo->exec($sql);

        echo "<br>Jogo cadastrado com sucesso!";
    }
    //buscar todos os jogos registrados

    $buscar = "SELECT * FROM jogos";

    //exec() = executa algo quando você não precisa receber registros de volta
    //query() = executa uma consulta quando você quer receber dados de volta

    $stmt = $pdo->query($buscar);
    // fetchall = buscar todos
    //FEtch_assoc = Pedir em formado json
    $jogos = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <a href="index.php">Voltar para o menu</a>

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


        <button type="submit">Cadastrar</button>

    </form>

    <h2>JOGOS CADASTRADOS<h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Gênero</th>
            <th>Nota</th>

        </tr>
        <!--Para cada item, gerar alguma coisa -->
        <?php foreach($jogos as $jogo) { ?>

            <tr>
                <td><?= $jogo["id"] ?></td>
                <td><?= $jogo["nome"] ?></td>
                <td><?= $jogo["genero"] ?></td>
                <td><?= $jogo["nota"] ?></td>

            </tr>


        <?php } ?>

    </table>
    
</body>
</html>
