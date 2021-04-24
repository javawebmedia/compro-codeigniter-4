<?php 
echo form_open(base_url('admin/kategori/edit/'.$kategori['id_kategori'])); 
echo csrf_field(); 
?>

<div class="form-group row">
	<label class="col-3">Nama Kategori</label>
	<div class="col-9">
		<input type="text" name="nama_kategori" class="form-control" placeholder="Nama kategori" value="<?php echo $kategori['nama_kategori'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Nomor urut Kategori</label>
	<div class="col-9">
		<input type="number" name="urutan" class="form-control" placeholder="Nomor urut kategori" value="<?php echo $kategori['urutan'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?php echo form_close(); ?>