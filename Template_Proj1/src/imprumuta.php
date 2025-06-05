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
  <title>Imprumută - Raftul nostru</title>
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
            class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav d-flex justify-content-evenly align-items-center w-100">
            <li class="nav-item"><a class="nav-link" href="/">Acasă</a></li>
            <li class="nav-item"><a class="nav-link" href="/despre-noi.php">Despre noi</a></li>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="/imprumuta.php">Împrumută</a></li>
                        <!--<li class="nav-item"><a class="nav-link" href="/catalog.php">Catalog</a></li>-->
            <li class="nav-item"><a class="nav-link" href="/sugestii.php">Sugestii</a></li>
            <li class="nav-item"><a class="nav-link" href="/log-in.php">Log in</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content-->
    <section id="imprumuta" class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <h2 class="mb-4 text-center">Politica de Împrumut</h2>
          <p>
            Cărțile din Raftul Nostru pot fi împrumutate gratuit de către orice persoană interesată de lectură. Nu se
            percep taxe, nu este nevoie de abonament sau adeverințe. Înscrierea constă doar în completarea unui formular
            simplu, cu numele complet și date de contact (email sau număr de telefon).
          </p>
          <ul class="list-group list-group-flush mb-4">
            <li class="list-group-item">
              <strong>Durata împrumutului:</strong> maximum 30 de zile. Se permite o singură prelungire de 15 zile, doar
              dacă nu există rezervări pentru titlul respectiv.
            </li>
            <li class="list-group-item">
              <strong>Număr de cărți:</strong> fiecare persoană poate avea în același timp cel mult 3 cărți împrumutate.
            </li>
            <li class="list-group-item">
              <strong>Prelungire:</strong> se solicită prin email, telefon sau direct la raft, cu cel puțin 2 zile
              înainte de data limită.
            </li>
            <li class="list-group-item">
              <strong>Returnare:</strong> la termen. Întârzierile frecvente pot duce la suspendarea temporară a
              accesului.
            </li>
            <li class="list-group-item">
              <strong>Stare materială:</strong> cărțile trebuie returnate în aceeași stare. Deteriorările semnificative
              sau pierderile implică înlocuirea volumului cu un alt exemplar.
            </li>
            <li class="list-group-item">
              <strong>Rezervări:</strong> se pot face pentru cel mult 2 titluri simultan. Rezervarea expiră după 3 zile
              dacă nu este ridicată.  
            </li>
            <li class="list-group-item">
              <strong>Transferuri:</strong> nu încurajăm împrumutul mai departe între persoane. Toate cărțile trebuie
              returnate direct la Raftul Nostru.
            </li>
          </ul>
          <p>
            Cărțile circulă bine când sunt tratate cu grijă. Funcționăm pe încredere și asumare, fără formalități
            inutile. Dacă vrei să împrumuți, citește, respectă termenii și adu cartea înapoi. Atât.
          </p>
        </div>
      </div>
    </section>

    <div class="col-md-12 d-flex justify-content-center mb-5">
      <a class="btn btn-secondary btn-lg px-4 py-3 fs-5" href="/catalog.php">Vezi catalogul nostru</a>
    </div>

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