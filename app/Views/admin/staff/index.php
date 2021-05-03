<?php include('tambah.php'); ?>
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
		<?php $no=1; foreach($staff as $staff) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php if($staff['gambar']=="") { echo '-'; }else{ ?>
				<img src="<?php echo base_url('assets/upload/staff/thumbs/'.$staff['gambar']) ?>" class="img img-thumbnail">
			<?php } ?>
			</td>
			<td><?php echo $staff['nama'] ?>
				<small>
					<br><i class="fa fa-sitemap"></i> Jenis: <?php echo $staff['nama_kategori_staff'] ?>
					<br><i class="fa fa-home"></i> Urut: <?php echo $staff['urutan'] ?>
				</small>
			</td>
			<td><?php echo $staff['jabatan'] ?></td>
			<td><small><i class="fa fa-phone"></i> <?php echo $staff['telepon'] ?>
				<br><i class="fa fa-envelope"></i> <?php echo $staff['email'] ?>
				<br><i class="fa fa-globe"></i> <?php echo $staff['website'] ?>
				<br><i class="fa fa-map"></i> <?php echo $staff['alamat'] ?>
				</small>
			</td>
			<td>
				<a href="<?php echo base_url('admin/staff/edit/'.$staff['id_staff']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?php echo base_url('admin/staff/delete/'.$staff['id_staff']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>