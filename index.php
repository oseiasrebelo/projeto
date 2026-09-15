<?php
    $nome="";
    $idade=0;
    $resultado="";
    
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $nome = $_POST["nome"];
        $idade = $_POST["idade"];

        if ($idade <= 18) {
            $resultado = "menor de idade.";
        }
        else {
            $resultado = "maior de idade.";
        }

    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        
    <form method="POST">
        <input type="text" id="nome" name="nome">

        

    <?php if($resultado != "") {?>
        <p> <?=$nome?> é <?=$resultado ?></p>     

    <?php } ?>

    </form>

    



<div class="container">

        <h1> Nome: <?=$nome ?></h1>
        <h1> Idade: <?=$idade ?></h1>
      
    </div>

        
</body>
</html>

