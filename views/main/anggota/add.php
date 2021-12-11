<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header">
        Tambah Anggota Perpus
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="no">No Telp</label>
            <input type="text" required name="no" placeholder="No Telp" id="nama" class="form-control">
          </div>
          <div class="form-group">
            <label for="nama">Nama Angoota</label>
            <input type="text" required name="nama" placeholder="Nama Angoota" id="nama" class="form-control">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat Anggota</label>
            <input type="text" required name="alamat" placeholder="Alamat Anggota" id="alamat" class="form-control">
          </div>
          <button type="submit" name="add" class="btn btn-primary mt-3">Tambah Anggota</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

if (isset($_POST['add'])) {
  $no = $_POST['no'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];

  $queryTambah = mysqli_query($koneksi, "INSERT INTO anggota VALUES ('','$nama','$alamat','$no')") or die(mysqli_error($koneksi));

  if ($queryTambah) {
?>
    <script type="text/javascript">
      alert('data berhasil ditambah');
      document.location = '?page=anggota';
    </script>
  <?php
  } else {
  ?>
    <script type="text/javascript">
      alert('data gagal ditambah');
      document.location = '?page=add-rak';
    </script>
<?php
  }
}
?>