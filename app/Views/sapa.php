<?php

/**
 * @var string $judul
 * @var string $pesan
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
    <p><?= esc($pesan) ?></p>
</body>
</html>