<?php
session_start();
include "connection.php";


$sql='SELECT * from users';
$query = mysqli_query($con, $sql) or die(mysqli_error($con));


        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $numeErr=$prenumeErr=$telefonErr=$emailErr=$passwordErr="";
        $nume =$prenume =$telefon =$email=$password="";
        $err=0;
        if (isset($_POST["submit"])) {
            if(empty($_POST["nume"])) {
                $numeErr="Lipsă nume.";
                $err=1;
            } else {
                $nume = test_input($_POST["nume"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $nume)){
                    $numeErr = "Doar litere și spații sunt permise.";
                    $err=1;
                }
            }
            if(empty($_POST["prenume"])) {
                $prenumeErr="Lipsă prenume.";
                $err=1;
            } else {
                $prenume = test_input($_POST["prenume"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $prenume)){
                    $prenumeErr = "Doar litere și spații sunt permise.";
                    $err=1;
                }
            }
            if(empty($_POST["telefon"])) {
                $telefonErr="Lipsă telefon.";
                $err=1;
            } else {
                $telefon = test_input($_POST["telefon"]);
                if (!preg_match('/^[0-9]+$/', $telefon)){
                    $telefonErr = "Doar cifre sunt permise.";
                    $err=1;
                }
                if (strlen($telefon)!=10){
                    $telefonErr="Numărul de telefon trebuie să conțină 10 cifre.";
                    $err=1;
                }
            }
            if(empty($_POST["email"])) {
                $emailErr="Lipsă email.";
                $err=1;
            } else {
                $email = test_input($_POST["email"]);
                $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
                if (!preg_match($pattern, $email)){
                    $err=1;
                    $emailErr = "Format nevalid.";
                }
            }
             if(empty($_POST["parola"])) {
                $passwordErr="Lipsă parolă.";
                $err=1;
            } else {
                $password = test_input($_POST["parola"]);
            }


            if ($err==0){
                $sql="INSERT INTO users(nume,prenume,telefon,email,parola) VALUES ('{$nume}', '{$prenume}', '{$telefon}', '{$email}', '{$password}') ";
                $query = mysqli_query($con,$sql) or die(mysqli_error($con));
                
setcookie('nume', $_POST['nume'], ['expires' => time() + 3600, 'path' => '/', 'secure' => true, 'httponly' => true, 'samesite' => 'Strict']);
setcookie('prenume', $_POST['prenume'], ['expires' => time() + 3600, 'path' => '/', 'secure' => true, 'httponly' => true, 'samesite' => 'Strict']);
setcookie('user_role', "user", ['expires' => time() + 3600, 'path' => '/', 'secure' => true, 'httponly' => true, 'samesite' => 'Strict']);

                echo "<div style='text-align: center;'> <br><br>Utilizator înregistrat cu succes!</div>";
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
    <title>Înregistrare - Raftul nostru</title>
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

        <br><br>
        <br><br>

        <div class="row" style="text-align: center">
            <h1 style="text-align: center"> Înregistrare </h1>
            <p><span class="error" style="font-size:8pt; text-align: center">*câmp necesar </span></p>
            <br><br>
            <div class="container d-flex justify-content-center">
                <div class="col-sm-4 align-text-right">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <input type="text" name="nume" placeholder="Nume">
                        <span class="error">*<?php echo $numeErr;?></span>
                        <br><br>
                        <input type="text" name="prenume" placeholder="Prenume">
                        <span class="error">*<?php echo $prenumeErr;?></span>
                        <br><br>
                        <input type="text" name="telefon" placeholder="Telefon">
                        <span class="error">*<?php echo $telefonErr;?></span>
                        <br><br>
                        <input type="text" name="email" placeholder="Email">
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

</body>
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