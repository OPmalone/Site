<?php

require_once __DIR__ . "/../autoload.php";

session_start();

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

use App\Controllers\AuthController;

$controller = new AuthController($pdo);

switch ($uri) {
    case "/":
    case "/login":
        $_SERVER["REQUEST_METHOD"] === "POST"
            ? $controller->login()
            : $controller->showLogin();
        break;

    case "/cadastro":
        $_SERVER["REQUEST_METHOD"] === "POST"
            ? $controller->cadastro()
            : $controller->showCadastro();
        break;
    
    case "/logout":
        $controller->logout();
        break;

    default:
        http_response_code(404);
        echo "Pagina nao encontrada";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portifolio</title>
</head>
<body>
    
</body>
</html>