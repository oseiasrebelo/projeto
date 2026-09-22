<?php
    $nome = "";
    $idade = 0;
    $nota1 = 0; $nota2 = 0; $nota3 = 0; $nota4 = 0; $nota5 = 0;
    $mediaNota = 0;
    $situacao = "";
    $frequencia = 0;
    $pontosFaltantes = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"] ?? 'Não informado';
        $idade = $_POST["idade"] ?? 'Não informada';
        
        $nota1 = floatval($_POST['nota1'] ?? 0);
        $nota2 = floatval($_POST['nota2'] ?? 0);
        $nota3 = floatval($_POST['nota3'] ?? 0);
        $nota4 = floatval($_POST['nota4'] ?? 0);
        $nota5 = floatval($_POST['nota5'] ?? 0);
        $frequencia = floatval($_POST['frequencia'] ?? 0);

     
        $mediaNota = (($nota1 * 2) + ($nota2 * 3) + ($nota3 * 1) + ($nota4 * 1) + ($nota5 * 3)) / 10;

     
        if ($frequencia < 75) {
            $situacao = "REPROVADO POR FREQUÊNCIA";
            if ($mediaNota < 7) {
                $pontosFaltantes = 7 - $mediaNota;
            }
        } else {
          
            if ($mediaNota == 10) {
                $situacao = "APROVADO COM EXCELÊNCIA";
            } elseif ($mediaNota >= 7) {
                $situacao = "APROVADO";
            } elseif ($mediaNota >= 5) {
                $situacao = "RECUPERAÇÃO";
                $pontosFaltantes = 7 - $mediaNota;
            } else {
                $situacao = "REPROVADO";
                $pontosFaltantes = 7 - $mediaNota;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas do Aluno</title>
    <link rel="stylesheet" href="notas.css">
</head>
<body>

    <a href="index.php">Voltar</a>

    <form method="POST">
        <input type="text" id="nome" name="nome" placeholder="Digite o nome do aluno" required>
        
        <input type="number" id="idade" name="idade" min="1" placeholder="Digite a idade" required
               oninvalid="this.setCustomValidity('Por favor, digite uma idade válida a partir de 1.')" oninput="this.setCustomValidity('')">

        <input type="number" id="nota1" name="nota1" placeholder="Digite a nota 1" step="0.1" min="0" max="10" required
               oninvalid="this.setCustomValidity('Por favor, digite uma nota válida entre 0 e 10.')" oninput="this.setCustomValidity('')">

        <input type="number" id="nota2" name="nota2" placeholder="Digite a nota 2" step="0.1" min="0" max="10" required
               oninvalid="this.setCustomValidity('Por favor, digite uma nota válida entre 0 e 10.')" oninput="this.setCustomValidity('')">

        <input type="number" id="nota3" name="nota3" placeholder="Digite a nota 3" step="0.1" min="0" max="10" required
               oninvalid="this.setCustomValidity('Por favor, digite uma nota válida entre 0 e 10.')" oninput="this.setCustomValidity('')">

        <input type="number" id="nota4" name="nota4" placeholder="Digite a nota 4" step="0.1" min="0" max="10" required
               oninvalid="this.setCustomValidity('Por favor, digite uma nota válida entre 0 e 10.')" oninput="this.setCustomValidity('')">

        <input type="number" id="nota5" name="nota5" placeholder="Digite a nota 5" step="0.1" min="0" max="10" required
               oninvalid="this.setCustomValidity('Por favor, digite uma nota válida entre 0 e 10.')" oninput="this.setCustomValidity('')">

        <input type="number" id="frequencia" name="frequencia" placeholder="Digite a frequência (%)" min="0" max="100" required
               oninvalid="this.setCustomValidity('Por favor, insira uma frequência válida entre 0% e 100%.')" oninput="this.setCustomValidity('')">

        <button type="submit">Enviar</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <div class="container">
            <h1>Nome: <?= htmlspecialchars($nome) ?></h1>
            <h1>Idade: <?= htmlspecialchars($idade) ?></h1>
            <h1>Média: <?= number_format($mediaNota, 2, ',', '.') ?></h1>
            <h1>Frequência: <?= htmlspecialchars($frequencia) ?>%</h1>
            <h1 class="situacao <?= 
                $situacao === 'APROVADO' || $situacao === 'APROVADO COM EXCELÊNCIA' ? 'aprovado' :
                ($situacao === 'RECUPERAÇÃO' ? 'recuperacao' : 'reprovado')
                ?>">
                <?= htmlspecialchars($situacao) ?>
            </h1>

            <?php if ($mediaNota < 7 && $pontosFaltantes > 0) { ?>
                <h1>Faltaram <?= number_format($pontosFaltantes, 1, ',', '.') ?> pontos para atingir a média 7.</h1>
            <?php } ?>
        </div>
    <?php } ?>

</body>
</html>


