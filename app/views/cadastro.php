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
        <form action="/cadastro" method="post">
            <input type="text" placeholder="Nome" name="nome" id="nome">
            <input type="text" placeholder="Email" name="email" id="email">
            <input type="password" placeholder="Senha" name="senha" id="senha">
            <input type="submit" value="Enviar">
        </form>
    </div>

    <a href="login.php">Logar</a>
</body>
</html>