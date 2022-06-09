<?php
session_start();

include('config.php');

//hierin word de reis toegevoegd en opgeslagen in de database
if (isset($_POST['save_task'])) {
  $title = $_POST['title'];
  $omschrijving = $_POST['omschrijving'];
  $begindatum   = $_POST['begindatum'];
  $einddatum    = $_POST['einddatum'];
  $bestemming   = $_POST['bestemming'];
  $query = "INSERT INTO reis(title, omschrijving, begindatum, einddatum, bestemming) VALUES ('$title', '$omschrijving', '$begindatum', '$einddatum', '$bestemming')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query gefaald.");
  }

  $_SESSION['message'] = 'Reis Opgeslagen!';
  $_SESSION['message_type'] = 'success';
  header('Location: read_task.php');

}

?>
