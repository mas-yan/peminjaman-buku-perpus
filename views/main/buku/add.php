<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header">
        Tambah Buku
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="kategori">Kategori Buku</label>
            <select class="form-control" required name="kategori" placeholder="masukkan kategori">
              <option value="">Pilih Kategori</option>
              <?php
              $kategori = "SELECT * FROM kategori_buku";
              $query = mysqli_query($koneksi, $kategori) or die(mysqli_error($koneksi));
              while ($data = mysqli_fetch_assoc($query)) : ?>
                <option value="<?= $data['id'] ?>"><?= $data['jenis'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="nama">Nama Buku</label>
            <input type="text" required name="nama" placeholder="Nama Buku" id="nama" class="form-control">
          </div>
          <div class="form-group">
            <label for="penerbit">Penerbit Buku</label>
            <input type="text" required name="penerbit" placeholder="Penerbit Buku" id="penerbit" class="form-control">
          </div>
          <div class="form-group">
            <label for="tahun">Tahun Terbit</label>
            <input type="date" required name="tahun" id="tahun" class="form-control">
          </div>
          <div class="form-group">
            <label for="total">Total Buku</label>
            <input type="number" required name="total" placeholder="Total Buku" id="total" class="form-control">
          </div>
          <button type="submit" name="add" class="btn btn-primary mt-3">Tambah Buku</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

if (isset($_POST['add'])) {
  $jenis = $_POST['kategori'];
  $nama = $_POST['nama'];
  $penerbit = $_POST['penerbit'];
  $tahun = $_POST['tahun'];
  $total = $_POST['total'];

  $queryTambah = mysqli_query($koneksi, "INSERT INTO buku VALUES ('','$jenis','$nama','$penerbit','$tahun','$total','1')") or die(mysqli_error($koneksi));

  if ($queryTambah) {
?>
    <script type="text/javascript">
      alert('data berhasil ditambah');
      document.location = '?page=buku';
    </script>
  <?php
  } else {
  ?>
    <script type="text/javascript">
      alert('data gagal ditambah');
      document.location = '?page=add-buku';
    </script>
<?php
  }
}
?>