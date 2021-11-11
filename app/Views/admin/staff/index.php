<?php include 'tambah.php'; ?>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="5%">Logo</th>
			<th width="20%">Nama</th>
			<th width="20%">Jabatan</th>
			<th width="30%">Kontak</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;

foreach ($staff as $staff) { ?>
		<tr>
			<td><?= $no ?></td>
			<td><?php if ($staff['gambar'] === '') {
    echo '-';
} else { ?>
				<img src="<?= base_url('assets/upload/staff/thumbs/' . $staff['gambar']) ?>" class="img img-thumbnail">
			<?php } ?>
			</td>
			<td><?= $staff['nama'] ?>
				<small>
					<br><i class="fa fa-sitemap"></i> Jenis: <?= $staff['nama_kategori_staff'] ?>
					<br><i class="fa fa-home"></i> Urut: <?= $staff['urutan'] ?>
				</small>
			</td>
			<td><?= $staff['jabatan'] ?></td>
			<td><small><i class="fa fa-phone"></i> <?= $staff['telepon'] ?>
				<br><i class="fa fa-envelope"></i> <?= $staff['email'] ?>
				<br><i class="fa fa-globe"></i> <?= $staff['website'] ?>
				<br><i class="fa fa-map"></i> <?= $staff['alamat'] ?>
				</small>
			</td>
			<td>
				<a href="<?= base_url('admin/staff/edit/' . $staff['id_staff']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?= base_url('admin/staff/delete/' . $staff['id_staff']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>