<?php
session_start();

include("config.php");
$foto = '';

if  (isset($_GET['reisID'])) {
    $reisID= $_GET['reisID'];
    $query = "SELECT * FROM reis WHERE reisID=$reisID";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $foto = $row['foto'];
    }
}

if (isset($_POST['update'])) {
    $reisID= $_GET['reisID'];
    $check1 = 0;
    $check2 = 0;
    $foto = $_FILES['foto'];

    //de tijdelijke naam van de file
    $tijdelijk = $foto['tmp_name'];

    $path_info = pathinfo($tijdelijk);
    $naamfoto = "reisfoto".$reisID.$path_info['extension'];

        //fotos locatie map
        $mapfoto = "fotos/";
        // welke files zijn toegestaan om up te loaden
        $toegestaan = array("image/jpg", "image/png", "image/jpeg");

        if (move_uploaded_file($tijdelijk, $mapfoto . $naamfoto)) {
            $check1 = 1;
        } else {
            echo "er ging iets mis met de foto";
        }


    $query = "UPDATE reis set foto = '$naamfoto' WHERE reisID=$reisID";
    if(mysqli_query($conn, $query)) {
        $_SESSION['message'] = 'foto is geupdate';
        $_SESSION['message_type'] = 'warning';

        $check2 = 1;
    }
    else {
        echo "Error Database";
    }

    if ($check1 == "1" && $check2 == "1") {
        header('Location: read_task.php');
    }
    else {
        echo '<br>';
        echo 'checkpoint';
        echo '<br>';
        echo $check1;
        echo '<br>';
        echo 'checkpoint';
        echo '<br>';
        echo $check2;
                echo '<br>';
                echo 'info controle';
                echo '<br>';
                echo $mapfoto;
                echo '<br>';
                echo '<br>';
                echo $tijdelijk;
                echo '<br>';
                echo '<br>';
                echo $naamfoto;
                echo '<br>';
                echo '<br>';
                echo $query;
                echo '<br>';
                print_r($_FILES['foto']);
    }
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="foto.php?reisID=<?php echo $_GET['reisID']; ?>" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <input name="foto" type="file" required class="form-control">
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
