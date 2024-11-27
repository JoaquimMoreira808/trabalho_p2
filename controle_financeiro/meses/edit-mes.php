<?php
session_start();
require_once('../conexao.php');

$mes = [];

if (!isset($_GET['id'])) {
    header('Location: index.php');
} else {
    $mesId = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM categoria WHERE id = '{$mesId}'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $categoria = mysqli_fetch_array($query);
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body style="background-color: black;">
    <div class="px-3 py-2 text-bg-dark border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/controle_financeiro/index.php" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                    <i class="bi bi-cash-coin" style="margin-right: 15px;font-size: 22px;"></i>
                    <span style="font-size: 20px;font-weight: bold;">Controle Financeiro</span>
                </a>
                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li style="height: fit-content;">
                        <a href="/controle_financeiro/movimentacoes/list-movimentacao.php" class="nav-link text-white" style="display: flex;align-items: center;">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24"></svg>Movimentações
                        </a>
                    </li>
                    <li style="height: fit-content;">
                        <a href="/controle_financeiro/categorias/list-categoria.php" class="nav-link text-white" style="display: flex;align-items: center;">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24"></svg>Categorias
                        </a>
                    </li>
                    <li style="height: fit-content;">
                        <a href="/controle_financeiro/meses/list-mes.php" class="nav-link text-white" style="display: flex;align-items: center;">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24"></svg>Meses
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Editar Meses <i class="bi bi-card-list"></i>
                            <a href="/controle_financeiro/meses/list-mes.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="update-mes.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $mes['id']; ?>">
                            <div class="mb-3">
                                <label for="mes" class="form-label">Mes</label>
                                <select name="txtMeses" id="txtMeses" class="form-select">
                                    <option value="Janeiro" <?php if ($mes['mes'] == 'Janeiro') { echo 'Janeiro';}?>>Janeiro</option>
                                    <option value="Fevereiro" <?php if ($mes['mes'] == 'Fevereiro') { echo 'Fevereiro';}?>>Fevereiro</option>
                                    <option value="Março" <?php if ($mes['mes'] == 'Março') { echo 'Março';}?>>Março</option>
                                    <option value="Abril" <?php if ($mes['mes'] == 'Abril') { echo 'Abril';}?>>Abril</option>
                                    <option value="Maio" <?php if ($mes['mes'] == 'Maio') { echo 'Maio';}?>>Maio</option>
                                    <option value="Junho" <?php if ($mes['mes'] == 'Junho') { echo 'Junho';}?>>Junho</option>
                                    <option value="Julho" <?php if ($mes['mes'] == 'Julho') { echo 'Julho';}?>>Julho</option>
                                    <option value="Agosto" <?php if ($mes['mes'] == 'Agosto') { echo 'Agosto';}?>>Agosto</option>
                                    <option value="Setembro" <?php if ($mes['mes'] == 'Setembro') { echo 'Setembro';}?>>Setembro</option>
                                    <option value="Outubro" <?php if ($mes['mes'] == 'Outubro') { echo 'Outubro';}?>>Outubro</option>
                                    <option value="Novembro" <?php if ($mes['mes'] == 'Novembro') { echo 'Novembro';}?>>Novembro</option>
                                    <option value="Dezembro" <?php if ($mes['mes'] == 'Dezembro') { echo 'Dezembro';}?>>Dezembro</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ano" class="form-label">Ano</label>
                                <input type="number" name="txtAno" id="ano" class="form-control" value="<?php echo $mes['ano']; ?>">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Atualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>