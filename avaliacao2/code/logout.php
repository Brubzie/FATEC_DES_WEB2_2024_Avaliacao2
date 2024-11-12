<?php

require_once('classes/login.php');

$validador = new Login();
$validador->logout();

// Redireciona para a página de login após o logout
header("Location: index.php");
exit();
