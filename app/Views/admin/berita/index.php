<p>
	<a href="<?php echo base_url('admin/berita/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="8%">Gambar</th>
			<th width="20%">Judul</th>
			<th width="15%">Kategori</th>
			<th width="15%">Jenis</th>
			<th width="10%">Author</th>
			<th width="12%">Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($berita as $berita) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td>
				<?php if($berita['gambar']=="") { echo '-'; }else{ ?>
					<img src="<?php echo base_url('assets/upload/image/thumbs/'.$berita['gambar']) ?>" class="img img-thumbnail">
				<?php } ?>
			</td>
			<td><?php echo $berita['judul_berita'] ?></td>
			<td><?php echo $berita['nama_kategori'] ?></td>
			<td><?php echo $berita['jenis_berita'] ?></td>
			<td><?php echo $berita['nama'] ?></td>
			<td><?php echo $berita['status_berita'] ?></td>
			<td>
				<a href="<?php echo base_url('berita/read/'.$berita['slug_berita']) ?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-eye"></i> Baca</a>
				<a href="<?php echo base_url('admin/berita/edit/'.$berita['id_berita']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?php echo base_url('admin/berita/delete/'.$berita['id_berita']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>