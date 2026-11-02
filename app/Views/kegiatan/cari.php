<?= view('partials/header', ['judulHalaman' => 'Pencarian Kegiatan']) ?>
<h2>Cari Kegiatan</h2>

<form method="get" action="<?= site_url('kegiatan/cari') ?>">
    <input type="text" name="q" placeholder="Masukkan kata kunci judul/kategori..." value="<?= esc($keyword) ?>" required>
    <button type="submit">Cari</button>
    <a href="<?= site_url('kegiatan') ?>">Kembali ke Daftar</a>
</form>

<?php if ($keyword !== ''): ?>
    <h3>Hasil Pencarian untuk: "<?= esc($keyword) ?>"</h3>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr><th>ID</th><th>Judul</th><th>Kategori</th><th>Kuota</th></tr>
        </thead>
        <tbody>
            <?php foreach ($kegiatan as $item): ?>
                <tr>
                    <td><?= esc($item['id']) ?></td>
                    <td><?= esc($item['judul']) ?></td>
                    <td><?= esc($item['kategori']) ?></td>
                    <td><?= esc($item['kuota']) ?></td>
                </tr>
            <?php endforeach; ?>
            <?php if ($kegiatan === []): ?>
                <tr><td colspan="4">Data kegiatan tidak ditemukan.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>

<?= view('partials/footer') ?>