<form action="<?php echo base_url('admin/galeri/edit/'.$galeri['id_galeri']) ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?php 
echo csrf_field(); 
?>

<div class="form-group row">
	<label class="col-md-2">Judul Galeri</label>
	<div class="col-md-10">
		<input type="text" name="judul_galeri" class="form-control" value="<?php echo $galeri['judul_galeri'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Upload Gambar Galeri</label>
	<div class="col-md-10">
		<input type="file" name="gambar" class="form-control" value="<?php echo $galeri['gambar'] ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Kategori, Jenis &amp; Status</label>
	<div class="col-md-2">
		<select name="id_kategori_galeri" class="form-control">
			<?php foreach($kategori_galeri as $kategori_galeri) { ?>
			<option value="<?php echo $kategori_galeri['id_kategori_galeri'] ?>" <?php if($galeri['id_kategori_galeri']==$kategori_galeri['id_kategori_galeri']) { echo 'selected'; } ?>>
				<?php echo $kategori_galeri['nama_kategori_galeri'] ?>
			</option>
			<?php } ?>
		</select>
		<small class="text-secondary">Kategori</small>
	</div>
	<div class="col-md-2">
		<select name="jenis_galeri" class="form-control">
			<option value="Galeri">Galeri</option>
			<option value="Homepage" <?php if($galeri['jenis_galeri']=="Homepage") { echo 'selected'; } ?>>Homepage Slider</option>
		</select>
		<small class="text-secondary">Jenis konten</small>
	</div>
	
	<div class="col-md-3">
		<select name="status_text" class="form-control">
			<option value="Ya">Aktif</option>
			<option value="Tidak" <?php if($galeri['status_text']=="Tidak") { echo 'selected'; } ?>>Tidak Aktif</option>
		</select>
		<small class="text-secondary">Text pada slider</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Isi Galeri</label>
	<div class="col-md-10">
		<textarea name="isi" class="form-control konten"><?php echo $galeri['isi'] ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Link/URL untuk Banner</label>
	<div class="col-md-10">
		<input type="text" name="website" class="form-control" value="<?php echo $galeri['website'] ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2"></label>
	<div class="col-md-10">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?php echo form_close(); ?>