<?php

require_once('classes/login.php');

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    // Instancia a classe Login e verifica credenciais
    $validador = new Login();

    if ($validador->verificar_credenciais($login, $senha)) {
        // Redireciona para home.php se as credenciais forem válidas
        $_SESSION['usuario_ativo'] = "lulamolusco";
        header("Location: home.php");
        exit();
    } else {
        // Exibe mensagem de erro ou redireciona para index.php em caso de falha
        echo "Credenciais inválidas. Tente novamente.";
    }
}
