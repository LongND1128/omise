<?php global $options; ?>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-3 wow fadeInUp mb-20px" data-wow-delay="0.4s">
				<h3 class="title-footer">Về Chúng Tôi</h3>
				<img src="<?php echo $options['flogo']; ?>">
				<p><?php echo $options['gtfoot']; ?></p>
			</div>
			<div class="col-sm-6 col-ms-6 wow fadeInUp mb-20px" data-wow-delay="0.7s">
				<h3 class="title-footer">Thông Tin</h3>
				<div class="row row2">
				<div class="col-sm-6 col-xs-6 menuf">
					<?php
					wp_nav_menu( array(
			            'menu'              => 'footer1',
			            'theme_location'    => 'footer1',
			            'depth'             => 2,
			            'container'         => 'div',
			            'container_class'   => 'menu-main',
			            'container_id'      => '',
			            'menu_class'        => '',
			            'fallback_cb'       => '',
			            'walker'            => '')
			        );
			        ?>
				</div>
				<div class="col-sm-6 col-xs-6 menuf">
					<?php
					wp_nav_menu( array(
			            'menu'              => 'footer2',
			            'theme_location'    => 'footer2',
			            'depth'             => 2,
			            'container'         => 'div',
			            'container_class'   => 'menu-main',
			            'container_id'      => '',
			            'menu_class'        => '',
			            'fallback_cb'       => '',
			            'walker'            => '')
			        );
			        ?>
				</div>
				</div>
			</div>
			<div class="col-sm-3 col-ms-6 thongtin wow fadeInUp mb-20px" data-wow-delay="1s">
				<h3 class="title-footer">Về Chúng Tôi</h3>
				<p><i class="fa fa-road"></i> <?php echo $options['dc']; ?></p>
				<p><i class="fa fa-phone"></i> <?php echo $options['sdt']; ?></p>
				<p><i class="fa fa-clock-o"></i> <?php echo $options['glv']; ?></p>
				<p><i class="fa fa-internet-explorer"></i> <?php echo $options['web']; ?></p>
			</div>
		</div>
	</div>
</footer>
<div id="copyright">
	<div class="container">
		<div class="row">
			<div class="col-sm-12"><p>©2018 omise.vn Thiết Kế Bởi <a target="_blank" href="https://netsa.vn">Netsa.vn</a></p></div>
		</div>
	</div>
</div>
<ul id="icons">
	<li class="hidden-desktop cartmobile"><a href="<?php echo $options['lfacebook']; ?>">
		<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {?>
			  	<?php echo get_cart_content_number(); ?>
				<?php } my_header_add_to_cart_fragment( $fragments ); ?>
		</a></li>

	<li><a href="<?php echo $options['zalo']; ?>"><img src="<?php bloginfo('stylesheet_directory');?>/images/icon-zalo.png" alt=""></a></li>
	<li><div class="buy-now">
	    <a href="tel:<?php echo $options['hotline']; ?>" class="buy-now-btn">
	        <i class="fa fa-phone" aria-hidden="true"></i>
	    </a>
	    <div class="ripple"></div>
	</div></li>
</ul>

<script  type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/wow.min.js"></script>
<?php wp_reset_query(); if(is_single()){ ?>
<script src="<?php bloginfo('stylesheet_directory');?>/js/cloudzoom.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/owl.carousel.min.js"></script>
<?php }
if(is_front_page()){ ?>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/owl.carousel.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory');?>/js/nivo.slider.js"></script>
<script>$(document).ready(function(){
	$('#slider').nivoSlider({
		effect: 'random',
		slices: 15,
		boxCols: 8,
		boxRows: 4,
		animSpeed: 500,
		pauseTime: 3000,
		startSlide: 0,
		directionNav: true,
		controlNav: true,
		controlNavThumbs: false,
		pauseOnHover: true,
		manualAdvance: false,
		prevText: 'Prev',
		nextText: 'Next',
		randomStart: false,
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){},
		lastSlide: function(){},
		afterLoad: function(){}
	});
	$('.owltt').owlCarousel({
	    loop:true,
	    dots: false,
	    nav: false,
	    margin:15,
	    navText: ['', ''],
	    autoplay:true,
	    // center:true,
	    responsive:{
	    	100:{
	            items:1,
	            nav: false,
	            margin:0
	        },270:{
	            items:2,
	            nav: false,
	        },580:{
	            items:3,
	            nav: false,
	        },
	        992:{
	            items:5,
	            nav: false,
	        }
	    }
	});
	var dt = $('.owltt');
	$('#news .nextowl').click(function() {
		dt.trigger('next.owl.carousel');
	});
	$('#news .previousowl').click(function() {
	    dt.trigger('prev.owl.carousel', [300]);
	});
	$('.wpsl').owlCarousel({
	    loop:true,
	    dots: false,
	    nav: false,
	    margin:15,
	    navText: ['', ''],
	    autoplay:true,
	    // center:true,
	    responsive:{
	    	100:{
	            items:2,
	            nav: false,
	            margin:0
	        },270:{
	            items:4,
	            nav: false,
	        },580:{
	            items:5,
	            nav: false,
	        },
	        992:{
	            items:8,
	            nav: false,
	        }
	    }
	});
});
</script>
<?php } ?>
<script src="<?php bloginfo('stylesheet_directory');?>/js/number.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/main.js"></script>


<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="188465041788367"
  theme_color="#0084ff"
  logged_in_greeting="Bạn cần hỗ trợ?"
  logged_out_greeting="Bạn cần hỗ trợ?">
</div>
<?php wp_footer(); ?>
</body>
</html>