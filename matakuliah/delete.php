<?php

include("../db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM matakuliah WHERE id_matakuliah = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Delete Data Matakuliah Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: ../matakuliah.php');
}

?>
