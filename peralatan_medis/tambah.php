<?php

include '../config/koneksi.php';

if(isset($_POST['simpan']))
{
    $sql = "
    INSERT INTO t_peralatan_medis(
        kode_alat,
        nama_alat,
        kategori,
        merk,
        lokasi,
        tanggal_perolehan,
        harga_perolehan,
        kondisi,
        status
    )
    VALUES(
        ?,?,?,?,?,?,?,?,?
    )";

    $stmt = $db->prepare($sql);

    $stmt->execute([
        $_POST['kode_alat'],
        $_POST['nama_alat'],
        $_POST['kategori'],
        $_POST['merk'],
        $_POST['lokasi'],
        $_POST['tanggal_perolehan'],
        $_POST['harga_perolehan'],
        $_POST['kondisi'],
        $_POST['status']
    ]);

    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Tambah Inventaris Peralatan Medis</title>

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

Tambah Inventaris Peralatan Medis

</h2>

<div class="card shadow-sm">

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label class="form-label">Kode Peralatan</label>
<input type="text" name="kode_alat" placeholder="Contoh: INV001" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Nama Peralatan</label>
<input type="text" name="nama_alat" placeholder="Contoh: Tensimeter Digital" class="form-control" required>
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

<option value="Diagnostik">Diagnostik</option>

<option value="Monitoring">Monitoring</option>

<option value="Terapi">Terapi</option>

<option value="Penunjang Medis">Penunjang Medis</option>

<option value="Sterilisasi">Sterilisasi</option>

<option value="Mobilitas Pasien">Mobilitas Pasien</option>

<option value="Lainnya">Lainnya</option>

</select>

</div>

<div class="mb-3">
<label class="form-label">Merk</label>
<input type="text" name="merk" placeholder="Contoh: Omron" class="form-control">
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

<option value="Poli Umum">Poli Umum</option>

<option value="Ruang Pemeriksaan">Ruang Pemeriksaan</option>

<option value="Ruang Tindakan">Ruang Tindakan</option>

<option value="Laboratorium">Laboratorium</option>

<option value="Rawat Inap">Rawat Inap</option>

<option value="IGD">IGD</option>

<option value="Gudang">Gudang</option>

</select>

</div>

<div class="mb-3">
<label class="form-label">Tanggal Perolehan</label>
<input type="date" name="tanggal_perolehan" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Harga Perolehan (Rp)</label>
<input type="number" name="harga_perolehan" placeholder="Contoh: 2500000" class="form-control" required>
<small class="text-muted">
Masukkan nominal tanpa tanda titik (.) atau koma (,).
</small>
</div>

<div class="mb-3">
<label class="form-label">Kondisi</label>

<select name="kondisi" class="form-select">

<option value="">-- Pilih Kondisi --</option>

<option value="Baik">Baik</option>

<option value="Rusak Ringan">Rusak Ringan</option>

<option value="Rusak Berat">Rusak Berat</option>

</select>

</div>

<div class="mb-3">
<label class="form-label">Status</label>

<select name="status" class="form-select">

<option value="">-- Pilih Status --</option>

<option value="Digunakan">Digunakan</option>

<option value="Tidak Digunakan">Tidak Digunakan</option>

<option value="Tidak Aktif">Tidak Aktif</option>

</select>

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