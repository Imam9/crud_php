<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'db_nilai'
) or die(mysqli_erro($mysqli));

?>
