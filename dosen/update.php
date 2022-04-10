<?php

include('../db.php');

if (isset($_POST['update_dosen'])) {
  
    $id_dosen = $_POST['id_dosen'];
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jabatan = $_POST['jabatan'];
    $email = $_POST['email'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $query = "UPDATE `dosen` SET `nip`='$nip',`nama`='$nama',`alamat`='$alamat',`jenis_kelamin`='$jenis_kelamin',`email`='$email',`jabatan`='$jabatan' WHERE id_dosen = '$id_dosen'";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Update Data Dosen Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: ../index.php');

}

?>