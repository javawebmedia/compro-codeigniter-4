<p>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
		<i class="fa fa-plus"></i> Tambah Baru
	</button>
</p>
<?= form_open(base_url('admin/video'));
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
					<label class="col-3">Nama Video</label>
					<div class="col-9">
						<input type="text" name="judul" class="form-control" placeholder="Nama video" value="<?= set_value('judul') ?>" required>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Link Video Youtube</label>
					<div class="col-9">
						<input type="text" name="video" class="form-control" placeholder="Link video" value="<?= set_value('video') ?>" required>
						<small class="text-secondary">Contoh: <span class="text-warning">https://www.youtube.com/watch?v=</span><strong class="text-danger">jVr6CYLhjQo</strong>. Ambil kode yang warna <strong class="text-danger">Merah</strong></small>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-3">Keterangan</label>
					<div class="col-9">
						<textarea name="keterangan" class="form-control"><?= set_value('keterangan') ?></textarea>
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