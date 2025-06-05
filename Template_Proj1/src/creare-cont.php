<?php
session_start();
require_once __DIR__ . '/lib/User.php';

$numeErr = $prenumeErr = $telefonErr = $emailErr = $passwordErr = "";
$nume = $prenume = $telefon = $email = $password = "";
$form_was_submitted = ($_SERVER["REQUEST_METHOD"] === "POST");
$err = 0;

if ($form_was_submitted) {
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (empty($_POST["nume"])) {
        $numeErr = "Lipsă nume.";
        $err = 1;
    } else {
        $nume = test_input($_POST["nume"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $nume)) {
            $numeErr = "Doar litere și spații sunt permise.";
            $err = 1;
        }
    }
    if (empty($_POST["prenume"])) {
        $prenumeErr = "Lipsă prenume.";
        $err = 1;
    } else {
        $prenume = test_input($_POST["prenume"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $prenume)) {
            $prenumeErr = "Doar litere și spații sunt permise.";
            $err = 1;
        }
    }
    if (empty($_POST["telefon"])) {
        $telefonErr = "Lipsă telefon.";
        $err = 1;
    } else {
        $telefon = test_input($_POST["telefon"]);
        if (!preg_match('/^[0-9]+$/', $telefon) || strlen($telefon) != 10) {
            $telefonErr = "Numărul de telefon trebuie să conțină 10 cifre.";
            $err = 1;
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Lipsă email.";
        $err = 1;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format nevalid.";
            $err = 1;
        }
    }
    if (empty($_POST["parola"])) {
        $passwordErr = "Lipsă parolă.";
        $err = 1;
    } else {
        $password = test_input($_POST["parola"]);
    }
    if ($err == 0) {
        $user = new User([
            'nume' => $nume,
            'prenume' => $prenume,
            'telefon' => $telefon,
            'email' => $email,
            'parola' => $password
        ]);
        if ($user->save()) {
            $success_message = "Utilizator înregistrat cu succes!";
        } else {
            $emailErr = "A apărut o eroare la înregistrare. Este posibil ca email-ul să fie deja folosit.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Înregistrare - Raftul nostru</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="css/styles.css" rel="stylesheet" />
    <style>.error { color: red; font-size: 8pt; }</style>
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
                        <li class="nav-item"><a class="nav-link" href="/sugestii.php">Sugestii</a></li>
                        <li class="nav-item"><a class="nav-link" href="/log-in.php">Log in</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <br><br>
    <div class="row" style="text-align: center">
        <h1 style="text-align: center"> Înregistrare </h1>
        <?php if (isset($success_message)): ?>
            <div style="color: green; font-weight: bold;"><?php echo $success_message; ?></div>
            <br>
            <a href="log-in.php">Click aici pentru a te autentifica.</a>
            <br><br>
        <?php endif; ?>
        <p><span class="error" style="font-size:8pt; text-align: center">*câmp necesar </span></p>
        <br>
        <div class="container d-flex justify-content-center">
            <div class="col-sm-4 align-text-right">
                <form method="post" action="creare-cont.php">
                    <input type="text" name="nume" placeholder="Nume" value="<?php echo htmlspecialchars($nume); ?>">
                    <span class="error">*<?php echo $numeErr;?></span>
                    <br><br>
                    <input type="text" name="prenume" placeholder="Prenume" value="<?php echo htmlspecialchars($prenume); ?>">
                    <span class="error">*<?php echo $prenumeErr;?></span>
                    <br><br>
                    <input type="text" name="telefon" placeholder="Telefon" value="<?php echo htmlspecialchars($telefon); ?>">
                    <span class="error">*<?php echo $telefonErr;?></span>
                    <br><br>
                    <input type="text" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>">
                    <span class="error">*<?php echo $emailErr;?></span>
                    <br><br>
                    <input type="password" name="parola" placeholder="Parola">
                    <span class="error">*<?php echo $passwordErr;?></span>
                    <br><br>
                    <input type="submit" name="submit" value="Înregistrare">
                </form>
            </div>
        </div>
    </div>
    <br><br>

    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-white">Copyright &copy; Raftul nostru 2025</p>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>

    <div class="logo">
        <img src="/assets/pozaSus.jpg" width="100%" height="50" class="pozaHeaderJos" style="overflow: hidden; object-fit: cover;" />
    </div>
</body>
</html>
