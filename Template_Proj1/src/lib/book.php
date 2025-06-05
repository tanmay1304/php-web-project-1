<?php

require_once __DIR__ . '/Database.php';

class Book {
    public $id;
    public $titlu;
    public $autor;
    public $editura;
    public $an_aparitie;
    public $ISBN;
    public $nr_exemplare;
    public $image;

    // A constructor to easily create a book object from a data array
    public function __construct($data = []) {
        $this->id = $data['id'] ?? null;
        $this->titlu = $data['titlu'] ?? '';
        $this->autor = $data['autor'] ?? '';
        $this->editura = $data['editura'] ?? '';
        $this->an_aparitie = $data['an_aparitie'] ?? '';
        $this->ISBN = $data['ISBN'] ?? '';
        $this->nr_exemplare = $data['nr_exemplare'] ?? 0;
        $this->image = $data['image'] ?? '';
    }

    /**
     * Finds a single book by its ID.
     * @param int $id The book ID.
     * @return Book|null A Book object if found, otherwise null.
     */
    public static function findById($id) {
        $con = Database::getInstance()->getConnection();
        $stmt = $con->prepare("SELECT * FROM carti WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($record = $result->fetch_assoc()) {
            return new Book($record);
        }
        return null;
    }

    /**
     * Finds all books in the catalog.
     * @return array An array of Book objects.
     */
    public static function findAll() {
        $con = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM carti ORDER BY titlu ASC";
        $result = $con->query($sql);
        
        $books = [];
        while ($record = $result->fetch_assoc()) {
            $books[] = new Book($record);
        }
        return $books;
    }

    /**
     * Searches for books based on a search term.
     * @param string $term The term to search for.
     * @return array An array of Book objects.
     */
    public static function search($term) {
        $con = Database::getInstance()->getConnection();
        $term = "%{$term}%";
        
        $stmt = $con->prepare("SELECT * FROM carti WHERE titlu LIKE ? OR autor LIKE ? OR ISBN LIKE ? OR editura LIKE ?");
        $stmt->bind_param("ssss", $term, $term, $term, $term);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $books = [];
        while ($record = $result->fetch_assoc()) {
            $books[] = new Book($record);
        }
        return $books;
    }

    /**
     * Saves the current book object to the database (creates or updates).
     * @return bool True on success, false on failure.
     */
    public function save() {
        $con = Database::getInstance()->getConnection();
        
        if ($this->id) {
            // Update existing record
            $sql = "UPDATE carti SET titlu=?, autor=?, editura=?, an_aparitie=?, ISBN=?, nr_exemplare=?, image=? WHERE id=?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssssisii", $this->titlu, $this->autor, $this->editura, $this->an_aparitie, $this->ISBN, $this->nr_exemplare, $this->image, $this->id);
        } else {
            // Insert new record
            $sql = "INSERT INTO carti (titlu, autor, editura, an_aparitie, ISBN, nr_exemplare, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sssssis", $this->titlu, $this->autor, $this->editura, $this->an_aparitie, $this->ISBN, $this->nr_exemplare, $this->image);
        }
        
        return $stmt->execute();
    }

    /**
     * Deletes a book from the database by its ID.
     * @param int $id The ID of the book to delete.
     * @return bool True on success, false on failure.
     */
    public static function deleteById($id) {
        $con = Database::getInstance()->getConnection();
        $stmt = $con->prepare("DELETE FROM carti WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
