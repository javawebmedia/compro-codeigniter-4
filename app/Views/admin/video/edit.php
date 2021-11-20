<?= form_open(base_url('admin/video/edit/' . $video['id_video']));
echo csrf_field();
?>

<div class="form-group row">
	<label class="col-3">Nama Video</label>
	<div class="col-9">
		<input type="text" name="judul" class="form-control" placeholder="Nama video" value="<?= $video['judul'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Link Video Youtube</label>
	<div class="col-9">
		<input type="text" name="video" class="form-control" placeholder="Link video youtube" value="<?= $video['video'] ?>" required>
		<small class="text-secondary">Contoh: <span class="text-warning">https://www.youtube.com/watch?v=</span><strong class="text-danger">jVr6CYLhjQo</strong>. Ambil kode yang warna <strong class="text-danger">Merah</strong></small>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Keterangan</label>
	<div class="col-9">
		<textarea name="keterangan" class="form-control"><?= $video['keterangan'] ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?= form_close(); ?>