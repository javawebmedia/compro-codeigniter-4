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

foreach ($kategori_download as $kategori_download) { ?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $kategori_download['nama_kategori_download'] ?></td>
			<td><?= $kategori_download['slug_kategori_download'] ?></td>
			<td><?= $kategori_download['urutan'] ?></td>
			<td>
				<a href="<?= base_url('admin/kategori_download/edit/' . $kategori_download['id_kategori_download']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?= base_url('admin/kategori_download/delete/' . $kategori_download['id_kategori_download']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>