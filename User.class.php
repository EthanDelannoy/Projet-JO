<?php

require_once 'MyDbConnection.php';

class User {
    private $pdo;

    public function __construct() {
        $this->pdo = MyDbConnection::getInstance();
    }

    // **********************************************************************************************************************
    // *******************************************    METHODE CREATE    ****************************************************
    // **********************************************************************************************************************
    public function createMatch($date, $equipe1, $equipe2, $compo1, $compo2) {
        try {

            $stmtUser = $this->pdo->prepare('INSERT INTO matches (dateMatches, equipe, equipeAdverse, compositionEquipe, compositionAdverse) VALUES (?, ?, ?, ?, ?)');
            $stmtUser->execute([$date, $equipe1, $equipe2, $compo1, $compo2]);
    
            echo "<p class=\"styleEcho\">Match ajouté avec succès</p>";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public function createJoueur($nom, $age, $nomEquipe) {
        try {
            $stmtEquipe = $this->pdo->prepare('SELECT idEquipe FROM equipe WHERE nationnaliteEquipe = ?');
            $stmtEquipe->execute([$nomEquipe]);
            $equipe = $stmtEquipe->fetch(PDO::FETCH_ASSOC);

            if (!$equipe) {
                return "<p class=\"styleEcho\">Erreur : L'équipe n'existe pas.</p>";
            }

            $idEquipe = $equipe['idEquipe'];

            $stmtUser = $this->pdo->prepare('INSERT INTO joueur (nomJoueur, ageJoueur, idEquipe) VALUES (?, ?, ?)');
            $stmtUser->execute([$nom, $age, $idEquipe]);

            return "<p class=\"styleEcho\">Joueur ajouté avec succès</p>";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public function createEquipe($nomEquipe, $nationnaliteEquipe) {
        try {
            $stmtUser = $this->pdo->prepare('INSERT INTO equipe (nomEquipe, nationnaliteEquipe) VALUES (?, ?)');
            $stmtUser->execute([$nomEquipe, $nationnaliteEquipe]);
    
            echo "<p class=\"styleEcho\">Equipe ajouté avec succès</p>";
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

    public function getAllEquipe() {
        $stmt = $this->pdo->prepare('SELECT * FROM equipe');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllJoueur() {
        $stmt = $this->pdo->prepare('SELECT * FROM joueur');
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

    public function deleteEquipe($id) {
        try {
            $stmt = $this->pdo->prepare('DELETE FROM equipe WHERE idEquipe = ?');
            $stmt->execute([$id]);
            echo "<p class=\"styleEcho\">Equipe supprimé avec succès</p>";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public function deleteJoueur($id) {
        try {
            $stmt = $this->pdo->prepare('DELETE FROM joueur WHERE idJoueur = ?');
            $stmt->execute([$id]);
            echo "<p class=\"styleEcho\">Joueur supprimé avec succès</p>";
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

    public function updateMatch($date, $equipe1, $equipe2, $compo1, $compo2) {
        try {
            $stmt = $this->pdo->prepare('UPDATE matches SET dateMatches = ?, equipe = ?, equipeAdverse = ?, compositionEquipe = ?, compositionAdverse = ? WHERE idMatches = ?');
            $stmt->execute([$date, $equipe1, $equipe2, $compo1, $compo2]);

            return "Match mis à jour avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }



}
?>
