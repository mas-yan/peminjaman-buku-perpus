<?php
$page = @$_GET['page'];

switch ($page) {
  case 'kategori':
    include '../views/main/kategori/index.php';
    break;
  case 'buku':
    include '../views/main/buku/index.php';
    break;
  case 'rak':
    include '../views/main/rak/index.php';
    break;
  case 'peminjaman':
    include '../views/main/pinjam/index.php';
    break;
  case 'anggota':
    include '../views/main/anggota/index.php';
    break;
  default:
    'halaman Dashboard';
    break;
}
