<?php include 'tambah.php'; ?>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="5%">Logo</th>
			<th width="20%">Nama</th>
			<th width="20%">Pimpinan</th>
			<th width="30%">Kontak</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;

foreach ($client as $client) { ?>
		<tr>
			<td><?= $no ?></td>
			<td><?php if ($client['gambar'] === '') {
    echo '-';
} else { ?>
				<img src="<?= base_url('assets/upload/client/thumbs/' . $client['gambar']) ?>" class="img img-thumbnail">
			<?php } ?>
			</td>
			<td><?= $client['nama'] ?></td>
			<td><?= $client['pimpinan'] ?></td>
			<td><i class="fa fa-phone"></i> <?= $client['telepon'] ?>
				<br><i class="fa fa-envelope"></i> <?= $client['email'] ?>
				<br><i class="fa fa-globe"></i> <?= $client['website'] ?>
				<br><i class="fa fa-map"></i> <?= $client['alamat'] ?>
			</td>
			<td>
				<a href="<?= base_url('admin/client/edit/' . $client['id_client']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?= base_url('admin/client/delete/' . $client['id_client']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>