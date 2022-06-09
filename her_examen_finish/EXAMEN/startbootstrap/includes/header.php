<?php session_start();

//Login / Loguit systeem
if(!isset($_SESSION['username']))
{
    $login = '<a class="navbar-brand rounded" href="./login.php">Login</a>';
}
else
{
    if ($_SESSION['user-lvl'] == 1)
    {
        $login = '<a class="navbar-brand rounded" href="./logout.php">Loguit</a>';

    }

    else if ($_SESSION['user-lvl'] >= 1)
    {
        $login = '<a class="navbar-brand rounded" href="./logout.php">Loguit</a>';
    }

    else if ($_SESSION['user-lvl'] <= 1)
    {
        $login = '<a class="navbar-brand rounded" href="./logout.php">Loguit</a>';
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GLR</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/EXAMEN/startbootstrap/dist/index.php">GLR</a>
        <a class="navbar-brand" href="/EXAMEN/startbootstrap/read_gebruiker.php">Eigen Gegevens</a>
        <?php echo $login; ?>
    </div>
</nav>
