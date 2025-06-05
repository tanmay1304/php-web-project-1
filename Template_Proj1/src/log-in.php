<?php
session_start();
include 'connection.php';
/* setcookie('nume', $_SESSION['nume'], ['expires' => time() + 3600, 'path' => '/', 'secure' => true, 'httponly' => true, 'samesite' => 'Strict']);
setcookie('prenume', $_SESSION['prenume'], ['expires' => time() + 3600, 'path' => '/', 'secure' => true, 'httponly' => true, 'samesite' => 'Strict']);
setcookie('user_role', $_SESSION['user_role'], ['expires' => time() + 3600, 'path' => '/', 'secure' => true, 'httponly' => true, 'samesite' => 'Strict']); */

if (!isset($_SESSION['number1']) || !isset($_SESSION['number2'])) {
    $_SESSION['number1'] = rand(0,30);
    $_SESSION['number2'] = rand(0,30);
    $_SESSION['correctsum'] = $_SESSION['number1'] + $_SESSION['number2'];
}

$emailErr = $parolaErr = $captchaErr = "";
$email = $parola = $captcha = "";
$err = 0;

if (isset($_POST["submit"])) {
    if (empty($_POST["email"])) {
        $emailErr = "Email este necesar.";
        $err = 1;
    } else {
        $email = trim($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format email invalid.";
            $err = 1;
        }
    }

    if (empty($_POST["parola"])) {
        $parolaErr = "Parola este necesară.";
        $err = 1;
    } else {
        $parola = trim($_POST["parola"]);
    }

    $captchaWrong = false;
    if (empty($_POST["captcha"])) {
        $captchaErr = "Captcha este necesar.";
        $err = 1;
        $captchaWrong = true;
    } else {
        $captcha = trim($_POST["captcha"]);
        if (!is_numeric($captcha) || (int)$captcha != $_SESSION['correctsum']) {
            $captchaErr = "Captcha greșit.";
            $err = 1;
            $captchaWrong = true;
        }
    }

    if ($err == 0) {
        $sql = "SELECT * FROM users WHERE email = '{$email}' AND parola = '{$parola}'";
        $query = mysqli_query($con, $sql) or die(mysqli_error($con));
        
        if (mysqli_num_rows($query) > 0) {
            $_SESSION['user_email'] = $email;
            $_SESSION['number1'] = rand(0,30);
            $_SESSION['number2'] = rand(0,30);
            $_SESSION['correctsum'] = $_SESSION['number1'] + $_SESSION['number2'];
            header("Location: welcome.php");
            exit();
        } else {
            $emailErr = "Email sau parolă incorectă.";
            $_SESSION['number1'] = rand(0,30);
            $_SESSION['number2'] = rand(0,30);
            $_SESSION['correctsum'] = $_SESSION['number1'] + $_SESSION['number2'];
        }
    } else {
        if ($captchaWrong) {
            $_SESSION['number1'] = rand(0,30);
            $_SESSION['number2'] = rand(0,30);
            $_SESSION['correctsum'] = $_SESSION['number1'] + $_SESSION['number2'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Log in - Raftul nostru</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
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
                        <!--<li class="nav-item"><a class="nav-link" href="/catalog.php">Catalog</a></li>-->
                        <li class="nav-item"><a class="nav-link" href="/sugestii.php">Sugestii</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/log-in.php">Log
                                in</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Content-->

        <br><br>
        <br><br>

        <a href="admin-auth.php" style="text-align: center; color: black !important; text-decoration: none !important;">
            <h1>Autentificare</h1>
        </a>

        <br><br>

        <div class="row justify-content-center">
            <div class="col-md-3 align-content-center">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="mb-2">
                                <label for="email" class="form-label">Email:</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    value="<?php echo $email; ?>">
                                <span class="error"><?php echo $emailErr; ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="parola" class="form-label">Parola:</label>
                                <input type="password" class="form-control" id="parola" name="parola">
                                <span class="error"><?php echo $parolaErr; ?></span>
                            </div>

                            <div class="mb-3">
                                <label for="captcha" class="form-label">
                                    Captcha: <?php echo $_SESSION['number1'] . ' + ' . $_SESSION['number2'] . ' = '; ?>
                                </label>
                                <input type="text" class="form-control" id="captcha" name="captcha"
                                    placeholder="Introdu suma">
                                <span class="error"><?php echo $captchaErr; ?></span>
                            </div>

                            <div class="text-center">
                                <input type="submit" name="submit" class="btn btn-primary" value="Logare">
                                <input type="reset" class="btn btn-secondary" value="Reset fields">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a class="btn btn-secondary" href="creare-cont.php">Înregistrează-te</a>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
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
        <script src="js/scripts.js"></script>
        <div class="logo">
            <img src="/assets/pozaSus.jpg" width="100%" height="50" class="pozaHeaderJos" overflow="hidden"
                object-fit="none" />
        </div>
</body>

</html>