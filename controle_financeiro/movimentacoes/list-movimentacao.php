<?php
session_start();
require_once("../conexao.php");

$sql = "SELECT * FROM movimentacao";
$categorias = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentações</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
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
                            Lista de Movimentações <i class="bi bi-card-list"></i>
                            <a href="/controle_financeiro/index.php" class="btn btn-danger float-end">Voltar</a>
                            <a href="create-movimentacao.php" class="btn btn-primary float-end" style="margin-right: 10px;">Adicionar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php include('../mensagem.php'); ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Descrição</th>
                                    <th>Tipo</th>
                                    <th>Valor</th>
                                    <th>Data</th>
                                    <th>Categoria</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categorias as $categoria): ?>
                                    <tr>
                                        <td><?php echo $categoria['id']; ?></td>
                                        <td><?php echo $categoria['descricao']; ?></td>
                                        <td><?php echo $categoria['tipo']; ?></td>
                                        <td><?php echo $categoria['valor']; ?></td>
                                        <td><?php echo $categoria['data_da_transacao']; ?></td>
                                        <td><?php echo $categoria['categoria_id']; ?></td>
                                        <td><a href="edit-movimentacao.php?id=<?php echo $categoria['id']; ?>" class="btn btn-success">Editar</a> <a href="delete-movimentacao.php?id=<?php echo $categoria['id']; ?>" class="btn btn-danger">Excluir</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>