<?php

//READ - Ler todos os chamados
function lerChamados(){
    $arquivo = __DIR__ . "/../chamados.json";

    if(!file_exists($arquivo)){
        file_put_contents($arquivo, "[]");
    }

    //Ler o arquivo
    $conteudo = file_get_contents($arquivo);

    // Converter o JSON para ARREY PHP
    $chamados = json_decode($conteudo, true);

    return is_array($chamados) ? $chamados : [];

}

//Salvar os chamados no JSON
function salvarChamados ($chamados){
    $arquivo = __DIR__ . "/../chamados.json";

    return file_put_contents(
        $arquivo, json_encode($chamados,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        )
    ) !== false;

}

//CREATE - Cadastrar chamados
function cadastrarChamados(
    $nome,
    $setor,
    $equipamento,
    $descricao,
    $prioridade){
        if (trim($nome) === "" || trim($descricao) === ""){
            return false;
        }

        $chamados = lerChamados();

        $novoChamado = [
            "nome" => trim($nome),
            "setor" =>$setor,
            "equipamento" => $equipamento,
            "descricao" => trim($descricao),
            "prioridade" =>$prioridade,
            "status" => "Aberto",

        ];

        $chamados[] = $novoChamado;

        return salvarChamados($chamados);

}



//UPDATE - Atualizar status do chamado
function atualizarChamados($posicao, $novoStatus){
    $chamados = lerChamados();

    $statusPermitidos = [
        "Aberto",
        "Em andamento",
        "Resolvido"
    ];

    //isset() verifica se uma variavel ou posição existe e nao contem null.
    // o ! inverte o resultado
    //portanto: "se nao existir um chamado naquela posição,
    //encerra a função retornando false

    if (!isset($chamados[$posicao])){
        return false;
    }

    // in_array () verifica se um valor existe dentro de um array
    //Nesse caso
    // 

    if (!in_array($novoStatus, $statusPermitidos, true)){
        return false;
    }

    $chamados[$posicao]["status"] = $novoStatus;

    return salvarChamados($chamados);

}

//DELETE - excluir chamados
function excluirChamados($posicao) {
    $chamados = lerChamados();

    if (!isset($chamados[$posicao])){
        return false;
    }

    unset($chamados[$posicao]);

    $chamados = array_values($chamados);

    return salvarChamados($chamados);

}

//RELATORIO DE ATENDIMANTOS
function gerarRelatorio(){
    $chamados = lerChamados();

    $relatorio = [
        "total" => count($chamados),
        "abertos" => 0,
        "andamento" => 0, 
        "resolvidos" => 0,
    ];

    foreach ($chamados as $chamado) {
        if ($chamado["status"] === "Aberto") {
            $relatorio["abertos"]++;
        } elseif ($chamado["status"] === "em andamento") {
            $relatorio["andamento"]++;
        } elseif($chamado ["status"] === "Resolvido"){
            $relatorio["resolvidos"]++;
        }
    }

    return $relatorio;


}

?>