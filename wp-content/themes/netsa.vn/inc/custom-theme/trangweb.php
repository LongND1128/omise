<?php
$wcatTerms = get_terms('category', array('hide_empty' => 0));
$wcatTerms2 = get_terms('product_cat', array('hide_empty' => 0));
$settings = array(
    'wpautop' => true,
    'media_buttons' =>  true,
    'textarea_rows' => get_option('default_post_edit_rows', 10),
    'tabindex' => '',
    'editor_css' => '',
    'editor_class' => '',
    'teeny' => false,
    'dfw' => true,
    'tinymce' => array(
          'theme_advanced_buttons1' => 'bold,italic,underline,bullist,numlist,link,unlink,forecolor,undo,redo'
    ),
    'quicktags' => false
);
?>
<div class="row">
	<div class="panel-group" id="accordion">
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        <h4 class="panel-title">
	          <a data-toggle="collapse" data-parent="#accordion" href="#chung">Chung</a>
	        </h4>
	      </div>
	      <div id="chung" class="panel-collapse collapse in">
	        <div class="panel-body">
	        	<div class="row">
		        	<div class="col-sm-4 form-group">
						<label for="">Logo</label>
						<div class="group-image input-group">
						 	<input  type="text" name="theme_settings[logo]" class="image form-control" value="<?php esc_attr_e( $options['logo'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Logo Mobile</label>
						<div class="group-image input-group">
						 	<input  type="text" name="theme_settings[logom]" class="image form-control" value="<?php esc_attr_e( $options['logom'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Favicon</label>
						<div class="group-image input-group">
						 	<input  type="text" name="theme_settings[favicon]" class="image form-control" value="<?php esc_attr_e( $options['favicon'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Hotline</label>
						<input type="text" name="theme_settings[hotline]" class="form-control"  value="<?php esc_attr_e( $options['hotline'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Email</label>
						<input type="text" name="theme_settings[email]" class="form-control"  value="<?php esc_attr_e( $options['email'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Fanpage</label>
						<input type="text" name="theme_settings[fanpage]" class="form-control"  value="<?php esc_attr_e( $options['fanpage'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Google+</label>
						<input type="text" name="theme_settings[google]" class="form-control"  value="<?php esc_attr_e( $options['google'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Twitter</label>
						<input type="text" name="theme_settings[twitter]" class="form-control"  value="<?php esc_attr_e( $options['twitter'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Link Chat Zalo</label>
						<input type="text" placeholder="http://zalo.me/so-dien-thoai-zalo" name="theme_settings[zalo]" class="form-control"  value="<?php esc_attr_e( $options['zalo'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Link Chat Facebook</label>
						<input placeholder="http://m.me/ten-nick-facebook" type="text" name="theme_settings[lfacebook]" class="form-control"  value="<?php esc_attr_e( $options['lfacebook'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Ifarme Map</label>
						<input type="text" name="theme_settings[map]" class="form-control"  value="<?php esc_attr_e( $options['map'] ); ?>">
					</div>
					<div class="col-sm-12">
						<label for="">Ghi chú sản phẩm</label>
						<textarea class="form-control ckedit" name="theme_settings[ndLH]" id="" cols="30" rows="10"><?php esc_attr_e( $options['ndLH'] ); ?></textarea>
						<script type="text/javascript">CKEDITOR.replace('theme_settings[ndLH]'); </script>
					</div>
					<!-- <div class="col-sm-6 form-group">
						<label for="">Link Banner 1</label>
						<input type="text" name="theme_settings[linkbn1]" class="form-control"  value="<?php esc_attr_e( $options['linkbn1'] ); ?>">
					</div>
					<div class="col-sm-12">
						<label for="">Thông Báo Chung Cho Khách</label>
						<?php $settings['textarea_name'] = 'theme_settings[ndkhach]'; wp_editor($options['ndkhach'], 'test-editor', $settings ); ?>
					</div>


					<div class="col-sm-4 form-group">
						<label for="">Trang Liên Hệ</label>
						<?php wp_dropdown_pages(array('class'=>'form-control','name'=>'theme_settings[plh]','selected'=>$options['plh'])); ?>
					</div>

					-->
				</div>
	        </div>
	      </div>
	    </div><!-- panel-default -->
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        <h4 class="panel-title">
	          <a data-toggle="collapse" data-parent="#accordion" href="#slider">Slider</a>
	        </h4>
	      </div>
	      <div id="slider" class="panel-collapse collapse">
	        <div class="panel-body">
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="">Slider 1 580x372</label>
						<div class="group-image input-group">
						 	<input type="text" name="theme_settings[slider1]" class="image form-control" value="<?php esc_attr_e( $options['slider1'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Slider 2 580x372</label>
						<div class="group-image input-group">
						 	<input type="text" name="theme_settings[slider2]" class="image form-control" value="<?php esc_attr_e( $options['slider2'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Slider 3 580x372</label>
						<div class="group-image input-group">
						 	<input type="text" name="theme_settings[slider3]" class="image form-control" value="<?php esc_attr_e( $options['slider3'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Slider 4 580x372</label>
						<div class="group-image input-group">
						 	<input type="text" name="theme_settings[slider4]" class="image form-control" value="<?php esc_attr_e( $options['slider4'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Slider 5 580x372</label>
						<div class="group-image input-group">
						 	<input type="text" name="theme_settings[slider5]" class="image form-control" value="<?php esc_attr_e( $options['slider5'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Slider 6 580x372</label>
						<div class="group-image input-group">
						 	<input type="text" name="theme_settings[slider6]" class="image form-control" value="<?php esc_attr_e( $options['slider6'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Link Slider 1</label>
						<input type="text" name="theme_settings[linksl1]" class="form-control"  value="<?php esc_attr_e( $options['linksl1'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Link Slider 2</label>
						<input type="text" name="theme_settings[linksl2]" class="form-control"  value="<?php esc_attr_e( $options['linksl2'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Link Slider 3</label>
						<input type="text" name="theme_settings[linksl3]" class="form-control"  value="<?php esc_attr_e( $options['linksl3'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Link Slider 4</label>
						<input type="text" name="theme_settings[linksl4]" class="form-control"  value="<?php esc_attr_e( $options['linksl4'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Link Slider 5</label>
						<input type="text" name="theme_settings[linksl5]" class="form-control"  value="<?php esc_attr_e( $options['linksl5'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Link Slider 6</label>
						<input type="text" name="theme_settings[linksl6]" class="form-control"  value="<?php esc_attr_e( $options['linksl6'] ); ?>">
					</div>
				</div>
	        </div>
	      </div>
	    </div><!-- panel-default -->
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        <h4 class="panel-title">
	          <a data-toggle="collapse" data-parent="#accordion" href="#bnhome">Banner Slider</a>
	        </h4>
	      </div>
	      <div id="bnhome" class="panel-collapse collapse">
	        <div class="panel-body">
	        	<div class="row">
	        		<div class="col-sm-4 form-group">
						<label for="">Banner 1 377x150</label>
						<div class="group-image input-group">
						 	<input type="text" name="theme_settings[bnsl1]" class="image form-control" value="<?php esc_attr_e( $options['bnsl1'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Banner 2 377x150</label>
						<div class="group-image input-group">
						 	<input type="text" name="theme_settings[bnsl2]" class="image form-control" value="<?php esc_attr_e( $options['bnsl2'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Banner 3 377x150</label>
						<div class="group-image input-group">
						 	<input type="text" name="theme_settings[bnsl3]" class="image form-control" value="<?php esc_attr_e( $options['bnsl3'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Link Banner 1</label>
						<input type="text" name="theme_settings[lbnsl1]" class="form-control"  value="<?php esc_attr_e( $options['lbnsl1'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Link Banner 2</label>
						<input type="text" name="theme_settings[lbnsl2]" class="form-control"  value="<?php esc_attr_e( $options['lbnsl2'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Link Banner 3</label>
						<input type="text" name="theme_settings[lbnsl3]" class="form-control"  value="<?php esc_attr_e( $options['lbnsl3'] ); ?>">
					</div>

	        	</div>
	        </div>
	      </div>
	    </div><!-- panel-default -->
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        <h4 class="panel-title">
	          <a data-toggle="collapse" data-parent="#accordion" href="#home">Trang Chủ</a>
	        </h4>
	      </div>
	      <div id="home" class="panel-collapse collapse">
	        <div class="panel-body">
				<div class="row">
					<div class="col-sm-4 form-group">
				    	<label for="">Nhóm SP 1</label>
				    	<select name="theme_settings[cat1]" class="form-control">
				    	<?php foreach($wcatTerms2 as $wcatTerm){ ?>
						<option <?php if($options['cat1']==$wcatTerm->term_id) echo 'selected'; ?> value="<?php echo $wcatTerm->term_id; ?>"><?php echo $wcatTerm->name; ?> (<?php echo $wcatTerm->count; ?>)</option>
				    	<?php } ?>
				    	</select>
				    </div>
				    <div class="col-sm-4 form-group">
				    	<label for="">Nhóm SP 2</label>
				    	<select name="theme_settings[cat2]" class="form-control">
				    	<?php foreach($wcatTerms2 as $wcatTerm){ ?>
						<option <?php if($options['cat2']==$wcatTerm->term_id) echo 'selected'; ?> value="<?php echo $wcatTerm->term_id; ?>"><?php echo $wcatTerm->name; ?> (<?php echo $wcatTerm->count; ?>)</option>
				    	<?php } ?>
				    	</select>
				    </div>
				    <div class="col-sm-4 form-group">
				    	<label for="">Nhóm SP 3</label>
				    	<select name="theme_settings[cat3]" class="form-control">
				    	<?php foreach($wcatTerms2 as $wcatTerm){ ?>
						<option <?php if($options['cat3']==$wcatTerm->term_id) echo 'selected'; ?> value="<?php echo $wcatTerm->term_id; ?>"><?php echo $wcatTerm->name; ?> (<?php echo $wcatTerm->count; ?>)</option>
				    	<?php } ?>
				    	</select>
				    </div>
					<div class="col-sm-4 form-group">
						<label for="">Banner Dài 1</label>
						<div class="group-image input-group">
						 	<input  type="text" name="theme_settings[bnd1]" class="image form-control" value="<?php esc_attr_e( $options['bnd1'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Banner Dài 2</label>
						<div class="group-image input-group">
						 	<input  type="text" name="theme_settings[bnd2]" class="image form-control" value="<?php esc_attr_e( $options['bnd2'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Banner Dài 3</label>
						<div class="group-image input-group">
						 	<input  type="text" name="theme_settings[bnd3]" class="image form-control" value="<?php esc_attr_e( $options['bnd3'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Link Banner Dài 1</label>
						<input type="text" name="theme_settings[lbnd1]" class="form-control"  value="<?php esc_attr_e( $options['lbnd1'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Link Banner Dài 2</label>
						<input type="text" name="theme_settings[lbnd2]" class="form-control"  value="<?php esc_attr_e( $options['lbnd2'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Link Banner Dài 3</label>
						<input type="text" name="theme_settings[lbnd3]" class="form-control"  value="<?php esc_attr_e( $options['lbnd3'] ); ?>">
					</div>
                    <div class="col-sm-4 form-group">
                        <label for="">Ảnh Cam Kết</label>
                        <div class="group-image input-group">
                            <input  type="text" name="theme_settings[ack]" class="image form-control" value="<?php esc_attr_e( $options['ack'] ); ?>">
                            <div class="input-group-btn">
                            <button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
                            <button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
                            </div>
                         </div>
                    </div>
					<div class="col-sm-4 form-group">
				    	<label for="">Nhóm Tin Home</label>
				    	<select name="theme_settings[cath]" class="form-control">
				    	<?php foreach($wcatTerms as $wcatTerm){ ?>
						<option <?php if($options['cath']==$wcatTerm->term_id) echo 'selected'; ?> value="<?php echo $wcatTerm->term_id; ?>"><?php echo $wcatTerm->name; ?> (<?php echo $wcatTerm->count; ?>)</option>
				    	<?php } ?>
				    	</select>
				    </div>
				</div>
	        </div>
	      </div>
	    </div><!-- panel-default -->
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        <h4 class="panel-title">
	          <a data-toggle="collapse" data-parent="#accordion" href="#banner">Banner</a>
	        </h4>
	      </div>
	      <div id="banner" class="panel-collapse collapse">
	        <div class="panel-body">
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="">Banner Top</label>
						<div class="group-image input-group">
						 	<input  type="text" name="theme_settings[bntop]" class="image form-control" value="<?php esc_attr_e( $options['bntop'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Banner Top Mobile</label>
						<div class="group-image input-group">
						 	<input  type="text" name="theme_settings[bntopm]" class="image form-control" value="<?php esc_attr_e( $options['bntopm'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Link Banner Top</label>
						<input type="text" name="theme_settings[lbntop]" class="form-control"  value="<?php esc_attr_e( $options['lbntop'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Banner Nhóm SP</label>
						<div class="group-image input-group">
						 	<input type="text" name="theme_settings[bnnsp]" class="image form-control" value="<?php esc_attr_e( $options['bnnsp'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Link Banner Nhóm SP</label>
						<input type="text" name="theme_settings[lbnnsp]" class="form-control"  value="<?php esc_attr_e( $options['lbnnsp'] ); ?>">
					</div>
				</div>
	        </div>
	      </div>
	    </div><!-- panel-default -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#logof">Logo Đối Tác</a>
            </h4>
          </div>
          <div id="logof" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-3 form-group">
                        <label for="">Logo Footer 1</label>
                        <div class="group-image input-group">
                            <input type="text" name="theme_settings[logof1]" class="image form-control" value="<?php esc_attr_e( $options['logof1'] ); ?>">
                            <div class="input-group-btn">
                            <button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
                            <button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
                            </div>
                         </div>
                    </div>
                    <div class="col-sm-3 form-group">
                        <label for="">Logo Footer 2</label>
                        <div class="group-image input-group">
                            <input type="text" name="theme_settings[logof2]" class="image form-control" value="<?php esc_attr_e( $options['logof2'] ); ?>">
                            <div class="input-group-btn">
                            <button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
                            <button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
                            </div>
                         </div>
                    </div>
                    <div class="col-sm-3 form-group">
                        <label for="">Logo Footer 3</label>
                        <div class="group-image input-group">
                            <input type="text" name="theme_settings[logof3]" class="image form-control" value="<?php esc_attr_e( $options['logof3'] ); ?>">
                            <div class="input-group-btn">
                            <button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
                            <button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
                            </div>
                         </div>
                    </div>
                    <div class="col-sm-3 form-group">
                        <label for="">Logo Footer 4</label>
                        <div class="group-image input-group">
                            <input type="text" name="theme_settings[logof4]" class="image form-control" value="<?php esc_attr_e( $options['logof4'] ); ?>">
                            <div class="input-group-btn">
                            <button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
                            <button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
                            </div>
                         </div>
                    </div>
                    <div class="col-sm-3 form-group">
                        <label for="">Logo Footer 5</label>
                        <div class="group-image input-group">
                            <input type="text" name="theme_settings[logof5]" class="image form-control" value="<?php esc_attr_e( $options['logof5'] ); ?>">
                            <div class="input-group-btn">
                            <button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
                            <button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
                            </div>
                         </div>
                    </div>
                    <div class="col-sm-3 form-group">
                        <label for="">Logo Footer 6</label>
                        <div class="group-image input-group">
                            <input type="text" name="theme_settings[logof6]" class="image form-control" value="<?php esc_attr_e( $options['logof6'] ); ?>">
                            <div class="input-group-btn">
                            <button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
                            <button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
                            </div>
                         </div>
                    </div>
                    <div class="col-sm-3 form-group">
                        <label for="">Logo Footer 7</label>
                        <div class="group-image input-group">
                            <input type="text" name="theme_settings[logof7]" class="image form-control" value="<?php esc_attr_e( $options['logof7'] ); ?>">
                            <div class="input-group-btn">
                            <button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
                            <button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
                            </div>
                         </div>
                    </div>
                    <div class="col-sm-3 form-group">
                        <label for="">Logo Footer 8</label>
                        <div class="group-image input-group">
                            <input type="text" name="theme_settings[logof8]" class="image form-control" value="<?php esc_attr_e( $options['logof8'] ); ?>">
                            <div class="input-group-btn">
                            <button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
                            <button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
          </div>
        </div><!-- panel-default -->
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        <h4 class="panel-title">
	          <a data-toggle="collapse" data-parent="#accordion" href="#footer">Footer</a>
	        </h4>
	      </div>
	      <div id="footer" class="panel-collapse collapse">
	        <div class="panel-body">
				<div class="row">
					<div class="col-sm-4 form-group">
						<label for="">Link Liên Hệ</label>
						<input type="text" name="theme_settings[linklh]" class="form-control"  value="<?php esc_attr_e( $options['linklh'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Logo Footer</label>
						<div class="group-image input-group">
						 	<input type="text" name="theme_settings[flogo]" class="image form-control" value="<?php esc_attr_e( $options['flogo'] ); ?>">
						 	<div class="input-group-btn">
						 	<button type="button" class="btn btn-default upload-btn"><span class="glyphicon glyphicon glyphicon-camera"></span></button>
						 	<button type="button" class="btn btn-danger remove-image"><span class="glyphicon glyphicon glyphicon-remove"></span></button>
						 	</div>
						 </div>
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Giới Thiệu Ngắn</label>
						<input type="text" name="theme_settings[gtfoot]" class="form-control"  value="<?php esc_attr_e( $options['gtfoot'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Địa Chỉ</label>
						<input type="text" name="theme_settings[dc]" class="form-control"  value="<?php esc_attr_e( $options['dc'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">SĐT Footer</label>
						<input type="text" name="theme_settings[sdt]" class="form-control"  value="<?php esc_attr_e( $options['sdt'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Web</label>
						<input type="text" name="theme_settings[web]" class="form-control"  value="<?php esc_attr_e( $options['web'] ); ?>">
					</div>
					<div class="col-sm-4 form-group">
						<label for="">Giờ Làm Việc</label>
						<input type="text" name="theme_settings[glv]" class="form-control"  value="<?php esc_attr_e( $options['glv'] ); ?>">
					</div>

				</div>
	        </div>
	      </div>
	    </div><!-- panel-default -->
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        <h4 class="panel-title">
	          <a data-toggle="collapse" data-parent="#accordion" href="#ctsp">Chi Tiết SP</a>
	        </h4>
	      </div>
	      <div id="ctsp" class="panel-collapse collapse">
	        <div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<label for="">Ghi chú sản phẩm</label>
						<textarea class="form-control ckedit" name="theme_settings[gcsp]" id="" cols="30" rows="10"><?php esc_attr_e( $options['gcsp'] ); ?></textarea>
						<script type="text/javascript">CKEDITOR.replace('theme_settings[gcsp]'); </script>
					</div>
				</div>
	        </div>
	      </div>
	    </div><!-- panel-default -->
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        <h4 class="panel-title">
	          <a data-toggle="collapse" data-parent="#accordion" href="#sb">Sidebar</a>
	        </h4>
	      </div>
	      <div id="sb" class="panel-collapse collapse">
	        <div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<label for="">Ghi chú sản phẩm</label>
						<textarea class="form-control ckedit" name="theme_settings[gcsp]" id="" cols="30" rows="10"><?php esc_attr_e( $options['gcsp'] ); ?></textarea>
						<script type="text/javascript">CKEDITOR.replace('theme_settings[gcsp]'); </script>
					</div>
				</div>
	        </div>
	      </div>
	    </div><!-- panel-default -->
    </div>
</div>
