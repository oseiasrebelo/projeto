<?php

  // 1. DECLARAR O CAMINHO DO ARQUIVO JSON
    $caminho = __DIR__ . "/dados.json";

  // 2. Abrir/ler o arquivo json
    $json = file_get_contents($caminho);

  // 3. Transformar json em array php
    $alunos = json_decode($json, true);

  if($_SERVER["REQUEST_METHOD"] == "POST"){

  // 4. Criar um aluno
    $novoAluno = [
    "nome" => $nome = $_POST["nome"],
    "idade" => $idade = $_POST["idade"],
    "curso" => $curso = $_POST["curso"]
    ];

  // 5. Adicionar o aluno no array
    $alunos[] = $novoAluno;

  // 6. Transformar array php em json
    $jsonAtualizado = json_encode($alunos,
    JSON_PRETTY_PRINT |
    JSON_UNESCAPED_UNICODE  
);

// 7. SALVAR O ARQUIVO
    file_put_contents($caminho, $jsonAtualizado);

    echo "DADOS REGISTRADOS EM dados.json";
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
  <form method="post">
    <label>Nome: </label>
    <input type="text" id="nome" name="nome" placeholder="Digite seu nome">
    <label>Idade: </label>
    <input type="text" id="idade" name="idade" placeholder="Digite sua idade">
    <label>Curso: </label>
    <input type="text" id="curso" name="curso" placeholder="Digite seu curso">
    
</body>
</html>