<?php $options = get_option( 'theme_settings');  ?>
<div class="col-sm-3 col-mm-4 col-ms-12 col-xs-12 col-sm-pull-9 col-mm-pull-8">
	<div class="sb">
		<h3 class="title-line">Sản Phẩm</h3>
		<div class="content-sb row row2">
            <?php
                wp_reset_query();
                $que = array();
                $args = array("showposts" =>  5,'post_type'=>'product','orderby'=> 'rand');
                if(is_single()){
                    $cat = get_the_taxonomies();
                    $que[] = array(
                        'taxonomy' => 'product_cat',
                        'terms' => array($cat[0]->term_id),
                        'field' => 'id',
                    );
                }elseif(is_category()){
                    $que[] = array(
                        'taxonomy' => 'product_cat',
                        'terms' => array(get_queried_object()->term_id),
                        'field' => 'id',
                    );
                }
                query_posts($args);
                if(have_posts()){
                   while(have_posts()){
                     the_post(); global $product; ?>
                     <div class="wow fadeInLeft col-sm-12 col-ms-6" data-wow-delay="0.5s">
                        <a class="thumbnail pull-left mr-5px">
                            <?php if(has_post_thumbnail()) the_post_thumbnail('thumbnail'); else { ?>
                            <img src="<?php bloginfo("stylesheet_directory");?>/images/no-image.jpg"/>
                            <?php } ?>
                        </a>
                        <a class="title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h2><?php echo the_title("", "", FALSE); ?></h2></a>
                        <span class="price"><?php echo $product->get_price_html(); ?></span>
		                <div class="clearfix"></div>
                    </div>
                   <?php }
                }else{
                   echo "<div class='col-sm-12'>không tìm thấy sản phẩm nào.</div>";
                }
            ?>
		</div>
	</div><!-- sb -->
	<div class="sb">
		<h3 class="title-line">Tin Tức</h3>
		<div class="content-sb row row2">
            <?php
                $args = array("cat" =>  $options['catsb'], "showposts" =>  5 );
                query_posts($args);
                if(have_posts()){
                   while(have_posts()){
                    the_post();?>
                    <div class="wow fadeInLeft  col-sm-12 col-ms-6" data-wow-delay="0.5s">
                        <a class="thumbnail pull-left mr-5px">
                            <?php if(has_post_thumbnail()) the_post_thumbnail('thumbnail'); else { ?>
                            <img src="<?php bloginfo("stylesheet_directory");?>/images/no-image.jpg"/>
                            <?php } ?>
                        </a>
                        <a class="title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h2><?php echo the_title("", "", FALSE); ?></h2></a>
                         <div class="clearfix"></div>
                    </div>
                   <?php }
                }else{
                   echo "<div class='col-sm-12'>không tìm thấy bài viết nào.</div>";
                }
            ?>
		</div>
	</div><!-- sb -->
	<?php if($options['bnsb'] == 'on') { ?>
	<div class="sb">
		<a class="banner" href="<?php echo $options['linkbnp']; ?>"><img src="<?php echo $options['imgbnp']; ?>" alt="banner"></a>
	</div>
	<?php } ?>
</div>