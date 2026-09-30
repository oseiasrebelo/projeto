<?php
    $usuario = "";
    $senha = 0;
    $resultado = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];

        if ($senha == 123 and $usuario == "usuario") {
            $resultado = "Login realisado com sucesso!";
        } else {
            $resultado = "Usuário ou senha incorretos!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-basico</title>
    <link rel="stylesheet" href="login-basico.css">
</head>
<body>
    <a href="index.php">Voltar</a>
    
    <form method="POST">

        <input type="text" id="usuario" name="usuario" placeholder="Digite o usuário">

        <input type="number" id="senha" name="senha" placeholder="Digite a senha">

        <button type="submit">Enviar</button>

    </form>
    <?php if ($resultado != "") { ?>

        <div class="container">
            
            <p><?= $nome ?> <?= $resultado ?></p>

        </div>

<?php } ?>
    
</body>
</html>

<!-- no GET, o URL mostra os dados de usuario e senha: "login-basico.php?usuario=usuario&senha=123"
 Enquanto que no POST, apenas:"login-basico.php"