<?php
require_once __DIR__ . '/../dbConnect/MyDbConnection.php';

class Matches {
    private $pdo;

    public function __construct() {
        $this->pdo = MyDbConnection::getInstance();
    }

    // **********************************************************************************************************************
    // *******************************************    METHODE CREATE    ****************************************************
    // **********************************************************************************************************************
    public function createMatch($image, $date, $equipe1, $equipe2, $compo1, $compo2) {
        try {

            $stmtMatch = $this->pdo->prepare('INSERT INTO matches (image_matches, dateMatches, equipe, equipeAdverse, compositionEquipe, compositionAdverse) VALUES (?, ?, ?, ?, ?, ?)');
            $stmtMatch->execute([$image, $date, $equipe1, $equipe2, $compo1, $compo2]);
    
            echo "<p class=\"styleEcho\">Match ajouté avec succès</p>";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }
    // **********************************************************************************************************************
    // ********************************************    METHODE READ    *****************************************************
    // **********************************************************************************************************************

    public function getAllMatch() {
        $stmt = $this->pdo->prepare('SELECT * FROM matches');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // **********************************************************************************************************************
    // ********************************************    METHODE DELETE    ****************************************************
    // **********************************************************************************************************************

    public function deleteMatch($id) {
        try {
            $stmt = $this->pdo->prepare('DELETE FROM matches WHERE idMatches = ?');
            $stmt->execute([$id]);
            echo "<p class=\"styleEcho\">Match supprimé avec succès</p>";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    // **********************************************************************************************************************
    // **************************************    METHODE POUR RECUP L'ID    *************************************************
    // **********************************************************************************************************************

    public function getMatchById($matchId) {
            $stmt = $this->pdo->prepare('SELECT * FROM MATCHES WHERE idMatches = ?');
            $stmt->execute([$matchId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // **********************************************************************************************************************
    // ********************************************    METHODE UPDATE    ****************************************************
    // **********************************************************************************************************************

    public function updateMatch($image, $date, $equipe1, $equipe2, $compo1, $compo2, $matchId) {
        try {
            $stmt = $this->pdo->prepare('UPDATE matches SET image_matches = ?, dateMatches = ?, equipe = ?, equipeAdverse = ?, compositionEquipe = ?, compositionAdverse = ? WHERE idMatches = ?');
            $stmt->execute([$image, $date, $equipe1, $equipe2, $compo1, $compo2, $matchId]);
    
            echo "<p class=\"styleEcho\">Match mis à jour avec succès</p>";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

}
?>
