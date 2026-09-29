<?php

// dados para conecção MySQL
$host = "localhost";
$banco = "oseias315";
$usuario = "oseias315";
$senha = "315!@#";

// pdh = 
// PDO = php Data Objects - Ferramenta php para conversar com o banco de dados
// new = criar um novo objeto

try {
    $pdo = new POD("mysql:host=$host;dbname=$banco;
    charset=utf8mb4", $usuario, $senha);

    // serve para puxar algo que pertence aquele objeto
    // PDO::ATTR_ERRNODE - É PRA CONFIGURAR O MODO DE ERROS DE PDO
    // PDO::ERRNODE_EXCEPTION - pra quando acontecer algum erro, transformar em execção

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION

    );

    echo "Conectado com sucesso";
    // PDOException $erro = retorbar o erro
} catch (PDOException $erro){
    echo "Erro ao executar:".$erro->getMessage();

}
?>