<?php include APPPATH . 'views/layouts/header.php' ?>
<?php include APPPATH . 'views/layouts/navbar.php' ?>


<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li id="output"></li>
				<li class='active'><a href='<?=  base_url('admin/anak_magang') ?> '>Edit Anak Magang</a></li>
				<li><a href='<?=  base_url('admin/add_magang') ?> '>Tambah Anak Magang</a></li>
				<li><a href='<?=  base_url('admin/absensi') ?> '>Lihat Absensi</a></li>
				<li><a href='<?=  base_url('admin/keluar') ?> '>Keluar</a></li>
			</ul>
		</div>

		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h3 class='page-header'>Daftar Anak Magang</h3>
            <div class='table-resfponsive'>
                <?php if(validation_errors()) { ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
                <?php }?>
                <form class="form-horizontal" role="form" style="width:80%" onSubmit="return validasi()" name="formulir" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2">NIM:</label>
                        <div class="col-sm-10">
                            <input type="number" value="<?=$data_magang->nim?>" class="form-control" placeholder="Masukan NIM" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2">Nama Lengkap:</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?=$data_magang->nama?>" class="form-control" name="nama" placeholder="Masukan Nama Lengkap" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Jenis Kelamin:</label>
                        <div class="col-sm-10">
                            <label class="radio-inline"><input type="radio" name="jk" id="jk" value="Laki-Laki" <?php if($data_magang->jk=="Laki-Laki") echo "checked"?>>Laki-laki</label>
                            <label class="radio-inline"><input type="radio" name="jk" id="jk" value="Perempuan"<?php if($data_magang->jk=="Perempuan") echo "checked"?>>Perempuan</label> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Nama Instansi:</label>
                        <div class="col-sm-10">
                            <input type="text" value="<?=$data_magang->instansi?>" class="form-control" placeholder="Masukan Nama Instansi" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">No HP:</label>
                        <div class="col-sm-10">
                        <input type="text" value="<?=$data_magang->no_hp?>" class="form-control" name="no_hp" placeholder="Masukan No HP" required>
                            <strong></strong>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Tanggal Masuk:</label>
                        <div class="col-sm-10">
                            <input type="date" value="<?=$data_magang->tgl_masuk?>" class="form-control" placeholder="Masukan Tanggal Masuk" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Tanggal Keluar:</label>
                        <div class="col-sm-10">
                        <input type="date" value="<?=$data_magang->tgl_keluar?>" class="form-control" placeholder="Masukan Tanggal Keluar" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Simpan</button>
                            <button type="button" onclick="hapusSiswa(<?=$data_magang->id?>)" class="btn btn-danger" name="">Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        
<?php include APPPATH . 'views/layouts/footer.php' ?>