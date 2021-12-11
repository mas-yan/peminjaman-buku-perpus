<div class="row">
  <div class="col-12">
    <a href="?page=add-anggota" class="mb-3 btn btn-primary">Tambah</a>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Anggota</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>No telp</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $query = "SELECT * FROM anggota";
            $sql = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
            while ($data = mysqli_fetch_assoc($sql)) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['no_telepon'] ?></td>
                <td class="text-center">
                  <a href="?page=edit-anggota&id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Edit</a> |
                  <form action="" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <button type="submit" name="delete" onclick="return confirm('yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                  </form>
                </td>
              </tr>
            <?php endwhile ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<?php
if (isset($_POST['delete'])) {
  $id = $_POST['id'];
  $query_delete = "DELETE FROM anggota WHERE id = '$id'";
  $sql_delete = mysqli_query($koneksi, $query_delete) or die(mysqli_error($koneksi));

  if ($sql_delete) {
?>
    <script type="text/javascript">
      alert('data berhasil dihapus');
      document.location = '?page=anggota';
    </script>
  <?php
  } else {
  ?>
    <script type="text/javascript">
      alert('data gagal dihapus');
      document.location = '?page=anggota';
    </script>
<?php
  }
}
?>