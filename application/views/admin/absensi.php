<?php include APPPATH . 'views/layouts/header.php' ?>
<?php include APPPATH . 'views/layouts/navbar.php' ?>

<style>
input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(3); /* IE */
  -moz-transform: scale(3); /* FF */
  -webkit-transform: scale(3); /* Safari and Chrome */
  -o-transform: scale(3); /* Opera */
  padding: 20px;
}
</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li id="output"></li>
				<!-- <li><a href='<?=  base_url('admin/add_magang') ?> '>Tambah Anak Magang</a></li> -->
				<!-- <li><a href='<?=  base_url('admin/add_group') ?> '>Tambah Group Magang</a></li> -->
				<li><a href='<?=  base_url('admin/anak_magang') ?> '>Daftar Anak Magang</a></li>
				<li><a href='<?=  base_url('admin/lihat_group') ?> '>Lihat Group Magang</a></li>
				<li class='active'><a href='<?=  base_url('admin/absensi') ?> '>Lihat Absensi</a></li>
				<li><a href='<?=  base_url('admin/keluar') ?> '>Keluar</a></li>
			</ul>
		</div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h3 class='page-header'>Absensi Anak Magang</h3>
			<div class="row" style="margin-bottom: 15px">
				<form method="GET">
					<div class="col-xs-5">
						<div class="input-group">
							<div class="input-group-addon">Filter Tanggal</div>
							<input name="tanggal" type="date" placeholder="Tanggal" class="form-control" value="<?= @$val_tanggal ?>">
						</div>
					</div>
					<div class="col-xs-5">
						<div class="input-group">
							<div class="input-group-addon">Filter Grup</div>
							<select name="group" class="form-control">
								<option value=""></option>
								<?php foreach ($group as $item) { ?>
									<option value="<?= $item->id ?>" <?php if ($item->id == @$val_group) echo 'selected' ?>><?= $item->kode_group ?></option>
								<?php }?>
							</select>
						</div>
					</div>
					<div class="col-xs-2">
						<button type="submit" class="btn btn-block btn-primary">Filter</button>
					</div>
				</form>
			</div>
			<div class='table-resfponsive'>
				
				<table class='table table-striped' style='width:100%'>
					<thead>
						<tr>
							<th>No</th>
							<th>NIM</th>
							<th>Nama</th>
							<th>Instansi</th>
							<th>Jam masuk</th>
							<th>Ket.Masuk</th>
							<th>Foto Masuk</th>
							<th>Jam Keluar</th>
							<th>Foto Keluar</th>
							<!-- <th>Action</th> -->
						</tr>
					</thead>
					<tbody>
                        <?php foreach ($data_magang as $no => $data) { ?>

                            <tr>
                                <td><?= $no+1 ?></td>
								<td><?= $data->nim ?></td>
                                <td><?= $data->nama ?></td>
                                <td><?= $data->instansi ?></td>
								<td><?= $data->abs_masuk ?></td>
								<td><?= $data->ket_masuk ?></td>
								<td><img src="<?= base_url("assets/foto/$data->foto_masuk") ?>" class="img-responsive" alt="<?= $data->foto_masuk ?>"></td>
								<td><?= $data->abs_keluar ?></td>
								<td>
								<?php if($data->foto_keluar!=null){?>
									<img src="<?= base_url("assets/foto/$data->foto_keluar") ?>" class="img-responsive" alt="<?= $data->foto_keluar ?>">
								<?php }?>
								</td>
								<!-- <td><input style="margin-left:auto; margin-right:auto;" type="checkbox" ></a></td> -->
                            </tr>
                        <?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include APPPATH . 'views/layouts/footer.php' ?>
<script src="<?= base_url('assets/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/js/buttons.flash.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/js/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/js/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/js/buttons.print.min.js') ?>"></script>

<script>
	$(document).ready(function(){
		$('.table').DataTable({
			dom: 'Brtip',
			buttons: [
				'excel', 'pdf', 'print'
			]
		});
	});
</script>