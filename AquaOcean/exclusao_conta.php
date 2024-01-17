<?php
session_start();

if (!isset($_SESSION["login"]) || $_SESSION["login"] !== "1") {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once "conexao.php";

    $conn = new Conexao();

    $email = $_SESSION["email"];

    // Exclua o usuário com base no email
    $sql = "DELETE FROM usuario WHERE email = ?";
    $stmt = $conn->conexao->prepare($sql);
    $stmt->bindParam(1, $email);
    $stmt->execute();

    // Limpe as variáveis de sessão
    session_unset();
    session_destroy();

    header("Location: index.php");
    exit();
}
?>
<!doctype html>
<html lang="pt-br">

<head>
    <title>Exclusão de Conta</title>
    <link rel="shortcut icon" type="image/png" href="imagem/favicon.png"/>
</head>

<body>
    <div>
        <h2>Exclusão de Conta</h2>
        <p>Tem certeza de que deseja excluir sua conta?</p>
        <form method="POST" action="">
            <button type="submit">Confirmar Exclusão</button>
        </form>
    </div>
</body>

</html>