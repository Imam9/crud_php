<?php

include('../db.php');

if (isset($_POST['update_mhs'])) {
  
    $id_mahasiswa = $_POST['id_mahasiswa'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jurusan = $_POST['jurusan'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $query = "UPDATE `mahasiswa` SET `nim`='$nim',`nama`='$nama',`alamat`='$alamat',`jenis_kelamin`='$jenis_kelamin',`email`='$email',`prodi`='$prodi',`jurusan`='$jurusan' WHERE id_mahasiswa = '$id_mahasiswa'";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Update Data Mahasiswa Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: ../index.php');

}

?>