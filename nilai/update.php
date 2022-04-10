<?php

include('../db.php');

if (isset($_POST['update_nilai'])) {
    $id_nilai = $_POST['id_nilai'];  
    $id_mahasiswa = $_POST['id_mahasiswa'];
    $id_dosen = $_POST['id_dosen'];
    $id_matakuliah = $_POST['id_matakuliah'];
    $jenis_nilai = $_POST['jenis_nilai'];
    $nilai = $_POST['nilai'];
    $query = "UPDATE `nilai` SET `id_mahasiswa`=$id_mahasiswa,`id_dosen`=$id_dosen,`id_matakuliah`=$id_matakuliah,`jenis_nilai`='$jenis_nilai',`nilai`=$nilai WHERE $id_nilai";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Update Data Nilai Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: ../nilai.php');

}

?>