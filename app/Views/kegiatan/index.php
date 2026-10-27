<?php

/**
 * @var string $judul
 * @var string $item
 * @var array $kegiatan
 */

?>

<?= view('partials/header', ['judulHalaman' => 'Katalog Kegiatan']) ?>
<h2>Daftar Kegiatan</h2>
<table border="1" cellpadding='8'>
    <tr>
        <th>Judul</th>
        <th>Kategori</th>
        <th>kuota</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($kegiatan as $item): ?>
        <tr>
            <td><?= esc($item['judul']) ?></td>
            <td><?= esc($item['kategori']) ?></td>
            <td><?= esc($item['kuota']) ?></td>
            <td><a href="<?= site_url('kegiatan/' . $item['id']) ?>">Detail</a></td>
        </tr>
    <?php endforeach; ?>
</table>

<?= view('partials/footer') ?>


