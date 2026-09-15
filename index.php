<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $nome = "Agatha";
        $idade = 50;
    
       
        if ($idade <= 18) {
            $resposta = "$é menor de idade.";
        }
        else {
            $resposta = "$é maior de idade.";
        }     
        ?>

<div class="container">

        <h1> Nome: <?=$nome ?></h1>
        <h1> Idade: <?=$idade ?></h1>
        <p> <?=$nome?> é <?=$resposta ?></p>
    </div>
        
</body>
</html>