<?php
require_once __DIR__ . '/../dbConnect/MyDbConnection.php';

class Equipe {
    private $pdo;

    public function __construct() {
        $this->pdo = MyDbConnection::getInstance();
    }

    // **********************************************************************************************************************
    // *******************************************    METHODE CREATE    ****************************************************
    // **********************************************************************************************************************

    public function createEquipe($image, $nomEquipe, $nationnaliteEquipe) {
        try {
            $stmtUser = $this->pdo->prepare('INSERT INTO equipe (image_equipe,nomEquipe, nationnaliteEquipe) VALUES (?, ?, ?)');
            $stmtUser->execute([$image, $nomEquipe, $nationnaliteEquipe]);
    
            echo "<p class=\"styleEcho\">Equipe ajouté avec succès</p>";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    // **********************************************************************************************************************
    // ********************************************    METHODE READ    *****************************************************
    // **********************************************************************************************************************

    public function getAllEquipe() {
        $stmt = $this->pdo->prepare('SELECT * FROM equipe');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // **********************************************************************************************************************
    // ********************************************    METHODE DELETE    ****************************************************
    // **********************************************************************************************************************

    public function deleteEquipe($id) {
        try {
            $stmt = $this->pdo->prepare('DELETE FROM equipe WHERE idEquipe = ?');
            $stmt->execute([$id]);
            echo "<p class=\"styleEcho\">Equipe supprimé avec succès</p>";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    // **********************************************************************************************************************
    // **************************************    METHODE POUR RECUP L'ID    *************************************************
    // **********************************************************************************************************************

public function getEquipeById($equipeId) {
    $stmt = $this->pdo->prepare('SELECT * FROM equipe WHERE idEquipe = ?');
    $stmt->execute([$equipeId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

    // **********************************************************************************************************************
    // ********************************************    METHODE UPDATE    ****************************************************
    // **********************************************************************************************************************

    public function updateEquipe($equipeId, $image, $nomEquipe, $nationnaliteEquipe) {
        try {
            $stmt = $this->pdo->prepare('UPDATE equipe SET image_equipe = ?, nomEquipe = ?, nationnaliteEquipe = ? WHERE idEquipe = ?');
            $stmt->execute([$image, $nomEquipe, $nationnaliteEquipe, $equipeId]);
    
            echo "<p class=\"styleEcho\">Equipe mise à jour avec succès.</p>";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }
}
?>
