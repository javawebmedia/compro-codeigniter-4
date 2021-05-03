
<form action="<?php echo base_url('admin/prestasi/tambah') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<?php 
	echo csrf_field(); 
	?>

	<div class="form-group row">
		<label class="col-3">Upload Foto</label>
		<div class="col-9">
			<input type="file" name="gambar" class="form-control" placeholder="gambar" value="<?php echo set_value('gambar') ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-3">Nama Prestasi</label>
		<div class="col-9">
			<input type="text" name="nama_prestasi" class="form-control" placeholder="Nama prestasi" value="<?php echo set_value('nama_prestasi') ?>" required>
			<small class="text-secondary">Misal: Juara 3 Olimpiade Matematika</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-3">Prestasi didapatkan oleh?</label>
		<div class="col-9">
			<select name="prestasi_oleh" class="form-control">
				<option value="Siswa">Siswa</option>
				<option value="Guru">Guru</option>
				<option value="Tenaga Kependidikan">Tenaga Kependidikan</option>
				<option value="Sekolah">Sekolah</option>
				<option value="Lainnya">Lainnya</option>
			</select>
			<small class="text-secondary">Pilih salah satu</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-3">Penyelenggara/Pelaksana</label>
		<div class="col-9">
			<input type="text" name="penyelenggara" class="form-control" placeholder="Penyelenggara/Pelaksana" value="<?php echo set_value('penyelenggara') ?>">
			<small class="text-secondary">Misal: Dinas Pendidikan Kabupaten/Kota</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-3">Nama kegiatan</label>
		<div class="col-9">
			<input type="text" name="nama_kegiatan" class="form-control" placeholder="Nama kegiatan" value="<?php echo set_value('nama_kegiatan') ?>">
			<small class="text-secondary">Misal: Olimpiade Matematika Nasional</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-3">Hadiah/Penghargaan</label>
		<div class="col-9">
			<input type="text" name="hadiah_penghargaan" class="form-control" placeholder="Hadiah/Penghargaan" value="<?php echo set_value('hadiah_penghargaan') ?>">
			<small class="text-secondary">Misal: Piagam dan Uang Tunai Rp 2.000.000</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-3">Tahun, Tingkat, Bidang dan Status Prestasi</label>
		<div class="col-2">
			<input type="text" name="tahun" class="form-control" placeholder="Tahun" value="<?php echo set_value('tahun') ?>">
			<small class="text-secondary">Misal: <?php echo date('Y') ?></small>
		</div>
		<div class="col-3">
			<select name="tingkat" class="form-control">
				<option value="Antar Sekolah">Antar Sekolah</option>
				<option value="Kecamatan">Kecamatan</option>
				<option value="Kabupaten">Kabupaten</option>
				<option value="Provinsi">Provinsi</option>
				<option value="Nasional">Nasional</option>
				<option value="Internasional">Internasional</option>
				<option value="Lainnya">Lainnya</option>
			</select>
			<small class="text-secondary">Pilih salah satu</small>
		</div>
		<div class="col-2">
			<select name="bidang_prestasi" class="form-control">
			    <option value="Kesenian">Kesenian</option>
				<option value="Kebudayaan">Kebudayaan</option>
				<option value="Olahraga">Olahraga</option>
				<option value="Keagamaan">Keagamaan</option>
				<option value="Keilmuan">Keilmuan</option>
				<option value="Lainnya">Lainnya</option>
			</select>
			<small class="text-secondary">Bidang/Jenis Prestasi</small>
		</div>
		<div class="col-2">
			<select name="status_prestasi" class="form-control">
				<option value="Publish">Publish</option>
				<option value="Draft">Draft</option>
			</select>
			<small class="text-secondary">Status Prestasi</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-3">Keterangan</label>
		<div class="col-9">
			<textarea name="keterangan" placeholder="Keterangan" class="form-control konten"><?php echo set_value('keterangan') ?></textarea>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-3"></label>
		<div class="col-9">
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		</div>
	</div>
</form>