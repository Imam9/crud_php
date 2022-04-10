<?php

include("../db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM nilai WHERE id_nilai = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Delete Data nilai Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: ../nilai.php');
}

?>
