<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="10%">File</th>
			<th width="30%">Judul</th>
			<th width="15%">Kategori</th>
			<th width="15%">Jenis</th>
			<th width="15%">Author</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;

foreach ($download as $download) { ?>
		<tr>
			<td><?= $no ?></td>
			<td>
				<?php if ($download['gambar'] === '') {
    echo '-';
} else { ?>
					<a href="<?= base_url('admin/download/unduh/' . $download['id_download']) ?>" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Unduh</a>
				<?php } ?>
			</td>
			<td><?= $download['judul_download'] ?>
				<small>
					<br><i class="fa fa-link"></i> <?= $download['website'] ?>
				</small>
			</td>
			<td><?= $download['nama_kategori_download'] ?></td>
			<td><?= $download['jenis_download'] ?></td>
			<td><?= $download['nama'] ?></td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>