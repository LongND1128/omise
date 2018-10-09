<?php

//register settings
function theme_settings_init(){
    register_setting( 'theme_settings', 'theme_settings' );
}

//add settings page to menu
function add_settings_page() {
    add_menu_page( __( 'Cấu Hình Web' ), __( 'Web Settings' ), 'manage_options', 'settings', 'theme_settings_page');
}

//add actions
add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_settings_page' );

//define your variables
$color_scheme = array('default','blue','green',);

//start settings page
function theme_settings_page()
{
    if ( ! isset( $_REQUEST['updated'] ) ){
        $_REQUEST['updated'] = false;
    }

    if (isset( $_POST['submit'] ) ){
       
    }
    
    //get variables outside scope
    global $color_scheme;
    ?>
    
    <div class="wrap">
    <h1>Cấu Hình Website</h1>
    <script language="javascript" src="<?php bloginfo('stylesheet_directory');?>/inc/custom-theme/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script language="javascript" src="<?php bloginfo('stylesheet_directory');?>/inc/custom-theme/js/bootstrap.min.js" type="text/javascript"></script>
    <script language="javascript" src="<?php bloginfo('stylesheet_directory');?>/inc/custom-theme/js/custom.js" type="text/javascript"></script>

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/inc/custom-theme/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/inc/custom-theme/css/custom.css" type="text/css"/>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/inc/custom-theme/css/font-awesome.min.css" type="text/css"/>
    <div id="icon-options-general"></div>
    
    
    <?php
    //show saved options message
    if ( false !== $_REQUEST['updated'] ) : ?>
    <div><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
    <?php endif; ?>
    
    <?php
    // jQuery
    wp_enqueue_script('jquery');
    // This will enqueue the Media Uploader script
    wp_enqueue_media();
    ?>
    <form method="post" action="options.php">
    
    <?php settings_fields( 'theme_settings' ); ?>
    <?php $options = get_option( 'theme_settings' ); ?>
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#trangweb">Trang Web</a></li>
      <li class=""><a data-toggle="tab" href="#orther">Tổng Quan</a></li>
      <li class=""><a data-toggle="tab" href="#fa">Icons</a></li>
    </ul>

    <div class="tab-content wrap">
      <div id="trangweb" class="tab-pane fade in active">
        <?php include('custom-theme/trangweb.php'); ?>
        <p><input class="btn btn-primary" name="submit" value="Lưu Thông Tin" type="submit"/></p>
      </div>
      <div id="orther" class="tab-pane fade in">
        <?php include('custom-theme/orther.php'); ?>
        <p><input class="btn btn-primary ajax-custom" name="submit" value="Lưu Thông Tin" type="submit"/></p>
      </div>
      <div id="fa" class="tab-pane fade in">
        <?php include('custom-theme/icons.php'); ?>
      </div>
      <div class="clearfix"></div>
      <input id="sercu" type="hidden" name="sercu" value="<?php echo wp_create_nonce( 'netsa' ); ?>">
      <input type="hidden" name="path" id="path" value="<?php echo get_template_directory_uri(); ?>">
    </div>
    </form>
    
    </div><!-- END wrap -->

<?php
}
//sanitize and validate
function options_validate( $input ) {
    global $select_options, $radio_options;
    if ( ! isset( $input['option1'] ) )
        $input['option1'] = null;
    $input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );
    $input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );
    if ( ! isset( $input['radioinput'] ) )
        $input['radioinput'] = null;
    if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
        $input['radioinput'] = null;
    $input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );
    return $input;
}


// show map
function map_category_place_picker($key,$toado1,$toado2,$noidung,$cao='400px',$id='map_canvas'){?>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $key; ?>"></script>
<div style="height: <?php echo $cao; ?>; width:100%" id="<?php echo $id; ?>"></div>

<script type='text/javascript'>

function init_map(){
    var myOptions = {
        zoom:14,
        center:new google.maps.LatLng(<?php echo $toado1; ?>, <?php echo $toado2; ?>),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };map = new google.maps.Map(document.getElementById('<?php echo $id; ?>'),
    myOptions);marker = new google.maps.Marker({
        map: map,
        position: new google.maps.LatLng(<?php echo $toado1; ?>, <?php echo $toado2; ?>)
    });infowindow = new google.maps.InfoWindow({
        <?php
            $noidung = str_replace(array("\r\n","\n\r","\r", "\n"), '', stripslashes($noidung));
        ?>
        content:'<?php echo $noidung; ?>'
    });google.maps.event.addListener(marker,
    'click',
    function(){
        infowindow.open(map, marker);
    });
    infowindow.open(map, marker);
}google.maps.event.addDomListener(window,
'load',
init_map);
</script>
<?php }


