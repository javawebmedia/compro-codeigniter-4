<?= form_open(base_url('admin/konfigurasi/seo'));
echo csrf_field();
?>

<input type="hidden" name="id_konfigurasi" value="<?= $konfigurasi['id_konfigurasi'] ?>">
<div class="form-group row">
	<label class="col-3">Keywords (untuk pencarian Google)</label>
	<div class="col-9">
		<textarea name="keywords" class="form-control"><?= $konfigurasi['keywords'] ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Metatext, Facebook Pixel, Google Analytic dsb</label>
	<div class="col-9">
		<textarea name="metatext" class="form-control"><?= $konfigurasi['metatext'] ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?= form_close(); ?>