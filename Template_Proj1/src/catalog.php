<?php
session_start();
require_once __DIR__ . '/lib/Book.php'; // Include the new Book class

$books = Book::findAll(); // This one line replaces all the old query logic!
?>
<!DOCTYPE html>
<html lang="en">
<body>
<div class="container d-flex justify-content-center">
        <table class="table table-striped w-100" style="max-width: 80%;">
            <thead>
                </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                <tr>
                    <td><?php echo htmlspecialchars($book->titlu); ?></td>
                    <td><?php echo htmlspecialchars($book->autor); ?></td>
                    <td><?php echo htmlspecialchars($book->editura); ?></td>
                    <td><?php echo htmlspecialchars($book->an_aparitie); ?></td>
                    <td><?php echo htmlspecialchars($book->ISBN); ?></td>
                    <td><?php echo htmlspecialchars($book->nr_exemplare); ?></td>
                    <td>
                        <a href="/db/view.php?id=<?php echo $book->id; ?>" class="btn btn-secondary btn-sm me-1">Vizualizează</a>
                        <a href="/db/edit.php?id=<?php echo $book->id; ?>" class="btn btn-primary btn-sm me-1">Editează</a>
                        <a href="/db/delete.php?id=<?php echo $book->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Ștergeți?')">Șterge</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
