<?php
session_start();
include "../connection.php";
$sql="SELECT * FROM carti WHERE id='{$_GET['id']}'";
$query= mysqli_query($con,$sql) or die(mysqli_error($con));
$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Vizualizează - Raftul nostru</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body>
    <div class="header-container">
        <!-- Logo -->
        <div class="logo">
            <img src="/assets/pozaSus.jpg" width="100%" height="50" class="pozaHeaderSus" overflow="hidden"
                object-fit="none" />
        </div>
        <!-- Responsive navbar-->
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
    <!-- Page Content-->
    <br /> <br />
    
    <h3 style="text-align: center">Detalii carte</h3>
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title"><?php echo $row["titlu"]; ?></h5>
                            <p class="card-text">
                                <strong>Autor:</strong> <?php echo $row["autor"]; ?><br/>
                                <strong>Editura:</strong> <?php echo $row["editura"]; ?><br/>
                                <strong>An apariție:</strong> <?php echo $row["an_aparitie"]; ?><br/>
                                <strong>ISBN:</strong> <?php echo $row["ISBN"]; ?><br/>
                                <strong>Nr. exemplare:</strong> <?php echo $row["nr_exemplare"]; ?><br/>
                            </p>
                        </div>
                        <?php if(!empty($row['image'])): ?>
                        <div class="col-md-4 text-center">
                            <img src="<?php echo $row['image']; ?>" class="img-fluid" style="max-width: 100%; height: auto;" alt="Imagine carte">
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
        <a class="btn btn-secondary btn-lg" href="../catalog.php">Înapoi</a>
    </div>
    <br /><br />

    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-white">Copyright &copy; Raftul nostru 2025</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../js/scripts.js"></script>
    <div class="logo">
        <img src="/assets/pozaSus.jpg" width="100%" height="50" class="pozaHeaderJos" overflow="hidden"
            object-fit="none" />
    </div>
</body>

</html>