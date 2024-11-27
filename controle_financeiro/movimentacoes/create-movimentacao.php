<?php
    // Conectar ao banco de dados
    require_once("../conexao.php");

    // Consulta para recuperar as categorias
    $sqlCategorias = "SELECT * FROM categoria";
    $resultCategorias = mysqli_query($conn, $sqlCategorias);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar - Transação</title>
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
                            Adicionar Transação <i class="bi bi-credit-card-fill"></i>
                            <a href="/controle_financeiro/movimentacoes/list-movimentacao.php" class="btn btn-light float-end"> <i class="bi bi-arrow-return-left"></i></a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="../acoes.php" method="POST">
                            <div class="mb-3">
                                <label for="TxtDescricao">Descrição</label>
                                <input type="text" name="TxtDescricao" id="TxtDescricao" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="Categoria">Categoria</label>
                                <select name="Categoria" id="Categoria" class="form-control" required>
                                    <option value="">Selecione uma Categoria</option>
                                    <?php
                                        while ($categoria = mysqli_fetch_assoc($resultCategorias)) {
                                            echo "<option value='" . $categoria['id'] . "'>" . $categoria['nome'] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="TxtTipo">Tipo</label>
                                <select name="TxtTipo" id="TxtTipo" class="form-control" required>
                                    <option value="Entrada">Entrada</option>
                                    <option value="Saida">Saída</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="DataTransacao">Data da Transação</label>
                                <input type="date" name="DataTransacao" id="DataTransacao" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="IntValor">Valor</label>
                                <input type="number" name="IntValor" id="IntValor" class="form-control" step="0.01" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="CreateTransacao" class="btn btn-dark float-end">Salvar</button>
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
