<?php

require_once __DIR__ . '/../dbConnect/MyDbConnection.php';

class Recherche {
    private $db;

    public function __construct() {
        $this->db = MyDbConnection::getInstance();
    }

    public function obtenirNomEquipeParId($idEquipe) {

        $stmt = $this->db->prepare("SELECT nationnaliteEquipe FROM equipe WHERE idEquipe = :idEquipe");
        $stmt->bindParam(':idEquipe', $idEquipe);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function chercherJoueur($text) {
        $stmt = $this->db->prepare("SELECT * FROM JOUEUR WHERE nomJoueur = ?");
        $stmt->execute([$text]);
        return $stmt->fetchAll();
    }

    public function chercherEquipe($text) {
        $stmt = $this->db->prepare("SELECT * FROM EQUIPE WHERE nomEquipe = ? OR nationnaliteEquipe = ?");
        $stmt->execute([$text, $text]);
        return $stmt->fetchAll();
    }

    public function chercherMatch($text) {
        $stmt = $this->db->prepare("SELECT image_matches FROM MATCHES WHERE equipe = ? OR equipeAdverse = ? OR dateMatches = ?");
        $stmt->execute([$text, $text, $text]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}