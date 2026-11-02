<?= view('partials/header', ['judulHalaman' => 'Detail Kegiatan']) ?>
<h2><?= esc($item['judul']) ?></h2>
<p>Kategori : <?= esc($item['kategori']) ?> </p>
<p>Kuota : <?= esc($item['kuota']) ?> peserta</p>
<a href="<?= site_url('kegiatan') ?>">Kembali ke daftar</a>
<?= view('partials/footer') ?>