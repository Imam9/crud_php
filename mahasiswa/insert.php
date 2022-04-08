<?php

include('../db.php');

if (isset($_POST['insert_mhs'])) {
  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $jurusan = $_POST['jurusan'];
  $prodi = $_POST['prodi'];
  $email = $_POST['email'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $query = "INSERT INTO `mahasiswa`(`nim`, `nama`, `alamat`, `jenis_kelamin`, `email`, `prodi`, `jurusan`) VALUES ('$nim','$nama', '$alamat','$jenis_kelamin','$email','$prodi','$jurusan')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Insert Data Mahasiswa Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: ../index.php');

}

?>
