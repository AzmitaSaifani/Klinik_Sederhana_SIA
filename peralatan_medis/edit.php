<?php

include '../config/koneksi.php';

$id = $_GET['id'];

$data = $db->query("
SELECT *
FROM t_peralatan_medis
WHERE alat_id=$id
")->fetch();

if(isset($_POST['update']))
{

$stmt = $db->prepare("
UPDATE t_peralatan_medis
SET
    kode_alat=?,
    nama_alat=?,
    kategori=?,
    merk=?,
    lokasi=?,
    tanggal_perolehan=?,
    harga_perolehan=?,
    kondisi=?,
    status=?
WHERE alat_id=?
");

$stmt->execute([

$_POST['kode_alat'],
$_POST['nama_alat'],
$_POST['kategori'],
$_POST['merk'],
$_POST['lokasi'],
$_POST['tanggal_perolehan'],
$_POST['harga_perolehan'],
$_POST['kondisi'],
$_POST['status'],
$id

]);

header("Location:index.php");

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Inventaris Peralatan Medis</title>

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

    <a href="../laporan/laba_rugi.php">📈 Laba Rugi</a>

    <a href="../laporan/perubahan_modal.php">💰 Perubahan Modal</a>

    <a href="../laporan/neraca.php">📊 Neraca</a>

</div>

<div class="content">

<h2 class="page-title">

Edit Inventaris Peralatan Medis

</h2>

<div class="card shadow-sm">

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label class="form-label">Kode Peralatan</label>
<input
type="text"
name="kode_alat"
class="form-control"
placeholder="Contoh: INV001"
value="<?= $data['kode_alat'] ?>"
required>
</div>

<div class="mb-3">
<label class="form-label">Nama Peralatan</label>
<input
type="text"
name="nama_alat"
class="form-control"
placeholder="Contoh: Tensimeter Digital"
value="<?= $data['nama_alat'] ?>"
required>
</div>

<div class="mb-3">

<label class="form-label">
Kategori
</label>

<select
name="kategori"
class="form-select"
required>

<option value="">-- Pilih Kategori --</option>

<option value="Diagnostik" <?= $data['kategori']=="Diagnostik" ? "selected" : "" ?>>
Diagnostik
</option>

<option value="Monitoring" <?= $data['kategori']=="Monitoring" ? "selected" : "" ?>>
Monitoring
</option>

<option value="Terapi" <?= $data['kategori']=="Terapi" ? "selected" : "" ?>>
Terapi
</option>

<option value="Penunjang Medis" <?= $data['kategori']=="Penunjang Medis" ? "selected" : "" ?>>
Penunjang Medis
</option>

<option value="Sterilisasi" <?= $data['kategori']=="Sterilisasi" ? "selected" : "" ?>>
Sterilisasi
</option>

<option value="Mobilitas Pasien" <?= $data['kategori']=="Mobilitas Pasien" ? "selected" : "" ?>>
Mobilitas Pasien
</option>

<option value="Lainnya" <?= $data['kategori']=="Lainnya" ? "selected" : "" ?>>
Lainnya
</option>

</select>

</div>

<div class="mb-3">
<label class="form-label">Merk</label>
<input
type="text"
name="merk"
class="form-control"
placeholder="Contoh: Omron"
value="<?= $data['merk'] ?>">
</div>

<div class="mb-3">

<label class="form-label">
Lokasi
</label>

<select
name="lokasi"
class="form-select"
required>

<option value="">-- Pilih Lokasi --</option>

<option value="Poli Umum" <?= $data['lokasi']=="Poli Umum" ? "selected" : "" ?>>
Poli Umum
</option>

<option value="Ruang Pemeriksaan" <?= $data['lokasi']=="Ruang Pemeriksaan" ? "selected" : "" ?>>
Ruang Pemeriksaan
</option>

<option value="Ruang Tindakan" <?= $data['lokasi']=="Ruang Tindakan" ? "selected" : "" ?>>
Ruang Tindakan
</option>

<option value="Laboratorium" <?= $data['lokasi']=="Laboratorium" ? "selected" : "" ?>>
Laboratorium
</option>

<option value="Rawat Inap" <?= $data['lokasi']=="Rawat Inap" ? "selected" : "" ?>>
Rawat Inap
</option>

<option value="IGD" <?= $data['lokasi']=="IGD" ? "selected" : "" ?>>
IGD
</option>

<option value="Gudang" <?= $data['lokasi']=="Gudang" ? "selected" : "" ?>>
Gudang
</option>

</select>

</div>

<div class="mb-3">
<label class="form-label">Tanggal Perolehan</label>
<input
type="date"
name="tanggal_perolehan"
class="form-control"
value="<?= $data['tanggal_perolehan'] ?>"
required>
</div>

<div class="mb-3">
<label class="form-label">Harga Perolehan (Rp)</label>
<input
type="number"
name="harga_perolehan"
class="form-control"
placeholder="Contoh: 2500000"
value="<?= $data['harga_perolehan'] ?>"
required>

<small class="text-muted">
Masukkan nominal tanpa tanda titik (.) atau koma (,).
</small>

</div>

<div class="mb-3">

<label class="form-label">
Kondisi
</label>

<select
name="kondisi"
class="form-select"
required>

<option value="">-- Pilih Kondisi --</option>

<option value="Baik" <?= $data['kondisi']=="Baik" ? "selected" : "" ?>>
Baik
</option>

<option value="Rusak Ringan" <?= $data['kondisi']=="Rusak Ringan" ? "selected" : "" ?>>
Rusak Ringan
</option>

<option value="Rusak Berat" <?= $data['kondisi']=="Rusak Berat" ? "selected" : "" ?>>
Rusak Berat
</option>

</select>

</div>

<div class="mb-3">

<label class="form-label">
Status
</label>

<select
name="status"
class="form-select"
required>

<option value="">-- Pilih Status --</option>

<option value="Digunakan" <?= $data['status']=="Digunakan" ? "selected" : "" ?>>
Digunakan
</option>

<option value="Tidak Digunakan" <?= $data['status']=="Tidak Digunakan" ? "selected" : "" ?>>
Tidak Digunakan
</option>

<option value="Tidak Aktif" <?= $data['status']=="Tidak Aktif" ? "selected" : "" ?>>
Tidak Aktif
</option>

</select>

</div>

<button
type="submit"
name="update"
class="btn btn-warning">

Update

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