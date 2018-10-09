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
				<h1 class="title-line"><?php edit_post_link('✍','',' '); the_title(); ?></h1>
				<?php if(have_posts()){ while(have_posts()){ the_post(); global $product; ?>
				<div class="row row2">
					<div class="col-sm-5 col-ms-6">
						<div class="main-thumbnail mb-10px">
							<?php
				            if(has_post_thumbnail()){
				            $post_thumbnail_id = get_post_thumbnail_id($post->ID);
			                $post_thumbnail_url = wp_get_attachment_image_src( $post_thumbnail_id,'full' );
				            ?>
				        		<img id="zoom1" class="cloudzoom" data-cloudzoom="zoomImage:'<?php echo $post_thumbnail_url[0]; ?>', zoomPosition:'inside',autoInside:true , zoomOffsetX:0 " src="<?php echo $post_thumbnail_url[0]; ?>" />
				        	<?php }else { ?>
				            	<img id="zoom1" src="<?php bloginfo('stylesheet_directory');?>/images/no-image.jpg" title="Your caption here" alt=''/>
				            <?php } ?>
						</div>
						<div class="wp-listthumb relative mb-10px">
							<div class="list-thumbs">
								<?php
				                $attachment_ids = $product->get_gallery_attachment_ids();
				                foreach( $attachment_ids as $attachment_id )
				                {
				                $post_thumbnail_url = wp_get_attachment_image_src( $attachment_id,'full' );
				                $post_thumbnail_url_small = wp_get_attachment_image_src( $attachment_id,'thumbnail' );
				                $post_thumbnail_url_medium = wp_get_attachment_image_src( $attachment_id,'large' );
				                ?>
				                  <div class="">
				                    <a href="#" class="cloudzoom-gallery" data-cloudzoom="
			                       useZoom:'#zoom1',
			                       image:'<?php echo $post_thumbnail_url_medium[0]; ?>',
			                       zoomImage:'<?php echo $post_thumbnail_url[0]; ?>'
			                       ">
				                    <img src="<?php echo $post_thumbnail_url_small[0]; ?>" alt="">
				                    </a>
				                  </div>
				                <?php } ?>
							</div>
							<?php if(count($attachment_ids )>0) { ?>
							<div class="previousowl"><i class="fa fa-angle-left"></i></div>
							<div class="nextowl"><i class="fa fa-angle-right"></i></div>
							<?php } ?>
						</div>
					</div>
					<div class="col-sm-7 col-ms-6 info-product">
						<h2 class="title-sing-pro"><?php the_title(); ?></h2>
						<div class="code">
							<?php
		                    echo "<p class=\"masp pull-left\"><b>Mã SP: ".get_post_meta( get_the_ID(), '_sku', true )."</b></p>";
		                    ?>
		                    <span class="share-like-sing">
		                        <div class="fb-like" data-href="<?php echo curPageURL(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>

		                        <script src="https://apis.google.com/js/platform.js" async defer>
		                          {lang: 'vi'}
		                        </script>
		                        <div class="g-plusone gplus" data-size="medium" data-href="<?php echo curPageURL(); ?>"></div>
		                        <div class="g-plus" data-action="share" data-annotation="bubble" data-href="<?php echo curPageURL(); ?>"></div>
		                    </span>
		                    <div class="clearfix"></div>
						</div>
						<div class="stock mb-10px">
							<p class=" pull-left">
								<?php
								if($product->stock_status=='instock'){
									echo '<span class="text-success">Tình trạng: <i class="fa fa-check"></i> Còn hàng</span>';
								}else{
									echo '<span class="text-danger">Tình trạng: <i class="fa fa-close"></i> Hết hàng hàng</span>';
								}
								?>
							</p>
							<p class="pull-right">
							 <?php echo $product->get_rating_html(); ?>
							</p>
							<div class="clearfix"></div>
						</div>
						<div class="gc">
							<?php echo $options['gcsp']; ?>
						</div>
	                    <?php
	                    if($product->stock_status == 'instock'){ ?>
							<?php
							if( $product->is_type( 'variable' ) ){
								woocommerce_variable_add_to_cart();
							}elseif($product->is_type( 'simple' )){
								if($product->get_price_html() != '<span class="price-new">Liên Hệ</span>'){
								?>
								<div class="price"><?php echo $product->get_price_html(); ?></div>
								<div class="option_quantity mb-15px">
								<form class="cartsing" action="<?php the_permalink() ?>" method="post" enctype="multipart/form-data">
                                    <div>
                                        <div id="textsl">Số Lượng</div>
                                        <div class="quantitysing">
                                          <span class="tru">-</span>
                                          <input type="text" step="1" min="1" max="9" name="quantity" value="1" title="số lượng" class="input-text qty text"/>
                                          <span class="cong">+</span>
                                          <div class="clearfix"></div>
                                        </div>
                                        <?php
                                        $numleft  = $product->get_stock_quantity();
                                        if($numleft != 0 ){
                                            echo ' <span class=""> '.$numleft.' sản phẩm có sẵn</span>';
                                        }
                                        ?>
	                                     <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->id); ?>"/>
	                                     <button class="btn btn-danger" id="themvaogio" type="submit"><i class="fa fa-shopping-cart"></i> MUA NGAY</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
							 	<div class="clearfix"></div>
						 		</div>
							<?php }else{
								echo '<h3 class="text-danger"><strong>Giá: Liên Hệ</strong></h3>';
								}
							}
							woocommerce_template_single_excerpt();
							echo $options['gtSP']; ?>
						<?php } ?>
					</div>
				</div>
				<?php }}else{
					echo '<div class="col-sm12">';
					_e('Không tìm thấy sản phẩm !','netsa');
					echo '</div>';
				} ?>
				<div class="content">
					<?php the_content(); ?>
					<div class="clearfix"></div>
				</div>
				<div><?php comments_template(); ?></div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php
function child_theme_footer_script() { ?>
<script src="<?php bloginfo('stylesheet_directory');?>/js/cloudzoom.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/owl.carousel.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	CloudZoom.quickStart();
	$('.list-thumbs').owlCarousel({
	    loop:true,
	    // slideBy: 3,
	    dots: false,
	    nav: false,
	    navText: ['', ''],
	    // transitionStyle : 'fade',
	    margin:10,
	    autoplay:false,
	    autoplayTimeout:3000,
	    responsiveClass:true,
	    // center:true,
	    responsive:{
	        0:{
	            items:4,
	            nav: false,
	        },
	        600:{
	            items:4,
	            nav: false,
	        },
	        1024:{
	            items:4,
	            nav: false,
	        }
	    }
	});
	var owl2 = $('.list-thumbs');
	$('.wp-listthumb .nextowl').click(function() {
		owl2.trigger('next.owl.carousel');
	});
	$('.wp-listthumb .previousowl').click(function() {
	    owl2.trigger('prev.owl.carousel', [300]);
	});
});
</script>
<?php }
add_action( 'wp_footer', 'child_theme_footer_script' );get_footer(); ?>