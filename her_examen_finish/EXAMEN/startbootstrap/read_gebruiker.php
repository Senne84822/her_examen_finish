<?php session_start();

include("config.php");
include('includes/header.php');

$userID = $_SESSION['userID'];

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
                    <th>Naam</th>
                    <th>Studentmail</th>
                    <th>adres</th>
                    <th>Woonplaats</th>
                    <th>telnummer</th>
                    <th>geboortedatum</th>
                    <th>geslacht</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>

                <!-- pak en echo de resultaten uit de database in de tabel -->
                <?php
                $query = "SELECT * FROM `gebruikers` WHERE `id` =".$userID;
                $result_tasks = mysqli_query($conn, $query);

                while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                    <tr>
                        <td><?php echo $row['naam']; ?></td>
                        <td><?php echo $row['studentmail']; ?></td>
                        <td><?php echo $row['adres']; ?></td>
                        <td><?php echo $row['woonplaats']; ?></td>
                        <td><?php echo $row['telnummer']; ?></td>
                        <td><?php echo $row['geboortedatum']; ?></td>
                        <td><?php echo $row['geslacht']; ?></td>
                        <td>
                            <form>
                               <a href="read_task.php?" class="btn btn-info btn-block">In- of Uitschrijven</a>
                            </form>
                            </br>
                            <form>
                                <a href="edit_gebruiker.php?userID=<?php echo $row['userID']?>" class="btn btn-warning btn-block">Edit</a>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <a href="read_task.php" class="btn btn-secondary">
                <i class="fa fa-arrow-left"></i> Naar Evenement(en)
            </a>
        </div>

    </div>

</main>

</html>
<?php include('includes/footer.php'); ?>
