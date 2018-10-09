<?php global $product; ?>
<div class="sp">
    <a class="title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
    <?php if(has_post_thumbnail()) the_post_thumbnail('thumbnail'); else { ?>
    <img src="<?php bloginfo('stylesheet_directory');?>/images/no-image.jpg"/>
    <?php } ?>
    </a>
    <h2 class="title-product"><?php edit_post_link('✍','',' '); ?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="price"><?php echo $product->get_price_html(); ?></div>
    <div class="relative">
    	<?php //woocommerce_template_loop_add_to_cart(); ?>
    </div>
    <div class="clearfix"></div>
</div>