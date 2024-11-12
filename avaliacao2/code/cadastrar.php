<?php
include "classes/login.php";
require_once 'classes/cadastro.php';

$validador = new Login();
if (!$validador->verificar_logado()) {
    echo "Você precisa estar logado para acessar esta página.";
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nomeEmpresa = $_POST['nome_empresa'];
    $numeroWhatsapp = $_POST['numero_whatsapp'];
    $emailContato = $_POST['email_contato'];
    $descritivoVaga = $_POST['descritivo_vaga'];
    $curso = $_POST['curso'];

    if (empty($nomeEmpresa) || empty($numeroWhatsapp) || empty($emailContato) || empty($descritivoVaga) || empty($curso)) {
        $mensagem = "Todos os campos são obrigatórios!";
    } else {
        $cadastro = new Cadastro();

        $resultado = $cadastro->cadastrarVaga($nomeEmpresa, $numeroWhatsapp, $emailContato, $descritivoVaga, $curso);

        if ($resultado) {
            $mensagem = "Vaga cadastrada com sucesso!";
        } else {
            $mensagem = "Erro ao cadastrar a vaga. Tente novamente.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Vaga</title>
</head>

<body>
    <h1>Cadastrar Vaga</h1>
   <?php echo isset($mensagem) ? $mensagem: " " ?>
    <form method="POST">
        <label for="nome_empresa">Nome da Empresa:</label>
        <input type="text" id="nome_empresa" name="nome_empresa" required maxlength="100"><br><br>

        <label for="numero_whatsapp">Número WhatsApp:</label>
        <input type="text" id="numero_whatsapp" name="numero_whatsapp" required maxlength="20"><br><br>

        <label for="email_contato">E-mail de Contato:</label>
        <input type="email" id="email_contato" name="email_contato" required maxlength="30"><br><br>

        <label for="descritivo_vaga">Descritivo da Vaga:</label>
        <textarea id="descritivo_vaga" name="descritivo_vaga" required maxlength="255"></textarea><br><br>

        <label for="curso">Curso:</label>
        <select id="curso" name="curso" required>
            <option value="1">DSM</option>
            <option value="2">GE</option>
        </select><br><br>

        <button type="submit">Cadastrar</button>
        <br> <br>
        <a href="listar.php">
        <button type="button" class="btn btn-success mt-3">Listar Vagas</button>
    </a>
    </form>
</body>

</html>