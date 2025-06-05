<?php
session_start();
require_once __DIR__ . '/../lib/Book.php';

$book_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$book = Book::findById($book_id);

if (!$book) {
    header("Location: ../catalog.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Vizualizează - <?php echo htmlspecialchars($book->titlu); ?></title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="header-container">
        <div class="logo">
            <img src="/assets/pozaSus.jpg" width="100%" height="50" class="pozaHeaderSus" overflow="hidden" object-fit="none" />
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="/">Raftul nostru</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"><span class="navbar-toggler-icon"></span></button>
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
    <h3 style="text-align: center">Detalii carte</h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="card-title"><?php echo htmlspecialchars($book->titlu); ?></h5>
                                <p class="card-text">
                                    <strong>Autor:</strong> <?php echo htmlspecialchars($book->autor); ?><br/>
                                    <strong>Editura:</strong> <?php echo htmlspecialchars($book->editura); ?><br/>
                                    <strong>An apariție:</strong> <?php echo htmlspecialchars($book->an_aparitie); ?><br/>
                                    <strong>ISBN:</strong> <?php echo htmlspecialchars($book->ISBN); ?><br/>
                                    <strong>Nr. exemplare:</strong> <?php echo htmlspecialchars($book->nr_exemplare); ?><br/>
                                </p>
                            </div>
                            <?php if(!empty($book->image)): ?>
                            <div class="col-md-4 text-center">
                                <img src="<?php echo '..' . htmlspecialchars($book->image); ?>" class="img-fluid" style="max-width: 100%; height: auto;" alt="Imagine carte">
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    <div class="logo">
        <img src="/assets/pozaSus.jpg" width="100%" height="50" class="pozaHeaderJos" overflow="hidden" object-fit="none" />
    </div>
</body>
</html>
