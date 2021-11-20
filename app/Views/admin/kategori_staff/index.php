<?php include 'tambah.php'; ?>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="25%">Nama</th>
			<th width="25%">Slug</th>
			<th width="25%">Urutan</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;

foreach ($kategori_staff as $kategori_staff) { ?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $kategori_staff['nama_kategori_staff'] ?></td>
			<td><?= $kategori_staff['slug_kategori_staff'] ?></td>
			<td><?= $kategori_staff['urutan'] ?></td>
			<td>
				<a href="<?= base_url('admin/kategori_staff/edit/' . $kategori_staff['id_kategori_staff']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?= base_url('admin/kategori_staff/delete/' . $kategori_staff['id_kategori_staff']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>