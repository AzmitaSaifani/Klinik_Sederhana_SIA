<?php

include '../config/koneksi.php';

$data = $db->query("
SELECT
    j.jurnal_id,
    j.jenis_aktifitas,
    j.aktifitas_id,
    a.nama_akun,
    j.debit,
    j.kredit

FROM t_jurnal j

LEFT JOIN m_akun a
ON j.akun_id = a.akun_id

ORDER BY j.jurnal_id DESC
");

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Jurnal Akuntansi</title>

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
        Jurnal Akuntansi
    </h2>

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>
                        <th>ID Jurnal</th>
                        <th>Aktivitas</th>
                        <th>ID Aktivitas</th>
                        <th>Akun</th>
                        <th class="text-end">Debit</th>
                        <th class="text-end">Kredit</th>
                    </tr>

                </thead>

                <tbody>

                <?php foreach($data as $row): ?>

                    <tr>

                        <td>
                            <?= $row['jurnal_id'] ?>
                        </td>

                        <td>
                            <span class="badge bg-primary">
                                <?= ucfirst($row['jenis_aktifitas']) ?>
                            </span>
                        </td>

                        <td>
                            <?= $row['aktifitas_id'] ?>
                        </td>

                        <td>
                            <?= $row['nama_akun'] ?>
                        </td>

                        <td class="text-end text-success fw-bold">
                            Rp <?= number_format($row['debit'],0,',','.') ?>
                        </td>

                        <td class="text-end text-danger fw-bold">
                            Rp <?= number_format($row['kredit'],0,',','.') ?>
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