<?php
session_start();
require_once __DIR__ . '/../lib/Book.php';

// Get the book ID from the URL, ensuring it's an integer
$book_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($book_id > 0) {
    // Use our new static method to delete the book
    Book::deleteById($book_id);
}

// Redirect back to the catalog page, just like before
header('Location: ../catalog.php');
exit();
?>
