<?= view('partials/header', [
 'judulHalaman' => $mode === 'edit' ? 'Ubah Kegiatan' : 'Tambah Kegiatan'
]) ?>

<h2><?= $mode === 'edit' ? 'Ubah Kegiatan' : 'Tambah Kegiatan' ?></h2>
<?php $errors = session('errors') ?? []; ?>

<?php if ($errors): ?>
 <div role="alert" style="color:#9b1c1c">
 <strong>Periksa input:</strong>
 <ul>
 <?php foreach ($errors as $error): ?>
 <li><?= esc($error) ?></li>
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
        $opsiKategori = ['Seminar', 'Workshop', 'Lomba', 'Organisasi'];
        $ketTerpilih = old('kategori')?? ($item['kategori'] ?? '');
    ?>

    <select name="kategori" id="kategori" required>
        <option value="">-- Pilih Kategori --</option>
            <?php foreach ($opsiKategori as $kat): ?>
                <option value="<?= esc($kat) ?>" <?= ($katTerpilih === $kat) ? 'selected' : '' ?> >
                    <?= esc($kat) ?>
                </option>
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