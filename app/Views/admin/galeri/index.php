<p>
	<a href="<?= base_url('admin/galeri/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="8%">Gambar</th>
			<th width="45%">Judul</th>
			<th width="15%">Kategori &amp; Jenis</th>
			<th width="15%">Author</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;

foreach ($galeri as $galeri) { ?>
		<tr>
			<td><?= $no ?></td>
			<td>
				<?php if ($galeri['gambar'] === '') {
    echo '-';
} else { ?>
					<img src="<?= base_url('assets/upload/image/thumbs/' . $galeri['gambar']) ?>" class="img img-thumbnail">
				<?php } ?>
			</td>
			<td><?= $galeri['judul_galeri'] ?>
				<small>
					<br><i class="fa fa-link"></i> Link: <?= $galeri['website'] ?>
					<br><i class="fa fa-tasks"></i> Teks Banner: <?= $galeri['status_text'] ?>
					<br><i class="fa fa-image"></i> <?= base_url('assets/upload/image/' . $galeri['gambar']) ?>
				</small>
			</td>
			<td><small><i class="fa fa-tags"></i> <?= $galeri['nama_kategori_galeri'] ?>
				<br><i class="fa fa-home"></i> <?= $galeri['jenis_galeri'] ?></small></td>
			<td><?= $galeri['nama'] ?></td>
			<td>

				<a href="<?= base_url('admin/galeri/edit/' . $galeri['id_galeri']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?= base_url('admin/galeri/delete/' . $galeri['id_galeri']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>