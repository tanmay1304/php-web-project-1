<?php
session_start();
require_once __DIR__ . '/../lib/Book.php';

// This function is identical to the one in insert.php
// In a real-world scenario, you might move this to a shared "helper" file.
function handleImageUpload($titlu, $autor, $editura, $existing_image_path = '') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // First, delete the old image if it exists
        if (!empty($existing_image_path) && file_exists($_SERVER['DOCUMENT_ROOT'] . $existing_image_path)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $existing_image_path);
        }

        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/images/';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $safe_titlu = preg_replace('/[^A-Za-z0-9\-]/', '_', $titlu);
        $safe_autor = preg_replace('/[^A-Za-z0-9\-]/', '_', $autor);
        $safe_editura = preg_replace('/[^A-Za-z0-9\-]/', '_', $editura);
        $filename = $safe_titlu . '_' . $safe_autor . '_' . $safe_editura . '.' . $file_extension;
        
        $target_path = $upload_dir . $filename;
        $db_path = '/images/' . $filename;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            return $db_path; // Return new image path
        }
    }
    return $existing_image_path; // Return old path if no new file was uploaded
}

// Check if the form has been submitted (POST request)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book_id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    
    // Find the book we are trying to edit
    $book = Book::findById($book_id);

    if ($book) {
        // Update book object properties from form data
        $book->titlu = $_POST['titlu'];
        $book->autor = $_POST['autor'];
        $book->editura = $_POST['editura'];
        $book->an_aparitie = $_POST['an_aparitie'];
        $book->ISBN = $_POST['ISBN'];
        $book->nr_exemplare = $_POST['nr_exemplare'];
        
        // Handle image upload and update the image property
        $book->image = handleImageUpload($book->titlu, $book->autor, $book->editura, $book->image);
        
        // Save the updated object
        $book->save();
    }
    
    // Redirect back to the catalog to see the changes
    header('Location: ../catalog.php');
    exit();

} else {
    // If it's a GET request, just display the form
    $book_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $book = Book::findById($book_id);

    // If no book is found, redirect away.
    if (!$book) {
        header('Location: ../catalog.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Editează - <?php echo htmlspecialchars($book->titlu); ?></title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="header-container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
             <div class="container px-5">
                <a class="navbar-brand" href="/">Raftul nostru</a>
                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex justify-content-evenly align-items-center w-100">
                         <li class="nav-item"><a class="nav-link" href="/">Acasă</a></li>
                        <li class="nav-item"><a class="nav-link" href="/despre-noi.php">Despre noi</a></li>
                        <li class="nav-item"><a class="nav-link" href="/imprumuta.php">Împrumută</a></li>
                        <li class="nav-item"><a class="nav-link" href="/catalog.php">Catalog</a></li>
                        <li class="nav-item"><a class="nav-link" href="/sugestii.php">Sugestii</a></li>
                        <li class="nav-item"><a class="nav-link" href="/log-in.php">Log in</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <br /> <br />

    <h3 style="text-align: center">Editare</h3>

    <div class="container d-flex justify-content-center">
        <form method="post" action="edit.php" enctype="multipart/form-data">
            Titlu:<br /><input type="text" name="titlu" value="<?php echo htmlspecialchars($book->titlu); ?>" required /><br />
            Autor:<br /><input type="text" name="autor" value="<?php echo htmlspecialchars($book->autor); ?>" required /><br />
            Editura:<br /><input type="text" name="editura" value="<?php echo htmlspecialchars($book->editura); ?>" /><br />
            An apariție:<br /><input type="text" name="an_aparitie" value="<?php echo htmlspecialchars($book->an_aparitie); ?>" /><br />
            ISBN:<br /><input type="text" name="ISBN" value="<?php echo htmlspecialchars($book->ISBN); ?>" /><br />
            Nr. exemplare:<br /><input type="text" name="nr_exemplare" value="<?php echo htmlspecialchars($book->nr_exemplare); ?>" required /><br />
            
            Imagine curentă:<br />
            <?php if(!empty($book->image)): ?>
                <img src="<?php echo htmlspecialchars($book->image); ?>" width="100" height="100"><br />
            <?php else: ?>
                <span>Nicio imagine</span><br />
            <?php endif; ?>
            
            Încarcă imagine nouă (opțional):<br /><input type="file" name="image" /><br />
            
            <input type="hidden" name="id" value="<?php echo $book->id; ?>" />
            <br />
            <input type="submit" name="submit" value="Salvează modificările" />
        </form>
    </div>

    <br /> <br />
    <div class="text-center">
        <a class="btn btn-secondary btn-lg" href="../catalog.php">Înapoi la Catalog</a>
    </div>
    <br /><br />

    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-white">Copyright &copy; Raftul nostru 2025</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/scripts.js"></script>
</body>
</html>
