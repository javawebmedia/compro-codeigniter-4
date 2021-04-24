<form action="<?php echo base_url('admin/konfigurasi/icon') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?php 
echo csrf_field(); 
?>

<input type="hidden" name="id_konfigurasi" value="<?php echo $konfigurasi['id_konfigurasi'] ?>">
<div class="form-group row">
	<label class="col-3">Upload Icon Baru</label>
	<div class="col-6">
		<input type="file" name="icon" value="<?php echo $konfigurasi['icon'] ?>" class="form-control">
		<small class="text-secondary">Format: JPG, PNG, GIF</small>
	</div>
	<div class="col-3">
		<img src="<?php echo icon() ?>" class="img img-thumbnail">
	</div>
</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?php echo form_close(); ?>