<?php

include 'config/koneksi.php';

$totalAkun = $db->query("
SELECT COUNT(*)
FROM m_akun
")->fetchColumn();

$totalKunjungan = $db->query("
SELECT COUNT(*)
FROM t_kunjungan
")->fetchColumn();

$totalJurnal = $db->query("
SELECT COUNT(*)
FROM t_jurnal
")->fetchColumn();

?>

<!DOCTYPE html>
<html>
<head>

<title>SIA Klinik</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="assets/css/style.css">

</head>

<body>

<div class="sidebar">

    <h3>SIA Klinik</h3>

    <a href="index.php">🏠 Dashboard</a>

    <a href="akun/index.php">
       📒 Master Akun
    </a>

    <a href="kunjungan/index.php">
       🏥 Kunjungan
    </a>

    <a href="peralatan_medis/index.php">🩺 Inventaris Peralatan Medis</a>

    <a href="biaya/index.php">
        💸 Biaya
    </a>

    <a href="jurnal/index.php">
       📑 Jurnal
    </a>

    <a href="laporan/laba_rugi.php">
    📈 Laba Rugi</a>
    
    <a href="laporan/perubahan_modal.php">
    💰 Perubahan Modal</a>
    
    <a href="laporan/neraca.php">
    📊 Neraca</a>

</div>

<div class="content">

    <h2 class="page-title">
        Dashboard Sistem Informasi Akuntansi
    </h2>

    <div class="row">

    <div class="col-md-4">

        <div class="card card-dashboard border-start border-primary border-4">

            <div class="card-body">

                <h6>Total Akun</h6>

                <h2><?= $totalAkun ?></h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card card-dashboard border-start border-success border-4">

            <div class="card-body">

                <h6>Total Kunjungan</h6>

                <h2><?= $totalKunjungan ?></h2>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card card-dashboard border-start border-danger border-4">

            <div class="card-body">

                <h6>Total Jurnal</h6>

                <h2><?= $totalJurnal ?></h2>

            </div>

        </div>

    </div>

</div>

</div>

</body>
</html>