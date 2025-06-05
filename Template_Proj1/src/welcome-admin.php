<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['user_email'])) {
    header("Location: log-in.php");
    exit();
}
/*
if ($_SESSION['user_role'] !== 'admin') {
    header("Location: index.php");
    exit();
}
*/
$sql = 'SELECT * FROM users ORDER BY id ASC';
$query = mysqli_query($con, $sql) or die(mysqli_error($con));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Profilul meu - Raftul nostru</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
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
                        <li class="nav-item"><a class="nav-link" href="/logout-admin.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Admin Header -->
        <div class="admin-header text-center">
            <div class="container">
                <h1><i class="fas fa-shield-alt"></i> Administrare
            </h1>
                <p class="lead">Bine ai venit, <?php echo htmlspecialchars($_SESSION['user_email']); ?>!</p>
            </div>
        </div>

        <!-- Page Content -->
        <div class="container">
            <!-- User Statistics -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="user-count">
                        <h4><i class="fas fa-users"></i> Utilizatori</h4>
                        <p class="mb-0">Total utilizatori înregistrați:
                            <strong><?php echo mysqli_num_rows($query); ?></strong></p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons text-center">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th><strong>ID</strong></th>
                                <th><strong>Nume</strong></th>
                                <th><strong>Prenume</strong></th>
                                <th><strong>Email</strong></th>
                                <th><strong>Telefon</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($query) > 0): ?>
                            <?php while ($row = mysqli_fetch_array($query)): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row["id"]); ?></td>
                                <td><?php echo htmlspecialchars($row["nume"]); ?></td>
                                <td><?php echo htmlspecialchars($row["prenume"]); ?></td>
                                <td><?php echo htmlspecialchars($row["email"]); ?></td>
                                <td><?php echo htmlspecialchars($row["telefon"]); ?></td>
<!--
                                <td>
                                    <a href="/db/view-user.php?id=<\*?php echo $row['id']; ?>"
                                        class="btn btn-info btn-sm me-1" title="Vezi detalii">
                                        <i class="fas fa-eye"></i> Vizualizează
                                    </a>
                                    
                                        <a href="/db/edit-user.php?id=</*?php echo $row['id']; ?>" 
                                           class="btn btn-warning btn-sm me-1" title="Editează">
                                            <i class="fas fa-edit"></i> Editează
                                        </a>
                                        <a href="/db/delete-user.php?id=</*?php echo $row['id']; ?>" 
                                           class="btn btn-danger btn-sm" title="Șterge"
                                           onclick="return confirm('Sigur doriți să ștergeți acest utilizator?')">
                                            <i class="fas fa-trash"></i> Șterge
                                        </a>
                                         
                                </td>
                                -->
                            </tr>
                            <?php endwhile; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    <?php if (isset($_GET['search']) && !empty($_GET['search'])): ?>
                                    Nu au fost găsiți utilizatori pentru căutarea
                                    "<?php echo htmlspecialchars($_GET['search']); ?>"
                                    <?php else: ?>
                                    Nu există utilizatori înregistrați.
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <br><br>

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
            <img src="../assets/pozaSus.jpg" width="100%" height="50" class="pozaHeaderJos"
                style="overflow: hidden; object-fit: cover;" />
        </div>

</body>

</html>