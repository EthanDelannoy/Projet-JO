<?php

require_once 'MyDbConnection.php';

class User {
    private $pdo;

    public function __construct() {
        $this->pdo = MyDbConnection::getInstance();
    }

    public function createUser($nom, $prenom, $email, $password, $role) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        try {
            $stmtRole = $this->pdo->prepare('SELECT idRoles FROM ROLES WHERE role = ?');
            $stmtRole->execute([$role]);
            $roleId = $stmtRole->fetchColumn();
    
            $stmtUser = $this->pdo->prepare('INSERT INTO UTILISATEUR (nom, prenom, email, mdp, idRoles) VALUES (?, ?, ?, ?, ?)');
            $stmtUser->execute([$nom, $prenom, $email, $hashedPassword, $roleId]);
    
            return "Utilisateur ajouté avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public function deleteUser($id) {
        try {
            $stmt = $this->pdo->prepare('DELETE FROM utilisateur WHERE idUtilisateur = ?');
            $stmt->execute([$id]);
            return "Utilisateur supprimé avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public function updateUser($id, $nom, $prenom, $email, $role) {
        try {
            $stmt = $this->pdo->prepare('UPDATE utilisateur SET nom = ?, prenom = ?, email = ? WHERE idUtilisateur = ?');
            $stmt->execute([$nom, $prenom, $email, $id]);

            $stmt = $this->pdo->prepare('UPDATE roles SET role = ? WHERE idRoles = ?');
            $stmt->execute([$role, $id]);

            return "Utilisateur mis à jour avec succès.";
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare('SELECT utilisateur.*, roles.role FROM utilisateur JOIN roles ON utilisateur.idUtilisateur = roles.idRoles WHERE utilisateur.idUtilisateur = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getAllUsers() {
        $stmt = $this->pdo->prepare('SELECT * FROM utilisateur');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllUsersRole() {
        $stmt = $this->pdo->prepare('SELECT utilisateur.*, roles.role FROM utilisateur JOIN roles ON utilisateur.idUtilisateur = roles.idRoles');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
