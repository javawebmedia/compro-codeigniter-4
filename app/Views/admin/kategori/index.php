<?php include('tambah.php'); ?>
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
		<?php $no=1; foreach($kategori as $kategori) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $kategori['nama_kategori'] ?></td>
			<td><?php echo $kategori['slug_kategori'] ?></td>
			<td><?php echo $kategori['urutan'] ?></td>
			<td>
				<a href="<?php echo base_url('admin/kategori/edit/'.$kategori['id_kategori']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?php echo base_url('admin/kategori/delete/'.$kategori['id_kategori']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>