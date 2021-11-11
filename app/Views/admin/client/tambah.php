<p>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
		<i class="fa fa-plus"></i> Tambah Baru
	</button>
</p>
<form action="<?= base_url('admin/client') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?= csrf_field();
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
					<label class="col-3">Nama Client</label>
					<div class="col-9">
						<input type="text" name="nama" class="form-control" placeholder="Nama client" value="<?= set_value('nama') ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Nama Pimpinan/Panggilan</label>
					<div class="col-9">
						<input type="text" name="pimpinan" class="form-control" placeholder="Nama Pimpinan/Panggilan" value="<?= set_value('pimpinan') ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Tempat, tanggal lahir</label>
					<div class="col-3">
						<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir" value="<?= set_value('tempat_lahir') ?>">
					</div>
					<div class="col-3">
						<input type="text" name="tanggal_lahir" class="form-control" placeholder="dd-mm-yyyy" value="<?= set_value('tanggal_lahir') ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Jenis, Status Client</label>
					<div class="col-3">
						<select name="jenis_client" class="form-control">
							<option value="Perorangan">Perorangan</option>
							<option value="Perusahaan">Perusahaan</option>
							<option value="Organisasi">Organisasi</option>
						</select>
						<small class="text-secondary">Jenis Client</small>
					</div>
					<div class="col-3">
						<select name="status_client" class="form-control">
							<option value="Publish">Publish</option>
							<option value="Draft">Draft</option>
						</select>
						<small class="text-secondary">Status Client</small>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Email dan Telepon</label>
					<div class="col-5">
						<input type="text" name="email" class="form-control" placeholder="Email client" value="<?= set_value('email') ?>">
					</div>
					<div class="col-4">
						<input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?= set_value('telepon') ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Website dan logo</label>
					<div class="col-4">
						<input type="text" name="website" class="form-control" placeholder="Website" value="<?= set_value('website') ?>">
					</div>
					<div class="col-5">
						<input type="file" name="gambar" class="form-control" placeholder="gambar" value="<?= set_value('gambar') ?>">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Alamat</label>
					<div class="col-9">
						<textarea name="alamat" placeholder="Alamat" class="form-control"><?= set_value('alamat') ?></textarea>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Testimoni</label>
					<div class="col-9">
						<textarea name="isi_testimoni" placeholder="Testimoni" class="form-control"><?= set_value('isi_testimoni') ?></textarea>
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
<?= form_close(); ?>