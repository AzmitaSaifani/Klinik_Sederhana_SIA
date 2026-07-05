<?php

include '../config/koneksi.php';

$data = $db->query("
SELECT *
FROM t_peralatan_medis
ORDER BY alat_id DESC
");

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Inventaris Peralatan Medis</title>

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

    <a href="index.php">🩺 Inventaris Peralatan Medis</a>

    <a href="../biaya/index.php">💸 Biaya</a>

    <a href="../jurnal/index.php">📑 Jurnal</a>

    <a href="../laporan/laba_rugi.php">
        📈 Laba Rugi
    </a>

    <a href="../laporan/perubahan_modal.php">
        💰 Perubahan Modal
    </a>

    <a href="../laporan/neraca.php">
        📊 Neraca
    </a>

</div>

<div class="content">

    <h2 class="page-title">

        Inventaris Peralatan Medis

    </h2>

    <a href="tambah.php"
       class="btn btn-primary mb-3">

       + Tambah Peralatan

    </a>

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>

                        <th>Kode</th>

                        <th>Nama Peralatan</th>

                        <th>Kategori</th>

                        <th>Merk</th>

                        <th>Lokasi</th>

                        <th>Tanggal Perolehan</th>

                        <th>Harga Perolehan</th>

                        <th>Kondisi</th>

                        <th>Status</th>

                        <th width="150">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                <?php foreach($data as $row): ?>

                    <tr>

                        <td>

                            <?= $row['alat_id'] ?>

                        </td>

                        <td>

                            <?= $row['kode_alat'] ?>

                        </td>

                        <td>

                            <?= $row['nama_alat'] ?>

                        </td>

                        <td>

                            <?= $row['kategori'] ?>

                        </td>

                        <td>

                            <?= $row['merk'] ?>

                        </td>

                        <td>

                            <?= $row['lokasi'] ?>

                        </td>

                        <td>

                            <?= $row['tanggal_perolehan'] ?>

                        </td>

                        <td class="text-end text-success fw-bold">

                            Rp <?= number_format($row['harga_perolehan'],0,',','.') ?>

                        </td>

                        <td>

                            <?php
                            if($row['kondisi']=="Baik")
                            {
                                echo '<span class="badge bg-success">Baik</span>';
                            }
                            elseif($row['kondisi']=="Rusak Ringan")
                            {
                                echo '<span class="badge bg-warning text-dark">Rusak Ringan</span>';
                            }
                            else
                            {
                                echo '<span class="badge bg-danger">Rusak</span>';
                            }
                            ?>

                        </td>

                        <td>

                            <?php
                            if($row['status']=="Aktif")
                            {
                                echo '<span class="badge bg-primary">Aktif</span>';
                            }
                            else
                            {
                                echo '<span class="badge bg-secondary">'.$row['status'].'</span>';
                            }
                            ?>

                        </td>

                        <td>

                            <a
                            href="edit.php?id=<?= $row['alat_id'] ?>"
                            class="btn btn-warning btn-sm">

                            Edit

                            </a>

                            <a
                            href="hapus.php?id=<?= $row['alat_id'] ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">

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