<?php include APPPATH . 'views/layouts/header.php' ?>
<?php include APPPATH . 'views/layouts/navbar.php' ?>

<div class="container-fluid">
	<div class="row">
    <div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li id="output"></li>
                <!-- <li class='active'><a href='<?=  base_url('admin/add_magang') ?> '>Tambah Anak Magang</a></li> -->
                <!-- <li><a href='<?=  base_url('admin/add_group') ?> '>Tambah Group Magang</a></li> -->
				<li><a href='<?=  base_url('admin/anak_magang') ?> '>Daftar Anak Magang</a></li>
                <li><a href='<?=  base_url('admin/lihat_group') ?> '>Lihat Group Magang</a></li>
				<li><a href='<?=  base_url('admin/absensi') ?> '>Lihat Absensi</a></li>
				<li><a href='<?=  base_url('admin/keluar') ?> '>Keluar</a></li>
			</ul>
		</div>

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h3 class="page-header">Tambah Anggota Gruop</h3>
			<form class="form-horizontal" role="form" style="width:80%" action="<?= base_url('admin/add_magang/' . $id_group) ?>" name="formulir" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2">Nama Lengkap:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Lengkap" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">Jenis Kelamin:</label>
            <div class="col-sm-10">
                <label class="radio-inline"><input type="radio" name="jk" id="jk" value="Laki-Laki">Laki-laki</label>
                <label class="radio-inline"><input type="radio" name="jk" id="jk" value="Perempuan">Perempuan</label> 
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">No HP:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="no_hp" placeholder="Masukan No HP" required>
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
