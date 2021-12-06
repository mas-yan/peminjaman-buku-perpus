<?php
// mengaktifkan sesi
session_start();
if (isset($_SESSION['user'])) {

  // menghapus semua sesi
  session_destroy();
?>
  <script type="text/javascript">
    alert('anda berhasil keluar');
    document.location = '../../index.php';
  </script>
<?php
} else {
  echo "<script type='text/javascript'>
	alert('anda belum login');
	document.location='../../index.php';
</script>";
}

?>