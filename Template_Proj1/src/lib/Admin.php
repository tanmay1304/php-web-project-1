<?php
// File: Template_Proj1/src/lib/Admin.php

require_once __DIR__ . '/Database.php';

class Admin {
    public $id;
    public $email;
    private $parola; // Keep the password private

    public function __construct($data = []) {
        $this->id = $data['id'] ?? null;
        $this->email = $data['email'] ?? '';
        $this->parola = $data['parola'] ?? '';
    }

    /**
     * Finds a single admin by their email address.
     * @param string $email The admin's email.
     * @return Admin|null An Admin object if found, otherwise null.
     */
    public static function findByEmail($email) {
        $con = Database::getInstance()->getConnection();
        // Assumes your admins are in a separate 'admins' table
        $stmt = $con->prepare("SELECT * FROM admins WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($record = $result->fetch_assoc()) {
            return new Admin($record);
        }
        return null;
    }

    /**
     * Verifies a given password against the admin's stored password.
     * @param string $password The password to check.
     * @return bool True if the password matches, otherwise false.
     */
    public function verifyPassword($password) {
        // As with User, this should use password_verify() in a real application.
        return $this->parola === $password;
    }
}
?>
