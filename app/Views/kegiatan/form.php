<?= view('partials/header', [
 'judulHalaman' => $mode === 'edit' ? 'Ubah Kegiatan' : 'Tambah Kegiatan'
]) ?>

<h2><?= $mode === 'edit' ? 'Ubah Kegiatan' : 'Tambah Kegiatan' ?></h2>
<?php $errors = session('errors') ?? []; ?>

<!-- Sisipkan dalam app/Views/kegiatan/form.php, 
     tepat sebelum elemen <form>. --> 
<?php $errors = session('errors') ?? []; ?> 
<?php if ($errors !== []): ?> 
  <div role="alert" style="color:#a10000"> 
    <strong>Periksa kembali data:</strong> 
    <ul> 
      <?php foreach ($errors as $message): ?> 
        <li><?= esc($message) ?></li> 
      <?php endforeach; ?> 
    </ul> 
  </div> 
<?php endif; ?>

<form action="<?= esc($action) ?>" method="post">
 <?= csrf_field() ?>
 <p>
 <label for="judul">Judul</label><br>
 <input id="judul" type="text" name="judul" maxlength="150"
 value="<?= esc(old('judul') ?? ($item['judul'] ?? '')) ?>" required>
 </p>

 <p>
    <label for="kategori">Kategori</label> <br>
    <?php
        $opsiKategori = ['Seminar', 'Workshop', 'Lomba', 'Organisasi', 'Teknologi', 'Kreatif', 'Komunikasi'];
        $katTerpilih = old('kategori')?? ($item['kategori'] ?? '');
    ?>

    <select name="kategori" id="kategori" required>
        <option value="">-- Pilih Kategori --</option>
            <?php foreach ($opsiKategori as $kat): ?>
                <option value="<?= esc($kat) ?>" <?= ($katTerpilih === $kat) ? 'selected' : '' ?> >
                    <?= esc($kat) ?>
                </option>
            <?php endforeach; ?>
    </select>
 </p>

 <p>
 <label for="kuota">Kuota</label><br>
 <input id="kuota" type="number" name="kuota" min="0"
 value="<?= esc(old('kuota') ?? ($item['kuota'] ?? 0)) ?>" required>
 </p>
 <button type="submit">Simpan</button>
 <a href="<?= site_url('kegiatan') ?>">Batal</a>
</form>

<?= view('partials/footer') ?>