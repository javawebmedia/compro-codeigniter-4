<?= form_open(base_url('admin/user/edit/' . $user['id_user']));
echo csrf_field();
?>

<div class="form-group row">
	<label class="col-3">Nama Pengguna</label>
	<div class="col-9">
		<input type="text" name="nama" class="form-control" placeholder="Nama user" value="<?= $user['nama'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Email</label>
	<div class="col-9">
		<input type="email" name="email" class="form-control" placeholder="Email" value="<?= $user['email'] ?>" required>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Username</label>
	<div class="col-9">
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?= $user['username'] ?>" readonly>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Password</label>
	<div class="col-9">
		<input type="text" name="password" class="form-control" placeholder="Password" value="">
		<small class="text-danger">Minimal 6 karakter dan maksimal 32 karakter atau biarkan kosong</small>
	</div>
</div>

<div class="form-group row">
	<label class="col-3">Level</label>
	<div class="col-9">
		<select name="akses_level" class="form-control">
			<option value="Admin">Admin</option>
			<option value="User" <?php if ($user['akses_level'] === 'User') {
    echo 'selected';
} ?>>User</option>
		</select>
	</div>
</div>

<div class="form-group row">
	<label class="col-3"></label>
	<div class="col-9">
		<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
	</div>
</div>

<?= form_close(); ?>