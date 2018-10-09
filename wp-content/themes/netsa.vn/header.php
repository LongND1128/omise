<?php global $options;  ?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html itemtype="http://schema.org/WebPage" lang="vi" prefix="og: http://ogp.me/ns#">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="Abstract" content="<?php bloginfo('keywords'); ?>" />
<meta name="msnbot" content="NOODP" />
<meta content="INDEX,FOLLOW,ALL" name="robots" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<link type="image/x-icon" href="<?php echo $options['favicon']; ?>" rel="shortcut icon" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/font-awesome.min.css" >
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/animate.css" >
<?php if(is_single()){ ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/cloudzoom.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/owl.carousel.min.css"></script>
<?php } if(is_front_page()){ ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/nivo-slider.css">
<?php } ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/woocomere.css" >
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>" type="text/css"/>
<?php wp_head(); ?>
</head>
<title><?php wp_title(); ?></title>
<body <?php body_class(); ?>>
<div id="search" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="Tìm Kiếm" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <form action="" method="post" role="search">
                <div class="input-group">
                  <input type="text" name="s" class="form-control" placeholder="tìm kiếm...">
                  <input type="hidden" name="post_type" value="product" id="search_param">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="fa fa-search"></span></button>
                  </span>
                </div><!-- /input-group -->
            </form>
            <div class="clearfix"></div>
        </div>
    </div>
  </div>
</div>
<?php if($options['bntop']!='') { ?>
<div class="bannertop">
    <a href="<?php echo $options['lbntop']; ?>"><img class="hidden-mobile" src="<?php echo $options['bntop']; ?>" alt="banner top" /><img class="hidden-desktop" src="<?php echo $options['bntopm']; ?>" alt="banner top" /></a>
</div>
<?php } ?>
<div id="top">
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
                <?php
                wp_nav_menu( array(
                    'menu'              => 'top',
                    'theme_location'    => 'top',
                    'depth'             => 1)
                );
                ?>
            </div>
        </div>
    </div>
</div>
<header>
    <div class="container">
        <div class="col-sm-3">
            <a href="/" class="logo"><img src="<?php echo $options['logo']; ?>" alt="" /></a>
        </div>
        <div class="col-sm-6 col-mm-6">
            <form role="search" method="get" class="input-group input-group-lg" action="/" id="search-header">
                <input type="text" name="s" class="form-control" placeholder="tìm kiếm">
                <input type="hidden" name="post_type" value="product" />
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                </span>

            </form>
        </div>
        <div class="col-sm-3 infoh">
            <div class="inline">
            <?php $url = get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>
            <a href="<?php echo $url; ?>">
                <div class="ico"><i class="fa fa-user-circle-o"></i></div>
                <p>Tài Khoản</p>
            </a>
            </div>
            <div class="inline">
                <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {?>
                <?php echo get_cart_content_number(); ?>
                <?php } my_header_add_to_cart_fragment( $fragments ); ?>
            <p>Giỏ Hàng</p>
            </div>
        </div>
    </div>
</header>

<div class="wpmn">
<div id="main-menu" class="">
    <div class="container">
        <nav class="navbar relative">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button data-toggle="modal" data-target="#search" class="navbar-toggle collapsed ico-menu ico-search"><i class="fa fa-search"></i></button>
                <button class="navbar-toggle collapsed ico-menu" data-toggle="collapse" data-target="#ulsp" aria-expanded="false"><i class="fa fa-gift"></i></button>
                <a class="navbar-brand hidden-desktop" href="/"><img src="<?php echo $options['logom']; ?>" alt="logo"></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
                    <span class="sr-only">Toggle menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div id="menusp">
                <div class="wp-menusp">
                    <div class="hidden-mobile dmsp hidden-mobile"><i class="fa fa-list"></i><span> Danh Mục Sản Phẩm </span><i class="fa fa-caret-down down"></i></div>
                    <div id="ulsp" class="collapse navbar-collapse">
                        <?php
                        wp_nav_menu( array(
                            'menu'              => 'sp',
                            'theme_location'    => 'sp',
                            'depth'             => 2,
                            'container'         => 'div',
                            'container_class'   => 'dichvu',
                            'container_id'      => '',
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new WP_Bootstrap_sidenav())
                        );
                        ?>
                    </div>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="menu">
              <?php
                wp_nav_menu( array(
                    'menu'              => 'nav9',
                    'theme_location'    => 'nav9',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'menu-main',
                    'container_id'      => '',

                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker())
                );
                ?>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>
</div>
</div>
<?php wp_reset_query(); ?>