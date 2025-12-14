<?php
session_start();
require_once __DIR__ . "/config.php";
require_once __DIR__ . "/classes/User.php";
require_once __DIR__ . "/classes/UserDAO.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>
</head>
<body>
    <h1>Login</h1>
    <form action="" method="POST">
        <input type="text" placeholder="email" name="email" required>
        <input type="password" placeholder="senha" name="senha" required>
        <input type="submit" value="Enviar">
    </form>

    <br>
    <a href="cadastro.php">Cadastrar</a>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $userDAO = new UserDAO($pdo);
    $user = $userDAO->procurar_email($email);

    if (!$user) {
        die("Email ou senha invalidos");
    }

    if (!password_verify($senha, $user["senha"])) {
        die("Email ou senha invalidos");
    }

    session_regenerate_id(true);

    $_SESSION["usuario_id"] = $user["id"];
    $_SESSION["usuario_nome"] = $user["nome"];
    $_SESSION["logado"] = true;

    header("Location: dashboard.php");
}

?>