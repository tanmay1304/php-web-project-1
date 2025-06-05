<?php
require_once __DIR__ . '/lib/User.php';
require_once __DIR__ . '/lib/Auth.php';

Auth::startSession();

if (Auth::isUserLoggedIn()) {
    header("Location: welcome.php");
    exit();
}

if (!isset($_SESSION['number1']) || !isset($_SESSION['number2'])) {
    $_SESSION['number1'] = rand(0, 30);
    $_SESSION['number2'] = rand(0, 30);
    $_SESSION['correctsum'] = $_SESSION['number1'] + $_SESSION['number2'];
}

$emailErr = $parolaErr = $captchaErr = "";
$email = "";
$err = 0;

function regenerate_captcha() {
    $_SESSION['number1'] = rand(0, 30);
    $_SESSION['number2'] = rand(0, 30);
    $_SESSION['correctsum'] = $_SESSION['number1'] + $_SESSION['number2'];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
    }

    if (empty($_POST["captcha"])) {
        $captchaErr = "Captcha este necesar.";
        $err = 1;
    } elseif (!is_numeric($_POST["captcha"]) || (int)$_POST["captcha"] != $_SESSION['correctsum']) {
        $captchaErr = "Captcha greșit.";
        $err = 1;
    }

    if ($err == 0) {
        $parola = trim($_POST["parola"]);
        $user = User::findByEmail($email);
        
        if ($user && $user->verifyPassword($parola)) {
            Auth::login($user);
            regenerate_captcha();
            header("Location: welcome.php");
            exit();
        } else {
            $emailErr = "Email sau parolă incorectă.";
            regenerate_captcha();
        }
    } else {
        regenerate_captcha();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Log in - Raftul nostru</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="css/styles.css" rel="stylesheet" />
    <style>.error { color: red; font-size: 12px; }</style>
</head>
<body>
    <div class="header-container">
        <div class="logo">
             <img src="/assets/pozaSus.jpg" width="100%" height="50" class="pozaHeaderSus" overflow="hidden" object-fit="none" />
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="/">Raftul nostru</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex justify-content-evenly align-items-center w-100">
                        <li class="nav-item"><a class="nav-link" href="/">Acasă</a></li>
                        <li class="nav-item"><a class="nav-link" href="/despre-noi.php">Despre noi</a></li>
                        <li class="nav-item"><a class="nav-link" href="/imprumuta.php">Împrumută</a></li>
                        <li class="nav-item"><a class="nav-link" href="/sugestii.php">Sugestii</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/log-in.php">Log in</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

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
                    <form method="post" action="log-in.php">
                        <div class="mb-2">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
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
                            <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Introdu suma">
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
    
    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-white">Copyright &copy; Raftul nostru 2025</p>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    
    <div class="logo">
        <img src="/assets/pozaSus.jpg" width="100%" height="50" class="pozaHeaderJos" overflow="hidden"
             object-fit="none" />
    </div>
</body>
</html>
