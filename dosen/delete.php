<?php

include("../db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM dosen WHERE id_dosen = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Delete Data Dosen Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: ../dosen.php');
}

?>
