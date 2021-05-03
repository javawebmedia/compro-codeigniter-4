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
			<th width="40%">Judul</th>
			<th width="15%">Kategori - Jenis</th>
			<th width="15%">Author - Status</th>
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
			<td><a href="<?php echo base_url('admin/berita/edit/'.$berita['id_berita']) ?>">
					<?php echo $berita['judul_berita'] ?>
				</a>
				<small>
					<br><i class="fa fa-eye"></i> Hits: <?php echo $berita['hits'] ?>
					<br><i class="fa fa-home"></i> Icon: <i class="<?php echo $berita['icon'] ?>"></i> <?php echo $berita['icon'] ?>
					<br><i class="fa fa-calendar-check"></i> Publish: <?php echo tanggal_bulan_menit($berita['tanggal_publish']) ?>
					<br><i class="fa fa-calendar"></i> Updated: <?php echo tanggal_bulan_menit($berita['tanggal']) ?>
				</small>
			</td>
			<td><small>
				<i class="fa fa-tags"></i> <a href="<?php echo base_url('admin/berita/kategori/'.$berita['id_kategori']) ?>">
					<?php echo $berita['nama_kategori'] ?>
				</a>
				<br><i class="fa fa-home"></i> <a href="<?php echo base_url('admin/berita/jenis_berita/'.$berita['jenis_berita']) ?>">
					<?php echo $berita['jenis_berita'] ?>
				</a>
			</small>
			</td>
			
			<td><small>
					<i class="fa fa-user"></i> <a href="<?php echo base_url('admin/berita/author/'.$berita['id_user']) ?>">
						<?php echo $berita['nama'] ?>
					</a>
					<br>
					<i class="fa fa-check"></i> <a href="<?php echo base_url('admin/berita/status_berita/'.$berita['status_berita']) ?>">
					<?php echo $berita['status_berita'] ?>
				</a>
				</small>
			</td>
			<td>
				<a href="<?php echo base_url('berita/read/'.$berita['slug_berita']) ?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-eye"></i> Baca</a>
				<a href="<?php echo base_url('admin/berita/edit/'.$berita['id_berita']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?php echo base_url('admin/berita/delete/'.$berita['id_berita']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>