	<script>var base_url = '<?= base_url() ?>';</script>
	<script src="<?= base_url('assets/plugins/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/bootstrap/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/holder.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/ie10-viewport-bug-workaround.js') ?>"></script>
	<script src="<?= base_url('assets/plugins/ie-emulation-modes-warning.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/swal/sweetalert2.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
	<!-- Footer -->
	<footer class="page-footer font-small blue">

		<!-- Copyright -->
		<div class="footer-copyright text-center py-3">© 2019 Copyright:
			<span id="pengembang" onClick="tim_pengembang()">Udinus:Pengembang</span>
		</div>
	</footer>
	<script type="text/javascript">
		window.setTimeout("waktu()", 1000);

		function waktu() {
			var tanggal = new Date();
			setTimeout("waktu()", 1000);
			document.getElementById("output").innerHTML = tanggal.getHours() + ":" + tanggal.getMinutes() + " WIB";
		}
	</script>
