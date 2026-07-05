<?php

include '../config/koneksi.php';

$akun = $db->query("
SELECT *
FROM m_akun
WHERE kategori='Beban'
");

if(isset($_POST['simpan']))
{
    $stmt = $db->prepare("
    INSERT INTO t_biaya
    (
        tanggal,
        akun_beban,
        keterangan,
        nominal
    )
    VALUES
    (
        ?,?,?,?
    )
    ");

    $stmt->execute([
        $_POST['tanggal'],
        $_POST['akun_beban'],
        $_POST['keterangan'],
        $_POST['nominal']
    ]);

    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Biaya</title>

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
Tambah Biaya
</h2>

<div class="card">

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>Tanggal</label>

<input
type="date"
name="tanggal"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Akun Beban</label>

<select
name="akun_beban"
class="form-select"
required>

<option value="">
Pilih Akun
</option>

<?php foreach($akun as $a): ?>

<option
value="<?= $a['akun_id'] ?>">

<?= $a['akun_id'] ?> -
<?= $a['nama_akun'] ?>

</option>

<?php endforeach ?>

</select>

</div>

<div class="mb-3">

<label>Keterangan</label>

<input
type="text"
name="keterangan"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Nominal</label>

<input
type="number"
name="nominal"
class="form-control"
required>

</div>

<button
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