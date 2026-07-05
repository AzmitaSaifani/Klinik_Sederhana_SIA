<?php

$db = new PDO(
    "sqlite:E:/Kuliah/SEMESTER 8/SIA/PraktekDB/Praktek_Akuntansi.db"
);

$db->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
);