<div class="row">
  <div class="col-12">
    <div class="callout callout-danger">
      <h5>Informasi Denda!</h5>

      <p>Peminjaman melebihi 10 hari akan dikenai denda Rp 10.000 <br> dan berkelipatan Rp 1.000 tiap harinya.</p>
    </div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Peminjam Buku</h3>
        <a href="?page=add-peminjaman" class="float-right btn-sm btn btn-primary">Tambah Peminjaman</a>

      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Peminjam</th>
              <th>Nama Buku</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Pengembalian</th>
              <th>Denda</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $query = "SELECT pnjam.*,anggota.nama,buku.nama_buku FROM pnjam LEFT JOIN anggota ON pnjam.anggota_id = anggota.id LEFT JOIN buku ON pnjam.buku_id = buku.id";
            $sql = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
            while ($data = mysqli_fetch_assoc($sql)) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['nama_buku'] ?></td>
                <td><?= $data['tanggal_pinjam'] ?></td>
                <td><?= ($data['tanggal_pengembalian'] == null) ? 'belum dikembalikan' : $data['tanggal_pengembalian'] ?></td>
                <td><?= moneyFormat($data['denda']) ?></td>
                <td>
                  <?php if ($data['tanggal_pengembalian'] == null) : ?>
                    <a href="?page=edit-peminjaman&id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Ajukan Pengembalian</a>
                  <?php else : ?>
                    <button disabled class="btn btn-success btn-sm">Sudah Dikembalikan</button>
                  <?php endif ?>
                </td>
              </tr>
            <?php endwhile ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->