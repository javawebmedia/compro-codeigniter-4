<p>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
		<i class="fa fa-plus"></i> Tambah Baru
	</button>
</p>
<form action="<?php echo base_url('admin/staff') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?php 
echo csrf_field(); 
?>

<div class="modal fade" id="modal-default">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Baru</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="form-group row">
					<label class="col-3">Nama Staff</label>
					<div class="col-9">
						<input type="text" name="nama" class="form-control" placeholder="Nama staff" value="<?php echo set_value('nama') ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Jabatan &amp; No Urut Tampil</label>
					<div class="col-6">
						<input type="text" name="jabatan" class="form-control" placeholder="Jabatan" value="<?php echo set_value('jabatan') ?>">
					</div>
					<div class="col-3">
						<input type="number" name="urutan" class="form-control" placeholder="No Urut tampil" value="<?php echo set_value('urutan') ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Tempat, tanggal lahir</label>
					<div class="col-3">
						<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir" value="<?php echo set_value('tempat_lahir') ?>">
					</div>
					<div class="col-3">
						<input type="text" name="tanggal_lahir" class="form-control" placeholder="dd-mm-yyyy" value="<?php echo set_value('tanggal_lahir') ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Jenis, Status Staff</label>
					<div class="col-3">
						<select name="id_kategori_staff" class="form-control">
							<?php foreach($kategori_staff as $kategori_staff) { ?>
							<option value="<?php echo $kategori_staff['id_kategori_staff'] ?>"><?php echo $kategori_staff['nama_kategori_staff'] ?></option>
							<?php } ?>
						</select>
						<small class="text-secondary">Jenis Staff</small>
					</div>
					<div class="col-3">
						<select name="status_staff" class="form-control">
							<option value="Publish">Publish</option>
							<option value="Draft">Draft</option>
						</select>
						<small class="text-secondary">Status Staff</small>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Email dan Telepon</label>
					<div class="col-5">
						<input type="text" name="email" class="form-control" placeholder="Email staff" value="<?php echo set_value('email') ?>">
					</div>
					<div class="col-4">
						<input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Upload Foto dan Website</label>
					<div class="col-5">
						<input type="file" name="gambar" class="form-control" placeholder="gambar" value="<?php echo set_value('gambar') ?>">
					</div>
					<div class="col-4">
						<input type="text" name="website" class="form-control" placeholder="Website" value="<?php echo set_value('website') ?>">
					</div>
					
				</div>

				<div class="form-group row">
					<label class="col-3">Alamat</label>
					<div class="col-9">
						<textarea name="alamat" placeholder="Alamat" class="form-control"><?php echo set_value('alamat') ?></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Keahlian</label>
					<div class="col-9">
						<textarea name="keahlian" placeholder="Keahlian" class="form-control"><?php echo set_value('keahlian') ?></textarea>
					</div>
				</div>

			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
				<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php echo form_close(); ?>