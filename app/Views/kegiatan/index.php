<?php

/**
 * @var string $judul
 * @var string $item
 * @var array $kegiatan
 */

?>

<?= view('partials/header', ['judulHalaman' => 'Katalog Kegiatan']) ?>
<h2>Daftar Kegiatan</h2>
<?php if ($pesan = session('success')): ?>
 <p style="color:green" role="status"><?= esc($pesan) ?></p>
<?php endif; ?>

<p>
    <a href="<?= site_url('kegiatan/tambah') ?>">+ Tambah Kegiatan</a> <br>
    <a href="<?= site_url('kegiatan/cari') ?>">Cari Kegiatan</a>
</p>

<table border="1" cellpadding="8" cellspacing="0">
 <thead><tr>
 <th>ID</th><th>Judul</th><th>Kategori</th><th>Kuota</th><th>Aksi</th>
 </tr></thead>
 <tbody>
 <?php foreach ($kegiatan as $item): ?>
 <tr>
 <td><?= esc($item['id']) ?></td>
 <td><?= esc($item['judul']) ?></td>
 <td><?= esc($item['kategori']) ?></td>
 <td><?= esc($item['kuota']) ?></td>
 <td>
 <a href="<?= site_url('kegiatan/' . $item['id']) ?>">Detail</a> |
 <a href="<?= site_url('kegiatan/' . $item['id'] . '/edit') ?>">Ubah</a>
 <form method="post"
 action="<?= site_url('kegiatan/' . $item['id'] . '/hapus') ?>"
 style="display:inline"
 onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')">
 <?= csrf_field() ?>
 <button type="submit">Hapus</button>
 </form>
 </td>
 </tr>
 <?php endforeach; ?>
 <?php if ($kegiatan === []): ?>
 <tr><td colspan="5">Belum ada kegiatan.</td></tr>
 <?php endif; ?>
 </tbody>
</table>
<p><a href="<?= site_url('kegiatan/statistik') ?>">Statistik kategori</a></p>
<?= view('partials/footer') ?>


