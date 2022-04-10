<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h3>Data Matakuliah</h3>
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
                <th>Nama Matakuliah</th>
                <th class ="text-center">Action</th>
              </tr>
            </thead>
            <tbody class = "text-center">
            <?php
                  $query = "SELECT * FROM matakuliah";
                  $result_tasks = mysqli_query($conn, $query);    
                  $no = 1;
                  while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                  <tr class = "text-center">
                    <td><?= $no++?></td>
                    <td><?php echo $row['matakuliah']; ?></td>
                    <td class = "text-center">
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?php echo $row['id_matakuliah']?>">
                        <i class="fas fa-marker"></i>
                      </button>
                      <a href="matakuliah/delete.php?id=<?php echo $row['id_matakuliah']?>" class="btn btn-danger btn-sm">
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
      <form action="matakuliah/insert.php" method="post" enctype='multipart/form-data'>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Nama Matakuliah</label>
            <input type="text" name="matakuliah" id="" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" name="insert_matakuliah" class="btn btn-success" value="Save">
        </div>
      </form>
    </div>
  </div>
</div>


<?php 
$query = "SELECT * FROM matakuliah";
$result_tasks = mysqli_query($conn, $query);    

while($cek = mysqli_fetch_assoc($result_tasks)) { ?>
  <div class="modal fade" id="update<?php echo $cek['id_matakuliah']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Data matakuliah</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="matakuliah/update.php" method="POST">
          <div class="form-group">
            <label for="">Nama matakuliah</label>
            <input type="hidden" name = "id_matakuliah" value = "<?= $cek['id_matakuliah']?>">
            <input type="text" name="matakuliah" class="form-control"value = "<?= $cek['matakuliah']?>" autofocus required>
          </div>
      
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <input type="submit" name="update_matakuliah" class="btn btn-success" value="Save">
        </div>
      </form>

    </div>
  </div>
</div>
<?php } ?>





<?php include('includes/footer.php'); ?>
