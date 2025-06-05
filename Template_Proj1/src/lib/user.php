<?php
// File: Template_Proj1/src/lib/User.php

require_once __DIR__ . '/Database.php';

class User {
    public $id;
    public $nume;
    public $prenume;
    public $telefon;
    public $email;
    private $parola; // Keep the password private for security

    public function __construct($data = []) {
        $this->id = $data['id'] ?? null;
        $this->nume = $data['nume'] ?? '';
        $this->prenume = $data['prenume'] ?? '';
        $this->telefon = $data['telefon'] ?? '';
        $this->email = $data['email'] ?? '';
        $this->parola = $data['parola'] ?? '';
    }

    /**
     * Finds a single user by their email address.
     * @param string $email The user's email.
     * @return User|null A User object if found, otherwise null.
     */
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

    /**
     * Verifies a given password against the user's stored password.
     * IMPORTANT: This is currently plain text. In a real application,
     * you should use password_hash() and password_verify().
     * @param string $password The password to check.
     * @return bool True if the password matches, otherwise false.
     */
    public function verifyPassword($password) {
        // NOTE: This is NOT secure for a real-world application.
        // It should be: return password_verify($password, $this->parola);
        return $this->parola === $password;
    }

    /**
     * Saves a new user to the database (for registration).
     * @return bool True on success, false on failure.
     */
    public function save() {
        // This save method only handles inserting new users, as we don't have an "edit user" feature yet.
        if ($this->id) {
            // Update logic could go here if needed in the future
            return false;
        }

        $con = Database::getInstance()->getConnection();

        // SECURITY NOTE: Storing plain text passwords is very insecure.
        // In a real application, you would hash the password before saving.
        // $hashed_password = password_hash($this->parola, PASSWORD_DEFAULT);
        
        $stmt = $con->prepare("INSERT INTO users(nume, prenume, telefon, email, parola) VALUES (?, ?, ?, ?, ?)");
        
        // Use $hashed_password instead of $this->parola in a real app
        $stmt->bind_param("sssss", $this->nume, $this->prenume, $this->telefon, $this->email, $this->parola);
        
        return $stmt->execute();
    }
}
?>
