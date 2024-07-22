<?php
require_once __DIR__ . '/../dbConnect/myDbConnection.php';

class Joueur {
    private $pdo;

    public function __construct() {
        $this->pdo = MyDbConnection::getInstance();
    }

    // **********************************************************************************************************************
    // *******************************************    METHODE CREATE    ****************************************************
    // **********************************************************************************************************************
    public function createJoueur($image, $nom, $age, $nomEquipe) {
        try {
            $stmtEquipe = $this->pdo->prepare('SELECT idEquipe FROM equipe WHERE nationnaliteEquipe = ?');
            $stmtEquipe->execute([$nomEquipe]);
            $equipe = $stmtEquipe->fetch(PDO::FETCH_ASSOC);

            if (!$equipe) {
                return "<p class=\"styleEcho\">Erreur : L'équipe n'existe pas.</p>";
            }

            $idEquipe = $equipe['idEquipe'];

            $stmtUser = $this->pdo->prepare('INSERT INTO joueur (image_joueur, nomJoueur, ageJoueur, idEquipe) VALUES (?, ?, ?, ?)');
            $stmtUser->execute([$image, $nom, $age, $idEquipe]);

            return "<p class=\"styleEcho\">Joueur ajouté avec succès</p>";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    // **********************************************************************************************************************
    // ********************************************    METHODE READ    *****************************************************
    // **********************************************************************************************************************

    public function getAllJoueur() {
        $stmt = $this->pdo->prepare('SELECT * FROM joueur');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // **********************************************************************************************************************
    // ********************************************    METHODE DELETE    ****************************************************
    // **********************************************************************************************************************

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

    public function getJoueurById($joueurId) {
        $stmt = $this->pdo->prepare('SELECT * FROM JOUEUR WHERE idJoueur = ?');
        $stmt->execute([$joueurId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
}


    // **********************************************************************************************************************
    // ********************************************    METHODE UPDATE    ****************************************************
    // **********************************************************************************************************************

    public function updateJoueur($image, $nom, $age, $idEquipe, $joueurId) {
        try {
            $stmt = $this->pdo->prepare('UPDATE joueur SET image_joueur = ?, nomJoueur = ?, ageJoueur = ?, idEquipe = ? WHERE idJoueur = ?');
            $stmt->execute([$image, $nom, $age, $idEquipe, $joueurId]);

         return "<p class=\"styleEcho\">Joueur mis à jour avec succès</p>";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }



}
?>
