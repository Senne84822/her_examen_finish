<?php
session_start();

include('config.php');

//hierin word de student toegevoegd en opgeslagen aan een reis in de database
if (isset($_POST['save_inschrijf'])) {
    $userID = $_POST['userID'];
    $reisID = $_POST['reisID'];
    $query = "INSERT INTO inschrijvingen(reisID, id) VALUES ('$reisID', '$userID')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        echo "Query gefaald.";
        echo "</br>";
        echo $query;
    }

    $_SESSION['message'] = 'U Bent Ingeschreven!';
    $_SESSION['message_type'] = 'success';
    header('Location: inschrijven.php?reisID='.$reisID.'');
    echo $query;

}

?>
