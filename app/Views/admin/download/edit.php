<form action="<?= base_url('admin/download/edit/' . $download['id_download']) ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?= csrf_field();
?>

<div class="form-group row">
	<label class="col-md-2">Judul Download</label>
	<div class="col-md-10">
		<input type="text" name="judul_download" class="form-control" value="<?= $download['judul_download'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Upload File</label>
	<div class="col-md-10">
		<input type="file" name="gambar" class="form-control" value="<?= $download['gambar'] ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Kategori, Jenis &amp; Status</label>
	<div class="col-md-2">
		<select name="id_kategori_download" class="form-control">
			<?php foreach ($kategori_download as $kategori_download) { ?>
			<option value="<?= $kategori_download['id_kategori_download'] ?>" <?php if ($download['id_kategori_download'] === $kategori_download['id_kategori_download']) {
    echo 'selected';
} ?>>
				<?= $kategori_download['nama_kategori_download'] ?>
			</option>
			<?php } ?>
		</select>
		<small class="text-secondary">Kategori</small>
	</div>
	<div class="col-md-2">
		<select name="jenis_download" class="form-control">
			<option value="Download">Download</option>
			<option value="Panduan" <?php if ($download['jenis_download'] === 'Panduan') {
    echo 'selected';
} ?>>Panduan</option>
		</select>
		<small class="text-secondary">Jenis konten</small>
	</div>

</div>

<div class="form-group row">
	<label class="col-md-2">Isi Download</label>
	<div class="col-md-10">
		<textarea name="isi" class="form-control konten"><?= $download['isi'] ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Link/URL</label>
	<div class="col-md-10">
		<input type="text" name="website" class="form-control" value="<?= $download['website'] ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2"></label>
	<div class="col-md-10">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?= form_close(); ?>