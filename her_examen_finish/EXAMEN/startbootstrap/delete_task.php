<?php
session_start();

include("config.php");

if(isset($_GET['reisID'])) {
  $reisID = $_GET['reisID'];
  $query = "DELETE FROM reis WHERE reisID ='$reisID'";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query gefaald.");
  }

  $_SESSION['message'] = 'Reis Verwijderd!';
  $_SESSION['message_type'] = 'danger';
  header('Location: read_task.php');
}

?>
