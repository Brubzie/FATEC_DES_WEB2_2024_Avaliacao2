<?php
require_once('classes/login.php');
$validador = new Login();
$validador->verificar_logado();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Vagas de Estágio</title>
    <link rel="stylesheet" href="Style/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
     rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
     crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Vagas de Estágio</h2>
        </div>

        <h1 class="welcome">Bem-vindo, <?php echo $_SESSION['usuario_ativo']; ?></h1>

        <div class="button-group">
            <a href="cadastrar.php" class="btn btn-success">Cadastrar vaga</a>
            <a href="listar.php" class="btn btn-success mt-3">Listar</a>
            <a href="login.php" class="btn btn-danger mt-3">Logout</a>
        </div>
    </div>
</body>
</html>
