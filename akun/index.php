<?php
include '../config/koneksi.php';

$data = $db->query("
SELECT *
FROM m_akun
ORDER BY akun_id
");
?>

<!DOCTYPE html>
<html>

<head>

<title>Data Akun</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="sidebar">

    <h3>SIA Klinik</h3>

    <a href="../index.php">🏠 Dashboard</a>

    <a href="../akun/index.php">📒 Master Akun</a>

    <a href="../kunjungan/index.php">🏥 Kunjungan</a>

    <a href="../peralatan_medis/index.php">🩺 Inventaris Peralatan Medis</a>

    <a href="../biaya/index.php">💸 Biaya</a>

    <a href="index.php">📑 Jurnal</a>

    <a href="../laporan/laba_rugi.php">
    📈 Laba Rugi</a>
    
    <a href="../laporan/perubahan_modal.php">
    💰 Perubahan Modal</a>
    
    <a href="../laporan/neraca.php">
    📊 Neraca</a>

</div>

<div class="content">

<h2 class="page-title">
Master Akun
</h2>

<a href="tambah.php"
class="btn btn-primary mb-3">

+ Tambah Akun

</a>

<div class="card">

<div class="card-body">

<table class="table table-striped">

<thead class="table-dark">

<tr>
<th>ID</th>
<th>Nama Akun</th>
<th>Kategori</th>
<th width="150">Aksi</th>
</tr>

</thead>

<tbody>

<?php foreach($data as $row): ?>

<tr>

<td><?= $row['akun_id'] ?></td>

<td><?= $row['nama_akun'] ?></td>

<td>

<span class="badge bg-info">

<?= $row['kategori'] ?>

</span>

</td>

<td>

<a
href="edit.php?id=<?= $row['akun_id'] ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="hapus.php?id=<?= $row['akun_id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus data?')">

Hapus

</a>

</td>

</tr>

<?php endforeach ?>

</tbody>

</table>

</div>
</div>

</div>

</body>
</html>