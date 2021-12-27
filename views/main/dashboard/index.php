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
<div class="row">
  <!-- /.col (LEFT) -->
  <div class="col">
    <!-- /.card -->

    <!-- BAR CHART -->
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Data Pemnjaman</h3>
      </div>
      <div class="card-body">
        <div class="chart">
          <canvas id="barChart" style="min-height: 250px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </div>
  <!-- /.col (RIGHT) -->
</div>
<?php
$sqlChart = "SELECT count(*) as jumlah FROM pnjam GROUP BY YEAR(tanggal_pinjam), MONTH(tanggal_pinjam)";
$queryChart = mysqli_query($koneksi, $sqlChart) or die(mysqli_error($koneksi));
$dataChart = mysqli_fetch_all($queryChart);

$sqlBulan = "SELECT MONTHNAME(tanggal_pinjam) as bulan FROM pnjam GROUP BY YEAR(tanggal_pinjam), MONTH(tanggal_pinjam)";
$queryBulan = mysqli_query($koneksi, $sqlBulan) or die(mysqli_error($koneksi));
$dataBulan = mysqli_fetch_all($queryBulan);
?>
<script src="<?= baseUrl('plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= baseUrl('/') ?>plugins/chart.js/Chart.min.js"></script>
<script>
  $(function() {

    //-------------
    //- BAR CHART -
    //-------------
    var areaChartData = {
      labels: [<?php foreach ($dataBulan as $data) {
                  echo "'$data[0]',";
                } ?>],
      datasets: [{
        label: 'Peminjaman',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: false,
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: [<?php foreach ($dataChart as $x) {
                  echo $x[0] . ',';
                } ?>]
      }, ]
    }
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]

    var barChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      datasetFill: false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
  })
</script>