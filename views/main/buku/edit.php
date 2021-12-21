<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $kategori = "SELECT buku.*,kategori_buku.jenis,rak_buku.nama_rak  FROM buku LEFT JOIN kategori_buku ON buku.id_kategori = kategori_buku.id LEFT JOIN rak_buku ON buku.rak = rak_buku.id WHERE buku.id = $id";
  $query = mysqli_query($koneksi, $kategori) or die(mysqli_error($koneksi));
  while ($data_buku = mysqli_fetch_assoc($query)) : ?>
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Tambah Buku
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <input type="hidden" name="id" value="<?= $data_buku['id'] ?>">
              <div class="form-group">
                <label for="kategori">Kategori Buku</label>
                <select class="form-control" required name="kategori" placeholder="masukkan kategori">
                  <option value="">Pilih Kategori</option>
                  <?php
                  $kategori = "SELECT * FROM kategori_buku";
                  $query = mysqli_query($koneksi, $kategori) or die(mysqli_error($koneksi));
                  while ($data = mysqli_fetch_assoc($query)) : ?>
                    <option value="<?= $data['id'] ?>" <?php echo ($data_buku['id_kategori'] == $data['id'] ? 'selected' : '') ?>><?= $data['jenis'] ?></option>
                  <?php endwhile; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="nama">Nama Buku</label>
                <input type="text" value="<?= $data_buku['nama_buku'] ?>" required name="nama" placeholder="Nama Buku" id="nama" class="form-control">
              </div>
              <div class="form-group">
                <label for="penerbit">Penerbit Buku</label>
                <input type="text" value="<?= $data_buku['penerbit'] ?>" required name="penerbit" placeholder="Penerbit Buku" id="penerbit" class="form-control">
              </div>
              <div class="form-group">
                <label for="tahun">Tahun Terbit</label>
                <input type="date" value="<?= $data_buku['tahun-terbit'] ?>" required name="tahun" id="tahun" class="form-control">
              </div>
              <div class="form-group">
                <label for="total">Total Buku</label>
                <input type="number" required value="<?= $data_buku['total_buku'] ?>" name="total" placeholder="Total Buku" id="total" class="form-control">
              </div>
              <div class="form-group">
                <label for="rak">Rak Buku</label>
                <select class="form-control" required name="rak" placeholder="masukkan rak">
                  <option value="">Pilih rak</option>
                  <?php
                  $rak = "SELECT * FROM rak_buku";
                  $query = mysqli_query($koneksi, $rak) or die(mysqli_error($koneksi));
                  while ($data = mysqli_fetch_assoc($query)) : ?>
                    <option value="<?= $data['id'] ?>" <?php echo ($data_buku['rak'] == $data['id'] ? 'selected' : '') ?>><?= $data['nama_rak'] ?></option>
                  <?php endwhile; ?>
                </select>
              </div>
              <button type="submit" name="edit" class="btn btn-primary mt-3">ubah Buku</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php
  endwhile;
}

if (isset($_POST['edit'])) {
  $id = $_POST['id'];
  $jenis = $_POST['kategori'];
  $nama = $_POST['nama'];
  $penerbit = $_POST['penerbit'];
  $tahun = $_POST['tahun'];
  $total = $_POST['total'];
  $rak = $_POST['rak'];

  $query = "UPDATE buku SET id_kategori = '$jenis', nama_buku = '$nama', penerbit = '$penerbit', total_buku = '$total', rak = '$rak' WHERE id = $id";
  $queryUbah = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

  if ($queryUbah) {
  ?>
    <script type="text/javascript">
      alert('data berhasil diubah');
      document.location = '?page=buku';
    </script>
  <?php
  } else {
  ?>
    <script type="text/javascript">
      alert('data gagal diubah');
      document.location = '?page=edit-buku';
    </script>
<?php
  }
}
?>