<?php include('tambah.php'); ?>
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
		<?php $no=1; foreach($user as $user) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $user['nama'] ?></td>
			<td><?php echo $user['username'] ?></td>
			<td><?php echo $user['email'] ?></td>
			<td><?php echo $user['akses_level'] ?></td>
			<td>
				<a href="<?php echo base_url('admin/user/edit/'.$user['id_user']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?php echo base_url('admin/user/delete/'.$user['id_user']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>