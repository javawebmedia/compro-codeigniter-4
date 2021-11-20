<?php include 'tambah.php'; ?>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="25%">Judul</th>
			<th width="25%">Video</th>
			<th width="25%">Keterangan</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1;

foreach ($video as $video) { ?>
		<tr>
			<td><?= $no ?></td>
			<td><?= $video['judul'] ?></td>
			<td><?= $video['video'] ?>
				<br>
				<div class="embed-responsive embed-responsive-16by9">
				  <iframe  class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $video['video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</td>
			<td><?= $video['keterangan'] ?></td>
			<td>
				<a href="<?= base_url('admin/video/edit/' . $video['id_video']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?= base_url('admin/video/delete/' . $video['id_video']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>