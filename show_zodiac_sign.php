<?php include('layouts/header.php'); ?>

<?php
if (!isset($_POST['data_nascimento'])) {
    header('Location: index.php');
    exit;
}

$data_nascimento = new DateTime($_POST['data_nascimento']);
$dia_mes = $data_nascimento->format('d/m');

$signos = simplexml_load_file("signos.xml");
$signo_encontrado = null;

foreach ($signos->signo as $signo) {
    $data_inicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
    $data_fim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);
    
    // Criar uma data de nascimento sem ano para comparação
    $data_nasc_comparacao = DateTime::createFromFormat('d/m', $dia_mes);
    
    // Ajuste para o caso especial de Capricórnio (que atravessa o ano novo)
    if ((string)$signo->signoNome === 'Capricórnio') {
        if ($data_nasc_comparacao >= $data_inicio || $data_nasc_comparacao <= $data_fim) {
            $signo_encontrado = $signo;
            break;
        }
    } else {
        if ($data_nasc_comparacao >= $data_inicio && $data_nasc_comparacao <= $data_fim) {
            $signo_encontrado = $signo;
            break;
        }
    }
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="zodiac-card result-container">
                <?php if ($signo_encontrado): ?>
                    <h1 class="sign-name"><?= $signo_encontrado->signoNome ?></h1>
                    <p class="sign-date">
                        <?= $signo_encontrado->dataInicio ?> - <?= $signo_encontrado->dataFim ?>
                    </p>
                    <p class="sign-description">
                        <?= $signo_encontrado->descricao ?>
                    </p>
                <?php else: ?>
                    <h1 class="text-center text-danger">Signo não encontrado</h1>
                    <p class="text-center">Houve um erro ao processar sua data de nascimento.</p>
                <?php endif; ?>
                
                <div class="text-center mt-4">
                    <a href="index.php" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>