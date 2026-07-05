<?php

include '../config/koneksi.php';

$data = $db->query("

WITH LabaRugi AS (

    SELECT
        SUM(
            CASE
                WHEN m.kategori = 'Pendapatan'
                    THEN (j.kredit - j.debit)

                WHEN m.kategori = 'Beban'
                    THEN -(j.debit - j.kredit)

                ELSE 0
            END
        ) AS laba_bersih

    FROM t_jurnal j

    JOIN m_akun m
    ON j.akun_id = m.akun_id

),

ModalAwal AS (

    SELECT
        SUM(j.kredit - j.debit)
        AS total_modal_awal

    FROM t_jurnal j

    JOIN m_akun m
    ON j.akun_id = m.akun_id

    WHERE m.kategori = 'Ekuitas'

)

SELECT

    ma.total_modal_awal,
    lr.laba_bersih,

    (
        ma.total_modal_awal +
        lr.laba_bersih
    ) AS modal_akhir

FROM ModalAwal ma,
     LabaRugi lr

")->fetch();

?>

<!DOCTYPE html>
<html>
<head>

<title>Perubahan Modal</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/style.css">

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
💰 Laporan Perubahan Modal
</h2>

<div class="card">

<div class="card-body">

<table class="table table-bordered">

<tr>
    <th>Modal Awal</th>
    <td>
        Rp <?= number_format($data['total_modal_awal'],0,',','.') ?>
    </td>
</tr>

<tr>
    <th>Laba Bersih</th>
    <td>
        Rp <?= number_format($data['laba_bersih'],0,',','.') ?>
    </td>
</tr>

<tr class="table-success">

    <th>Modal Akhir</th>

    <td>
        Rp <?= number_format($data['modal_akhir'],0,',','.') ?>
    </td>

</tr>

</table>

</div>

</div>

</div>

</body>
</html>