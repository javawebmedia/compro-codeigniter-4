<p>
	<a href="<?php echo base_url('admin/prestasi/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="5%">Gambar</th>
			<th width="20%">Nama</th>
			<th width="15%">Pelaksana</th>
			<th width="5%">Tahun</th>
			<th width="10%">Tingkat</th>
			<th width="10%">Bidang</th>
			<th width="10%">Hadiah/Penghargaan</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($prestasi as $prestasi) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php if($prestasi['gambar']=="") { echo '-'; }else{ ?>
				<img src="<?php echo base_url('assets/upload/prestasi/thumbs/'.$prestasi['gambar']) ?>" class="img img-thumbnail">
			<?php } ?>
			</td>
			<td><?php echo $prestasi['nama_prestasi'] ?>
				<br>
				<small><i class="fa fa-users"></i> Oleh: <?php echo $prestasi['prestasi_oleh'] ?>
				<br><i class="fa fa-eye"></i> Status: <?php echo $prestasi['status_prestasi'] ?>
				</small>
			</td>
			<td><?php echo $prestasi['penyelenggara'] ?></td>
			<td><?php echo $prestasi['tahun'] ?></td>
			<td><?php echo $prestasi['tingkat'] ?></td>
			<td><?php echo $prestasi['bidang_prestasi'] ?></td>
			<td><?php echo $prestasi['hadiah_penghargaan'] ?></td>
			<td>
				<a href="<?php echo base_url('admin/prestasi/edit/'.$prestasi['id_prestasi']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?php echo base_url('admin/prestasi/delete/'.$prestasi['id_prestasi']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>