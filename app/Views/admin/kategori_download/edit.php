<?= form_open(base_url('admin/kategori_download/edit/' . $kategori_download['id_kategori_download']));
echo csrf_field();
?>

<div class="form-group row">
	<label class="col-3">Nama Kategori Download</label>
	<div class="col-9">
		<input type="text" name="nama_kategori_download" class="form-control" placeholder="Nama kategori_download" value="<?= $kategori_download['nama_kategori_download'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Nomor urut Kategori Download</label>
	<div class="col-9">
		<input type="number" name="urutan" class="form-control" placeholder="Nomor urut kategori_download" value="<?= $kategori_download['urutan'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?= form_close(); ?>