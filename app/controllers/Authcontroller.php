<?php

namespace App\Controllers;

class AuthController
{
    private UserDAO $userDAO;

    public function __construct(PDO $pdo)
    {
        $this->userDAO = new UserDAO($pdo);
    }

    public function showLogin()
    {
        require __DIR__ . "/../Views/login.php";
    }

    public function login()
    {
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $user = $this->userDAO->procurar_email($email);

        if (!$user || !password_verify($senha, $user["senha"])) {
            die("Email ou senha invalidos");
        }

        session_start();
        session_regenerate_id(true);

        $_SESSION["usuario_id"] = $user["id"];
        $_SESSION["nome"] = $user["nome"];

        header("Location: /dashboard");
        exit;
    }

    public function showCadastro()
    {
        require __DIR__ . "/../Views/cadastro.php";
    }

    public function cadastro()
    {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Email invalido");
        }

        if (strlen($senha) < 6) {
            die("Email invalido");
        }

        if ($this->userDAO->email_existe($email)) {
            die("Email ja cadastrado");
        }

        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $user = new App\Models\User($nome, $email, $hash);

        $this->userDAO->create($user);

        header("Location: /login");
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /login");
    }
}