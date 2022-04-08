<?php

include("../db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Delete Data Mahasiswa Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: ../index.php');
}

?>
