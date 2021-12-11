<?php
$get_id = $_GET['id'];
$query = "SELECT pnjam.*,anggota.nama,buku.nama_buku FROM pnjam LEFT JOIN anggota ON pnjam.anggota_id = anggota.id LEFT JOIN buku ON pnjam.buku_id = buku.id WHERE pnjam.id = $get_id";
$sql = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
while ($data_pinjam = mysqli_fetch_assoc($sql)) : ?>
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          Pengembalian Buku
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="form-group">
              <label>Nama Peminjam</label>
              <input type="text" disabled value="<?= $data_pinjam['nama'] ?>" class="form-control">
            </div>
            <div class="form-group">
              <label>Buku</label>
              <input type="text" disabled value="<?= $data_pinjam['nama_buku'] ?>" class="form-control">
            </div>
            <div class="form-group">
              <label>Tanggal Pinjam</label>
              <input type="text" value="<?= $data_pinjam['tanggal_pinjam'] ?>" disabled class="form-control">
            </div>
            <div class="form-group">
              <label for="pengembalian">Tanggal Pengembalian</label>
              <input type="date" id="pengembalian" name="pengembalian" required class="form-control">
            </div>
            <div class="form-group">
              <label>Denda</label>
              <input type="text" value="0" disabled class="form-control">
            </div>
            <button type="submit" name="edit" class="btn btn-primary mt-3">Kembalikan Buku</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
endwhile;
if (isset($_POST['edit'])) {
  $pengembalian = $_POST['pengembalian'];

  $query = "UPDATE pnjam SET tanggal_pengembalian = '$pengembalian' WHERE id = $id";
  $queryUbah = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

  if ($queryUbah) {
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
      document.location = '?page=edit-peminjaman&id=<?= $id ?>';
    </script>
<?php
  }
}
?>