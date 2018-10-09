<?php get_header(); ?>
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
			<div class="col-sm-9 col-mm-8 col-sm-push-3 col-mm-push-4">
				<h1 class="title-line"><?php woocommerce_page_title(); ?></h1>
				<?php if($options['bnnsp']!=''){ ?>
					<a href="<?php echo $options['lbnnsp']; ?>" class="mb-10px banner wow flipInY"><img src="<?php echo $options['bnnsp']; ?>" alt=""></a>
				<?php } ?>
				<div class="row row2">
					<div class="col-sm-12 mb-10px">
						<?php echo term_description(); ?>
                	</div>
					<?php if(have_posts()){ while(have_posts()){ the_post();
	                	echo '<div class="col-sm-3">';
	                	get_template_part('content','product');
	                	echo '</div>';
	                }}else{
	                	echo '<div class="col-sm-12"><div class="notice notice-warning">Không tìm thấy sản phẩm nào với tiêu chí tìm kiếm này, bạn hãy thử với tiêu chí tìm kiếm khác nhé.</div></div>';
	                }
	                if( function_exists('wp_bootstrap_pagination') ) wp_bootstrap_pagination(); ?>
                </div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>