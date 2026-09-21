<?php
    $nome = "";
    $idade = 0;
    $nota1 = 0;
    $nota2 = 0;
    $nota3 = 0;
    $nota4 = 0;
    $nota5 = 0;
    $resultado = "";
    $mediaNota ="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $idade = $_POST["idade"];

        if ($idade < 18) {
            $resultado = "menor de idade.";
        } else {
            $resultado = "maior de idade.";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nome e Idade</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<a href="index.php">voltar</a>

    <form method="POST">

        <input type="text" id="nome" name="nome" placeholder="Digite seu nome">

        <input type="number" id="idade" name="idade" placeholder="Digite sua idade">

        <input type="number" id="nota1" name="nota1" placeholder="Digite a nota 1">

        <input type="number" id="nota2" name="nota2" placeholder="Digite a nota 2">

        <input type="number" id="nota3" name="nota3" placeholder="Digite a nota 3">

        <input type="number" id="nota4" name="nota4" placeholder="Digite a nota 4">

        <input type="number" id="nota5" name="nota5" placeholder="Digite a nota 5">

        <button type="submit">Enviar</button>

    </form>

    <?php if ($resultado != "") { ?>

        <div class="container">

            <h1>Nome: <?= $nome ?></h1>

            <h1>Idade: <?= $idade ?></h1>

            <p><?= $nome ?> é <?= $resultado ?></p>

            <h1>Media das notas: <?= $mediaNota ?></h1>

        </div>

    <?php } ?>

</body>
</html>

