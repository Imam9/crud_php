<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h3>Data nilai</h3>
    </div>
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahdata">
      Tambah Data
    </button>
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message']?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php session_unset(); } ?>
    <div class="section-body">
      <div class="card table-responsive">
        <div class="card-body ">
          <table class="table table-hover" id="data_tabel">
            <thead class = "text-center">
              <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Nama Dosen</th>
                <th>Nama Matakuliah</th>
                <th>Jenis Penilaian</th>
                <th>Nilai</th>
                <th class ="text-center">Action</th>
              </tr>
            </thead>
            <tbody class = "text-center">
            <?php
                  $query = "SELECT *, m.nama as nama_mahasiswa, d.nama as nama_dosen FROM nilai n INNER JOIN mahasiswa m ON n.id_mahasiswa = m.id_mahasiswa INNER JOIN dosen d on d.id_dosen = n.id_dosen INNER JOIN matakuliah mt on mt.id_matakuliah = n.id_matakuliah";
                  $result_tasks = mysqli_query($conn, $query);    
                  $no = 1;
                  while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                  <tr class = "text-center">
                    <td><?= $no++?></td>
                    <td><?php echo $row['nama_mahasiswa']; ?></td>
                    <td><?php echo $row['nama_dosen']; ?></td>
                    <td><?php echo $row['matakuliah']; ?></td>
                    <td><?php echo $row['jenis_nilai']; ?></td>
                    <td><?php echo $row['nilai']; ?></td>
                    <td class = "text-center">
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?php echo $row['id_nilai']?>">
                        <i class="fas fa-marker"></i>
                      </button>
                      <a href="nilai/delete.php?id=<?php echo $row['id_nilai']?>" class="btn btn-danger btn-sm">
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

<!-- Modal -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="nilai/insert.php" method="post" enctype='multipart/form-data'>
        <div class="modal-body">
            <div class="form-group">
                <label for="">Nama Mahasiswa</label>
                <select name="id_mahasiswa" class = "form-control" id="" required> 
                    <option>--Pilih Mahasiswa--</option>
                    <?php
                    $mhs = "SELECT * FROM mahasiswa";
                    $result_mhs = mysqli_query($conn, $mhs);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_mhs)) { ?>
                        <option value="<?= $row['id_mahasiswa']?>"><?= $row['nama']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Nama Matakuliah</label>
                <select name="id_matakuliah" class = "form-control" id="" required> 
                    <option>--Pilih Matakuliah--</option>
                    <?php
                    $matakuliah = "SELECT * FROM matakuliah";
                    $result_matakuliah = mysqli_query($conn, $matakuliah);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_matakuliah)) { ?>
                        <option value="<?= $row['id_matakuliah']?>"><?= $row['matakuliah']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Nama Dosen</label>
                <select name="id_dosen" class = "form-control" id="" required> 
                    <option>--Pilih dosen--</option>
                    <?php
                    $dosen = "SELECT * FROM dosen";
                    $result_dosen = mysqli_query($conn, $dosen);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_dosen)) { ?>
                        <option value="<?= $row['id_dosen']?>"><?= $row['nama']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Jenis Nilai</label>
                <input type="text" name = "jenis_nilai" class = "form-control" required>
            </div>
            <div class="form-group">
                <label for="">Nilai</label>
                <input type="number" name="nilai" id="" class="form-control" required>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" name="insert_nilai" class="btn btn-success" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>


<?php 
$query = "SELECT *, m.nama as nama_mahasiswa, d.nama as nama_dosen FROM nilai n INNER JOIN mahasiswa m ON n.id_mahasiswa = m.id_mahasiswa INNER JOIN dosen d on d.id_dosen = n.id_dosen INNER JOIN matakuliah mt on mt.id_matakuliah = n.id_matakuliah";
$result_tasks = mysqli_query($conn, $query);    

while($cek = mysqli_fetch_assoc($result_tasks)) { ?>
  <div class="modal fade" id="update<?php echo $cek['id_nilai']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Data nilai</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="nilai/update.php" method="POST">
            <div class="form-group">
                <label for="">Nama Mahasiswa</label>
                <select name="id_mahasiswa" class = "form-control" id="" required> 
                    <option value = "<?= $cek['id_mahasiswa']?>"><?= $cek['nama_mahasiswa']?></option>
                    <?php
                    $mhs = "SELECT * FROM mahasiswa";
                    $result_mhs = mysqli_query($conn, $mhs);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_mhs)) { ?>
                        <option value="<?= $row['id_mahasiswa']?>"><?= $row['nama']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Nama Matakuliah</label>
                <select name="id_matakuliah" class = "form-control" id="" required> 
                    <option value = "<?= $cek['id_matakuliah']?>"><?= $cek['matakuliah']?></option>
                    <?php
                    $matakuliah = "SELECT * FROM matakuliah";
                    $result_matakuliah = mysqli_query($conn, $matakuliah);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_matakuliah)) { ?>
                        <option value="<?= $row['id_matakuliah']?>"><?= $row['matakuliah']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Nama Dosen</label>
                <select name="id_dosen" class = "form-control" id="" required> 
                    <option value = "<?= $cek['id_dosen']?>"><?= $cek['nama_dosen']?></option>
                    <?php
                    $dosen = "SELECT * FROM dosen";
                    $result_dosen = mysqli_query($conn, $dosen);    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_dosen)) { ?>
                        <option value="<?= $row['id_dosen']?>"><?= $row['nama']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Jenis Nilai</label>
                <input type="text" name = "jenis_nilai" class = "form-control" value = "<?= $cek['jenis_nilai']?>" required>
            </div>
          <div class="form-group">
            <label for="">Nama nilai</label>
            <input type="hidden" name = "id_nilai" value = "<?= $cek['id_nilai']?>">
            <input type="text" name="nilai" class="form-control"value = "<?= $cek['nilai']?>" autofocus required>
          </div>
      
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <input type="submit" name="update_nilai" class="btn btn-success" value="Save">
        </div>
      </form>

    </div>
  </div>
</div>
<?php } ?>







<?php include('includes/footer.php'); ?>
