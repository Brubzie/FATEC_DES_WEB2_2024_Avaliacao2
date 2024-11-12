<?php

include "classes/login.php";
require_once 'classes/cadastro.php';

$validador = new Login();
if (!$validador->verificar_logado()) {
    echo "Você precisa estar logado para acessar esta página.";
    exit;
}
$cadastro = new cadastro();

$vagas = $cadastro->listarVagas();

if (count($vagas) > 0):
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
    <h1>Vagas de Estágio Cadastradas</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome da Empresa</th>
                <th>Número WhatsApp</th>
                <th>E-mail de Contato</th>
                <th>Descritivo da Vaga</th>
                <th>Curso</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vagas as $vaga): ?>
                <tr>
                    <td><?php echo htmlspecialchars($vaga['nome_empresa']); ?></td>
                    <td><?php echo htmlspecialchars($vaga['numero_whatsapp']); ?></td>
                    <td><?php echo htmlspecialchars($vaga['email_contato']); ?></td>
                    <td><?php echo htmlspecialchars($vaga['descritivo_vaga']); ?></td>
                    <td><?php echo ($vaga['curso'] == 1) ? 'DSM' : 'GE'; ?></td>
                    <td><a href="deletar.php?id_vaga=<?php echo $vaga['id']; ?>"
                            onclick="return confirm('Tem certeza que deseja remover esta vaga?');"
                            class="btn btn-danger">
                            delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="home.php">
        <button class="btn btn-success">voltar</button>
    </a>
<?php
else:
    echo "Nenhuma vaga cadastrada.";
endif;
?>