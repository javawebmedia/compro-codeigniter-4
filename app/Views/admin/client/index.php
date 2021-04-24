<?php include('tambah.php'); ?>
<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="5%">Logo</th>
			<th width="20%">Nama</th>
			<th width="20%">Pimpinan</th>
			<th width="30%">Kontak</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach($client as $client) { ?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php if($client['gambar']=="") { echo '-'; }else{ ?>
				<img src="<?php echo base_url('assets/upload/client/thumbs/'.$client['gambar']) ?>" class="img img-thumbnail">
			<?php } ?>
			</td>
			<td><?php echo $client['nama'] ?></td>
			<td><?php echo $client['pimpinan'] ?></td>
			<td><i class="fa fa-phone"></i> <?php echo $client['telepon'] ?>
				<br><i class="fa fa-envelope"></i> <?php echo $client['email'] ?>
				<br><i class="fa fa-globe"></i> <?php echo $client['website'] ?>
				<br><i class="fa fa-map"></i> <?php echo $client['alamat'] ?>
			</td>
			<td>
				<a href="<?php echo base_url('admin/client/edit/'.$client['id_client']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
				<a href="<?php echo base_url('admin/client/delete/'.$client['id_client']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>