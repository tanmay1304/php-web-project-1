
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inserare - Raftul nostru</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
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
                        <li class="nav-item"><a class="nav-link" href="/sugestii.php">Sugestii</a></li>
                        <li class="nav-item"><a class="nav-link" href="/log-in.php">Log in</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- Page Content-->
    <br /> <br />

    <h3 style="text-align: center"> Inserare element</h3>
    <div class="container d-flex justify-content-center">

        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
            Titlu:<br /><input type="text" name="titlu" /><br />
            Autor:<br /><input type="text" name="autor" /><br />
            Editura:<br /><input type="text" name="editura" /><br />
            An apariție:<br /><input type="text" name="an_aparitie" /><br />
            ISBN:<br /><input type="text" name="ISBN" /><br />
            Nr. exemplare:<br /><input type="text" name="nr_exemplare" /><br />
            Imagine:<br /><input type="file" name="image" /><br />
            <input type="submit" name="submit" value="Submit" />
        </form>

    </div>

    <?php
    include "../connection.php";
    if(isset($_POST["submit"])){
        $titlu = $_POST["titlu"];
        $autor = $_POST["autor"];
        $editura = $_POST["editura"];
        $an_aparitie = $_POST["an_aparitie"];
        $ISBN = $_POST["ISBN"];
        $nr_exemplare = $_POST["nr_exemplare"];
        
        // Handle image upload
        $target = "";
        if(!empty($_FILES['image']['name'])){
            // Use absolute path from document root
            $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/images/';
            
            // Create images directory if it doesn't exist
            if (!file_exists($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            
            // Get file extension
            $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            
            // Create filename from title_author_editura
            $safe_titlu = preg_replace('/[^A-Za-z0-9\-]/', '_', $titlu);
            $safe_autor = preg_replace('/[^A-Za-z0-9\-]/', '_', $autor);
            $safe_editura = preg_replace('/[^A-Za-z0-9\-]/', '_', $editura);
            $filename = $safe_titlu . '_' . $safe_autor . '_' . $safe_editura . '.' . $file_extension;
            
            $target_path = $upload_dir . $filename;
            $target = '/images/' . $filename; // Path to store in database
            
            move_uploaded_file($_FILES['image']['tmp_name'], $target_path);
        }
        
        $sql="INSERT INTO carti (titlu,autor,editura,an_aparitie,ISBN,nr_exemplare,image) VALUES ('$titlu', '$autor', '$editura','$an_aparitie', '$ISBN', '$nr_exemplare', '$target')";
        $query= mysqli_query($con, $sql) or die(mysqli_error($con));
        echo "<div style='text-align: center;'> <br><br>Înregistrarea a fost adăugată cu succes!</div>";
    }
    ?>

    <br /><br />
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
    <script src="js/scripts.js"></script>
    <div class="logo">
        <img src="/assets/pozaSus.jpg" width="100%" height="50" class="pozaHeaderJos" overflow="hidden"
            object-fit="none" />
    </div>
</body>

</html>