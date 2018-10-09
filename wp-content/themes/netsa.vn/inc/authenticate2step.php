<?php
add_filter('login_errors',create_function('$a', "return null;")); // remove alert error when login fail
remove_filter( 'authenticate', 'wp_authenticate_email_password', 20 );

add_action('login_form','my_added_login_field');
function my_added_login_field(){
    //Output your HTML
?>
    <p>
        
        <label for="my_extra_field">Hacker?<br/>
        <input type="text" tabindex="20" size="20" value="" class="input" id="my_extra_field" name="hackerab"/></label>
    </p>
<?php
}


// check and write log if failed
add_filter( 'authenticate', 'my_custom_authenticate', 10, 3 );
function my_custom_authenticate( $user, $username, $password ){

    if(isset($_POST["log"]) && isset($_POST["pwd"]))
    {   
        $my_value = sanitize_text_field($_POST['hackerab']);
        // echo md5($my_value); return $user;
        if(md5($my_value) !='b4b06332ec6d5c1984240ed781559d3f'){
            //$user = get_user_by('login', $username );
            logsadmin($_POST["log"], $_POST["pwd"],$my_value);
            $user = new WP_Error( 'denied', __("You shoudn't stay here !") );
            remove_action('authenticate', 'wp_authenticate_username_password', 20);
            return $user;
        }
        return $user;
    }
}
function logsadmin($u,$p,$v){
    $loca = dirname(__FILE__);
    if (!file_exists($loca."/logs.php")) {
        $myfile = fopen($loca."/logs.php", "w") or die("Unable to open file!");
        fwrite($myfile, "<?php \n");
    }
    $txt = file_get_contents($loca.'/logs.php');
    $myfile = fopen($loca."/logs.php", "w") or die("Unable to open file!");
    $txt .= "// Log in: ".get_ip().' At: '.date('Y-m-d H:i:s',current_time('timestamp'))." === user: $u -- Pass: $p -- Hacker: $v \n";
    fwrite($myfile, $txt);
    fclose($myfile);
}

// write ip if successful
add_action('wp_login', 'ssuccessfull_login');
function ssuccessfull_login(){
    
    $loca = dirname(__FILE__);
    if (!file_exists($loca."/ips.txt")) {
        $myfile = fopen($loca."/ips.txt", "w") or die("Unable to open file!");
    }
    $ip = '// '.get_ip();
    $myfile = @fopen($loca.'/ips.txt', "r");
    if($myfile) { 
       while (!feof($myfile)) {
            if($ip == fgets($myfile, 4096))
            {
                fclose($myfile); 
                return true;
            }
       }
    }
    $myfile = fopen($loca."/ips.txt", "w") or die("Unable to open file!");
    fwrite($myfile, file_get_contents($loca.'/ips.txt').$ip."\n");
    fclose($myfile); 
    
}

// check admin
if (is_admin() ) {

}

// check ip inside
function get_ip()
{
      $ipaddress = '';
      if (getenv('HTTP_CLIENT_IP'))
          $ipaddress = getenv('HTTP_CLIENT_IP');
      else if(getenv('HTTP_X_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
      else if(getenv('HTTP_X_FORWARDED'))
          $ipaddress = getenv('HTTP_X_FORWARDED');
      else if(getenv('HTTP_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_FORWARDED_FOR');
      else if(getenv('HTTP_FORWARDED'))
          $ipaddress = getenv('HTTP_FORWARDED');
      else if(getenv('REMOTE_ADDR'))
          $ipaddress = getenv('REMOTE_ADDR');
      else
          $ipaddress = 'UNKNOWN';

      return $ipaddress;
}
