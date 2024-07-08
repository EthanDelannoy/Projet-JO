<?php
require_once __DIR__ . '/../dbConnect/MyDbConnection.php';

class Roles {
    private $pdo;

    public function __construct() {
        $this->pdo = MyDbConnection::getInstance();
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