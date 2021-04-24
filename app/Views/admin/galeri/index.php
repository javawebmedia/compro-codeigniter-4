<p>
	<a href="<?php echo base_url('admin/galeri/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="8%">Gambar</th>
			<th width="30%">Judul</th>
			<th width="15%">Kategori</th>
			<th width="15%">Jenis</th>
			<th width="15%">Author</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($galeri as $galeri) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td>
				<?php if($galeri['gambar']=="") { echo '-'; }else{ ?>
					<img src="<?php echo base_url('assets/upload/image/thumbs/'.$galeri['gambar']) ?>" class="img img-thumbnail">
				<?php } ?>
			</td>
			<td><?php echo $galeri['judul_galeri'] ?>
				<small>
					<br><i class="fa fa-link"></i> <?php echo $galeri['website'] ?>
				</small>
			</td>
			<td><?php echo $galeri['nama_kategori_galeri'] ?></td>
			<td><?php echo $galeri['jenis_galeri'] ?></td>
			<td><?php echo $galeri['nama'] ?></td>
			<td>
				
				<a href="<?php echo base_url('admin/galeri/edit/'.$galeri['id_galeri']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?php echo base_url('admin/galeri/delete/'.$galeri['id_galeri']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>