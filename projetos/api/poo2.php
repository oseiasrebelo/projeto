<?php
//  SISTEMA DE CONTROLE DE PRODUÇÃO INDUSTRIAL

// 1. CLASSE ABSTRATA
abstract class Maquina {
    public $nome;
    private $producao;

    public function __construct($nome)
    {
        $this->nome = $nome;
        $this->producao = 0;
        
    }

    // ENCAPSULAMENTO - GETTER
    public function getProducao() {
        return $this->producao;
    }

    // ENCAPSULAMENTO - ALTERAÇÃO CONTROLADA
    public function registrarProducao($quantidade) {
        if ($quantidade <= 0 ) {
            return false;
        }    

        $this->producao += $quantidade;
        return true;
    
    }

    // ABSTRAÇÃO
    abstract public function operar();

}

// 2. HERANÇA
class Esteira extends Maquina {
    public function operar() {
        return "Tranportando peças...";
    }
}

class EPrensa extends Maquina {
    public function operar() {
        return "Prensando peças...";
    }
}

class RoboSoldagem extends Maquina {
    public function operar() {
        return "Soldadndo peças...";
    }
}

// 3. SESSÃO = ARMEZENAMENTO TEMPORÁRIO

if (!isset($_SESSION["mauinas"])) {
    $_SESSION["maquinas"] = [];
}

$mensagem = "";

// 4. RECEBER FORMULARIO VIA POST

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"] ?? "";
    $tipo = $_POST["tipo"] ?? "";
    $quantidade = $_POST["quantidade"] ?? null;

    if (
        $nome === "" ||
        $quantidade === false ||
        $quantidade <= 0
    ) {
        $mensagem = "Preencha os campos corretamente!";
    } else {
        //CRIANDO OBSJETOS COM BASE NO FORMULARIO
        if ($tipo === "esteira") {
            $maquina = new Esteira($nome);
        } elseif ($tipo === "prensa") {
            $maquina = new Prensa($nome);
        } elseif ($tipo === "roboSoldade") {
            $maquina = new RoboSoldagem($nome);
}

        //EXECUTANDO OS METODOS DO OBJETO
        $maquina->registrarProducao($quantidade);

        // GUARDANDO O OBJETO NA SESSÃO
        $_SESSION["maquina"][] = $maquina;

        $mensagem = "Maquina cadastrada com sucesso";
    }

}

// EVITAR INTERPRETAR TEXTOS COMO HTML
function escapar($texto) {
    return htmlspecialchars(
        (string) $texto,
        ENT_QUOTES,
        "utf-8";
    )
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
    
</body>
</html>