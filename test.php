<?php

$db = new PDO(
    "sqlite:E:/Kuliah/SEMESTER 8/SIA/PraktekDB/Praktek_Akuntansi.db"
);

$db->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
);

echo "<h3>Tabel m_akun</h3>";

$data = $db->query("
SELECT *
FROM m_akun
");

foreach($data as $row)
{
    echo $row['akun_id']." - ";
    echo $row['nama_akun']."<br>";
}

echo "<hr>";

$total = $db->query("
SELECT COUNT(*)
FROM t_jurnal
")->fetchColumn();

echo "Jumlah Jurnal : ".$total;