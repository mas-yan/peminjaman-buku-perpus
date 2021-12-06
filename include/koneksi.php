<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'perpus');

if ($koneksi) {
  echo "";
} else {
  echo "gagal terhubung kedalam Database";
}

function baseUrl($url = null)
{
  $baseUrl = "http://localhost/peminjaman-buku-perpus";

  if ($url != null) {
    return $baseUrl . "/" . $url;
  } else {
    return $baseUrl;
  }
}
