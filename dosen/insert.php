<?php

include('../db.php');

if (isset($_POST['insert_dosen'])) {
  $nip = $_POST['nip'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $jabatan = $_POST['jabatan'];
  $email = $_POST['email'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $query = "INSERT INTO `dosen`(`nip`, `nama`, `alamat`, `jenis_kelamin`, `email`, `jabatan`) VALUES ('$nip','$nama', '$alamat','$jenis_kelamin','$email','$jabatan')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Insert Data Dosen Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: ../dosen.php');

}

?>
