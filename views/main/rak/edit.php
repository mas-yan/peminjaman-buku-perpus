<?php
$id = $_GET['id'];
$query = "SELECT * FROM rak_buku WHERE id = $id";
$sql = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
$data = mysqli_fetch_assoc($sql);
?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header">
        Edit Rak Buku
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <input type="hidden" name="id" value="<?= $data['id'] ?>">
          <div class="form-group">
            <label for="no">No Rak</label>
            <input type="text" required name="no" placeholder="No Rak" value="<?= $data['no_rak'] ?>" id="no" class="form-control">
          </div>
          <div class="form-group">
            <label for="nama">Nama Rak</label>
            <input type="text" value="<?= $data['nama_rak'] ?>" required name="nama" placeholder="Nama Rak" id="nama" class="form-control">
          </div>
          <div class="form-group">
            <label for="tempat">Tempat rak</label>
            <input type="text" value="<?= $data['tempat'] ?>" required name="tempat" placeholder="tempat Rak" id="tempat" class="form-control">
          </div>
          <button type="submit" name="edit" class="btn btn-primary mt-3">Edit Rak Buku</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
if (isset($_POST['edit'])) {
  $id_rak = $_POST['id'];
  $no = $_POST['no'];
  $nama = $_POST['nama'];
  $tempat = $_POST['tempat'];

  $query = "UPDATE rak_buku SET no_rak = '$no', nama_rak = '$nama', tempat = '$tempat' WHERE id = $id_rak";
  $sql_edit = mysqli_query($koneksi, $query);

  if ($sql_edit) {
?>
    <script type="text/javascript">
      alert('data berhasil diubah');
      document.location = '?page=rak';
    </script>
  <?php
  } else {
  ?>
    <script type="text/javascript">
      alert('data gagal diubah');
      document.location = '?page=edit-rak&id=<?= $id ?>';
    </script>
<?php
  }
}
?>