<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include 'connection.php';
$sql='SELECT * from carti';
$query = mysqli_query($con, $sql) or die(mysqli_error($con));
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Catalog - Raftul nostru</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
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
                        <!--<li class="nav-item"><a class="nav-link active" aria-current="page"
                                href="/catalog.php">Catalog</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="/sugestii.php">Sugestii</a></li>
                        <li class="nav-item"><a class="nav-link" href="/log-in.php">Log in</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Content-->

        <p></p>
        <div class="container text-center" height="130px">
            <!-- canvas 1-->
            <canvas id="myCanvas" width="700" height="80"></canvas>
            <script>
                const c = document.getElementById("myCanvas");
                const ctx = c.getContext("2d");
                ctx.font = "oblique 25px Courier New";
                ctx.fillText("bine ați venit la", 12, 48);
                ctx.font = "oblique 40px Courier New";
                ctx.strokeText("Catalogul nostru", 286, 63);
                ctx.strokeStyle = "#361f27";
                ctx.strokeText("Catalogul nostru", 284, 61);
                ctx.fillStyle = "#7C7287";
                ctx.fillText("Catalogul nostru", 282, 59);
            </script>
        </div>

        <div class="container d-flex flex-column justify-content-center align-items-center">

            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <div class="container my-3">
                <form method="get" action="db/search.php" class="d-flex justify-content-center">
                    <div class="input-group" style="max-width: 500px;">
                        <input type="text" class="form-control" name="q" placeholder="Caută titlu, autor, ISBN"
                            required>
                        <button type="submit" class="btn btn-primary btn-lg">Căutare</button>
                    </div>
                </form>
            </div>
            <div class="container text-center mb-4">
                <a class="btn btn-secondary btn-lg" href="/db/insert.php">Adaugă un element</a>
            </div>

            <p></p>
            <p></p>

            <div class="container d-flex justify-content-center">
                <table class="table table-striped w-100" style="max-width: 80%;">
                    <thead>
                        <tr class="table-light">
                            <th><strong>Titlu</strong></th>
                            <th><strong>Autor</strong></th>
                            <th><strong>Editura</strong></th>
                            <th><strong>An apariție</strong></th>
                            <th><strong>ISBN</strong></th>
                            <th><strong>Nr. exemplare</strong></th>
                            <th><strong>Actions</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row=mysqli_fetch_array($query)){?>
                        <tr>
                            <td><?php echo $row["titlu"];?></td>
                            <td><?php echo $row["autor"];?></td>
                            <td><?php echo $row["editura"];?></td>
                            <td><?php echo $row["an_aparitie"];?></td>
                            <td><?php echo $row["ISBN"];?></td>
                            <td><?php echo $row["nr_exemplare"]; ?> </td>

                            <td>
                                <a href="/db/view.php?id=<?php echo $row['id']; ?>"
                                    class="btn btn-secondary btn-sm me-1">Vizualizează</a>
                                <a href="/db/edit.php?id=<?php echo $row['id']; ?>"
                                    class="btn btn-primary btn-sm me-1">Editează</a>
                                <a href="/db/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Ștergeți?')">Șterge</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

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
            <img src="/assets/pozaSus.jpg" width="100%" height="50" class="pozaHeaderJos"
                style="overflow: hidden; object-fit: cover;" />
        </div>

</html>