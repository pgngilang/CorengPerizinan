 <!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	 <div id="footerwrap">
	 	<div class="container">
		 	<div class="row">
		 		<div class="col-lg-4">
		 			<h4>About</h4>
		 			<div class="hline-w"></div>
		 			<p>Badan Perencanaan Pembangunan Daerah Kabupaten Banyuwangi</p>
		 		</div>
		 		<div class="col-lg-4">
		 			<h4>Social Links</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				<a href="#"><i class="fa fa-dribbble"></i></a>
		 				<a href="#"><i class="fa fa-facebook"></i></a>
		 				<a href="#"><i class="fa fa-twitter"></i></a>
		 				<a href="#"><i class="fa fa-instagram"></i></a>
		 				<a href="#"><i class="fa fa-tumblr"></i></a>
		 			</p>
		 		</div>
		 		<div class="col-lg-4">
		 			<h4>Alamat</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				Jalan Ahmad Yani No. 100<br/>
		 				Banyuwangi<br/>
		 			</p>
		 		</div>

		 	</div><! --/row -->
	 	</div><! --/container -->
	 </div><! --/footerwrap -->

	 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/js/retina-1.1.0.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.hoverdir.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.filer.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.filer.min.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.hoverex.min.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.prettyPhoto.js"></script>
  	<script src="<?= base_url() ?>assets/js/jquery.isotope.min.js"></script>
  	<script src="<?= base_url() ?>assets/js/custom.js"></script>
  	<script src="<?= base_url() ?>assets/js/bootstrap-filestyle.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/js/jquery-2.1.1.min.js"></script> -->
    <script src="<?= base_url() ?>assets/js/jquery-gmaps-latlon-picker.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.plugin.js"></script>
		<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.realperson.js"></script>
		<script type="text/javascript">
		$(function() {
			$('#defaultReal').realperson();
		});
		</script>

<script>
$(document).ready(function() {
	 $('#filer_input').filer({
		showThumbs: true,
		addMore: true,
		allowDuplicates: false
});
});
</script>

    <script>
// Portfolio
(function($) {
	"use strict";
	var $container = $('.portfolio'),
		$items = $container.find('.portfolio-item'),
		portfolioLayout = 'fitRows';

		if( $container.hasClass('portfolio-centered') ) {
			portfolioLayout = 'masonry';
		}

		$container.isotope({
			filter: '*',
			animationEngine: 'best-available',
			layoutMode: portfolioLayout,
			animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
		},
		masonry: {
		}
		}, refreshWaypoints());

		function refreshWaypoints() {
			setTimeout(function() {
			}, 1000);
		}

		$('nav.portfolio-filter ul a').on('click', function() {
				var selector = $(this).attr('data-filter');
				$container.isotope({ filter: selector }, refreshWaypoints());
				$('nav.portfolio-filter ul a').removeClass('active');
				$(this).addClass('active');
				return false;
		});

		function getColumnNumber() {
			var winWidth = $(window).width(),
			columnNumber = 1;

			if (winWidth > 1200) {
				columnNumber = 5;
			} else if (winWidth > 950) {
				columnNumber = 4;
			} else if (winWidth > 600) {
				columnNumber = 3;
			} else if (winWidth > 400) {
				columnNumber = 2;
			} else if (winWidth > 250) {
				columnNumber = 1;
			}
				return columnNumber;
			}

			function setColumns() {
				var winWidth = $(window).width(),
				columnNumber = getColumnNumber(),
				itemWidth = Math.floor(winWidth / columnNumber);

				$container.find('.portfolio-item').each(function() {
					$(this).css( {
					width : itemWidth + 'px'
				});
			});
		}

		function setPortfolio() {
			setColumns();
			$container.isotope('reLayout');
		}

		$container.imagesLoaded(function () {
			setPortfolio();
		});

		$(window).on('resize', function () {
		setPortfolio();
	});
})(jQuery);
</script>
  </body>
</html>
