<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header">
        Tambah Rak Buku
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="no">No Rak</label>
            <input type="text" required name="no" placeholder="No Rak" id="nama" class="form-control">
          </div>
          <div class="form-group">
            <label for="nama">Nama Rak</label>
            <input type="text" required name="nama" placeholder="Nama Rak" id="nama" class="form-control">
          </div>
          <div class="form-group">
            <label for="tempat">Tempat rak</label>
            <input type="text" required name="tempat" placeholder="tempat Rak" id="tempat" class="form-control">
          </div>
          <button type="submit" name="add" class="btn btn-primary mt-3">Tambah Rak Buku</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

if (isset($_POST['add'])) {
  $no = $_POST['no'];
  $nama = $_POST['nama'];
  $tempat = $_POST['tempat'];

  $queryTambah = mysqli_query($koneksi, "INSERT INTO rak_buku VALUES ('','$no','$nama','$tempat')") or die(mysqli_error($koneksi));

  if ($queryTambah) {
?>
    <script type="text/javascript">
      alert('data berhasil ditambah');
      document.location = '?page=rak';
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