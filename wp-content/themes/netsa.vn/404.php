<?php get_header(); ?>
<div id="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p>','</p>');} ?>
			</div>
		</div>
	</div>
</div>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-mm-8 col-sm-push-3 col-mm-push-4">
				<h1 class="title-line">Không Tìm Thấy</h1>
				<div class="content"><p>Không tìm thấy nội dung bạn đang xem trên hệ thống, bạn hãy thử lại hoặc liên hệ với người quản lý website để biết thêm chi tiết.</p></div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>