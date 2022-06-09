<?php

// deze pagina is technisch gezien de Edit EN de Upload code in 1

include("config.php");
$title = '';
$omschrijving= '';
$begindatum= '';
$einddatum= '';
$bestemming= '';

// laat huidige data zien/ haalt het op
if  (isset($_GET['reisID'])) {
    $reisID= $_GET['reisID'];
    $query = "SELECT * FROM reis WHERE reisID=$reisID";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $omschrijving = $row['omschrijving'];
        $begindatum = $row['begindatum'];
        $einddatum = $row['einddatum'];
        $bestemming = $row['bestemming'];
    }
}

//update functie
if (isset($_POST['update'])) {
    $reisID= $_GET['reisID'];
    $title= $_POST['title'];
    $omschrijving = $_POST['omschrijving'];
    $begindatum = $_POST['begindatum'];
    $einddatum = $_POST['einddatum'];
    $bestemming = $_POST['bestemming'];

    $query = "UPDATE reis set title = '$title', omschrijving = '$omschrijving', begindatum = '$begindatum', einddatum = '$einddatum', bestemming = '$bestemming' WHERE reisID= '$reisID'";
    mysqli_query($conn, $query);

    $_SESSION['message'] = 'Reis is geupdate';
    $_SESSION['message_type'] = 'warning';
    header('Location: read_task.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?reisID=<?php echo $_GET['reisID']; ?>" method="POST">
                    <div class="form-group">
                        <input name="title" type="text" class="form-control" required value="<?php echo $title; ?>" placeholder="Update Titel">
                    </div>
                    <div class="form-group">
                        <textarea name="omschrijving" class="form-control" cols="30" rows="10" required placeholder="Update Omschrijving"><?php echo $omschrijving;?></textarea>
                    </div>
                    <div class="form-group">Begin datum
                        <input type="date" class="form-control" name="begindatum" required value="<?php echo strftime('%Y-%m-%d',
                            strtotime($row['begindatum'])); ?>">
                    </div>
                    <div class="form-group">Eind datum
                        <input type="date" class="form-control" name="einddatum" required value="<?php echo strftime('%Y-%m-%d',
                            strtotime($row['einddatum'])); ?>">
                        <span class="input-group-append"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" name="bestemming" class="form-control" cols="30" rows="2" placeholder="Bestemming" required value="<?php echo $bestemming; ?>">
                    </div>
                    <button class="btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>
