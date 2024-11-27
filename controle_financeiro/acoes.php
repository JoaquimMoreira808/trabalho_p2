<?php
session_start();
require_once('conexao.php');


//AÇÕES DE CATEGORIA
if (isset($_POST['CreateCategoria'])) {
    $nome = trim($_POST['txtNome']);

    $sql = "INSERT INTO categoria (nome) VALUES('$nome')";

    mysqli_query($conn, $sql);

    header('Location: /controle_financeiro/categorias/list-categoria.php');
    exit();
}

if(isset($_POST['EditCategoria'])) {
    $id = $_POST['id'];
    $nome = trim($_POST['txtNome']);

    $sql = "UPDATE categoria SET nome = '$nome' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Categoria atualizada com sucesso!";
        $_SESSION['type'] = 'success';

        header('Location: /controle_financeiro/categorias/list-categoria.php');
        exit;
    }
}

if(isset($_POST['DeleteCategoria'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM categoria WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Categoria excluida com sucesso!";
        $_SESSION['type'] = 'success';

        header('Location: /controle_financeiro/categorias/list-categoria.php');
        exit;
    }
}


//AÇÕES DE TRANSAÇÃO
if (isset($_POST['CreateTransacao'])) {

    $descricao = mysqli_real_escape_string($conn, trim($_POST['TxtDescricao']));
    $categoria_id = mysqli_real_escape_string($conn, $_POST['Categoria']); 
    $data_transacao = mysqli_real_escape_string($conn, $_POST['DataTransacao']);
    $tipo = mysqli_real_escape_string($conn, $_POST['TxtTipo']);
    $valor = mysqli_real_escape_string($conn, $_POST['IntValor']);

    // Insere a transação na tabela 'movimentacao'
    $sql = "INSERT INTO movimentacao (descricao, categoria_id, data_da_transacao, valor) 
            VALUES ('$descricao', '$categoria_id', '$data_da_transacao', '$valor')";

    // Verifica se a inserção foi bem-sucedida
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Transação adicionada com sucesso!";
        $_SESSION['type'] = 'success';

        header('Location: /controle_financeiro/movimentacoes/list-movimentacao.php');
        exit;
    }
}

if(isset($_POST['DeleteTransacao'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM movimentacao WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Transação excluida com sucesso!";
        $_SESSION['type'] = 'success';

        header('Location: /controle_financeiro/movimentacoes/list-movimentacao.php');
        exit;
    }
}

if(isset($_POST['EditTransacao'])) {
    $id = $_POST['id']; 
    $descricao = mysqli_real_escape_string($conn, trim($_POST['TxtDescricao']));
    $categoria_id = mysqli_real_escape_string($conn, $_POST['Categoria']); 
    $data_transacao = mysqli_real_escape_string($conn, $_POST['DataTransacao']);
    $tipo = mysqli_real_escape_string($conn, $_POST['TxtTipo']);
    $valor = mysqli_real_escape_string($conn, $_POST['IntValor']);

    $sql = "UPDATE movimentacao SET descricao = '$descricao', categoria_id = '$categoria_id', data_da_transacao = '$data_transacao', valor = '$valor' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Transação atualizada com sucesso!";
        $_SESSION['type'] = 'success';

        header('Location: /controle_financeiro/movimentacoes/list-movimentacao.php');
        exit;
    }
}

//AÇÕES DE MES
if (isset($_POST['CreateMes'])) {
    $mes = trim($_POST['txtMes']);
    $ano = trim($_POST['txtAno']);

    $sql = "INSERT INTO mes (mes, ano) VALUES('$mes', '$ano')";

    mysqli_query($conn, $sql);

    header('Location: /controle_financeiro/meses/list-mes.php');
    exit();
}

if(isset($_POST['EditMes'])) {
    $id = $_POST['id'];
    $mes = trim($_POST['txtMes']);
    $ano = trim($_POST['txtAno']);

    $sql = "UPDATE mes SET mes = '$mes', ano = '$ano' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Mes atualizado com sucesso!";
        $_SESSION['type'] = 'success';

        header('Location: /controle_financeiro/meses/list-mes.php');
        exit;
    }
}        

if(isset($_POST['DeleteMes'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM mes WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Mes excluido com sucesso!";
        $_SESSION['type'] = 'success';

        header('Location: /controle_financeiro/meses/list-mes.php');
        exit;
    }
}


?>