<?php

include '../config/koneksi.php';

if(isset($_POST['simpan']))
{
    $sql = "
    INSERT INTO m_akun(
        akun_id,
        nama_akun,
        kategori
    )
    VALUES(
        ?,
        ?,
        ?
    )";

    $stmt = $db->prepare($sql);

    $stmt->execute([
        $_POST['akun_id'],
        $_POST['nama_akun'],
        $_POST['kategori']
    ]);

    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Tambah Akun</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<link rel="stylesheet"
href="../assets/css/style.css">

</head>

<body>

<div class="sidebar">

    <h3>SIA Klinik</h3>

    <a href="../index.php">🏠 Dashboard</a>
    <a href="index.php">📒 Master Akun</a>
    <a href="../kunjungan/index.php">🏥 Kunjungan</a>
    <a href="../peralatan_medis/index.php">🩺 Inventaris Peralatan Medis</a>
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
        Tambah Akun
    </h2>

    <div class="card shadow-sm">

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        ID Akun
                    </label>

                    <input
                    type="number"
                    name="akun_id"
                    class="form-control"
                    required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Nama Akun
                    </label>

                    <input
                    type="text"
                    name="nama_akun"
                    class="form-control"
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

                        <option value="">
                            Pilih Kategori
                        </option>

                        <option>Aset Lancar</option>
                        <option>Aset Tetap</option>
                        <option>Kewajiban</option>
                        <option>Ekuitas</option>
                        <option>Pendapatan</option>
                        <option>Beban</option>

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