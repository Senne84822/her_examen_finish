<!DOCTYPE html>

<?php
    session_start();

    //Login / Loguit systeem
    if(!isset($_SESSION['username']))
    {
        $login = '<a class="nav-link py-3 px-0 px-lg-3 rounded" href="../login.php">Login</a>';
    }
    else
    {
        if ($_SESSION['user-lvl'] == 1)
        {
            $login = '<a class="nav-link py-3 px-0 px-lg-3 rounded" href="../logout.php">Loguit</a>';

        }

        else if ($_SESSION['user-lvl'] >= 1)
        {
            $login = '<a class="nav-link py-3 px-0 px-lg-3 rounded" href="../logout.php">Loguit</a>';
        }

        else if ($_SESSION['user-lvl'] <= 1)
        {
            $login = '<a class="nav-link py-3 px-0 px-lg-3 rounded" href="../logout.php">Loguit</a>';
        }

    }
    $ulvl = $_SESSION['user-lvl'];
    $userID   = $_SESSION['userID'];

    // verifieer lvl van persoon (admin lvl req)
    if ( $ulvl == "2") {
        //site here


    }
    //Normal
    else{

    }
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="GLR" />
        <meta name="author" content="Senne" />
        <title>GLR</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../src/assets/img/glr_logo.png" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- bootstrap css links -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Core thema CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top" class="bg-primary">
        <!-- navigatie bar-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">Home</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" !important data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <?php  if ($_SESSION['user-lvl'] == 1 || 2)
                        {  ?>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="../read_task.php">inschrijven</a></li>
                        <?php }
                        else {

                        }
                        ?>
                        <li class="nav-item mx-0 mx-lg-1"><?php echo $login; ?></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- logo plaatje-->
                <img class="masthead-avatar mb-5" src="../src/assets/img/glr_logo.png" alt="..." />
                <!-- Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">WK Voetbal Qatar</h1>
                <!-- Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Finale bekijken in GLR!</p>
            </div>
        </header>
        <section class="page-section bg-primary text-white mb-4" id="about">
            <div class="container">
                <!-- About sectie Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white"></h2>
                <!-- icoon scheidingslijn-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About sectie Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="lead">Het GLR wil graag studenten de mogelijkheid geven om de finale op school te bekijken. In de ruimte van Podium- en Evenementen Techniek wordt een groot scherm gehangen waardoor dit mogelijke zou kunnen zijn! </p></div>
                    <div class="col-lg-4 me-auto"><p class="lead">Dit evenement zal plaatsvinden op Zondag 18 December 2022. Het zal om 14:30 beginnen en wordt geschat rond 16:30 te eindigen. Denk aan afstand houden. Afval in de prullebak doen enz. en je beste support outfit aan te doen natuurlijk!</p></div>
                </div>
                <!-- About Section Button-->
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light" href="../read_task.php">
                        <i class="fas fa-marker me-2"></i>
                        Schrijf je in!
                    </a>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer text-center text-white bg-secondary">
            <div class="container">
                <div class="row">
                    <!-- Footer locatie-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">GLR locatie</h4>
                        <p class="lead mb-0">
                            Heer Bokelweg 255
                            <br />
                            3032 AD Rotterdam
                        </p>
                    </div>
                    <!-- Footer media contact iconen-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Contact</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                    </div>
                    <!-- Footer Over tekst-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Over dit evenement</h4>
                        <p class="lead mb-0">
                           Klas Podium Techniek van
                            <a href="https://www.glr.nl/">GLR</a>
                            .
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright sectie-->
        <div class="copyright py-4 text-center bg-secondary text-white">
            <div class="container"><small>Copyright &copy; Grafisch Lyceum Rotterdam 2022</small></div>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- bootstrap JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <!-- Font Awesome iconen (gratis versie)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    </body>
</html>
