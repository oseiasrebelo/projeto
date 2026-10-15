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

}

//DELETE - excluir chamados
function excluirChamados(){

}

//RELATORIO DE ATENDIMANTOS
function gerarRelatorio(){

}

?>