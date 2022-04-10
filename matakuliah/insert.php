<?php

include('../db.php');

if (isset($_POST['insert_matakuliah'])) {
  $matakuliah = $_POST['matakuliah'];
  $query = "INSERT INTO `matakuliah`(`matakuliah`) VALUES ('$matakuliah')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Insert Data Mahasiswa Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: ../matakuliah.php');

}

?>
