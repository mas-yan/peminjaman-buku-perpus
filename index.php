<?php
session_start();
if (isset($_SESSION['user'])) {
  header('location: public/index.php?page=dashboard');
} else {
  header('location: views/auth/index.php');
}
