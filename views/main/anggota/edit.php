<?php
$id = $_GET['id'];
$query = "SELECT * FROM anggota WHERE id = $id";
$sql = mysqli_query($koneksi, $query) or die($koneksi);
$data = mysqli_fetch_assoc($sql);
?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header">
        Edit Anggota Perpus
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <input type="hidden" name="id" value="<?= $data['id'] ?>">
          <div class="form-group">
            <label for="no">No Telp</label>
            <input type="text" required value="<?= $data['no_telepon'] ?>" name="no" placeholder="No Telp" id="nama" class="form-control">
          </div>
          <div class="form-group">
            <label for="nama">Nama Angoota</label>
            <input type="text" required name="nama" value="<?= $data['nama'] ?>" placeholder="Nama Angoota" id="nama" class="form-control">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat Anggota</label>
            <input type="text" required name="alamat" value="<?= $data['alamat'] ?>" placeholder="Alamat Anggota" id="alamat" class="form-control">
          </div>
          <button type="submit" name="edit" class="btn btn-primary mt-3">Edit Anggota</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST['edit'])) {
  $id_anggota = $_POST['id'];
  $no = $_POST['no'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];

  $query = "UPDATE anggota SET no_telepon = '$no', nama = '$nama', alamat = '$alamat' WHERE id = $id_anggota";
  $sql_edit = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

  if ($sql_edit) {
?>
    <script type="text/javascript">
      alert('data berhasil diubah');
      document.location = '?page=anggota';
    </script>
  <?php
  } else {
  ?>
    <script type="text/javascript">
      alert('data gagal diubah');
      document.location = '?page=edit-anggota&id=<?= $id ?>';
    </script>
<?php
  }
}
?>