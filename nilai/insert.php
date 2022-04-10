<?php

include('../db.php');

if (isset($_POST['insert_nilai'])) {
  $id_mahasiswa = $_POST['id_mahasiswa'];
  $id_dosen = $_POST['id_dosen'];
  $id_matakuliah = $_POST['id_matakuliah'];
  $jenis_nilai = $_POST['jenis_nilai'];
  $nilai = $_POST['nilai'];
  $query = "INSERT INTO `nilai`(`id_mahasiswa`, `id_dosen`, `id_matakuliah`, `jenis_nilai`, `nilai`) VALUES ($id_mahasiswa,$id_dosen,$id_matakuliah,'$jenis_nilai',$nilai)";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Insert Data Nilai Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: ../nilai.php');

}

?>
