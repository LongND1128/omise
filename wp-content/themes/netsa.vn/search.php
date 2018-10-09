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
			<div class="col-sm-9 col-mm-8">
				<h1 class="title-line">Kết Quả Tìm Kiếm</h1>
				<div class="row">
				<?php
				if(have_posts()){ while(have_posts()){ the_post(); ?>
				<div class="wow fadeInUp col-sm-12 mb-15px poscat" data-wow-duration="1s" data-wow-delay="0.5s">
					<div class="wp-hover pull-left thumbnail-post-cat">
						<a href="<?php the_permalink(); ?>" class="hover-thumbnail thumbnail mb-10px pull-left">
						<?php
			            if(has_post_thumbnail()){
			        		the_post_thumbnail('medium', array('class' => 'img-responsive pull-left'));
			        	}else { ?>
			            <img src="<?php bloginfo('stylesheet_directory');?>/images/no-image.jpg" class="img-responsive pull-left"/>
			            <?php } ?>
			            </a>

			            <div class="clearfix"></div>
			        </div>
		            <h2 class="title-post-cat"><?php edit_post_link('✍','',' '); ?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		            <ul class="info">
			            <li><i class="fa fa-calendar"></i>  <?php echo get_the_date('d/m/Y'); ?></li>
			            <?php the_tags('<li><i class="fa fa-tags"></i>',', ','</li>'); ?>
			            <li><i class="fa fa-eye"></i> <?php echo PostViews($post->ID); ?></li>
			        </ul>
		           <p><?php the_content_rss('', false,'',40); ?></p>
		            <div class="clearfix"></div>
				</div>
				<?php }}else echo '<div class="col-sm-12 mb-15px"><div class="notice notice-warning">Không tìm thấy bài viết nào trong danh mục.</div>.</div>'; if( function_exists('wp_bootstrap_pagination') ) wp_bootstrap_pagination(); ?>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>