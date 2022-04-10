<?php

include('../db.php');

if (isset($_POST['update_matakuliah'])) {
  
    $id_matakuliah = $_POST['id_matakuliah'];
    $matakuliah = $_POST['matakuliah'];
    $query = "UPDATE `matakuliah` SET `matakuliah`='$matakuliah' WHERE id_matakuliah = '$id_matakuliah'";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Update Data matakuliah Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: ../matakuliah.php');

}

?>