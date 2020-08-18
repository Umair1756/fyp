		<!-- jQuery -->
		<script src=" <?php echo base_url('assets/jquery/jquery.slim.min.js'); ?>"></script>
		<script src=" <?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
		<script src=" <?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
		<script src=" <?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>


		<!-- custom JS Files -->
		<script src='<?php echo base_url('assets/auth_files/index.js'); ?>'></script>
		<script>
			$(".btnActivity").on("click", function(event) {
				$('a.btnProfile').removeClass('btnProfile');
			})
		</script>


		</body>

		</html>