<?php session_start();

include("config.php");
include('includes/header.php');

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
            <?php  if ($_SESSION['user-lvl'] == 1 || 2)
            {  ?>
            <th>Actie</th>
            <?php
            }
            else {

            }?>
          </tr>
        </thead>
        <tbody>

        <!-- pak en echo de resultaten uit de database in de tabel -->
          <?php
          $query = "SELECT * FROM reis";
          $result_tasks = mysqli_query($conn, $query);

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo "<img src='fotos/" . $row['foto'] . "' width='250px' height='250px '>"; ?></td>
            <td><?php echo $row['title']; ?></td>
            <?php
            if ($_SESSION['user-lvl'] == 2)
            {  ?>
            <td>
              <a href="edit.php?reisID=<?php echo $row['reisID']?>" class="btn btn-warning">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?reisID=<?php echo $row['reisID']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
              <a href="foto.php?reisID=<?php echo $row['reisID']?>" class="btn btn-info">
                <i class="fa fa-file-upload"></i>
              </a>
              <a href="read_inschrijven.php?reisID=<?php echo $row['reisID']?>" class="btn btn-secondary">
                <i class="fa fa-eye"></i>
              </a>
            </td>
            <?php }
            else if ($_SESSION['user-lvl'] == 1) { ?>
              <td>
                <a href="inschrijven.php?reisID=<?php echo $row['reisID']?>" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                </a>
              </td>
            <?php }
            else {

            }
            ?>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

      <?php
      if ($_SESSION['user-lvl'] == 2)
      {  ?>
      <div class="col-md-4">

          <!-- MESSAGES -->
          <?php if (isset($_SESSION['message'])) { ?>
              <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                  <?= $_SESSION['message']?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php unset ($_SESSION['message']); } ?>


              <!--  REIS TOEVOEGEN FORM -->
              <div class="card card-body">
                  <form action="save_task.php" method="POST">
                      <div class="form-group">
                          <input type="text" name="title" class="form-control" required placeholder="Evenement Titel" autofocus>
                      </div>
                      <div class="form-group">
                          <textarea name="omschrijving" rows="2" class="form-control" required placeholder="Evenement Omschrijving"></textarea>
                      </div>
                      <div class="form-group">Begin datum
                          <input type="date" class="form-control" required name="begindatum">
                          <span class="input-group-append"></span>
                      </div>
                      <div class="form-group">Eind datum
                          <input type="date" class="form-control" required name="einddatum">
                          <span class="input-group-append"></span>
                      </div>
                      <div class="form-group">
                          <textarea name="bestemming" rows="2" class="form-control" required placeholder="Locatie"></textarea>
                      </div>
                      <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Evenement">
                  </form>
              </div>
              <?php
          }
          else {

          }
          ?>
      </div>

  </div>
</main>

</html>
<?php include('includes/footer.php'); ?>
