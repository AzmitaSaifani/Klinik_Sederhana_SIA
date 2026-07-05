<?php

include '../config/koneksi.php';

if(isset($_POST['simpan']))
{
    $sql = "
    INSERT INTO t_kunjungan(
        tanggal,
        pasien_id,
        biaya_layanan
    )
    VALUES(
        ?,
        ?,
        ?
    )";

    $stmt = $db->prepare($sql);

    $stmt->execute([
        $_POST['tanggal'],
        $_POST['pasien_id'],
        $_POST['biaya_layanan']
    ]);

    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Tambah Kunjungan</title>

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

    <a href="peralatan_medis/index.php">🩺 Inventaris Peralatan Medis</a>

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
Tambah Kunjungan
</h2>

<div class="card shadow-sm">

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label class="form-label">
Tanggal Kunjungan
</label>

<input
type="date"
name="tanggal"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
ID Pasien
</label>

<input
type="number"
name="pasien_id"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Biaya Layanan
</label>

<input
type="number"
name="biaya_layanan"
class="form-control"
required>

</div>

<button
type="submit"
name="simpan"
class="btn btn-primary">

Simpan

</button>

<a
href="index.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</body>
</html>