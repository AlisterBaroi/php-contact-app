<?php
include 'nav.php';

if (!isset($_SESSION['user'])) {
    echo "<script>alert('$err[13]');window.location.href='index.php';</script>";
} else {
    $uname = $_SESSION['user'];
}

session_unset();
echo "<script>alert('Logged out');window.location.href='index.php';</script>";
