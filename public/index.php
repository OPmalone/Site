<?php

session_start();

require_once __DIR__ . "/../autoload.php";
require_once __DIR__ . "/../config.php";

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$controller = new Authcontroller($pdo);

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