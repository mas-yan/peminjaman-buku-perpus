<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Buku</h3>
        <a href="?page=add-buku" class=" float-right btn-sm btn btn-primary">Tambah Buku</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Buku</th>
              <th>Kategori</th>
              <th>Penerbit</th>
              <th>Tahun Terbit</th>
              <th>Total Buku</th>
              <th>Rak</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $kategori = "SELECT buku.*,kategori_buku.jenis,rak_buku.nama_rak  FROM buku LEFT JOIN kategori_buku ON buku.id_kategori = kategori_buku.id LEFT JOIN rak_buku ON buku.rak = rak_buku.id";
            $query = mysqli_query($koneksi, $kategori) or die(mysqli_error($koneksi));
            while ($data = mysqli_fetch_assoc($query)) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td style="width: 170px;"><?= $data['nama_buku'] ?></td>
                <td><?= $data['jenis'] ?></td>
                <td><?= $data['penerbit'] ?></td>
                <td><?= $data['tahun-terbit'] ?></td>
                <td><?= $data['total_buku'] ?></td>
                <td><?= $data['nama_rak'] ?></td>
                <td class="text-center">
                  <a href="?page=edit-buku&id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Edit</a> |
                  <form action="" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <button type="submit" name="delete" onclick="return confirm('yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                  </form>
                </td>
              </tr>
            <?php endwhile; ?>
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
  $query_delete = "DELETE FROM buku WHERE id = '$id'";
  $sql_delete = mysqli_query($koneksi, $query_delete) or die(mysqli_error($koneksi));

  if ($sql_delete) {
?>
    <script type="text/javascript">
      alert('data berhasil dihapus');
      document.location = '?page=buku';
    </script>
  <?php
  } else {
  ?>
    <script type="text/javascript">
      alert('data gagal dihapus');
      document.location = '?page=buku';
    </script>
<?php
  }
}
?>