<?php

include '../config/koneksi.php';

$data = $db->query("
SELECT
    b.*,
    a.nama_akun

FROM t_biaya b

LEFT JOIN m_akun a
ON b.akun_beban = a.akun_id

ORDER BY b.biaya_id DESC
");

?>

<!DOCTYPE html>
<html>
<head>

<title>Data Biaya</title>

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
    <a href="index.php">💸 Biaya</a>
    <a href="../jurnal/index.php">📑 Jurnal</a>
    <a href="../laporan/laba_rugi.php">📈 Laba Rugi</a>
    <a href="../laporan/perubahan_modal.php">💰 Perubahan Modal</a>
    <a href="../laporan/neraca.php">📊 Neraca </a>

</div>

<div class="content">

<h2 class="page-title">
💸 Data Biaya
</h2>

<a href="tambah.php"
class="btn btn-primary mb-3">

+ Tambah Biaya

</a>

<div class="card">

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Tanggal</th>
<th>Akun Beban</th>
<th>Keterangan</th>
<th>Nominal</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php foreach($data as $row): ?>

<tr>

<td><?= $row['biaya_id'] ?></td>

<td><?= $row['tanggal'] ?></td>

<td><?= $row['nama_akun'] ?></td>

<td><?= $row['keterangan'] ?></td>

<td class="text-end">

Rp <?= number_format($row['nominal'],0,',','.') ?>

</td>

<td>

<a
href="edit.php?id=<?= $row['biaya_id'] ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="hapus.php?id=<?= $row['biaya_id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin hapus data?')">

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