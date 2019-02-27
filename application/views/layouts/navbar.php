<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?=  base_url() ?>">Absensi Magang</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right visible-xs visible-sm">
				<li><a href='<?=  base_url('admin/magang') ?> '>Daftar Anak Magang</a></li>
				<!-- <li><a href='<?=  base_url('admin/add_magang') ?> '>Tambah Anak Magang</a></li> -->
				<!-- <li><a href='<?=  base_url('admin/add_group') ?> '>Tambah Group Magang</a></li> -->
				<li><a href='<?=  base_url('admin/anak_magang') ?> '>Daftar Anak Magang</a></li>
				<li><a href='<?=  base_url('admin/lihat_group') ?> '>Lihat Group Magang</a></li>
				<li><a href='<?=  base_url('admin/absensi') ?> '>Lihat Absensi</a></li>
				<li><a href='<?=  base_url('admin/keluar') ?> '>Keluar</a></li>
			</ul>
		</div>
	</div>
</nav>