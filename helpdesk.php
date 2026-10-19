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

    if ($acao === "excluir") {
        //o int é uma coversão de tipo, tambem chamada de type casting.
        //Ele tenta transformar o valor em um numero inteiro.
        $sucesso = excluirChamados((int) ($_POST["posicao"] ?? -1));

        $mensagem = $sucesso ? "Chamado excluido!" : "Não foi possível excluir.";
    }

}

$chamados = lerChamados();
$relatorio = gerarRelatorio();

//Evita exibir HTML enviado pelo usuario
function escapar($valor) {
    return htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Helpdesk</title>
</head>
<body>

    <?php if (!empty($mensagem)): ?>
        <p><strong><?= escapar($mensagem) ?></strong></p>
    <?php endif; ?>

    <h2>NOVO CHAMADO</h2>

    <form method="POST">

        <!-- Envia o parâmetro acao necessário para o PHP -->
        <input type="hidden" name="acao" value="cadastrar">

        <label for="nome">Nome do funcionário: </label>
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

        <label for="descricao">Descrição do problema: </label>
        <input type="text" id="descricao" name="descricao"><br>

        <label for="prioridade">Prioridade:</label>
            <select id="prioridade" name="prioridade">
                <option value="baixa">Baixa</option>
                <option value="média">Média</option>
                <option value="alta">Alta</option>
            </select><br>
        
        <button type="submit">Criar chamado</button>

        
    </form>

    <h2>CHAMADOS REALIZADOS</h2>

    <?php foreach($chamados as $chamado): ?>
        <div>
            <h3><?= escapar($chamado["nome"] ?? "") ?></h3>
            <p>Setor: <?= escapar($chamado["setor"] ?? "") ?></p>
            <p>Equipamento afetado: <?= escapar($chamado["equipamento"] ?? "") ?></p>
            <p>Descrição do problema: <?= escapar($chamado["descricao"] ?? "") ?></p>
            <p>Prioridade: <?= escapar($chamado["prioridade"] ?? "") ?></p>
            <p>Status atual: <?= escapar($chamado["status"] ?? "") ?></p>
        </div>
        <hr>
    <?php endforeach; ?>
    
</body>
</html>