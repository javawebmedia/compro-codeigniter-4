<?= form_open_multipart('admin/konfigurasi/logo') ?>

<input type="hidden" name="id_konfigurasi" value="<?= $konfigurasi['id_konfigurasi'] ?>">
<div class="form-group row">
	<label class="col-3">Upload Logo Baru</label>
	<div class="col-6">
		<input type="file" name="logo" value="<?= $konfigurasi['logo'] ?>" class="form-control">
		<small class="text-secondary">Format: JPG, PNG, GIF</small>
	</div>
	<div class="col-3">
		<img src="<?= logo() ?>" class="img img-thumbnail">
	</div>
</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?= form_close(); ?>