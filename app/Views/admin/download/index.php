<p>
	<a href="<?php echo base_url('admin/download/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="10%">File</th>
			<th width="30%">Judul</th>
			<th width="15%">Kategori</th>
			<th width="15%">Jenis</th>
			<th width="15%">Author</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($download as $download) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td>
				<?php if($download['gambar']=="") { echo '-'; }else{ ?>
					<a href="<?php echo base_url('admin/download/unduh/'.$download['id_download']) ?>" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Unduh</a>
				<?php } ?>
			</td>
			<td><?php echo $download['judul_download'] ?>
				<small>
					<br><i class="fa fa-link"></i> <?php echo $download['website'] ?>
				</small>
			</td>
			<td><?php echo $download['nama_kategori_download'] ?></td>
			<td><?php echo $download['jenis_download'] ?></td>
			<td><?php echo $download['nama'] ?></td>
			<td>
				
				<a href="<?php echo base_url('admin/download/edit/'.$download['id_download']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?php echo base_url('admin/download/delete/'.$download['id_download']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>