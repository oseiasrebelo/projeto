<?php

// Informar qure a resposta será em JSON
header('Content-Type: application; charset=utf-8');

// Descobrir o método utilizado dentro da requizição
$metodo = $_SERVER['REQUEST_METHOD'];

// Lista de chamados de exemplo
$chamados = [
    [
        "id" => 1,
        "titulo" => "Compurador sem internet"
    ],
    [
        "id" => 2,
        "titulo" => "Impressora atolada"
    ]
];

//Verificar o metodo da requisição, e executar X ações
// Se GET:
if($metodo === 'GET') {

    //Define o codigo de status HTTP dessa requisição
    http_response_code(200);

    // Po que não precisa utilizar JSON_PRETTY_PRINT?
    //
    echo json_encode($chamados, JSON_UNESCAPED_UNICODE);

    exit;
}

// Se POST:
if ($metodo === 'POST') {
    // Lê o conteudo enviado no BODY na REQUISIÇÃO
    // php://input permiye ler o corpo bruto da requisição
    $conteudo = file_get_contents('php://input');

    //Converte JSON em ARRAY PHP
    $dados = ;

    //Verifica se os dados são validos
    if(
        !is_array($dados) || // o JSON nao foi convertido em um array
        !isset($dados['titulo']) || // O titulo nao foi informado ou é nulo
        !is_string($dados['titulo'] || // O titulo não é texto
        trim($dados['titulo']) === '') // O titulo esta vazio ou contem apenas espaços
    ) {
        http_response_code(400);
        echo json_decode(["erro" => "Título obrigatório"]);
    }

    // Simula a criação de um chamado novo
    $novoChamado = [
        "id" => 3,
        "titulo" => trim($dados['titulo'])
    ];

    http_response_code(201);

    echo json_decode($novoChamado, JSON_UNESCAPED_UNICODE);

    exit;

}

header('Allow: GET, POST');
http_response_code(405);

// COMANDOS NA VPS PARA TESTAR;



?>