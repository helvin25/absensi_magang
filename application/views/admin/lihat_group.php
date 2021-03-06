<?php include APPPATH . 'views/layouts/header.php' ?>
<?php include APPPATH . 'views/layouts/navbar.php' ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li id="output"></li>
				<!-- <li><a href='<?=  base_url('admin/add_magang') ?> '>Tambah Anak Magang</a></li> -->
				<!-- <li><a href='<?=  base_url('admin/add_group') ?> '>Tambah Group Magang</a></li> -->
				<li><a href='<?=  base_url('admin/anak_magang') ?> '>Daftar Anak Magang</a></li>
				<li class='active'><a href='<?=  base_url('admin/lihat_group') ?> '>Lihat Group Magang</a></li>
				<li><a href='<?=  base_url('admin/absensi') ?> '>Lihat Absensi</a></li>
				<li><a href='<?=  base_url('admin/keluar') ?> '>Keluar</a></li>
			</ul>
		</div>
		
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h3 class='page-header' style="padding-bottom: 15px;">Absensi Anak Magang
				<div class="pull-right">
				<button type="submit" class="btn btn-default"><a href='<?=  base_url('admin/add_group')?>'>+ Tambah Group Magang</a></button>
				</div>
			</h3>
			
			<div class='table-resfponsive'>
				
				<table id='table' class='table table-striped' style='width:100%'>
					<thead>
						<tr>
                            <th>No</th>
							<th>ID Group</th>
							<th>Instansi</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Keluar</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
                        <?php foreach ($data_magang as $no => $data) { ?>

                            <tr>
                                <td><?= $no+1 ?></td>
                                <td><?= $data->kode_group ?></td>
                                <td><?= $data->instansi ?></td>
                                <td><?= date('d-m-Y', strtotime($data->tgl_masuk)) ?></td>
                                <td><?= date('d-m-Y', strtotime($data->tgl_keluar)) ?></td>

								<td><a href='<?=  base_url('admin/anak_magang/' . $data->id ) ?>' >Lihat Anggota</a> &bullet;
								<a href='<?=  base_url('admin/edit_group/' . $data->id ) ?>' >Edit</a> &bullet;
								<a style='cursor:pointer' onclick='hapusGroup(<?=$data->id?>)' >Hapus</a>
								</td>
                            </tr>
                        <?php } ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>
<?php include APPPATH . 'views/layouts/footer.php' ?>
<script>
	$(document).ready(function(){
		$('#table').DataTable({
			autoWidth: false,
			columnDefs: [
				{targets:[5], width:'20%'}
			]
		});
	});

	function hapusGroup(id) {
    swal({
			title: 'Anda Yakin?',
			text: 'Semua data akan dihapus!',type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Hapus',
			cancelButtonText: 'Batal',
			closeOnConfirm: true
		}, function() {
			window.location.href= base_url + '/admin/hapus_group/' + id;
		});
	}
</script>