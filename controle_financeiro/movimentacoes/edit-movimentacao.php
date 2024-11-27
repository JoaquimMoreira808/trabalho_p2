<?php

session_start();
require_once('../conexao.php');

$movimentacao = [];

if (!isset($_GET['id'])) {
    header('Location: index.php');
} else {
    $movimentacaoId = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM categoria WHERE id = '{$movimentacaoId}'";
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
                            Editar Movimentação <i class="bi bi-card-list"></i>
                            <a href="/controle_financeiro/movimentacoes/list-movimentacao.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($movimentacao) :
                        ?>
                        <form action="update-movimentacao.php" method="POST">
                            <input type="hidden" name="id" value="<?= $movimentacao['id']; ?>">
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição</label>
                                <input type="text" name="txtDescricao" id="descricao" class="form-control" value="<?= $movimentacao['descricao']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="valor" class="form-label">Valor</label>
                                <input type="number" name="txtValor" id="valor" class="form-control" step="0.01" value="<?= $movimentacao['valor']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="data" class="form-label">Data</label>
                                <input type="date" name="txtData" id="data" class="form-control" value="<?= $movimentacao['data']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoria</label>
                                <select name="txtCategoria" id="categoria" class="form-select">
                                    <option value="">Selecione uma Categoria</option>
                                    <?php
                                    foreach ($categorias as $categoria) :
                                    ?>
                                    <option value="<?= $categoria['id']; ?>" <?= $categoria['id'] == $movimentacao['categoria_id'] ? 'selected' : ''; ?>><?= $categoria['nome']; ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tipo" class="form-label">Tipo</label>
                                <select name="txtTipo" id="tipo" class="form-select">
                                    <option value="Entrada" <?= $movimentacao['tipo'] == 'Entrada' ? 'selected' : ''; ?>>Entrada</option>
                                    <option value="Saida" <?= $movimentacao['tipo'] == 'Saida' ? 'selected' : ''; ?>>Saida</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                        <?php
                        else:
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Categoria não encontrada
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>