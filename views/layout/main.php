<?php
$page = @$_GET['page'];
$id = @$_GET['id'];

if (!$page) {
  include '../views/main/dashboard/index.php';
}

switch ($page) {
  case ('dashboard'):
    include '../views/main/dashboard/index.php';
    break;
  case 'kategori':
    include '../views/main/kategori/index.php';
    break;
  case 'buku':
    include '../views/main/buku/index.php';
    break;
  case 'add-buku':
    include '../views/main/buku/add.php';
    break;
  case ($page == 'edit-buku' && $id):
    include '../views/main/buku/edit.php';
    break;
  case 'rak':
    include '../views/main/rak/index.php';
    break;
  case 'add-rak':
    include '../views/main/rak/add.php';
    break;
  case ($page == 'edit-rak' && $id == $id):
    include '../views/main/rak/edit.php';
    break;
  case 'peminjaman':
    include '../views/main/pinjam/index.php';
    break;
  case 'add-peminjaman':
    include '../views/main/pinjam/add.php';
    break;
  case ($page == 'edit-peminjaman' && $id == $id):
    include '../views/main/pinjam/edit.php';
    break;
  case 'anggota':
    include '../views/main/anggota/index.php';
    break;
  case 'add-anggota':
    include '../views/main/anggota/add.php';
    break;
  case ($page == 'edit-anggota' && $id):
    include '../views/main/anggota/edit.php';
    break;
  default:
    include '../views/main/kategori/index.php';
    break;
}
