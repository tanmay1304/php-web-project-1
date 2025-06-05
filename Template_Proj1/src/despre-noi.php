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
    <title>Despre noi - Raftul nostru</title>
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
                        <li class="nav-item"><a class="nav-link active" aria-current="page"
                                href="/despre-noi.php">Despre noi</a></li>
                        <!--<li class="nav-item"><a class="nav-link" href="/catalog.php">Catalog</a></li>-->
                        <li class="nav-item"><a class="nav-link" href="/imprumuta.php">Împrumută</a></li>
                        <li class="nav-item"><a class="nav-link" href="/sugestii.php">Sugestii</a></li>
                        <li class="nav-item"><a class="nav-link" href="/log-in.php">Log in</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Page content-->
    <br><br>
    <div class="container justify-content-center align-items-center">
        <h1 class="font-weight-light" style="text-align: center"> Despre noi</h1>

        <div class="row bg-secondary justify-content-center align-items-center">

            <div class="col-sm-5">
                <div class="col bg-light"
                    style="font-size: x-large; text-align: right; padding: 20px 30px 20px 30px;  margin: 0px 30px 0px 30px;;">
                    <p>
                        <text style=" font-family: 'Erica Type', Arial, sans-serif;">
                            Raftul Nostru
                        </text> a apărut din dorința simplă de a ține cărțile aproape de oameni. Suntem câțiva
                        prieteni care au crescut printre rafturi și care cred că lectura trebuie să rămână un lucru
                        firesc, accesibil și viu.
                        Am adunat mii de volume - vechi, noi, rare, uitate - și le-am pus la dispoziția celor care
                        vor să citească fără să-și facă griji de preț sau statut. Nu suntem o instituție, ci mai
                        degrabă un loc de întâlnire pentru cei care iubesc lectura și caută liniște, idei sau pur și
                        simplu o pauză bună.
                        La
                        <text style=" font-family: 'Erica Type', Arial, sans-serif;">
                            Raftul Nostru,
                        </text>
                        cărțile circulă, iar oamenii se întorc.
                    </p>
                </div>
            </div>

            <!-- embed mp4-->
            <div class="col-sm-7 justify-content-center align-items-center">
                <video width="700" height="400" muted autoplay loop>
                    <source src="/assets/PromoVid1.mp4" type="video/mp4">
                </video>
            </div>

        </div>
    </div>

    <div class="container justify-content-center align-items-center">
        <h1 class="font-weight-light" style="text-align: center"> Unde ne găsiți?</h1>
        <div class="row bg-secondary justify-content-center align-items-center">
            <div class="col-sm-5 justify-content-center align-items-center">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="470" height="400" id="gmap_canvas"
                            src="https://maps.google.com/maps?q=Bulevardul+Carol+I+17%2C+Ia%C8%99i&t=&z=16&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                height: 400px;
                                width: 500px;
                            }
                        </style>
                        <style>
                            .gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                height: 400px;
                                width: 500px;
                            }
                        </style>
                    </div>
                </div>
            </div>

            <!-- video Youtube-->
            <div class="col-sm-7 align-items-center ustify-content-center">
                <iframe width="700" height="350"
                    src="https://www.youtube-nocookie.com/embed/ZNSA0NrDeb4?si=2amR2UVSAbvwzgPR&;controls=0?autoplay=1&mute=1"
                    title="Promo" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                </iframe>
            </div>

        </div>
    </div>

        <br><br>
    <br><br>

    <div class="container col-sm-9">
        <div class="row">

            <div class="col-sm-4 bg-dark text-bg-dark">
                <h1 style="text-align:center"> Contact </h1>
                <div class="container-sm-3 bg-light text-bg-light ">
                    <ul>
                        <br>

                        <img src="/assets/Adresa.png" width="10px" height="20px" />
                        Adresă: Bulevardul Carol I 17, Iași
                        <br>
                        <img src="/assets/Program.jpg" width="15px" height="15px" />
                        Program:
                        <ul>
                            <li> Luni-Vineri: 8:00 - 19:00
                            <li> Sambata: 9:00 - 16:30
                            <li> Duminica: inchis
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

            <div class="col-sm-1">
                <p></p>
            </div>

            <div class="col-sm-6 bg-light">

                <h1 style="text-align:center"> Dă mai departe! </h1>

                <p></p>
                <p></p>

                <!-- butoane social media -->
                <div class="d-flex justify-content-start align-items-center gap-3">
                    <div class="container bg-dark text-bg-dark rounded-circle d-flex justify-content-center align-items-center"
                        style="width: 137px; height: 137px;">
                        <div class="fb-share-button" data-href="https://www.math.uaic.ro" data-layout="" data-size="">
                            <a target="_blank"
                                href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.math.uaic.ro%2F"
                                class="fb-xfbml-parse-ignore">
                                <img src="/assets/Facebook.png" width="132px" height="132px">
                            </a>
                        </div>
                    </div>
                    <div class="container bg-primary rounded-circle d-flex justify-content-center align-items-center"
                        style="width: 77px; height: 77px;">

                        <a onclick="toggleAudio();">
                            <img id="butonAudio" src="assets/ButonAudioPlay.png" style="width: 50px; height: 50px;">
                        </a>

                        <script>
                            var audio = new Audio('assets/BackgroundMusic.mp3');
                            var isPlaying = false;
                            var buttonImg = document.getElementById('butonAudio');

                            function toggleAudio() {
                                if (isPlaying) {
                                    audio.pause();
                                    isPlaying = false;
                                    buttonImg.src = "assets/ButonAudioPlay.png";
                                } else {
                                    audio.play();
                                    isPlaying = true;
                                    buttonImg.src = "assets/ButonAudioPause.png";
                                }
                            }
                            audio.addEventListener('ended', function() {
                                isPlaying = false;
                                buttonImg.src = "ButonAudio.png";
                            });
                        </script>
                    </div>

                    <div class="container bg-dark rounded-circle d-flex justify-content-center align-items-center"
                        style="width: 127px; height: 127px;">
                        <div class="reddit-share-button" data-href="https://www.math.uaic.ro" data-layout=""
                            data-size="">
                            <a href="https://www.reddit.com/submit?url=https://www.math.uaic.ro/&title=Check%20this%20out%20"
                                target="_blank">
                                <img src="/assets/Reddit.png" width="95px" height="95px">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container bg-dark rounded-circle d-flex justify-content-center align-items-center"
                    style="width: 107px; height: 107px;">
                    <div class="wapp-share-button">
                        <a href="https://wa.me/?text=Check%20this%20out%20https://www.math.uaic.ro/"
                            data-action="share/whatsapp/share" target="_blank">
                            <img src="/assets/Whatsapp.png" width="87px" height="87px">
                        </a>
                    </div>
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