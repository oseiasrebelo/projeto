<?php

require_once "helpdesk.php"  ;

$mensagem = "";
    //Identificar a operação solicitada
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //O operador ?? é chamado de operador de coalescencia nula.
    // Ele significa:
        //"Utilize o valor da esquerda, se ele existir e nao for nulo.
        //caso contrario, utilize o valor da direita"
    $acao = $_POST["acao"]?? "";


    if ($acao === "cadastrar") {
        $sucesso = cadastrarChamados(
            $_POST["nome"] ?? "",
            $_POST["setor"] ?? "",
            $_POST["equipamento"] ?? "",
            $_POST["descricao"] ?? "",
            $_POST["prioridade"] ?? ""
        );

        $mensagem = $sucesso ? "Chamado cadastrado som sucesso!" :
        "Erro ao cadastrar. Verifique os dados";
    }

    if ($acao === "atualizar") {
        $sucesso = atualizarChamados(
            (int) ($_POST["posicao"] ?? -1),
            $_POST["status"] ?? ""
        );

        $mensagem = $sucesso ? "Status atualizado!" : "Não foi possível atualizar.";
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
        
        <label for="setor">Setor:</label>
            <select id="setor" name="setor">
                <option value="produção">Produção</option>
                <option value="administrativo">Administrativo</option>
                <option value="logístico">Logístico</option>
                <option value="finaceiro">Finaceiro</option>
                <option value="Ti">TI</option>
                </select><br>
        
        <label for="equipamento">Equipamento afetado:</label>
            <select id="equipamentor" name="equipamento">
                <option value="computador">Computador</option>
                <option value="impressora">Impressora</option>
                <option value="rede">Rede</option>
                <option value="sistema">Sistema</option>
                <option value="outros">Outros</option>
            </select><br>

        <label>Descrição do problema: </label>
        <input type="text" id="descrição" name="descrição"><br>

        <label for="prioridade">Prioridade:</label>
            <select id="prioridade" name="prioridade">
                <option value="baixa">Baixa</option>
                <option value="média">Média</option>
                <option value="alta">Alta</option>
            </select><br>

            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="aberto">Aberto</option>
            </select><br>
        
        <button type="submit">Criar chamado</button>

        <h2>CHAMADOS REALIZADOS</h2>

        <?php foreach($chamados as $chamado) {?>
            <h3><?= $chamado["nome"] ?></h3>
            <p>Setor: <?= $chamado["setor"] ?></p>
            <p>Equipamento afetado: <?= $chamado["equipamento"] ?></p>
            <p>Descrição do problema: <?= $chamado["descrição"] ?></p>
            <p>Prioridade: <?= $chamado["prioridade"] ?></p>
            <p>Status atual: <?= $chamado["status"] ?>


        <?php } ?>
    </form>
    
</body>
</html>