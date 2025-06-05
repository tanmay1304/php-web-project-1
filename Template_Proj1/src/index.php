<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Acasă - Raftul nostru</title>
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
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Acasă</a></li>
                        <li class="nav-item"><a class="nav-link" href="/despre-noi.php">Despre noi</a></li>
                        <li class="nav-item"><a class="nav-link" href="/imprumuta.php">Împrumută</a></li>
                        <!--<li class="nav-item"><a class="nav-link" href="/catalog.php">Catalog</a></li>-->
                        <li class="nav-item"><a class="nav-link" href="/sugestii.php">Sugestii</a></li>
                        <li class="nav-item"><a class="nav-link" href="/log-in.php">Log in</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">

                <!-- slideshow cu poze -->
                <div class="col-lg-6">

                    <div class="slideshow-container row gx-lg-4">

                        <!-- Full-width images with number and caption text -->
                        <div class="mySlides">
                            <img src="/assets/pozaSlideshow1.jpeg" style="width:100%">
                        </div>

                        <div class="mySlides">
                            <img src="/assets/pozaSlideshow2.jpeg" style="width:100%">
                        </div>

                        <div class="mySlides">
                            <img src="/assets/pozaSlideshow3.jpeg" style="width:100%">
                        </div>

                        <!-- Next and previous buttons -->

                        <div class="col-2"> </div>
                        <div class="col-4">
                            <a class="prev" onclick="plusSlides(-1)">
                                <svg width="70" height="30" viewBox="0 0 80.4 27" style="object-fit: cover;">
                                    <polygon
                                        points="0.0,13.8 38.4,27.0 29.4,16.2 80.4,21.0 66.6,14.7 80.4,9.0 29.7,11.1 38.4,0.0"
                                        fill="var(--bs-palantinate)" />
                                </svg>
                            </a>
                        </div>
                        <div class="col-2"> </div>
                        <div class="col-4" style="align-items: right">
                            <a class="next" onclick="plusSlides(1)">
                                <svg width="70" height="30" viewBox="0 0 80.4 27">
                                    <polygon
                                        points="80.4,13.8 42.0,27.0 51.0,16.2 0.0,21.0 13.8,14.7 0.0,9.0 50.7,11.1 42.0,0.0"
                                        fill="var(--bs-palantinate)" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- The dots/circles 
                    <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    </div>
                    -->

                    <script>
                        let slideIndex = 1;
                        showSlides(slideIndex);

                        function plusSlides(n) {
                            showSlides(slideIndex += n);
                        }

                        function currentSlide(n) {
                            showSlides(slideIndex = n);
                        }

                        function showSlides(n) {
                            let i;
                            let slides = document.getElementsByClassName("mySlides");
                            let dots = document.getElementsByClassName("dot");
                            if (n > slides.length) {
                                slideIndex = 1
                            }
                            if (n < 1) {
                                slideIndex = slides.length
                            }
                            for (i = 0; i < slides.length; i++) {
                                slides[i].style.display = "none";
                            }
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" active", "");
                            }
                            slides[slideIndex - 1].style.display = "block";
                            dots[slideIndex - 1].className += " active";
                        }
                    </script>
                </div>
                <!-- gata slideshow -->
                <!--div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="https://dummyimage.com/900x400/dee2e6/6c757d.jpg" alt="..." /></div-->
                <div class="col-lg-5">
                    <h1 class="font-weight-light">Bine ați venit la
                        <div style=" font-family: 'Erica Type', Arial, sans-serif;
                                    font-size: xx-large;
                                    font-style:oblique;">Raftul nostru!</div>
                    </h1>
                    <p>Suntem o bibliotecă privată pornită de câțiva oameni care iubesc cărțile și vor să le țină
                        aproape de ceilalți. Oferim acces la mii de volume fără formalități și fără pretenții. </p>

                    <div class="row-lg-5 justify-content-center">

                        <a class="btn btn-secondary btn-lg px-4 py-3 fs-5" href="/despre-noi.php">Află mai multe despre
                            noi!</a>
                        <a class="btn btn-primary btn-lg px-4 py-3 fs-5" href="/imprumuta.php"> Împrumută</a>
                    </div>

                </div>
            </div>
        </div>

        <!-- Content Row
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Card One</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni
                                quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-secondary btn-sm" href="#!">More Info</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Card Two</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur
                                ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id
                                dolore voluptates quos eligendi labore.</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-secondary btn-sm" href="#!">More Info</a></div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="card-title">Card Three</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni
                                quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                        </div>
                        <div class="card-footer"><a class="btn btn-secondary btn-sm" href="#!">More Info</a></div>
                    </div>
                </div>
            </div>
        </div>

        -->

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