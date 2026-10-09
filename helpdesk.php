<?php

$caminho = __DIR__ . "/chamados.json";

  // 2. Abrir/ler o arquivo json
    $json = file_get_contents($caminho);

  // 3. Transformar json em array php
    $chamados = json_decode($json, true);

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $acao = $_POST["acao"];

        if ($acao === "criar") {

            // 4. Criar um chamado
                $novoChamado = [
                "nome" => $_POST["nome"],
                "setor" => $_POST["setor"],
                "equipamento" => $_POST["equipamento"],
                "descricao" => $_POST["descricao"],
                "prioridade" => $_POST["prioridade"],
                "status" => $_POST["status"]
                ];

            // 5. Adicionar o chamado no array
            $chamados[] = $novochamado;

      // 6. Transformar array php em json
            $jsonAtualizado = json_encode($chamados,
                JSON_PRETTY_PRINT |
                JSON_UNESCAPED_UNICODE  
            );
    
    // 7. SALVAR O ARQUIVO
            file_put_contents($caminho, $jsonAtualizado);
    
            echo "DADOS REGISTRADOS EM dados.json";
        }
    }   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>NOVO CHAMADO</h2>

    <form method="POST">
        <label>Nome do funcionário: </label>
        <input type="text" id="nome" name="nome"><br>
        
        <label>Setor da empresa: </label>
        <input type="text" id="setor" name="setor"><br>
        
        <label>Equipamento afetado: </label>
        <input type="text" id="equipamento" name="equipamento"><br>

        <label>Descrição do problema: </label>
        <input type="text" id="descrição" name="descrição"><br>

        <label>Prioridade: </label>
        <input type="text" id="prioridade" name="prioridade"><br>

        <label>Status: Aberto </label><br>
        
        <button type="submit">Criar chamado</button>

        <h2>CHAMADOS REALIZADOS</h2>
        <?php foreach($chamados as $chamado) {?>
        <h3><?= $chamado["nome"] ?></h3>
        <p>Setor: <?= $chamado["setor"] ?></p>
        <p>Equipamento afetado: <?= $chamado["equipamento"] ?></p>
        <p>Descrição do problema: <?= $chamado["descrição"] ?></p>
        <p>Prioridade: <?= $chamado["prioridade"] ?></p>
        <p>Status atual: <?= $chamado["status"] ?></p>

  <?php } ?>
    </form>
    
</body>
</html>