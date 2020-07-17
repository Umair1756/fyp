		<!-- jQuery -->
		<script src=" <?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
		<script src=" <?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
		<!-- <script src="<?php //echo base_url('assets/js/plugins/datepicker/bootstrap-datepicker.js'); 
							?>"></script> -->

		<!-- <script src="<?php //echo base_url('assets/js/app_modules/general.js'); 
							?>"></script> -->
		<!-- <script src="<?php // echo base_url('assets/js/app_modules/dashboard.js'); 
							?>"></script> -->
		<!-- common functions -->
		<!-- <script src=" <?php // echo base_url('assets/js/tisa_common.js'); 
							?>"></script> -->
		<!-- custom javascript -->
		<!-- <script src="<?php //echo base_url('assets/js/custom.js'); 
							?>"></script> -->
		<!-- <script src="<?php //echo base_url('assets/js/app_modules/general.js'); 
							?>"></script> -->
		<script src='<?php echo base_url('assets/auth_files/index.js'); ?>'></script>
		<script>
			// changing headerColorOnScrolling and position
			$(document).ready(function() {
				$(document).scroll(function() {
					// console.log($(this).scrollTop())
					if ($(this).scrollTop() > 740) {
						$(".header-section").addClass("changeScrollBoxOnTop");
						$(".first_part_log").addClass("fLogoOnScroll");
						$(".secong_part_log").addClass("sLogoOnScroll");
						$(".login_adj").addClass("loginAdjOnScroll");
					} else {
						$(".header-section").removeClass("changeScrollBoxOnTop");
						$(".first_part_log").removeClass("fLogoOnScroll");
						$(".secong_part_log").removeClass("sLogoOnScroll");
						$(".login_adj").removeClass("loginAdjOnScroll");
					}
				});
			});
			//onPageLoad loader
			var loader = $(".pageLoader");
			setTimeout(function() {
				loader[0].style.display = "none";
			}, 4000);

			var arrow = $("#arrow-up");

			// When the user scrolls down 20px from the top of the document, show the button
			window.onscroll = function() {
				scrollFunction()
			};

			function scrollFunction() {
				if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
					arrow[0].style.display = "block";
				} else {
					arrow[0].style.display = "none";
				}
			}

			// When the user clicks on the button, scroll to the top of the document
			function topFunction() {
				document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0;
			}
		</script>
		</body>

		</html>