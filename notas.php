<?php
    $nome = "";
    $idade = 0;
    $nota1 = 0;
    $nota2 = 0;
    $nota3 = 0;
    $nota4 = 0;
    $nota5 = 0;
    $mediaNota = 0;
    $situacao = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        $nome = $_POST["nome"];
        $idade = $_POST["idade"];

        $nota1 = $_POST["nota1"];
        $nota2 = $_POST["nota2"];
        $nota3 = $_POST["nota3"];
        $nota4 = $_POST["nota4"];
        $nota5 = $_POST["nota5"];

        $mediaNota = (
            ($nota1 * 2) +
            ($nota2 * 3) +
            ($nota3 * 1) +
            ($nota4 * 1) +
            ($nota5 * 3)
        ) / 10;

        if ($mediaNota >= 7) {
            $situacao = "APROVADO";
        } elseif ($mediaNota >= 5) {
            $situacao = "RECUPERAÇÃO";
        } else {
            $situacao = "REPROVADO";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Notas do Aluno</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <a href="index.php">Voltar</a>

    <form method="POST">

        <input
            type="text"
            id="nome"
            name="nome"
            placeholder="Digite o nome do aluno"
            required
        >

        <input
            type="number"
            id="idade"
            name="idade"
            placeholder="Digite a idade"
            required
        >

        <input
            type="number"
            id="nota1"
            name="nota1"
            placeholder="Digite a nota 1"
            step="0.1"
            required
        >

        <input
            type="number"
            id="nota2"
            name="nota2"
            placeholder="Digite a nota 2"
            step="0.1"
            required
        >

        <input
            type="number"
            id="nota3"
            name="nota3"
            placeholder="Digite a nota 3"
            step="0.1"
            required
        >

        <input
            type="number"
            id="nota4"
            name="nota4"
            placeholder="Digite a nota 4"
            step="0.1"
            required
        >

        <input
            type="number"
            id="nota5"
            name="nota5"
            placeholder="Digite a nota 5"
            step="0.1"
            required
        >

        <button type="submit">Enviar</button>

    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>

        <div class="container">

            <h1>Nome: <?= $nome ?></h1>

            <h1>Idade: <?= $idade ?></h1>

            <h1>
                Média: <?= number_format($mediaNota, 2, ',', '.') ?>
            </h1>

            <h1>
                Situação: <?= $situacao ?>
            </h1>

        </div>

    <?php } ?>

</body>

</html>
