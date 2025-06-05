<?php
session_start();
$logged_in = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sugestii - Raftul nostru</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="css/styles.css" rel="stylesheet" />

    <script>
        function toggleFields() {
            var type = document.getElementById('tip_sugestie').value;
            document.getElementById('sugestie_carte').style.display = (type === 'carte') ? 'block' : 'none';
            document.getElementById('sugestie_altceva').style.display = (type === 'altceva') ? 'block' : 'none';
        }
    </script>
</head>

<body>
    <div class="header-container">
        <div class="logo">
            <img src="/assets/pozaSus.jpg" width="100%" height="50" class="pozaHeaderSus" />
        </div>
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
                        <li class="nav-item"><a class="nav-link active" aria-current="page"
                                href="/sugestii.php">Sugestii</a></li>
                        <li class="nav-item"><a class="nav-link" href="/log-in.php">Log in</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Page Content -->
    <div class="container my-4">
        <div class="row">
            <div class="col-md-8">
                <h1>Trimite o sugestie</h1>
                
                <?php if ($logged_in): ?>
                    <p>Folosește formularul de mai jos pentru a trimite o sugestie.</p>
                <form method="post" action="process_suggestion.php">
                    <label for="tip_sugestie">Alege:</label>
                    <select name="tip_sugestie" id="tip_sugestie" onchange="toggleFields()" required>
                        <option value="">--Selectează--</option>
                        <option value="carte">Carte</option>
                        <option value="altceva">Altceva</option>
                    </select>

                    <div id="sugestie_carte" style="display:none;">
                        <label for="titlu">Titlu:</label>
                        <input type="text" name="titlu" maxlength="100"><br>

                        <label for="autor">Autor:</label>
                        <input type="text" name="autor" maxlength="100"><br>

                        <label for="isbn">ISBN:</label>
                        <input type="text" name="isbn" maxlength="20"><br>
                    </div>

                    <div id="sugestie_altceva" style="display:none;">
                        <label for="sugestie">Sugestia:</label><br>
                        <textarea name="sugestie" maxlength="300" rows="4" cols="50"></textarea>
                    </div>

                    <input type="submit" value="Trimite sugestia">
                </form>
                <?php else: ?>
                <p>Nu ești autentificat. Loghează-te pentru a putea trimite sugestii.</p>
                <?php endif; ?>
            </div>

            <div class="col-sm-3">
                <h1 style="text-align:right"> Contact </h1>
                <div class="container bg-dark text-bg-dark">
                    <ul>
                        <br>
                        <img src="/assets/Adresa.png" width="10px" height="20px" />
                        Adresă: Bulevardul Carol I 17, Iași
                        <br>
                        <img src="/assets/Program.jpg" width="15px" height="15px" />
                        Program:
                        <ul>
                            <li> Luni-Vineri: 8:00 - 19:00
                            <li> Sâmbătă: 9:00 - 16:30
                            <li> Duminică: închis
                        </ul>
                        <img src="/assets/Telefon.png" width="15px" height="15px" />
                        Telefon:
                        <ul>
                            <li> 0767253698
                            <li> 0232587896
                        </ul>
                    </ul>
                    <br>
                </div>
            </div>

            <div class="col-sm-1"></div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-white">Copyright &copy; Raftul nostru 2025</p>
        </div>
    </footer>

    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>

    <div class="logo">
        <img src="/assets/pozaSus.jpg" width="100%" height="50" class="pozaHeaderJos" />
    </div>
</body>
</html>
