<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header">
        Tambah Buku
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="nama">Nama Peminajam</label>
            <select class="form-control" required name="nama" placeholder="masukkan nama peminjam">
              <option value="">Pilih Anggota</option>
              <?php
              $nama = "SELECT * FROM anggota";
              $query = mysqli_query($koneksi, $nama) or die(mysqli_error($koneksi));
              while ($data = mysqli_fetch_assoc($query)) : ?>
                <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="buku">Buku</label>
            <select class="form-control" required name="buku" placeholder="masukkan buku">
              <option value="">Pilih Buku</option>
              <?php
              $buku = "SELECT * FROM buku";
              $query = mysqli_query($koneksi, $buku) or die(mysqli_error($koneksi));
              while ($data = mysqli_fetch_assoc($query)) : ?>
                <option value="<?= $data['id'] ?>"><?= $data['nama_buku'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="pinjam">Tanggal Pinjam</label>
            <input type="date" required name="pinjam" id="pinjam" class="form-control">
          </div>
          <button type="submit" name="add" class="btn btn-primary mt-3">Tambah Buku</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

if (isset($_POST['add'])) {
  $name = $_POST['nama'];
  $buku = $_POST['buku'];
  $pinjam = $_POST['pinjam'];

  $queryTambah = mysqli_query($koneksi, "INSERT INTO pnjam VALUES ('','$name','$buku','$pinjam',null,'')") or die(mysqli_error($koneksi));

  if ($queryTambah) {
?>
    <script type="text/javascript">
      alert('data berhasil ditambah');
      document.location = '?page=peminjaman';
    </script>
  <?php
  } else {
  ?>
    <script type="text/javascript">
      alert('data gagal ditambah');
      document.location = '?page=add-peminjaman';
    </script>
<?php
  }
}
?>