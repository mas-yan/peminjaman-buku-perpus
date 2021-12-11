<?php
session_start();
include '../../include/koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$query = mysqli_query($koneksi, $sql);
$cek = mysqli_num_rows($query);

if ($cek > 0) {
  $data = mysqli_fetch_assoc($query);
  $_SESSION['user'] = $username;
  $_SESSION['nama'] = $data['nama'];
  $_SESSION['no_nduk'] = $data['no_nduk'];
  header('location: ../../public/index.php');
} else {
  echo "<script>
	alert('username atau password anda salah');
  document.location='../../public/index.php';
	</script>";
}
