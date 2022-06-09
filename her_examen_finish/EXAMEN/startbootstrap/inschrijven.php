<?php session_start();

    include("config.php");
    include('includes/header.php');

    $sign = 1;
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

        <div class="col-md-8">
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
                $reisID= $_GET['reisID'];
                $userID   = $_SESSION['userID'];

                $query = "SELECT * FROM reis WHERE reisID=$reisID";
                $result_tasks = mysqli_query($conn, $query);

                while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                    <tr>
                        <td><?php echo "<img src='fotos/" . $row['foto'] . "' width='250px' height='250px '>"; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['omschrijving']; ?></td>
                        <td><?php echo $row['begindatum']; ?></td>
                        <td><?php echo $row['einddatum']; ?></td>
                        <td><?php echo $row['bestemming']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <a href="read_task.php" class="btn btn-secondary">terug
                <i class="fa fa-arrow-left"></i>
            </a>
        </div>

        <?php
        $query2 = "SELECT * FROM inschrijvingen WHERE reisID='$reisID' AND id='$userID'";
        $result_tasks2 = mysqli_query($conn, $query2);

        $row2 = mysqli_fetch_assoc($result_tasks2);

        if ($row2['id'] == $userID ) {
            $sign = 2;
        }
        else {
            $sign = 1;
        }

       ?>

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

            if ($sign == 1)
            {  ?>
            <!--  STUDENT TOEVOEGEN VAN EVENEMENT / INSCHRIJVEN -->
            <div class="card card-body">
                <form action="save_inschrijf.php" method="POST">
                    <input type="hidden" name="reisID" value=<?php echo $reisID; ?>>
                    <input type="hidden" name="userID" value=<?php echo $userID; ?>>
                    <input type="submit" name="save_inschrijf" class="btn btn-success btn-block" value="inschrijven">
                </form>
            </div>
            <?php
            }
            else if ($sign == 2) { ?>
                <!--  STUDENT VERWIJDEREN AAN REIS / UITSCHRIJVEN -->
            <div class="card card-body">
                <form action="delete_inschrijf.php" method="POST">
                    <input type="hidden" name="reisID" value=<?php echo $reisID; ?>>
                    <input type="hidden" name="userID" value=<?php echo $userID; ?>>
                    <input type="submit" name="delete_inschrijf" class="btn btn-danger btn-block" value="uitschrijven">
                </form>
            </div>
            <?php
            }
            else {
                echo "<p>Inschrijvingen zitten vol!</p>";;
            }
            ?>
        </div>

    </div>
</main>

</html>
<?php include('includes/footer.php'); ?>
