<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header">
        Tambah Kategori
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="form-class">
            <input type="text" class="form-control" required name="kategori" placeholder="masukkan kategori">
          </div>
          <button type="submit" name="add" class="btn btn-primary mt-3">Tambah Kategori</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Kategori Buku</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Kategori</th>
              <th>action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM kategori_buku";
            $no = 1;
            $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
            while ($data = mysqli_fetch_assoc($query)) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['jenis'] ?></td>
                <td class="text-center"><button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#edit<?= $data['id'] ?>">
                    Edit
                  </button> | <form action="" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <button type="submit" name="delete" onclick="return confirm('yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                  </form>
                </td>
              </tr>
              <!-- Modal -->
              <div class="modal fade" id="edit<?= $data['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ubah Kategori</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST">
                        <?php
                        $id = $data['id'];
                        $sql_ubag = "SELECT * FROM kategori_buku WHERE id = '$id'";
                        $query_ubah = mysqli_query($koneksi, $sql_ubag) or die(mysqli_error($koneksi));
                        while ($data_ubah = mysqli_fetch_assoc($query_ubah)) : ?>
                          <input type="hidden" value="<?= $data_ubah['id'] ?>" class="form-control" name="id" placeholder="Masukkan Kategori">
                          <div class="form-group">
                            <label for="kategory">Masukkan Kategori</label>
                            <input type="text" value="<?= $data_ubah['jenis'] ?>" required class="form-control" name="kategory" placeholder="Masukkan Kategori">
                          </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                    <?php endwhile ?>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
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

if (isset($_POST['ubah'])) {
  $id = $_POST['id'];
  $jenis = $_POST['kategory'];
  $query_ubah = "UPDATE kategori_buku SET jenis = '$jenis' WHERE id = '$id'";
  $sql_ubah = mysqli_query($koneksi, $query_ubah) or die(mysqli_error($koneksi));

  if ($sql_ubah) {
?>
    <script type="text/javascript">
      alert('data berhasil diubah');
      document.location = '?page=kategori';
    </script>
  <?php
  } else {
  ?>
    <script type="text/javascript">
      alert('data gagal diubah');
      document.location = '?page=kategori';
    </script>
  <?php
  }
}

if (isset($_POST['delete'])) {
  $id = $_POST['id'];
  $query_delete = "DELETE FROM kategori_buku WHERE id = '$id'";
  $sql_delete = mysqli_query($koneksi, $query_delete) or die(mysqli_error($koneksi));

  if ($sql_delete) {
  ?>
    <script type="text/javascript">
      alert('data berhasil dihapus');
      document.location = '?page=kategori';
    </script>
  <?php
  } else {
  ?>
    <script type="text/javascript">
      alert('data gagal dihapus');
      document.location = '?page=kategori';
    </script>
  <?php
  }
}

if (isset($_POST['add'])) {
  $jenis = $_POST['kategori'];

  $queryTambah = mysqli_query($koneksi, "INSERT INTO kategori_buku VALUES ('','$jenis')") or die(mysqli_error($koneksi));

  if ($queryTambah) {
  ?>
    <script type="text/javascript">
      alert('data berhasil ditambah');
      document.location = '?page=kategori';
    </script>
  <?php
  } else {
  ?>
    <script type="text/javascript">
      alert('data gagal ditambah');
      document.location = '?page=kategori';
    </script>
<?php
  }
}
?>