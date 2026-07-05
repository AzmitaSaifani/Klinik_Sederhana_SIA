<?php

include '../config/koneksi.php';

$id = $_GET['id'];

$stmt = $db->prepare("
DELETE FROM t_peralatan_medis
WHERE alat_id = ?
");

$stmt->execute([$id]);

header("Location:index.php");

?>