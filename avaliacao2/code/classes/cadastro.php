<?php
    include "Database.php";
class Cadastro {
    private $db;

    public function __construct() {
        $pdo = new Database();
        $this->db= $pdo->getConnection();
    }

    public function cadastrarVaga($nomeEmpresa, $numeroWhatsapp, $emailContato, $descritivoVaga, $curso) {
        $sql = "INSERT INTO vagas (nome_empresa, numero_whatsapp, email_contato, descritivo_vaga, curso)
                VALUES (:nomeEmpresa, :numeroWhatsapp, :emailContato, :descritivoVaga, :curso)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nomeEmpresa', $nomeEmpresa);
        $stmt->bindParam(':numeroWhatsapp', $numeroWhatsapp);
        $stmt->bindParam(':emailContato', $emailContato);
        $stmt->bindParam(':descritivoVaga', $descritivoVaga);
        $stmt->bindParam(':curso', $curso);

        return $stmt->execute();
    }

    public function listarVagas() {
        $sql = "SELECT * FROM vagas";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removerVaga($id) {
        $sql = "DELETE FROM vagas WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', var: $id);

        return $stmt->execute();
    }

    public function __destruct() {
        $this->db = null;
    }

}
