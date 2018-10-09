<?php
/*
Template Name: Lien He
*/
get_header(); ?>
<?php $options = get_option( 'theme_settings'); ?>
<div id="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p>','</p>');} ?>
			</div>
		</div>
	</div>
</div>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="content"><?php the_content(); ?></div>
				<div class="row">
						<div class="col-sm-5 mb-5px">
							<h1 class="title2">Thế Giới Hàng Nhật OMISE Xin Hân Hạnh Được Hỗ Trợ Quý Khách</h1>
							<?php echo do_shortcode('[sitepoint_contact_form]'); ?>
						</div>
						<div class="col-sm-7 mb-15px">
							<h3 class="title-quote">Thông Tin Liên Hệ Khác</h3>
							<div class="quote">
								Tìm thế hàng nhật OMISE? Bạn hãy tìm vị trí OMISE trên bản đồ và xem các thông tin khác của chúng tôi.
							</div>
							<div class="mb-10px">
								<?php echo $options['ndLH']; ?>
					            <div class="clearfix"></div>
							</div>
							<?php echo $options['map']; ?>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>