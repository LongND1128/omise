<?php
add_theme_support( 'woocommerce' );

add_action( 'after_setup_theme', 'yourtheme_setup' );
function yourtheme_setup() {
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

// remove text Billing from the error message
function customize_wc_errors( $error ) {
    if ( strpos( $error, 'Thanh toán ' ) !== false ) {
        $error = str_replace("Thanh toán ", "", $error);
    }
    return $error;
}
add_filter( 'woocommerce_add_error', 'customize_wc_errors' );



function custom_parse_request_tricksy( $query ) {
    // Only noop the main query
    if ( ! $query->is_main_query() )
        return;
    // Only noop our very specific rewrite rule match
    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }
    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'product', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'custom_parse_request_tricksy' );
function custom_remove_cpt_slug( $post_link, $post, $leavename ) {
    if ( 'product' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }
    $post_link = str_replace( '/san-pham/', '/', $post_link );
    $post_link = str_replace( '/product/', '/', $post_link );
    return $post_link;
}
add_filter( 'post_type_link', 'custom_remove_cpt_slug', 10, 3 );



function bbloomer_wc_discount_total_30() {
    global $woocommerce;
    $discount_total = 0;
    foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values) {
    $_product = $values['data'];
        if ( $_product->is_on_sale() ) {
        $regular_price = $_product->get_regular_price();
        $sale_price = $_product->get_sale_price();
        $discount = ($regular_price - $sale_price) * $values['quantity'];
        $discount_total += $discount;
        }
    }
    if ( $discount_total > 0 ) {
    echo '<tr class="cart-discount">
    <th>Tiết kiệm</th>
    <td data-title=" '. __( 'You Saved', 'woocommerce' ) .' ">'
    . wc_price( $discount_total + $woocommerce->cart->discount_cart ) .'</td>
    </tr>';
    }
}

function percence($re,$sale){
    return $percentage = round( ( ( $re - $sale ) / $re ) * 100 );
}
function cat(){
    $terms = get_the_terms( $post->ID, 'product_cat' );
    if ( $terms && ! is_wp_error( $terms ) ) : //only displayed if the product has at least one category
        $cat_links = array();
        foreach ( $terms as $term ) {
            $cat_links[] = '<a class="label bg-terciary" href="'.get_site_url().'/?product_cat='.$term->slug.'" title="'.$term->name.'">'.$term->name.'</a>';
        }

        $on_cat = join( ", ", $cat_links );
        return $on_cat;
    endif;
}


function list_feture(){
    $terms = get_the_terms( $post->ID, 'product_cat' );
    if ( $terms && ! is_wp_error( $terms ) ) : //only displayed if the product has at least one category
        $cat_links = '';
        foreach ( $terms as $term ) {
            $cat_links .= str_replace(' ','_',$term->name).' ';
        }
        return $cat_links;
    endif;
}



/** get content cart ***/
function get_cart_content() {

    $content = WC()->cart->cart_contents;
    $tong = 0;
    $sl = 0;
    $count = WC()->cart->cart_contents_count;
    $output = '';

    if(count($content) > 0){
        $output .= '<ul class="tab-content content dropdown-menu pull-right shoppingcart-box relative" role="menu"><li><div class="arrow"></div><table class="table table-striped"><tbody>';
        foreach( $content as $item ) {
            // Get the image and your specified image size.
            $image = get_the_post_thumbnail($item['product_id'], 'thumbnail' );
            $gia = $item['data']->price;
            $sl += $item['quantity'];
            $tongsp = $sl*$gia;
            $tong += $tongsp;

            $output .= '<tr><td class="text-center" style="width:70px"><a href="'. get_the_permalink($item['product_id']) .'">'. $image .'</a>';
            $output .= '</td><td class="text-left"><a class="cart_product_name" href="'. get_the_permalink($item['product_id']) .'">'. get_the_title( $item['product_id'] ) .'</a></td>';
            $output .= '<td class="text-center"> x'. $item['quantity'] .' </td><td class="text-center"> '. number_format($gia) .'đ </td>';
            // $output .= '<td class="text-right"><a href="'. get_the_permalink($item['product_id']) .'" class="fa fa-edit"></a></td><td class="text-right"><a onclick="cart.remove(\''.$item['product_id'].'\');" class="fa fa-times fa-delete"></a></td>';
            $output.='</tr>';
        }
        $output .= '</table></li>';
        if($tong == 0) $last = '</ul>';  else $last = '<li><div><table class="table table-bordered"><tbody><tr><td class="text-left"><strong>Tổng</strong></td><td class="text-right text-danger">'.number_format($tong).'đ</td></tr></tbody></table><p class="text-right" style="padding: 0px; padding-top: 10px"> <a class="btn btn-default view-cart" href="'.WC()->cart->get_cart_url().'"> <i class="fa fa-shopping-cart"></i> Giỏ Hàng</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-default btn-mega checkout-cart" href="'.WC()->cart->get_checkout_url().'"><i class="fa fa-share"></i> Thanh Toán</a> </p></div></li></ul>';
    }



    $head = '<a data-loading-text="đang tải..." class="top_cart dropdown-toggle" data-toggle="dropdown"><div class="shopcart"><span class="handle pull-left"></span><span class="title"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</span><p class="text-shopping-cart cart-total-full text-danger">'.$sl.' sp - '.number_format($tong).'đ </p></div></a>';
    return $head.$output.$last;
}
function get_cart_content_number() {

    $content = WC()->cart->cart_contents;
    $sl = 0;
    $count = WC()->cart->cart_contents_count;
    if(count($content) > 0){
        foreach( $content as $item ) {
            // Get the image and your specified image size.
            $sl += $item['quantity'];
        }
    }
    // return '<div class="wpcart"><a class="view-cart" href="'.WC()->cart->get_cart_url().'"><i class="fa fa-shopping-cart"></i><span>'.$sl.'</span></a></div>';

    $expire = time() + 60 * 60 * 24 * 30;
    wc_setcookie('slsp', $sl, $expire, false );
    return '<div class="ico"><a href="'.WC()->cart->get_cart_url().'" class="carttop"><i class="fa fa-shopping-cart"></i><span class="slsp">'.$sl.'</span></a></div>';
}


/**
 * Add Cart icon and count to header if WC is active
 */
function my_wc_cart_count() {
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {?>
        <div class="carttop">
          <?php echo get_cart_content_number(); ?>
        </div>
<?php } }
add_action( 'your_theme_header_top', 'my_wc_cart_count' );


/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function my_header_add_to_cart_fragment( $fragments ) {

    ob_start();
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {?>
        <div class="carttop">
          <?php echo get_cart_content_number(); ?>
        </div>
    <?php }
    $fragments['.carttop'] = ob_get_clean();
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );

//custom get price html
add_filter( 'woocommerce_get_price_html', 'custom_price_html', 100, 2 );
function custom_price_html( $price, $product ){
    $price = str_replace( '<span class="woocommerce-Price-amount amount">', '<span class="woocommerce-Price-amount amount price-new">', $price );
    $price = str_replace( '<ins>', '<ins class="price-new">', $price );
    if($price =='') return '<span class="price-new">Liên Hệ</span>';
    return $price = str_replace( '<del>', '<del class="price-old">', $price );
}



function is_realy_woocommerce_page () {
    if(  function_exists ( "is_woocommerce" ) && is_woocommerce()){
        return true;
    }
    $woocommerce_keys   =   array ( "woocommerce_shop_page_id" ,
                                    "woocommerce_terms_page_id" ,
                                    "woocommerce_cart_page_id" ,
                                    "woocommerce_checkout_page_id" ,
                                    "woocommerce_pay_page_id" ,
                                    "woocommerce_thanks_page_id" ,
                                    "woocommerce_myaccount_page_id" ,
                                    "woocommerce_edit_address_page_id" ,
                                    "woocommerce_view_order_page_id" ,
                                    "woocommerce_change_password_page_id" ,
                                    "woocommerce_logout_page_id" ,
                                    "woocommerce_lost_password_page_id" ) ;
    foreach ( $woocommerce_keys as $wc_page_id ) {
        if ( get_the_ID () == get_option ( $wc_page_id , 0 ) ) {

        }
    }
    return false;
}

//limit to three per style
add_action('pre_get_posts', 'change_tax_num_of_posts' );
function change_tax_num_of_posts( $wp_query ) {
    if( is_tax('product_cat')&& is_main_query() ) {
      return $wp_query->set('posts_per_page', 28);
    }

    if( $wp_query->is_search && is_main_query()) {
        $post_type = get_query_var('post_type');
        if($post_type == 'product'){
            return $wp_query->set('posts_per_page', 28);
        }
    }

}

// Woocommerce rating stars always
add_filter('woocommerce_product_get_rating_html', 'your_get_rating_html', 10, 2);
function your_get_rating_html($rating_html, $rating) {
    if ( $rating > 0 ) {
        $title = sprintf( __( 'Rated %s out of 5', 'woocommerce' ), $rating );
    } else {
        $title = 'Not yet rated';
        $rating = 0;
    }

    $rating_html  = '<div class="star-rating" title="' . $title . '">';
    $rating_html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"><strong class="rating">' . $rating . '</strong> ' . __( 'out of 5', 'woocommerce' ) . '</span>';
    $rating_html .= '</div>';
    return $rating_html;
}