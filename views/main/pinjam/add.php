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
              while ($data = mysqli_fetch_assoc($query)) :
                if ($data['total_buku'] < 1) :
              ?>
                  <option value="" disabled><?= $data['nama_buku'] ?> (Buku habis dipinjam)</option>
                <?php else : ?>
                  <option value="<?= $data['id'] ?>"><?= $data['nama_buku'] ?></option>
              <?php endif;
              endwhile; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="pinjam">Tanggal Pinjam</label>
            <input type="date" required name="pinjam" id="pinjam" class="form-control">
          </div>
          <button type="submit" name="add" class="btn btn-primary mt-3">Pinjam Buku</button>
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

  $qbuku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id = '$buku'");
  $data = mysqli_fetch_assoc($qbuku);
  $total_buku = $data['total_buku'] - 1;

  $queryTambah = mysqli_query($koneksi, "INSERT INTO pnjam VALUES ('','$name','$buku','$pinjam',null,'')") or die(mysqli_error($koneksi));
  $query = "UPDATE buku SET total_buku = '$total_buku' WHERE id = $buku";
  $sql_edit = mysqli_query($koneksi, $query);


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