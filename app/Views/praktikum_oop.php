<?php

/**
 * @var string $judul
 * @var string $infoProduk
 * @var string $infoProduk2
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($judul) ?></title>
</head>
<body>
    <h1><?= esc($judul) ?></h1>
    <p><?= esc($infoProduk) ?></p>
    <p><?= esc($infoProduk2) ?></p>
</body>
</html>