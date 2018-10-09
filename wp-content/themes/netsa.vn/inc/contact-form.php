<?php
function deliver_mail() {
    // if the submit button is clicked, send the email
    if ( isset( $_POST['cf-submitted'] ) ) {
        // sanitize form values
        $quantam   = sanitize_text_field( $_POST["quantam"] );
        $title    = sanitize_text_field( $_POST["title"] );
        $fullname    = sanitize_text_field( $_POST["fullname"] );
        $email    = sanitize_text_field( $_POST["email"] );
        $tel    = sanitize_text_field( $_POST["tel"] );

        $message = '<strong>Tiêu Đề:</strong> '.$title.'<br/><strong>Tên:</strong> '.$fullname.'<br/><strong>Email:</strong> '.$email.'<br/><strong>Số ĐT:</strong> '.$tel.'<br/><strong>Thông Điệp:</strong> '.esc_textarea( $_POST["message"] );
 
        // get the blog administrator's email address
        $to = get_option( 'admin_email' );
 
        $headers = "Content-type: text/html;charset=utf-8" . "\r\nFrom: $fullname <$email>\r\n";
 
        // If email has been process for sending, display a success message
        if ( $result = wp_mail( $to, 'Liên Hệ Từ Trang SIGO.VN', $message, $headers ) ) { ?>
            <script type="text/javascript">alert("Thông điệp đã được gửi đi thành công");</script>
        <?php } else { ?>
            <p class="text-danger">
            <?php if (!$result) {
                global $ts_mail_errors;
                global $phpmailer;
                if (!isset($ts_mail_errors)) $ts_mail_errors = array();
                if (isset($phpmailer)) {
                    echo $ts_mail_errors[] = $phpmailer->ErrorInfo;
                }
            } ?>
            </p>
        <?php }   
    }
}

function html_form_code() { ?>
<form method="post" class="" id="">
  <div id="formlienhe" class=" mb-10px">
  <div class="bg">
    <span>Quý khách quan tâm về ? </span>
    <select id="quantam" name="quantam" class="pull-right">
      <option value="tư vấn">Tư vấn</option>
      <option value="trở thành tài xế">Trở thành tài xế</option>
      <option value="đăng ký nhà xe">Đăng ký nhà xe</option>
      <option value="hợp tác với SIGO">Hợp tác với SIGO</option>
      <option value="góp ý cải tiến">Góp ý cải tiến</option>
      <option value="khiếu nại - phản ánh">Khiếu nại - Phản Ánh</option>
    </select>
    <div class="clearfix"></div>
  </div>
  <div class="row-wrapper clearfix">
      <div class="label-wrapper">
          <label for="title">Tiêu đề</label>
          <strong class="required">*</strong>
      </div>
      <div class="input-wrapper">
              <input required id="title" name="title" class="input title" type="text" value="<?php isset( $_POST["title"] ) ? esc_attr( $_POST["title"] ) : '' ?>">
      </div>
  </div>
  <div class="row-wrapper clearfix">
      <div class="label-wrapper">
          <label for="message">Nội dung</label>
          <strong class="required">*</strong>
      </div>
      <div class="input-wrapper">
          <textarea id="message" name="message" class="textarea message" placeholder="Xin quý khách vui lòng mô tả chi tiết" required ><?php isset( $_POST["message"] ) ? esc_attr( $_POST["message"] ) : '' ?></textarea>
      </div>
  </div>
  <div class="row-wrapper clearfix">
      <div class="label-wrapper">
          <label for="fullname">Họ và tên</label>
          <strong class="required">*</strong>
      </div>
      <div class="input-wrapper">
          <input id="fullname" required name="fullname" class="input fullname" type="text" value="<?php isset( $_POST["fullname"] ) ? esc_attr( $_POST["fullname"] ) : '' ?>">
      </div>
  </div>
  <div class="row-wrapper clearfix">
      <div class="label-wrapper">
          <label for="email">Địa chỉ email</label>
      </div>
      <div class="input-wrapper">
          <input id="email" name="email" class="input" type="text" value="<?php isset( $_POST["email"] ) ? esc_attr( $_POST["email"] ) : '' ?>">
      </div>
  </div>
  <div class="row-wrapper clearfix">
      <div class="label-wrapper">
          <label for="tel">Số điện thoại</label>
      </div>
      <div class="input-wrapper">
          <input id="tel" name="tel" class="input tel" maxlength="11" type="text" value="<?php isset( $_POST["tel"] ) ? esc_attr( $_POST["tel"] ) : '' ?>">
      </div>
  </div>
  </div>
  <div class="text-center wow fadeInUp" data-wow-delay="1.5s">
    <button class="btn btn-info btn-lg rounded-0 border-0 w100" name="cf-submitted"><i class="fa fa-envelope" aria-hidden="true"></i>
Gửi</button>
  </div>
  <div class="clearfix"></div>
</form>
<?php }
function cf_shortcode() {
    ob_start();
    deliver_mail();
    html_form_code();
    return ob_get_clean();
}
add_shortcode( 'sitepoint_contact_form', 'cf_shortcode' );

?>