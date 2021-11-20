<?= form_open(base_url('admin/kategori_staff/edit/' . $kategori_staff['id_kategori_staff']));
echo csrf_field();
?>

<div class="form-group row">
	<label class="col-3">Nama Kategori Staff</label>
	<div class="col-9">
		<input type="text" name="nama_kategori_staff" class="form-control" placeholder="Nama kategori_staff" value="<?= $kategori_staff['nama_kategori_staff'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Nomor urut Kategori Staff</label>
	<div class="col-9">
		<input type="number" name="urutan" class="form-control" placeholder="Nomor urut kategori_staff" value="<?= $kategori_staff['urutan'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?= form_close(); ?>