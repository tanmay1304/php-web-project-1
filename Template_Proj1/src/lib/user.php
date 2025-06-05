<?php

require_once __DIR__ . '/Database.php';

class User {
    public $id;
    public $nume;
    public $prenume;
    public $telefon;
    public $email;
    private $parola;
    public $rezervari;

    public function __construct($data = []) {
        $this->id = $data['id'] ?? null;
        $this->nume = $data['nume'] ?? '';
        $this->prenume = $data['prenume'] ?? '';
        $this->telefon = $data['telefon'] ?? '';
        $this->email = $data['email'] ?? '';
        $this->parola = $data['parola'] ?? '';
        $this->rezervari = $data['rezervari'] ?? '';
    }

    public static function findByEmail($email) {
        $con = Database::getInstance()->getConnection();
        $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($record = $result->fetch_assoc()) {
            return new User($record);
        }
        return null;
    }

    public function verifyPassword($password) {
        return $this->parola === $password;
    }

    public function save() {
        if ($this->id) {
            return false;
        }

        $con = Database::getInstance()->getConnection();
        
        $stmt = $con->prepare("INSERT INTO users(nume, prenume, telefon, email, parola, rezervari) VALUES (?, ?, ?, ?, ?, ?)");
        
        $stmt->bind_param("ssssss", $this->nume, $this->prenume, $this->telefon, $this->email, $this->parola, $this->rezervari);
        
        return $stmt->execute();
    }
}
?>
