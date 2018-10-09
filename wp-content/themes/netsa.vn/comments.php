<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
    _e('Không được tải trang này trực tiếp','netsa'); die;
}

if ( post_password_required() ) { ?>
    <p class="nocomments"><?php _e('Bài viết này đã được bảo vệ bằng password, hãy nhập password để xem bài viết.','netsa'); ?></p>
<?php
    return;
}

// Customize Comment Output
function twbs_comment_format($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>

    <li <?php comment_class('media'); ?> id="comment-<?php comment_ID(); ?>">
        <article class="mb-15px">
            <div class="comment-meta pull-left">
                <?php echo get_avatar( $comment, 96 ); ?>
                
            </div> <!-- .comment-meta -->
            <div class="comment-content media-body">
                <p class="comment-date text-muted ">
                <span class="red"><?php comment_author_link(); ?></span> | 
                <?php echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) . ' trước'; ?> &nbsp;<a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>" title="đường dẫn bình luận"><i class="icon-link"></i></a>
                </p>
                <?php if ($comment->comment_approved == '0') { // Awaiting Moderation ?>
                    <em><?php _e('Bình luận của bạn phải đợi duyệt bởi Admin.') ?></em>
                <?php } ?>
                <?php comment_text(); ?>
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<i class="fa fa-reply"></i>&nbsp; Trả lời' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>
            </div> <!-- .comment-content -->
        </article>
<?php } // twbs_comment_format 
// Add Class to Gravatar
add_filter('get_avatar', 'twbs_avatar_class');
function twbs_avatar_class($class) {
    $class = str_replace("class='avatar", "class='avatar img-circle media-object", $class);
    return $class;
}

// Add Class to Comment Reply Link
add_filter('comment_reply_link', 'twbs_reply_link_class');
function twbs_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='comment-reply-link btn btn-default btn-xs", $class);
    return $class;
}

if ( have_comments() ) : ?>
    <h4 id="comments" class="mb-15px">
        <i class="icon-comments-alt icon-large"></i>&nbsp; <?php comments_number('0 bình luận', '1 bình luận', '% bình luận' ); ?> 
        <a class="btn btn-sm btn-primary pull-right" href="#respond"><i class="fa fa-pencil"></i>&nbsp; Viết Bình Luận</a>
    </h4>
    <ol class="comment-list media-list mb-15px">
        <?php wp_list_comments('callback=twbs_comment_format'); ?>
    </ol>
    <ul class="pager">
        <li><?php previous_comments_link('<i class="fa fa-chevron-left"></i>&nbsp; Cũ Hơn'); ?></li>
        <li><?php next_comments_link('Mới Hơn &nbsp;<i class="fa fa-chevron-right"></i>'); ?></li>
    </ul>
<?php endif; ?>


<?php if ( comments_open() ) : ?>
<div id="respond">
    <h3 class="mb-15px title-line"><?php comment_form_title( 'Gửi Bình Luận', 'Gửi Bình Luận Đến %s' ); ?></h4>

    <div class="cancel-comment-reply">
    <?php cancel_comment_reply_link('<i class="fa fa-times"></i>'); ?>
    </div>

    <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
    <p class="mb-10px">Bạn phải <a href="<?php echo wp_login_url( get_permalink() ); ?>">đăng nhập</a> để đăng bình luận.</p>
    <?php else : ?>

    <form role="form" class="form-horizontal row mb-15px" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

        <?php if ( is_user_logged_in() ) : ?>

        <p class="mb-10px col-sm-12">Đã đăng nhập bởi <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>">Thoát</a></p>

        <?php else : ?>


        <div class="col-sm-6 ">
            <div class="md-input">
              <input value="<?php echo esc_attr($comment_author); ?>" type="text" class="md-form-control" tabindex="1" name="author" required >
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Name</label>
            </div>
        </div><!-- .form-group -->

    
        <div class="col-sm-6">
            <div class="md-input">
              <input value="<?php echo esc_attr($comment_author_email); ?>" type="text" class="md-form-control" tabindex="2" name="email" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Email</label>
            </div>
        </div><!-- .form-group -->

        
        <!-- <div class="col-sm-4">
            <div class="md-input">
              <input value="<?php echo esc_attr($comment_author_url); ?>" type="text" class="md-form-control" tabindex="3" name="url" <?php if ($req) echo "aria-required='true'"; ?>>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Website</label>
            </div>
        </div>-->

        
        <?php endif; ?>
        <div class="col-sm-12">
            <div class="md-input">
              <input type="text" class="md-form-control" tabindex="3" name="comment" required>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label><?php _e('Bình luận','netsa'); ?></label>
            </div>
            <!-- <span class="help-block"><small>Bạn có thể sử dụng thẻ HTML:<br /><code><?php echo allowed_tags(); ?></code></small></span> -->
        </div><!-- .form-group -->
    
        <div class="col-md-12">
            <button class="btn btn-success " tabindex="5"><i class="fa fa-comments"></i> <?php _e('Đăng Bình Luận','netsa'); ?></button>
            <?php comment_id_fields(); ?>
        </div>
        <?php do_action('comment_form', $post->ID); ?>
    </form>
    <?php endif; // If registration required and not logged in ?>

</div> <!-- #respond -->
<?php endif; ?>