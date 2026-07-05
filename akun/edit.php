<?php

include '../config/koneksi.php';

$id = $_GET['id'];

$data = $db->query("
SELECT *
FROM m_akun
WHERE akun_id = $id
")->fetch();

if(isset($_POST['update']))
{
    $sql = "
    UPDATE m_akun
    SET
        nama_akun = ?,
        kategori = ?
    WHERE akun_id = ?";

    $stmt = $db->prepare($sql);

    $stmt->execute([
        $_POST['nama_akun'],
        $_POST['kategori'],
        $id
    ]);

    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Edit Akun</title>

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
    📈 Laba Rugi</a>
    <a href="../laporan/perubahan_modal.php">
    💰 Perubahan Modal</a>
    <a href="../laporan/neraca.php">
    📊 Neraca</a>

</div>

<div class="content">

    <h2 class="page-title">
        Edit Akun
    </h2>

    <div class="card shadow-sm">

        <div class="card-body">

            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Nama Akun
                    </label>

                    <input
                    type="text"
                    name="nama_akun"
                    class="form-control"
                    value="<?= $data['nama_akun'] ?>"
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

                        <option <?= $data['kategori']=='Aset Lancar'?'selected':'' ?>>
                            Aset Lancar
                        </option>

                        <option <?= $data['kategori']=='Aset Tetap'?'selected':'' ?>>
                            Aset Tetap
                        </option>

                        <option <?= $data['kategori']=='Kewajiban'?'selected':'' ?>>
                            Kewajiban
                        </option>

                        <option <?= $data['kategori']=='Ekuitas'?'selected':'' ?>>
                            Ekuitas
                        </option>

                        <option <?= $data['kategori']=='Pendapatan'?'selected':'' ?>>
                            Pendapatan
                        </option>

                        <option <?= $data['kategori']=='Beban'?'selected':'' ?>>
                            Beban
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