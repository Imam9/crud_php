<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>


<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h3>Data Mahasiswa</h3>
    </div>
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata">
      Tambah Data
    </button>
    <div class="section-body">
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message']?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php session_unset(); } ?>
      <div class="card table-responsive">
        <div class="card-body ">
          <table class="table table-hover table-striped">
                <thead class = "text-center">
                  <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Prodi</th>
                    <th>Jurusan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $query = "SELECT * FROM mahasiswa";
                  $result_tasks = mysqli_query($conn, $query);    
                  $no = 1;
                  while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                  <tr class = "text-center">
                    <td><?= $no++?></td>
                    <td><?php echo $row['nim']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['jenis_kelamin']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['prodi']; ?></td>
                    <td><?php echo $row['jurusan']; ?></td>
                    <td class = "text-center">
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?php echo $row['id_mahasiswa']?>">
                        <i class="fas fa-marker"></i>
                      </button>
                      <a href="mahasiswa/delete.php?id=<?php echo $row['id_mahasiswa']?>" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="mahasiswa/insert.php" method="POST">
        <div class="modal-body">
        <div class="form-group">
            <label for="">Nim</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukkan Nim * " autofocus required>
          </div>
          <div class="form-group">
            <label for="">Nama Mahasiswa</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Mahasiswa *" autofocus required>
          </div>
          <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="" class = "form-control" required>
              <option>--Pilih Jenis Kelamin--</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" rows="2" class="form-control" placeholder="Masukkan Alamat" required></textarea>
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Masukkan Email *" autofocus required>
          </div>
          <div class="form-group">
            <label for="">Jurusan</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukkan Jurusan *" autofocus required>
          </div>
          <div class="form-group">
            <label for="">Prodi</label>
            <input type="text" name="prodi" class="form-control" placeholder="Masukkan Prodi*" autofocus required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" name="insert_mhs" class="btn btn-success" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>

<?php 
$query = "SELECT * FROM mahasiswa";
$result_tasks = mysqli_query($conn, $query);    

while($cek = mysqli_fetch_assoc($result_tasks)) { ?>
  <div class="modal fade" id="update<?php echo $cek['id_mahasiswa']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Data Mahasiswa</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="mahasiswa/update.php" method="POST">
          <div class="form-group">
            <label for="">Nim</label>
            <input type="hidden" name = "id_mahasiswa" value = "<?= $cek['id_mahasiswa']?>">
            <input type="text" name="nim" class="form-control" value = "<?= $cek['nim']?>" autofocus required>
          </div>
          <div class="form-group">
            <label for="">Nama Mahasiswa</label>
            <input type="text" name="nama" class="form-control"value = "<?= $cek['nama']?>" autofocus required>
          </div>
          <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="" class = "form-control" required>
             <?php if($cek['nim'] == 'Laki-laki'){ ?>
               <option value="Perempuan">Perempuan</option>
             <?php }else{ ?>
              <option value="Laki-laki">Laki-laki</option>
             <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" rows="2" class="form-control" value = "<?= $cek['alamat']?>" required><?= $cek['alamat']?></textarea>
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" value = "<?= $cek['email']?>" autofocus required>
          </div>
          <div class="form-group">
            <label for="">Jurusan</label>
            <input type="text" name="jurusan" class="form-control" value = "<?= $cek['jurusan']?>" autofocus required>
          </div>
          <div class="form-group">
            <label for="">Prodi</label>
            <input type="text" name="prodi" class="form-control" value = "<?= $cek['prodi']?>" autofocus required>
          </div>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <input type="submit" name="update_mhs" class="btn btn-success" value="Save">
        </div>
      </form>

    </div>
  </div>
</div>
<?php } ?>



<?php include('includes/footer.php'); ?>
