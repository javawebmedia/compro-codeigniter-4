
<form action="<?= base_url('admin/prestasi/edit/' . $prestasi['id_prestasi']) ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<?= csrf_field();
    ?>

	<div class="form-group row">
		<label class="col-3">Upload Foto</label>
		<div class="col-9">
			<input type="file" name="gambar" class="form-control" placeholder="gambar" value="<?= $prestasi['gambar'] ?>">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-3">Nama Prestasi</label>
		<div class="col-9">
			<input type="text" name="nama_prestasi" class="form-control" placeholder="Nama prestasi" value="<?= $prestasi['nama_prestasi'] ?>" required>
			<small class="text-secondary">Misal: Juara 3 Olimpiade Matematika</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-3">Prestasi didapatkan oleh?</label>
		<div class="col-9">
			<select name="prestasi_oleh" class="form-control">
				<option value="Siswa">Siswa</option>
				<option value="Guru" <?php if ($prestasi['prestasi_oleh'] === 'Guru') {
        echo 'selected';
    } ?>>Guru</option>
				<option value="Tenaga Kependidikan" <?php if ($prestasi['prestasi_oleh'] === 'Tenaga Kependidikan') {
        echo 'selected';
    } ?>>Tenaga Kependidikan</option>
				<option value="Sekolah" <?php if ($prestasi['prestasi_oleh'] === 'Sekolah') {
        echo 'selected';
    } ?>>Sekolah</option>
				<option value="Lainnya" <?php if ($prestasi['prestasi_oleh'] === 'Lainnya') {
        echo 'selected';
    } ?>>Lainnya</option>
			</select>
			<small class="text-secondary">Pilih salah satu</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-3">Penyelenggara/Pelaksana</label>
		<div class="col-9">
			<input type="text" name="penyelenggara" class="form-control" placeholder="Penyelenggara/Pelaksana" value="<?= $prestasi['penyelenggara'] ?>">
			<small class="text-secondary">Misal: Dinas Pendidikan Kabupaten/Kota</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-3">Nama kegiatan</label>
		<div class="col-9">
			<input type="text" name="nama_kegiatan" class="form-control" placeholder="Nama kegiatan" value="<?= $prestasi['nama_kegiatan'] ?>">
			<small class="text-secondary">Misal: Olimpiade Matematika Nasional</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-3">Hadiah/Penghargaan</label>
		<div class="col-9">
			<input type="text" name="hadiah_penghargaan" class="form-control" placeholder="Hadiah/Penghargaan" value="<?= $prestasi['hadiah_penghargaan'] ?>">
			<small class="text-secondary">Misal: Piagam dan Uang Tunai Rp 2.000.000</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-3">Tahun, Tingkat, Bidang dan Status Prestasi</label>
		<div class="col-2">
			<input type="text" name="tahun" class="form-control" placeholder="Tahun" value="<?= $prestasi['tahun'] ?>">
			<small class="text-secondary">Misal: <?= date('Y') ?></small>
		</div>
		<div class="col-3">
			<select name="tingkat" class="form-control">
				<option value="Antar Sekolah">Antar Sekolah</option>
				<option value="Kecamatan" <?php if ($prestasi['tingkat'] === 'Kecamatan') {
        echo 'selected';
    } ?>>Kecamatan</option>
				<option value="Kabupaten" <?php if ($prestasi['tingkat'] === 'Kabupaten') {
        echo 'selected';
    } ?>>Kabupaten</option>
				<option value="Provinsi" <?php if ($prestasi['tingkat'] === 'Provinsi') {
        echo 'selected';
    } ?>>Provinsi</option>
				<option value="Nasional" <?php if ($prestasi['tingkat'] === 'Nasional') {
        echo 'selected';
    } ?>>Nasional</option>
				<option value="Internasional" <?php if ($prestasi['tingkat'] === 'Internasional') {
        echo 'selected';
    } ?>>Internasional</option>
				<option value="Lainnya" <?php if ($prestasi['tingkat'] === 'Lainnya') {
        echo 'selected';
    } ?>>Lainnya</option>
			</select>
			<small class="text-secondary">Pilih salah satu</small>
		</div>
		<div class="col-2">
			<select name="bidang_prestasi" class="form-control">
				<option value="Olahraga" <?php if ($prestasi['bidang_prestasi'] === 'Olahraga') {
        echo 'selected';
    } ?>>Olahraga</option>
				<option value="Kesenian" <?php if ($prestasi['bidang_prestasi'] === 'Kesenian') {
        echo 'selected';
    } ?>>Kesenian</option>
				<option value="Kebudayaan" <?php if ($prestasi['bidang_prestasi'] === 'Kebudayaan') {
        echo 'selected';
    } ?>>Kebudayaan</option>
				<option value="Keagamaan" <?php if ($prestasi['bidang_prestasi'] === 'Keagamaan') {
        echo 'selected';
    } ?>>Keagamaan</option>
				<option value="Keilmuan" <?php if ($prestasi['bidang_prestasi'] === 'Keilmuan') {
        echo 'selected';
    } ?>>Keilmuan</option>
				<option value="Lainnya" <?php if ($prestasi['bidang_prestasi'] === 'Lainnya') {
        echo 'selected';
    } ?>>Lainnya</option>
			</select>
			<small class="text-secondary">Bidang/Jenis Prestasi</small>
		</div>
		<div class="col-2">
			<select name="status_prestasi" class="form-control">
				<option value="Publish">Publish</option>
				<option value="Draft" <?php if ($prestasi['status_prestasi'] === 'Draft') {
        echo 'selected';
    } ?>>Draft</option>
			</select>
			<small class="text-secondary">Status Prestasi</small>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-3">Keterangan</label>
		<div class="col-9">
			<textarea name="keterangan" placeholder="Keterangan" class="form-control konten"><?= $prestasi['keterangan'] ?></textarea>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-3"></label>
		<div class="col-9">
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		</div>
	</div>
</form>