<?php
//register settings
function scan_init(){
    register_setting( 'scan', 'scan' );
}

//add settings page to menu
function add_scan_page() {
    add_menu_page( __( 'Scan Files' ), __( 'Scan Files' ), 'manage_options', 'scan', 'scan_page');
}

//add actions
add_action( 'admin_init', 'scan_init' );
add_action( 'admin_menu', 'add_scan_page' );

//define your variables
$color_scheme = array('default','blue','green',);

//start settings page
function scan_page()
{
    global $wpdb;
    $pathLen = 0;
    define('URL_BAK', substr(ABSPATH,0,-1));
    function prePad($level)
    {
        $ss = "";
        for ($ii = 0;  $ii < $level;  $ii++)
        {
            $ss = $ss . "|-------";
        }
        return $ss;
    }
    
    function myScanDir($dir, $level, $rootLen)
    {
        global $pathLen;
        global $count;
        if(empty($count)) $count=0;
        if ($handle = opendir($dir)) {
            $allFiles = array();
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    if (is_dir($dir . "/" . $entry))
                    {
                      $allFiles[] = "D: " . $dir . "/" . $entry;
                    }
                    else
                    {
                      $allFiles[] = "F: " . $dir . "/" . $entry;
                    }
                }
            }
            closedir($handle);
            natsort($allFiles);
            foreach($allFiles as $value)
            {
                $displayName = substr($value, $rootLen + 4);
                $fileName    = substr($value, 3);
                $linkName    = str_replace(" ", "%20", substr($value, $pathLen + 3));
                if (is_dir($fileName)) {
                    echo prePad($level) .$linkName . "<br>\n";
                    if(!strpos( $fileName, 'demo') && !strpos( $fileName, 'wp-content/cache' ))
                    {
                        myScanDir($fileName, $level + 1, strlen($fileName));
                    }
                } else {
                    $ext = pathinfo($displayName, PATHINFO_EXTENSION);
                    $allowed = array('jpg','jpeg','png','gif','ico');
                    if(!in_array( $ext, $allowed ) )
                    {
                        
                        if(!strpos( $linkName, '%20')){
                            echo prePad($level) . "<a title='$linkName' href='#' style=\"text-decoration:none;\">{$displayName} ( <span style='color:red'>".date ("d/m/Y H:i:s", filemtime(utf8_decode($linkName)))."</span> )</a><br>\n";
                            $count++;
                        }else
                        echo "MyScanDir: <p style='color:red'>$linkName => không được để có khoảng trắng trong tên file (ký hiệu: %20)</p>";
                        
                    }
                }
            }
        }
    }
    
    // function get list file
    function getlistfiles($dir, $level, $rootLen)
    {
        global $list;
        global $pathLen;
        if ($handle = opendir($dir)) {
            $allFiles = array();
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    if (is_dir($dir . $entry))
                    {
                        $allFiles[] = "D: " . $dir . "/" . $entry;
                    }
                    else
                    {
                        $allFiles[] = "F: " . $dir . "/" . $entry;
                    }
                }
            }
            closedir($handle);
            natsort($allFiles);
            foreach($allFiles as $value)
            {
                $displayName = substr($value, $rootLen + 4);
                $fileName    = substr($value, 3);
                $linkName    = str_replace(" ", "%20", substr($value, $pathLen + 3));
                if (is_dir($fileName)) {
                    if(!strpos( $fileName, 'demo') && !strpos( $fileName, 'wp-content/cache' ))
                    {
                        getlistfiles($fileName, $level + 1, strlen($fileName));
                    }
                } else {
                    $ext = pathinfo($displayName, PATHINFO_EXTENSION);
                    $allowed = array('jpg','jpeg','png','gif','ico');
                    if(!in_array( $ext, $allowed ) )
                    {
                        if(!strpos( $linkName, '%20')){
                            $list[] = array($linkName,$displayName);
                        }else
                        echo "Getlistfiles: <span style='color:red'>$linkName => không được để có khoảng trắng trong tên file (ký hiệu: %20)</span><br/>";
                    }
                }
            }
            return $list;
        }
    }
    
    // get localtion files
    function getdirectory($dir, $level, $rootLen)
    {
        global $list;
        global $pathLen;
        if ($handle = opendir($dir)) {
            $allFiles = array();
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    if (is_dir($dir . "/" . $entry))
                    {
                        $allFiles[] = "D: " . $dir . "/" . $entry;
                    }
                    else
                    {
                        $allFiles[] = "F: " . $dir . "/" . $entry;
                    }
                }
            }
            closedir($handle);
            natsort($allFiles);
            foreach($allFiles as $value)
            {
                $displayName = substr($value, $rootLen + 4);
                $fileName    = substr($value, 3);
                $linkName    = str_replace(" ", "%20", substr($value, $pathLen + 3));
                if (is_dir($fileName)) {
                    if(!strpos( $fileName, 'demo') && !strpos( $fileName, 'wp-content/cache' ))
                    {
                        getdirectory($fileName, $level + 1, strlen($fileName));
                    }
                } else {
                    $ext = pathinfo($displayName, PATHINFO_EXTENSION);
                    $allowed = array('jpg','jpeg','png','gif','ico');
                    if(!in_array( $ext, $allowed ) )
                    {
                        if(!strpos( $linkName, '%20')){
                            $list[] = $linkName;
                        }else
                        echo "Getdirectory:<span style='color:red'> $linkName => không được để có khoảng trắng trong tên file (ký hiệu: %20)</span><br/>";
                    }
                }
            }
            return $list;
        }
    }
    
    // get modifine files
    function getmodifine($dir, $level, $rootLen)
    {
        global $list;
        global $pathLen;
        if ($handle = opendir($dir)) {
            $allFiles = array();
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    if (is_dir($dir . "/" . $entry))
                    {
                        $allFiles[] = "D: " . $dir . "/" . $entry;
                    }
                    else
                    {
                        $allFiles[] = "F: " . $dir . "/" . $entry;
                    }
                }
            }
            closedir($handle);
            natsort($allFiles);
            foreach($allFiles as $value)
            {
                $displayName = substr($value, $rootLen + 4);
                $fileName    = substr($value, 3);
                $linkName    = str_replace(" ", "%20", substr($value, $pathLen + 3));
                if (is_dir($fileName)) {
                    if(!strpos( $fileName, 'demo') && !strpos( $fileName, 'wp-content/cache' ))
                    {
                        getmodifine($fileName, $level + 1, strlen($fileName));
                    }
                } else {
                    $ext = pathinfo($displayName, PATHINFO_EXTENSION);
                    $allowed = array('jpg','jpeg','png','gif','ico');
                    if(!in_array( $ext, $allowed ))
                    {
                        if(!strpos( $linkName, '%20')){
                            $list[$linkName] = date("Y-m-d H:i:s", filemtime(utf8_decode($linkName)));
                        }else
                        echo "Modifire: <span style='color:red'>$linkName => không được để có khoảng trắng trong tên file (ký hiệu: %20)</span><br/>";
                    }
                }
            }
            return $list;
        }
    }
    
    ?>
    <div id="main">

    <h1><center>Quản Lý Files</center></h1>
    <h4><center><?php echo date("Y-m-d H:i:s"); ?></center></h4>
    <a href="?page=scan&act=viewtree">Xem Danh Sách File</a> | 
    <a style="color:red" href="?page=scan&data">Data SQL</a> | <a href="?page=scan&act=new">Files Mới Thêm</a> | <a href="?page=scan&act=del">Files Bị Xóa</a> | 
    <a href="?page=scan&act=modife">Files Bị Sửa</a><br /><br />
    
    
    <?php
        
        // hien list file
        if(isset($_GET["act"]) && $_GET["act"] == "viewtree")
        {
            echo myScanDir(URL_BAK, 0, strlen(URL_BAK)); 
        }
        // hien list file
        if(isset($_GET["act"]) && $_GET["act"] == "logs")
        {
            
        }
        
        // nhap du lieu vao sql
        if(isset($_GET["data"]))
        {
            echo '================================================================<br /><br />';

        echo '<a href="?page=scan&data=add">thêm dữ liệu</a> | ';?>
        <a href="?page=scan&data=drop">Xóa Danh Sách</a> | <a href="?page=scan&data=update">Cập nhật files</a> <br />
        <?php
            if(isset($_GET["data"]) && $_GET["data"] == "add")
            {
                echo '<h3>Thêm thông tin mới</h3>';
                $connect= mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
                if (mysqli_connect_errno())
                {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                mysqli_query ("SET NAMES 'utf8'");
                
                // create the ECPT metabox database table
                if($wpdb->get_var("show tables like 'baseline'") != 'baseline') 
                {
                    $sql = "CREATE TABLE IF NOT EXISTS `baseline` (
                          `id` int(11) NOT NULL AUTO_INCREMENT,
                          `file_path` text COLLATE utf8_unicode_ci NOT NULL,
                          `file_hash` datetime NOT NULL,
                          `acct` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
                          PRIMARY KEY (`id`)
                        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6067 ;";
                    $result = mysqli_query($connect,$sql);
                    if (!$result)
                    {
                        die("Error description: " . mysqli_error($connect));
                    }
                    echo '<span style="color:red">Thêm bảng dữ liệu thành công</span><br/>';
                    //unset($sql);
                }

                $list = getlistfiles(URL_BAK, 0, strlen(URL_BAK));
                //echo '<pre>';
                //print_r($list);
                //echo '</pre>';
                
                $sql = "INSERT INTO baseline (file_path, file_hash, acct) VALUES ";
                for($yy = 0;$yy<count($list);$yy++)
                {
                    $path = $list[$yy][0];
                    $hash = date ("Y/m/d H:i:s", filemtime($list[$yy][0]));
                    $sql .= "('$path','$hash', 'notcheck'),";
                }
                $sql = substr($sql,0,-1);
                mysqli_query($connect,$sql);
                if (!$result)
                {
                    die("Error description: " . mysqli_error($connect));
                }
                echo 'Thêm dữ liệu thành công';
                mysqli_close($connect);
            }
            
            if(isset($_GET["data"]) && $_GET["data"] == "drop")
            {
                echo '<h3>Xóa Thông Tin Dữ Liệu</h3>';
                $connect= mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
                if (mysqli_connect_errno())
                {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                mysqli_query ("SET NAMES 'utf8'");
    
                $result = mysqli_query($connect,"DELETE from baseline");
                if (!$result)
                {
                    die("Error description: " . mysqli_error($connect));
                }
                echo 'Xóa dữ liệu thành công';
                mysqli_close($connect); 
            }
            if(isset($_GET["data"]) && $_GET["data"] == "update")
            {
                echo '<h3>Cập Nhật Thông Tin Dữ Liệu</h3>';
                $connect= mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
                if (mysqli_connect_errno())
                {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                mysqli_query ("SET NAMES 'utf8'");
    
                $result = mysqli_query($connect,"DELETE from baseline");
                if (!$result)
                {
                    echo ("Error description: " . mysqli_error($connect));
                }
                echo 'Xóa dữ liệu thành công<br/>'; 
                
                $list = getlistfiles(URL_BAK, 0, strlen(URL_BAK));
                $sql = "INSERT INTO baseline (file_path, file_hash, acct) VALUES ";
                for($yy = 0;$yy<count($list);$yy++)
                {
                    $path = $list[$yy][0];
                    $hash = date ("Y/m/d H:i:s", filemtime($list[$yy][0]));
                    $sql .= "('$path','$hash', 'notcheck'),";
                }
                $sql = substr($sql,0,-1);
                $result = mysqli_query($connect,$sql);
                if (!$result)
                {
                    echo("Error description: " . mysqli_error($connect));
                }
                echo 'Thêm dữ liệu thành công';
                mysqli_close($connect); 
            }
        }
        // xem file nao moi duoc tao
        if(isset($_GET["act"]) && $_GET["act"] == "new")
        {
            echo '<h3>Xem Các Files Mới</h3>';
            $connect= mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            if (mysqli_connect_errno())
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            mysqli_query ("SET NAMES 'utf8'");
            
            $list = getdirectory(URL_BAK, 0, strlen(URL_BAK));
            echo "<table border='0' cellpadding='5'>";
    
            $sql= "select * from baseline where 1=1";
            $result =  mysqli_query($connect,$sql) or die("Error description: " . mysqli_error($connect));
            if (!$result)
            {
                echo("Error description: " . mysqli_error($connect));
            }
            while($rows = mysqli_fetch_array($result))
            {
                $urlsql[] = $rows["file_path"];
            }
            //print_r($urlsql);
            mysqli_close($connect);
            $dif=array_diff($list,$urlsql);
            if(count($dif) == 0) echo '<span style="color:red">Không có files mới nào được thêm vào</span>';
            else{
                foreach($dif as $value) {
                  print str_replace("%20", " ",$value)." ( <span style='color:red'>".date ("Y/m/d H:i:s", filemtime($value))."</span> )<br/>";
                }
            }
        }
        
        //xem phan tu bi xoa
        if(isset($_GET["act"]) && $_GET["act"] == "del")
        {
            echo '<h3>Xem Các Files Bị Xóa</h3>';
            $connect= mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            if (mysqli_connect_errno())
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            mysqli_query ("SET NAMES 'utf8'");
            
            $list = getdirectory(URL_BAK, 0, strlen(URL_BAK));
                
            $sql= "select * from baseline where 1=1";
            $result =  mysqli_query($connect,$sql);
            if (!$result)
            {
                die("Error description: " . mysqli_error($connect));
            }
            while($rows = mysqli_fetch_array($result))
            {
                $urlsql[] = $rows["file_path"];
            }
            mysqli_close($connect);
            //echo '<pre>';
            //print_r($urlsql);
            //echo '</pre>';
            $dif=array_diff($urlsql,$list);
            if(count($dif) == 0) echo '<span style="color:red">Không có file nào bị xóa</span>';
            else
            {
                foreach($dif as $value) {
                  print str_replace("%20", " ",$value)." ( <span style='color:red'>".date ("Y/m/d H:i:s", filemtime($value))."</span> )<br/>";
                }
            }
            
        }
        
        // file bi sua doi noi dung
        if(isset($_GET["act"]) && $_GET["act"] == "modife")
        {
            echo '<h3>Xem Các Files Bị Sửa</h3>';
            $connect= mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            if (mysqli_connect_errno())
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            mysqli_query ("SET NAMES 'utf8'");
            
            $list = getmodifine(URL_BAK, 0, strlen(URL_BAK));
    
            $sql= "select * from baseline where 1=1";
            $result =  mysqli_query($connect,$sql);


            if (!$result)
            {
                die("Error description: " . mysqli_error($connect));
            }
            while($rows = mysqli_fetch_array($result))
            {
                $datesql[$rows["file_path"]] = $rows["file_hash"];
            }
            mysqli_close($connect);
            $dif=array_diff_assoc($datesql,$list);
            
            //echo '<pre>';
            //print_r($datesql);
            //echo '</pre>';
            if(count($dif) == 0) echo '<span style="color:red">Không có file nào bị sửa đổi</span>';
            else
            {
                foreach($dif as $key => $date) {
                  print str_replace("%20", " ",$key)." ( <span style='color:red'>".$date."</span> )<br/>";
                }
            } 
             
        }
}    ?>