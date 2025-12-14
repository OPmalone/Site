<?php
require_once "classes/User.php";
require_once "classes/UserDAO.php";
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>
</head>
<body>
    <h1>Cadastro usuario</h1>
    <div class="container">
        <form action="" method="post">
            <input type="text" placeholder="Nome" name="nome" id="nome">
            <input type="text" placeholder="Email" name="email" id="email">
            <input type="password" placeholder="Senha" name="senha" id="senha">
            <input type="submit" value="Enviar">
        </form>
    </div>

    <a href="login.php">Logar</a>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    if (!filter_var(value: $_POST["email"], filter: FILTER_VALIDATE_EMAIL)) 
    {
        die("Insira um email valido");
    }

    if (mb_strlen(string: $_POST["senha"]) < 6)
    {
        die("Insira ao menos 6 caracteres para a senha");
    }

    $senha_hash = password_hash($_POST["senha"], PASSWORD_DEFAULT);
    
    $user = new User($_POST['nome'], $_POST["email"], $senha_hash);
    $userDAO = new UserDAO($pdo);

    if($userDAO->email_existe($_POST["email"]))
    {
        die("Email ja cadastrado.");
    }

    $userDAO->create($user);

    header("Location: login.php");
}

?>