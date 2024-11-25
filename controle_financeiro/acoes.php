<?php
session_start();
require_once('conexao.php');

if (isset($_POST['CreateCategoria'])) {
    $nome = trim($_POST['txtNome']);

    $sql = "INSERT INTO categoria (nome) VALUES('$nome')";

    mysqli_query($conn, $sql);

    header('Location: index.php');
    exit();
}

if (isset($_POST['CreateTransacao'])) {

    $descricao = mysqli_real_escape_string($conn, trim($_POST['TxtDescricao']));
    $categoria_id = mysqli_real_escape_string($conn, $_POST['Categoria']); 
    $data_transacao = mysqli_real_escape_string($conn, $_POST['DataTransacao']);
    $valor = mysqli_real_escape_string($conn, $_POST['IntValor']);

    // Insere a transação na tabela 'movimentacao'
    $sql = "INSERT INTO movimentacao (descricao, categoria_id, data_da_transacao, valor) 
            VALUES ('$descricao', '$categoria_id', '$data_da_transacao', '$valor')";

    // Verifica se a inserção foi bem-sucedida
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Transação adicionada com sucesso!";
        $_SESSION['type'] = 'success';

    header('Location: '.'despesas.php');
    exit;
}
}

if (isset($_POST['excluir-transacao'])) {
    $movimentacaoId = mysqli_real_escape_string($conn, $_POST['delete_usuario']);
    
    $sql = "DELETE FROM movimentacao WHERE id = '$movimentacaoId'";
    $result = mysqli_query($conn, $sql);

    $_SESSION['message'] = ($result && mysqli_affected_rows($conn) > 0)
        ? "Transação com ID {$movimentacaoId} excluída com sucesso!"
        : "Não foi possível excluir a transação.";

    $_SESSION['type'] = ($result && mysqli_affected_rows($conn) > 0) ? 'success' : 'error';

    header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'index.php'));
    exit;
}

if (isset($_POST['edit_usuario'])) {
    $movimentacaoId = mysqli_real_escape_string($conn, $_POST['usuario_id']);
    $nome = mysqli_real_escape_string($conn, $_POST['txtNome']);
    $email = mysqli_real_escape_string($conn, $_POST['txtEmail']);
    $dataNascimento = mysqli_real_escape_string($conn, $_POST['txtDataNascimento']);
    $senha = mysqli_real_escape_string($conn, $_POST['txtSenha']);

    $sql = "UPDATE usuarios SET nome = '{$nome}', email = '{$email}', data_nascimento = '{$dataNascimento}'";

    if (!empty($senha)) {
        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $sql .= ", senha = '{$senha}'";
    }

    $sql .= " WHERE id = '{$movimentacaoId}'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "Usuário {$movimentacaoId} atualizado com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Não foi possível atualizar o usuário {$movimentacaoId}";
        $_SESSION['type'] = 'error';
    }

    header("Location: index.php");
    exit;
}

?>