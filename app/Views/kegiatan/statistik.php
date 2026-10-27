<?= view('partials/header', [ 
    'judulHalaman' => 'Statistik Kategori' 
]) ?> 
<h2>Statistik Kegiatan per Kategori</h2> 
<table border="1" cellpadding="8"> 
  <tr><th>Kategori</th><th>Jumlah Kegiatan</th></tr> 
  <?php foreach ($ringkasan as $item): ?> 
  <tr> 
    <td><?= esc($item['kategori']) ?></td> 
    <td><?= esc($item['total']) ?></td> 
  </tr> 
  <?php endforeach; ?> 
</table> 
<p><a href="<?= site_url('kegiatan') ?>">Kembali</a></p> 
<?= view('partials/footer') ?>