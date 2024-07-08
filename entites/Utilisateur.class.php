<?php
require_once __DIR__ . '/../dbConnect/MyDbConnection.php';

class User {
    private $pdo;

    public function __construct() {
        $this->pdo = MyDbConnection::getInstance();
    }

    // **********************************************************************************************************************
    // *******************************************    METHODE CREATE    ****************************************************
    // **********************************************************************************************************************
    public function createUtilisateur($nom, $prenom, $email, $mdp, $role) {
        $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);
        try {

            $stmtCheckRole = $this->pdo->prepare('SELECT idRoles FROM roles WHERE role = ?');
            $stmtCheckRole->execute([$role]);
            $role = $stmtCheckRole->fetch(PDO::FETCH_ASSOC);

            $roleId = $role['idRoles'];

            $stmtUser = $this->pdo->prepare('INSERT INTO utilisateur (nom, prenom, email, mdp, idRoles) VALUES (?, ?, ?, ?, ?)');
            $stmtUser->execute([$nom, $prenom, $email, $hashedPassword, $roleId]);
            
            echo "<p class=\"styleEcho\">Utilisateur ajouté avec succès</p>";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    // **********************************************************************************************************************
    // ********************************************    METHODE READ    *****************************************************
    // **********************************************************************************************************************

    public function getAllUtilisateur() {
        $stmt = $this->pdo->prepare('SELECT * FROM utilisateur');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // **********************************************************************************************************************
    // ********************************************    METHODE DELETE    ****************************************************
    // **********************************************************************************************************************

    public function deleteUtilisateur($id) {
        try {
            $stmt = $this->pdo->prepare('DELETE FROM utilisateur WHERE idutilisateur = ?');
            $stmt->execute([$id]);
            echo "<p class=\"styleEcho\">utilisateur supprimé avec succès</p>";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    // **********************************************************************************************************************
    // **************************************    METHODE POUR RECUP L'ID    *************************************************
    // **********************************************************************************************************************

    public function getUtilisateurById($utilisateurId) {
            $stmt = $this->pdo->prepare('SELECT * FROM utilisateur WHERE idUtilisateur = ?');
            $stmt->execute([$utilisateurId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // **********************************************************************************************************************
    // ********************************************    METHODE UPDATE    ****************************************************
    // **********************************************************************************************************************

    public function updateUtilisateur($nom, $prenom, $email, $mdp, $role, $userId) {
        $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);
        try {
            $stmt = $this->pdo->prepare('UPDATE utilisateur SET nom = ?, prenom = ?, email = ?, mdp = ?, idRoles = ? WHERE idUtilisateur = ?');
            $stmt->execute([$nom, $prenom, $email, $hashedPassword, $role, $userId]);
    
            echo "<p class=\"styleEcho\">Utilisateur mis à jour avec succès.</p>";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    // **********************************************************************************************************************
    // *************************************    METHODE POUR RECUPERER LE ROLE    *******************************************
    // **********************************************************************************************************************
    
    public function getRoles() {
        try {
            $stmt = $this->pdo->prepare('SELECT idRoles, role FROM roles');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

}
?>
