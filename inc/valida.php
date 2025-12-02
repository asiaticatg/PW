<?php
session_start();

include ("../config.php");
require_once(DBAPI);

// Se não enviou login ou senha, volta para o index
if (empty($_POST['login']) || empty($_POST['senha'])) {
    header("Location: " . BASEURL . "index.php");
    exit;
}

$bd = open_database();

try {
    $bd->select_db(DB_NAME);

    $usuario = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "SELECT id, nome, user, password, role 
            FROM usuarios 
            WHERE user = '$usuario' 
            LIMIT 1";

    $query = $bd->query($sql);

    if ($query->num_rows === 0) {
        throw new Exception("Usuário ou senha inválidos!");
    }

    $dados = $query->fetch_assoc();

    if (!password_verify($senha, $dados['password'])) {
        throw new Exception("Usuário ou senha inválidos!");
    }

    // LOGIN OK — salva sessão
    $_SESSION['message'] = "Bem vindo " . $dados['nome'] . "!";
    $_SESSION['type'] = "info";
    $_SESSION['id'] = $dados['id'];
    $_SESSION['nome'] = $dados['nome'];
    $_SESSION['user'] = $dados['user'];
    $_SESSION['role'] = $dados['role']; // aqui vai o admin ou null

    // Redireciona para a página inicial
    header("Location: " . BASEURL . "index.php");
    exit;

} catch (Exception $e) {

    // Erro → salva mensagem e volta para login
    $_SESSION['message'] = "Erro: " . $e->getMessage();
    $_SESSION['type'] = "danger";

    header("Location: " . BASEURL . "index.php");
    exit;
}
?>
