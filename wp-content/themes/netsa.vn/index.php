<?php global $options; ?>
<?php get_header(); ?>


<div id="wpsl">
	<div class="container">
		<div class="row">
			<div class="col-sm-3 camket"><img src="<?php echo $options['ack']; ?>" alt="" /></div>
			<div class="col-sm-3 wpqcsl pl-0px ml--10px">
				<div class="qc-sl mb-5px wow bounceInRight" data-wow-delay="0.5s">
					<?php if($options['bnsl1']!='') {?>
					<a href="<?php echo $options['lbnsl1']; ?>">
					<img src="<?php echo $options['bnsl1']; ?>" alt="banner 1" />
					</a>
					<?php } ?>
				</div>
				<div class="qc-sl mb-5px wow bounceInRight" data-wow-delay="1s">
					<?php if($options['bnsl2']!='') {?>
					<a href="<?php echo $options['lbnsl2']; ?>">
					<img src="<?php echo $options['bnsl2']; ?>" alt="banner 2" />
					</a>
					<?php } ?>
				</div>
				<div class="qc-sl mb-5px wow bounceInRight" data-wow-delay="1.5s">
					<?php if($options['bnsl3']!='') {?>
					<a href="<?php echo $options['lbnsl3']; ?>">
					<img src="<?php echo $options['bnsl3']; ?>" alt="banner 3" />
					</a>
					<?php } ?>
				</div>
			</div>
			<div class="col-sm-6 mb-15px">
				<div class="theme-default wp-slider">
				<div id="slider" class="">
					<?php for($i=1;$i<=6;$i++){
						if($options['slider'.$i]!='')
						echo '<a href="'.$options['linksl'.$i].'"><img src="'.$options['slider'.$i].'" alt="slider'.$i.'"></a>';
					} ?>
				</div>
				</div><!-- slider -->
			</div>
		</div>
	</div>
</div>

<div id="cat" >
	<div class="container">
		<div class="row mb-15px">
			<div class="col-sm-12"><h2 class="title-home"><?php $term = get_term_by( 'id', $options['cat1'], 'product_cat' ); echo $term->name; ?></h2></div>
				<?php
                $que = array(
                    array(
                        'taxonomy' => 'product_cat',
                        'terms' => array($options['cat1']),
                        'field' => 'id',
                    ),
                );
                $args = array('post_type' =>  'product', 'showposts' =>  10, 'tax_query' => $que);
                query_posts($args);
                if(have_posts()){ while(have_posts()){ the_post();
                	echo '<div class="col-lg-2 cot5 col-sm-2 col-xs-6 col-ms-4">';
                	get_template_part('content','product');
                	echo '</div>';
                }} ?>
		</div>

		<div class="row mb-15px">
			<?php
			if($options['bnd1']!=''){ ?>
			<div class="col-sm-12 mb-15px">
				<a href="<?php echo $options['lbnd1']; ?>" class="qc-sl"><img src="<?php echo $options['bnd1']; ?>" alt="banner" /></a>
			</div>
			<?php } ?>
			<div class="col-sm-12"><h2 class="title-home"><?php $term = get_term_by( 'id', $options['cat2'], 'product_cat' ); echo $term->name; ?></h2></div>
				<?php
                $que = array(
                    array(
                        'taxonomy' => 'product_cat',
                        'terms' => array($options['cat2']),
                        'field' => 'id',
                    ),
                );
                $args = array('post_type' =>  'product', 'showposts' =>  10, 'tax_query' => $que);
                query_posts($args);
                if(have_posts()){ while(have_posts()){ the_post();
                	echo '<div class="col-sm-3 cot5 col-xs-6 col-ms-4">';
                	get_template_part('content','product');
                	echo '</div>';
                }} ?>
		</div>

		<div class="row mb-15px">
			<?php
			if($options['bnd2']!=''){ ?>
			<div class="col-sm-12 mb-15px">
				<a href="<?php echo $options['lbnd2']; ?>" class="qc-sl"><img src="<?php echo $options['bnd2']; ?>" alt="banner" /></a>
			</div>
			<?php } ?>
			<div class="col-sm-12"><h2 class="title-home"><?php $term = get_term_by( 'id', $options['cat3'], 'product_cat' ); echo $term->name; ?></h2></div>
				<?php
                $que = array(
                    array(
                        'taxonomy' => 'product_cat',
                        'terms' => array($options['cat3']),
                        'field' => 'id',
                    ),
                );
                $args = array('post_type' =>  'product', 'showposts' =>  10, 'tax_query' => $que);
                query_posts($args);
                if(have_posts()){ while(have_posts()){ the_post();
                	echo '<div class="col-sm-3 cot5 col-xs-6 col-ms-4">';
                	get_template_part('content','product');
                	echo '</div>';
                }} ?>
			<?php
			if($options['bnd3']!=''){ ?>
			<div class="col-sm-12 mb-15px">
				<a href="<?php echo $options['lbnd3']; ?>" class="qc-sl"><img src="<?php echo $options['bnd3']; ?>" alt="banner" /></a>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<div id="news" class="mb-15px">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="title-home2">Tin Tức</h3>
			</div>
			<div class="col-sm-12">
				<div class="previousowl"><i class="fa fa-angle-left"></i></div>
				<div class="nextowl"><i class="fa fa-angle-right"></i></div>
				<div class="owltt">
					<?php
	                $args = array('showposts' =>  5 ,  'cat' => $options['cath'] );
	                query_posts($args);
	                if(have_posts()){
	                   while(have_posts()){
	                     the_post();?>
	                     <div class="wow fadeInUp newshome" data-wow-delay="0.5s">
	                        <a href="<?php the_permalink(); ?>" class="thumbnail">
	                            <?php if(has_post_thumbnail()) the_post_thumbnail('thumbnail'); else { ?>
	                            <img class="no-image" src="<?php bloginfo("stylesheet_directory");?>/images/no-image.jpg"/>
	                            <?php } ?>
	                        </a>
	                        <div class="body-lated">
	                            <?php edit_post_link('✍','',' '); ?><a class="title-t" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h2><?php echo the_title("", "", FALSE); ?></h2></a>
	                            <p><?php the_content_rss('', false,'',10); ?></p>
	                         </div>
	                         <div class="clearfix"></div>
	                     </div>
	                   <?php }
	                }else{
	                   echo "không tìm thấy bài viết nào.";
	                } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="doitac">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="wpsl">
                    <?php for($i=1;$i<=8;$i++){
                        if($options['logof'.$i]!='')
                        echo '<img src="'.$options['logof'.$i].'" alt="logo '.$i.'">';
                    } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>