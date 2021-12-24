<div class="row">
  <div class="col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <?php
        $query = "SELECT COUNT(*) as total_buku from buku";
        $sql = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
        $count = mysqli_fetch_assoc($sql);
        ?>
        <h3><?= $count['total_buku'] ?></h3>

        <p>Total Buku</p>
      </div>
      <div class="icon">
        <i class="fas fa-book"></i>
      </div>
      <a href="?page=buku" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <?php
        $query = "SELECT SUM(denda) as denda FROM pnjam WHERE MONTH(tanggal_pengembalian) = MONTH(curdate())";
        $sql = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
        $denda = mysqli_fetch_assoc($sql);
        ?>
        <h3><?= ($denda['denda'] ? moneyFormat($denda['denda']) : '0') ?></h3>

        <p>Denda Bulan Ini</p>
      </div>
      <div class="icon">
        <i class="fas fa-money-bill-wave-alt"></i>
      </div>
      <a href="?page=peminjaman" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <?php
        $query = "SELECT COUNT(*) as total from anggota";
        $sql = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
        $count = mysqli_fetch_assoc($sql);
        ?>
        <h3><?= $count['total'] ?></h3>

        <p>Anggota Perpus</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="?page=anggota" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <?php
        $query = "SELECT sum(case when tanggal_pengembalian IS NULL then 1 else 0 end) as pinjam from pnjam;";
        $sql = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
        $pinjam = mysqli_fetch_assoc($sql);
        ?>
        <h3><?= $pinjam['pinjam'] ?></h3>

        <p>Buku Yang Dipinjam</p>
      </div>
      <div class="icon">
        <i class="fas fa-people-arrows"></i>
      </div>
      <a href="?page=peminjaman" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>