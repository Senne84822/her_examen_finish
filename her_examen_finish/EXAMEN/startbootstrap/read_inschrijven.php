<?php session_start();

include("config.php");
include('includes/header.php');

//$ingeschreven = '0';
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/src/assets/img/glr_logo.png" />

    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<main class="container p-4">
    <div class="row">

        <div class="col-md-16">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Foto</th>
                    <th>Titel</th>
                    <th>Omschrijving</th>
                    <th>Begin Datum</th>
                    <th>Eind Datum</th>
                    <th>Bestemming</th>
                </tr>
                </thead>
                <tbody>

                <!-- pak en echo de resultaten uit de database in de tabel -->
                <?php
                $reisID = $_GET['reisID'];
                $userID = $_SESSION['userID'];

                $query = "SELECT * FROM reis WHERE reisID='$reisID'";
                $result_tasks = mysqli_query($conn, $query);

                while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                    <tr>
                        <td><?php echo "<img src='fotos/" . $row['foto'] . "' width='200px' height='200px '>"; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['omschrijving']; ?></td>
                        <td><?php echo $row['begindatum']; ?></td>
                        <td><?php echo $row['einddatum']; ?></td>
                        <td><?php echo $row['bestemming']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="col-md-4">

            <!-- MESSAGES -->
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php unset ($_SESSION['message']); }
            else {

            }
            ?>
        </div>

    </div>

    <div class="row">

        <div class="col-md-16">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Naam</th>
                    <th>Studentmail</th>
                    <th>adres</th>
                    <th>Woonplaats</th>
                    <th>telnummer</th>
                    <th>geboortedatum</th>
                    <th>geslacht</th>
                    <th>Actie</th>
                </tr>
                </thead>
                <tbody>

                <!-- pak en echo de resultaten uit de database in de tabel -->
                <?php
                $query2 = "SELECT * FROM inschrijvingen WHERE reisID=$reisID";
                $result_tasks2 = mysqli_query($conn, $query2);

//                while($row2 = mysqli_fetch_assoc($result_tasks2)){
//                    $ingeschreven = $ingeschreven . ", ".$row2['id'];
//                }
//
//                $query3 = "SELECT * FROM gebruikers WHERE id IN ($ingeschreven)";
//                $result_tasks3 = mysqli_query($conn, $query3);

                $query3 = "SELECT * FROM `gebruikers` WHERE `id` IN (SELECT `id` FROM `inschrijvingen` WHERE `reisID`=".$reisID.")";
                $result_tasks3 = mysqli_query($conn, $query3);

                while($row3 = mysqli_fetch_assoc($result_tasks3)) { ?>
                    <tr>
                        <td><?php echo $row3['naam']; ?></td>
                        <td><?php echo $row3['studentmail']; ?></td>
                        <td><?php echo $row3['adres']; ?></td>
                        <td><?php echo $row3['woonplaats']; ?></td>
                        <td><?php echo $row3['telnummer']; ?></td>
                        <td><?php echo $row3['geboortedatum']; ?></td>
                        <td><?php echo $row3['geslacht']; ?></td>
                        <td>
                            <form action="delete_inschrijf.php" method="POST">
                                <input type="hidden" name="reisID" value=<?php echo $reisID; ?>>
                                <input type="hidden" name="userID" value=<?php echo $row3['id']; ?>>
                                <input type="submit" name="delete_inschrijf" class="btn btn-danger btn-block" value="uitschrijven">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <a href="read_task.php" class="btn btn-secondary">terug
                <i class="fa fa-arrow-left"></i>
            </a>
        </div>

    </div>

</main>

</html>
<?php include('includes/footer.php'); ?>
