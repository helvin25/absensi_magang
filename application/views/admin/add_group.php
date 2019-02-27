<?php include APPPATH . 'views/layouts/header.php' ?>
<?php include APPPATH . 'views/layouts/navbar.php' ?>

<div class="container-fluid">
	<div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li id="output"></li>
                <!-- <li><a href='<?=  base_url('admin/add_magang') ?> '>Tambah Anak Magang</a></li> -->
                <!-- <li class='active'><a href='<?=  base_url('admin/add_group') ?> '>Tambah Group Magang</a></li> -->
				<li><a href='<?=  base_url('admin/anak_magang') ?> '>Daftar Anak Magang</a></li>
                <li><a href='<?=  base_url('admin/lihat_group') ?> '>Lihat Group Magang</a></li>
				<li><a href='<?=  base_url('admin/absensi') ?> '>Lihat Absensi</a></li>
				<li><a href='<?=  base_url('admin/keluar') ?> '>Keluar</a></li>
			</ul>
		</div>

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h3 class="page-header">Tambah Group Magang Baru</h3>
            <?php if(validation_errors()) { ?>
                <div class="alert alert-danger">
                    <?= validation_errors() ?>
                </div>
            <?php }?>
			<form class="form-horizontal" role="form" style="width:80%"  action="<?= base_url('admin/add_group')?>" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2">Kode Group:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="kode_group" placeholder="Masukan Kode Group" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Nama Instansi:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="instansi" placeholder="Masukan Nama Instansi" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Tanggal Masuk:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="tgl_masuk" placeholder="Masukan Tanggal Masuk" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Tanggal Keluar:</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" name="tgl_keluar" placeholder="Masukan Tanggal Keluar" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Simpan</button>
              <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </div>
    </form>
		</div>
	</div>
</div>

<?php include APPPATH . 'views/layouts/footer.php' ?>
