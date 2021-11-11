<?php include 'tambah.php'; ?>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="20%">Nama</th>
			<th width="20%">Username</th>
			<th width="20%">Email</th>
			<th width="20%">Level</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;

foreach ($user as $user) { ?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $user['nama'] ?></td>
			<td><?= $user['username'] ?></td>
			<td><?= $user['email'] ?></td>
			<td><?= $user['akses_level'] ?></td>
			<td>
				<a href="<?= base_url('admin/user/edit/' . $user['id_user']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?= base_url('admin/user/delete/' . $user['id_user']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>