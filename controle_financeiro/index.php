<?php
session_start();
require_once("conexao.php");

$sql = "SELECT * FROM categoria";
$categorias = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle Financeiro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body style="background-color: black;">
<div class="px-3 py-2 text-bg-dark border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
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
    <h2>Categorias</h2>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($categorias) > 0) {
                while ($categoria = mysqli_fetch_assoc($categorias)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($categoria['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($movimentacao['valor']) . "</td>";
                    echo "<td>
                            <a href='editar_categoria.php?id=" . $categoria['id'] . "' class='btn btn-sm btn-dark'>Editar</a>
                            <a href='excluir_categoria.php?id=" . $categoria['id'] . "' class='btn btn-sm btn-danger'>Excluir</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3' class='text-center'>Nenhuma categoria encontrada.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
