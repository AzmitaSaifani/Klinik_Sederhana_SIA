<?php

include '../config/koneksi.php';

$data = $db->query("
SELECT
    m.kategori,
    m.akun_id,
    m.nama_akun,
    SUM(
        CASE
            WHEN m.kategori = 'Pendapatan'
                THEN (j.kredit - j.debit)
            WHEN m.kategori = 'Beban'
                THEN (j.debit - j.kredit)
            ELSE 0
        END
    ) AS saldo
FROM t_jurnal j
JOIN m_akun m
ON j.akun_id = m.akun_id
WHERE m.kategori IN ('Pendapatan','Beban')
GROUP BY
    m.kategori,
    m.akun_id,
    m.nama_akun
ORDER BY
    m.kategori DESC,
    m.akun_id ASC
");
?>

<!DOCTYPE html>
<html>
<head>

<title>Laporan Laba Rugi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

<div class="sidebar">

    <h3>SIA Klinik</h3>

    <a href="../index.php">🏠 Dashboard</a>

    <a href="../akun/index.php">📒 Master Akun</a>

    <a href="index.php">🏥 Kunjungan</a>

    <a href="../peralatan_medis/index.php">🩺 Inventaris Peralatan Medis</a>

    <a href="../biaya/index.php">💸 Biaya</a>

    <a href="../jurnal/index.php">📑 Jurnal</a>

    <a href="../laporan/laba_rugi.php">
    📈 Laba Rugi</a>
    
    <a href="../laporan/perubahan_modal.php">
    💰 Perubahan Modal</a>
    
    <a href="../laporan/neraca.php">
    📊 Neraca </a>

</div>

<div class="content">

<h2 class="page-title">
📈 Laporan Laba Rugi
</h2>

<div class="card">

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>
    <th>Kategori</th>
    <th>Kode</th>
    <th>Nama Akun</th>
    <th>Saldo</th>
</tr>

</thead>

<tbody>

<?php foreach($data as $row): ?>

<tr>

<td><?= $row['kategori'] ?></td>
<td><?= $row['akun_id'] ?></td>
<td><?= $row['nama_akun'] ?></td>

<td class="text-end">
Rp <?= number_format($row['saldo'],0,',','.') ?>
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