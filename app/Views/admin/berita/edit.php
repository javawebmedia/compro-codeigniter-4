<form action="<?php echo base_url('admin/berita/edit/'.$berita['id_berita']) ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?php 
echo csrf_field(); 
?>

<div class="form-group row">
	<label class="col-md-2">Judul Berita</label>
	<div class="col-md-10">
		<input type="text" name="judul_berita" class="form-control" value="<?php echo $berita['judul_berita'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Upload Gambar Berita</label>
	<div class="col-md-10">
		<input type="file" name="gambar" class="form-control" value="<?php echo $berita['gambar'] ?>">
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Kategori, Jenis &amp; Status</label>
	<div class="col-md-2">
		<select name="id_kategori" class="form-control">
			<?php foreach($kategori as $kategori) { ?>
			<option value="<?php echo $kategori['id_kategori'] ?>" <?php if($berita['id_kategori']==$kategori['id_kategori']) { echo 'selected'; } ?>>
				<?php echo $kategori['nama_kategori'] ?>
			</option>
			<?php } ?>
		</select>
		<small class="text-secondary">Kategori</small>
	</div>
	<div class="col-md-2">
		<select name="jenis_berita" class="form-control">
			<option value="Berita">Berita</option>
			<option value="Layanan" <?php if($berita['jenis_berita']=="Layanan") { echo 'selected'; } ?>>Layanan</option>
			<option value="Profil" <?php if($berita['jenis_berita']=="Profil") { echo 'selected'; } ?>>Profil</option>
		</select>
		<small class="text-secondary">Jenis konten</small>
	</div>
	<div class="col-md-2">
		<select name="status_berita" class="form-control">
			<option value="Publish">Publish</option>
			<option value="Draft" <?php if($berita['status_berita']=="Draft") { echo 'selected'; } ?>>Draft</option>
		</select>
		<small class="text-secondary">Status publikasi</small>
	</div>
	<div class="col-md-2">
		<input type="text" name="icon" class="form-control" value="<?php echo $berita['icon'] ?>">
		<small class="text-secondary">Icon <a href="https://fontawesome.com/icons" target="_blank">Fontawsome</a></small>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Tanggal dan jam Publikasi</label>
	<div class="col-md-4">
		<input type="text" name="tanggal_publish" class="form-control tanggal" value="<?php if(isset($_POST['tanggal_publis'])) { echo set_value('tanggal_publish'); }else{ echo tanggal_id($berita['tanggal_publish']); } ?>">
		<small class="text-secondary">Format <strong>dd-mm-yyyy</strong>. Misal: <?php echo date('d-m-Y') ?></small>
	</div>
	<div class="col-md-2">
		<input type="text" name="jam" class="form-control jam" value="<?php if(isset($_POST['jam'])) { echo set_value('jam'); }else{ echo date('H:i:s',strtotime($berita['tanggal_publish'])); } ?>">
		<small class="text-secondary">Format <strong>HH:MM:SS</strong>. Misal: <?php echo date('H:i:s') ?></small>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Ringkasan</label>
	<div class="col-md-10">
		<textarea name="ringkasan" class="form-control"><?php echo $berita['ringkasan'] ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Isi Berita</label>
	<div class="col-md-10">
		<textarea name="isi" class="form-control konten"><?php echo $berita['isi'] ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2">Keyword Berita (untuk SEO Google)</label>
	<div class="col-md-10">
		<textarea name="keywords" class="form-control"><?php echo $berita['keywords'] ?></textarea>
	</div>
</div>

<div class="form-group row">
	<label class="col-md-2"></label>
	<div class="col-md-10">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?php echo form_close(); ?>