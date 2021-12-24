<?php
$get_id = $_GET['id'];
$query = "SELECT pnjam.*,anggota.nama,buku.nama_buku,buku.id as buku FROM pnjam LEFT JOIN anggota ON pnjam.anggota_id = anggota.id LEFT JOIN buku ON pnjam.buku_id = buku.id WHERE pnjam.id = $get_id";
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
              <input type="text" hidden name="buku" value="<?= $data_pinjam['buku'] ?>" class="form-control">
              <input type="text" disabled value="<?= $data_pinjam['nama_buku'] ?>" class="form-control">
            </div>
            <div class="form-group">
              <label>Tanggal Pinjam</label>
              <input type="text" value="<?= $data_pinjam['tanggal_pinjam'] ?>" id="pinjam" disabled class="form-control">
            </div>
            <div class="form-group">
              <label for="pengembalian">Tanggal Pengembalian</label>
              <input type="date" onchange="hitugDenda()" id="pengembalian" name="pengembalian" required class="form-control">
            </div>
            <div class="form-group">
              <label>Denda</label>
              <input type="text" value="0" id="denda" name="denda" readonly class="form-control">
            </div>
            <button type="submit" name="edit" class="btn btn-primary mt-3">Kembalikan Buku</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    function hitugDenda() {
      // get id pengembalian
      const pengembalian = document.getElementById('pengembalian')
      // get id pinjam
      const pinjam = document.getElementById('pinjam')
      // date pinjam
      const d1 = new Date(pengembalian.value)
      const d2 = new Date(pinjam.value)
      let t1 = d1.setTime(d1.getTime() + (-10 * 24 * 60 * 60 * 1000));
      let t2 = d2.getTime();
      const getIdDenda = document.getElementById('denda')
      // hitung denda
      if (t1 >= t2) {
        const total = parseInt((t1 - t2) / (24 * 3600 * 1000));
        getIdDenda.value = (total * 1000) + 10000
      } else {
        getIdDenda.value = 0
      }

    }
  </script>

  <?php
endwhile;
if (isset($_POST['edit'])) {
  // get value onput
  $pengembalian = $_POST['pengembalian'];
  $denda = $_POST['denda'];
  $buku = $_POST['buku'];

  // get buku by id
  $qbuku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id = '$buku'");
  $data = mysqli_fetch_assoc($qbuku);

  // total buku +1
  $total_buku = $data['total_buku'] + 1;

  // update table buku
  $query = "UPDATE buku SET total_buku = '$total_buku' WHERE id = '$buku'";
  $sql_edit = mysqli_query($koneksi, $query);

  // update table pinjam
  $query = "UPDATE pnjam SET tanggal_pengembalian = '$pengembalian', denda = '$denda' WHERE id = $id";
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