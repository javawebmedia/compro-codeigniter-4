<?= form_open(base_url('admin/kategori_galeri/edit/' . $kategori_galeri['id_kategori_galeri']));
echo csrf_field();
?>

<div class="form-group row">
	<label class="col-3">Nama Kategori Galeri</label>
	<div class="col-9">
		<input type="text" name="nama_kategori_galeri" class="form-control" placeholder="Nama kategori_galeri" value="<?= $kategori_galeri['nama_kategori_galeri'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Nomor urut Kategori Galeri</label>
	<div class="col-9">
		<input type="number" name="urutan" class="form-control" placeholder="Nomor urut kategori_galeri" value="<?= $kategori_galeri['urutan'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?= form_close(); ?>