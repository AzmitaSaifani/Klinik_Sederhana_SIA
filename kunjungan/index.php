<?php

include '../config/koneksi.php';

$data = $db->query("
SELECT *
FROM t_kunjungan
ORDER BY kunjungan_id DESC
");

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Data Kunjungan</title>

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
        Data Kunjungan
    </h2>

    <a href="tambah.php"
       class="btn btn-primary mb-3">

       + Tambah Kunjungan

    </a>

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Pasien</th>
                        <th>Biaya Layanan</th>
                        <th width="150">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                <?php foreach($data as $row): ?>

                    <tr>

                        <td><?= $row['kunjungan_id'] ?></td>

                        <td><?= $row['tanggal'] ?></td>

                        <td><?= $row['pasien_id'] ?></td>

                        <td class="text-end text-success fw-bold">

                            Rp <?= number_format($row['biaya_layanan'],0,',','.') ?>

                        </td>

                        <td>

                            <a
                            href="edit.php?id=<?= $row['kunjungan_id'] ?>"
                            class="btn btn-warning btn-sm">

                            Edit

                            </a>

                            <a
                            href="hapus.php?id=<?= $row['kunjungan_id'] ?>"
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