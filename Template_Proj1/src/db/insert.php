<?php
session_start();
require_once __DIR__ . '/../lib/Book.php';

// This function will handle the image upload and return the path for the database.
function handleImageUpload($titlu, $autor, $editura) {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/images/';
        
        // Ensure the /images directory exists
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        // Create a safe, unique filename
        $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $safe_titlu = preg_replace('/[^A-Za-z0-9\-]/', '_', $titlu);
        $safe_autor = preg_replace('/[^A-Za-z0-9\-]/', '_', $autor);
        $safe_editura = preg_replace('/[^A-Za-z0-9\-]/', '_', $editura);
        $filename = $safe_titlu . '_' . $safe_autor . '_' . $safe_editura . '.' . $file_extension;
        
        $target_path = $upload_dir . $filename;
        $db_path = '/images/' . $filename;
        
        // Move the uploaded file to the target location
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            return $db_path; // Return path to store in DB
        }
    }
    return ''; // Return empty string if no file or an error occurred
}


// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Create a new Book object from the POST data
    $book = new Book($_POST);
    
    // 2. Handle the image upload
    $book->image = handleImageUpload($_POST['titlu'], $_POST['autor'], $_POST['editura']);
    
    // 3. Save the book to the database
    if ($book->save()) {
        $message = "Înregistrarea a fost adăugată cu succes!";
    } else {
        $message = "A apărut o eroare la adăugarea înregistrării.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Inserare - Raftul nostru</title>
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

    <h3 style="text-align: center"> Inserare element</h3>
    
    <?php if (isset($message)): ?>
        <div style="text-align: center; color: green; font-weight: bold;">
            <br><br><?php echo $message; ?>
        </div>
    <?php endif; ?>

    <div class="container d-flex justify-content-center">
        <form method="post" action="insert.php" enctype="multipart/form-data">
            Titlu:<br /><input type="text" name="titlu" required /><br />
            Autor:<br /><input type="text" name="autor" required /><br />
            Editura:<br /><input type="text" name="editura" /><br />
            An apariție:<br /><input type="text" name="an_aparitie" /><br />
            ISBN:<br /><input type="text" name="ISBN" /><br />
            Nr. exemplare:<br /><input type="text" name="nr_exemplare" value="1" required /><br />
            Imagine:<br /><input type="file" name="image" /><br />
            <br/>
            <input type="submit" name="submit" value="Submit" />
        </form>
    </div>

    <br /><br />
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
