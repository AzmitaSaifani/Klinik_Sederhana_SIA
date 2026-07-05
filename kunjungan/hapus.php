<?php

include '../config/koneksi.php';

$id = $_GET['id'];

$stmt = $db->prepare("
DELETE FROM t_kunjungan
WHERE kunjungan_id = ?
");

$stmt->execute([$id]);

header("Location:index.php");