<?php
    $nome = "";
    $idade = 0;
    $resultado = "";

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

<a href="notas.php">notas</a>

    <form method="POST">

        <input type="text" id="nome" name="nome" placeholder="Digite seu nome">

        <input type="number" id="idade" name="idade" placeholder="Digite sua idade">

        <button type="submit">Enviar</button>

    </form>

    <?php if ($resultado != "") { ?>

        <div class="container">

            <h1>Nome: <?= $nome ?></h1>

            <h1>Idade: <?= $idade ?></h1>

            <p><?= $nome ?> é <?= $resultado ?></p>

        </div>

    <?php } ?>

</body>
</html>

