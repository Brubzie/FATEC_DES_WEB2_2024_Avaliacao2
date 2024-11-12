<?php
include "classes/login.php";
require_once 'classes/cadastro.php';

$validador = new Login();
if (!$validador->verificar_logado()) {
    echo "Você precisa estar logado para acessar esta página.";
    exit;
}
if (isset($_GET['id_vaga'])) {
    $idVaga = $_GET['id_vaga'];


    $cadastro = new Cadastro();

    $resultado = $cadastro->removerVaga($idVaga);

    if ($resultado) {
        echo "Vaga removida com sucesso!";
    } else {
        echo "Erro ao remover a vaga. Tente novamente.";
    }

    header('Location: listar.php');
    exit();
} else {
    echo "ID da vaga não fornecido.";
}
