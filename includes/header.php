<?php $base_url = "http://localhost/web_nilai/"?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nilai Mata Kuliah</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= $base_url?>assets/css/style.css">
  <link rel="stylesheet" href="<?= $base_url?>assets/css/components.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
    <!-- <nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">PHP MySQL CRUD</a>
      </div>
    </nav> -->

   
<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <div class="search-element">
            <div class="search-backdrop"></div>
         
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= $base_url?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, Admin</div></a>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Data Nilai</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">DN</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Data Master</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master Data</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?= $base_url?>/index.php">Data Mahasiswa</a></li>
                  <li><a class="nav-link" href="<?= $base_url?>/matakuliah.php">Data Matakuliah</a></li>
                  <li><a class="nav-link" href="<?= $base_url?>/dosen.php">Data Dosen</a></li>
                </ul>
              </li>
             
              <li><a class="nav-link" href="<?= $base_url?>/nilai.php"><i class="fas fa-calendar"></i> <span>Data Nilai</span></a></li>
            </ul>
        </aside>
      </div>