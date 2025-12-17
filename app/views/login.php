<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site</title>
</head>
<body>
    <h1>Login</h1>
    <form action="/login" method="POST">
        <input type="text" placeholder="email" name="email" required>
        <input type="password" placeholder="senha" name="senha" required>
        <input type="submit" value="Enviar">
    </form>

    <br>
    <a href="cadastro.php">Cadastrar</a>
</body>
</html>