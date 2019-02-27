<!DOCTYPE HTML>

<html>

<head>
	<title>Absensi</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/bootstrap.min.css') ?>" />
	<link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>" />
	<link href="<?= base_url('assets/plugins/swal/sweetalert2.css') ?>" rel="stylesheet">
	<style>
		.modal{
			top: 50px!important;
		}
		.modal form {
			text-align: center;
			padding: 5px;
			border: 2px dotted #424549;
			margin-bottom: 5px;
		}
		.modal .close {
			box-shadow: unset!important;
			height: unset!important;
		}

		#result {
			border: 2px dotted #424549;
		}
		#jam {
			margin-top: -30px;
			margin-bottom: 40px;
			font-size: 40px;
			font-weight: bold;
		}

	</style>
</head>

<body class="is-preload">

	<!-- Header -->
	<header id="header">

		<a class="logo" href="index.html">Absensi Magang</a>
	</header>

	<!-- Banner -->
	<section id="banner">
		<div class="inner">
			<h1><img src="<?=base_url("/assets/images/jawa.png")?>" alt="image" width="150" height="150"></h1>
			<h2>BPTIK DIKBUD</h2>
			<font size="4">Balai Pengembangan Teknologi Informasi dan Komunikasi
			<br>Dinas Pendidikan dan Kebudayaan Provinsi Jawa Tengah</font> 
		</div>
		<video autoplay loop muted playsinline src="<?=base_url("assets/images/banner.mp4")?>"> </video> <div class="inner">
		<div id="jam">Loading jam...</div>
		<div id="tampilpesan"> </div>
		<table width="15Loading0" height="50" class="text-center">
			<td>Masukkan Nomor Induk</td>
			<td>:</td>
			<td><input type="text" id="nim" size="20" maxlength="25"></td>
			<td colspan="3" class="text-center">
				<button type="button" class="btn btn-lg btn-primary" id="btnAbsen" data-backdrop="false">
					Selanjutnya
				</button>
			</td>
		</table>
			<!-- Footer -->
			<footer class="page-footer font-small blue">

				<!-- Copyright -->
				<div class="footer-copyright text-center py-3">© 2019 Copyright:
					<span data-toggle="modal" data-target="#modalPengembang">Udinus Pengembang</span>
				</div>
			</footer>

	</section>

	<!-- Modal webcam-->
	<div id="modalAbsen" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Ambil Foto</h4>
				</div>
				<div class="modal-body">
					<form>
						<div id="webcam" style="margin:auto; margin-bottom: 15px;"></div>
						<p> Foto Hanya Satu Kali take !!! </p>
						<p><input type=button value="Ambil Foto " onClick="take_snapshot()" class="shiva"></p>
					</form>
					<div id="result" class="text-center" style="display: none"></div>
				</div>
				<div class="modal-footer" style="display: none">
					<button type="button" class="btn btn-md btn-primary btn-keluar" onClick="keluar()">Absen Keluar</button>
					<button type="button" class="btn btn-md btn-primary btn-masuk" onClick="masuk()">Absen Masuk</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- Modal Pengembang-->
	<div id="modalPengembang" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<form action="index.html" class="form-container" align="center">
					<table width="100%" height="100%" border="1" align="center">
						<tr>
							<td align="center" colspan=4 height=20><br>
								<font face="Algerian" color="black" size=7>Tim Pengembang</font>
							</td>
						</tr>
						<tr>
							<td width=25% align="center">
								<h4><br><img src="<?php base_url('assets/pengembang/A11.2016.09526.jpg');?>" alt="image view" style="width:320px;height:240px;" align="center">
									<font face="Algerian" align="center"><br>HENDRI ALVIAN S.<br>A11.2016.09526</font>
								</h4>
							</td>
							<td width=25% align="center">
								<h4><br><img src="A11.2016.09527.jpg" alt="image view" style="width:320px;height:240px;" align="center">
									<font face="Algerian" align="center"><br>ASPRYLLA NANDA W.<br>A11.2016.09527</font>
								</h4>
							</td>
						</tr>
						<tr>
							<td width=25% align="center">
								<h4><br><img src="A11.2016.09529.jpg" alt="image view" style="width:320px;height:240px;" align="center">
									<font face="Algerian" align="center"><br>FITRA NGESTI TAMA Y.<br>A11.2016.09529</font>
								</h4>
							</td>
							<td width=25% align="center">
								<h4><br><img src="A11.2016.09530.jpg" alt="image view" style="width:320px;height:240px;" align="center">
									<font face="Algerian" align="center"><br>IKHDARUL HUSNI Y.<br>A11.2016.09530</font>
								</h4>
							</td>
						</tr>
					</table>

					<table width="50%" border="0" align="center">
						<tr>
							<td width=25% align="center"><br>
								<font face="Algerian" align="center" color="Black" size=4><br>UNIVERSITAS DIAN NUSWANTORO</font>
							</td>
						</tr>
					</table>
				</form>
				</div>
				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

	<!-- Scripts -->
	<script src="<?= base_url('assets/plugins/webcam/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/bootstrap/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/swal/sweetalert2.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/browser.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/breakpoints.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/util.js') ?>"></script>
	<script src="<?= base_url('assets/js/main.js') ?>"></script>
	
	<script type="text/javascript" src="<?= base_url('assets/plugins/webcam/webcam.js') ?>"></script>
	<script>
		window.setTimeout("waktu()", 1000);
		
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90
		});

		function waktu() {
			var tanggal = new Date();
			setTimeout("waktu()", 1000);
			document.getElementById("jam").innerHTML = tanggal.getHours() + ":" + tanggal.getMinutes() + ":" + tanggal.getSeconds() + " WIB";
		}

		function take_snapshot() {

			Webcam.snap( function(data_uri) {
				$('.modal form').slideUp();
				$('#result').slideDown();
				$('.modal-footer').show();
				Webcam.reset();
				document.getElementById('result').innerHTML = '<img src="'+data_uri+'"/>';
			} );
		}

		function masuk()
		{
			$.ajax({
				url: "<?= base_url('magang/masuk')?>",
				method: "post",
				dataType: "json",
				data: {
						nim: $('#nim').val(),
						foto: $('#result img').attr('src')
				},
				success: function(res){
					if(res.status==true) {
						swal({
							title:'Absen Masuk Berhasil',
							type:'success'
						},function(ok){
							if(ok){
								window.location.reload();
							}
						})
					}
				}
			})
		}

		function keluar()
		{
			$.ajax({
				url: "<?= base_url('magang/keluar')?>",
				method: "post",
				dataType: "json",
				data: {
						nim: $('#nim').val(),
						foto: $('#result img').attr('src')
				},
				success: function(res){
					swal({
							title:'Absen Keluar Berhasil',
							type:'success'
						},function(ok){
							if(ok){
								window.location.reload();
							}
						})
				}
			})
		}

		$('#btnAbsen').click(function(){ //#btnAbsen= id dari tombol selanjutnya
			if($('#nim').val()==''){ //#nim id dari kolom masukan nim
				alert('Anda Belum Memasukan NIM');
			}else{
				$.ajax({
					url: "<?= base_url('magang/cekabsen')?>",//ambil fungsi dari controler,nama fungsi cekabsen
					method: "post",
					dataType: "json",
					data: {
						nim: $('#nim').val()
					},
					success:function(res){ //res=hasil callback dari request ajax
						if(res.status==false){
							$('#tampilpesan').html(res.message); //res.message ambil dari controller
						}else{
							if(res.action=='in'){
								$('.btn-keluar').hide();
								$('.btn-masuk').show();
							}else if(res.action=='out'){
								$('.btn-keluar').show();
								$('.btn-masuk').hide();
							}
							$('#modalAbsen').modal();
						}
					}
				})
			}
		})

		$('#modalAbsen').on('show.bs.modal', function (event) {
			Webcam.attach( '#webcam');
		});
		
		$('#modalAbsen').on('hidden.bs.modal', function (event) {
			Webcam.reset();
		});
	</script>
</body>
</html>
