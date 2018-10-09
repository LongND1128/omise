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
			<div class="col-sm-9 col-mm-8  col-sm-push-3 col-mm-push-4">
				<h1 class="title-line"><?php edit_post_link('✍','',' '); the_title(); ?></h1>
				<div class="content"><?php the_content(); ?></div>
				<div class="wraper-related">
	                <h3 class="title-line">Bài Viết Liên Quan</h3>
	                <div class="row row2">
	                <?php
	                	wp_reset_query();
	                    global $post;
	                    $category = get_the_category();
	                    $firstCategory = $category[0]->term_id;

	                    $args=array(
	                    'cat' => $firstCategory,
	                    'post__not_in' => array($post->ID),
	                    'posts_per_page'=>4, // Number of related posts to display.
	                    'caller_get_posts'=>1
	                    );

	                    $my_query = new wp_query( $args );
	                    $time = array(0.5,0.9,1.3,1.7,2.1);
	                    while( $my_query->have_posts() ) {
	                    $my_query->the_post();
	                    ?>

	                    <div class="wow fadeInUp col-sm-12 mb-15px poscat" data-wow-delay="<?php echo $time[$i]; ?>s">
							<div class="wp-hover pull-left thumbnail-post-cat">
								<a href="<?php the_permalink(); ?>" class="hover-thumbnail thumbnail mb-10px pull-left">
								<?php
					            if(has_post_thumbnail()){
					        		the_post_thumbnail('thumbnail', array('class' => 'img-responsive pull-left'));
					        	}else { ?>
					            <img src="<?php bloginfo('stylesheet_directory');?>/images/no-image.jpg" class="img-responsive pull-left"/>
					            <?php } ?>
					            </a>

					            <div class="clearfix"></div>
					        </div>

				            <h2 class="title-post-cat"><?php edit_post_link('✍','',' '); ?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				           <p><?php the_content_rss('', false,'',40); ?></p>
	                        <div class="clearfix"></div>
	                    </div>
                    <?php $i++; }
                    wp_reset_query();
                    ?>
                    </div>
	            </div>
	            <div>
					<?php comments_template(); ?>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>