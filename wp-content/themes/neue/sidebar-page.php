<div class="sidebar-inner">
	<?php 
		$page_sidebar = get_post_meta( get_queried_object_id(), 'page_sidebar', true );
		if ( empty( $page_sidebar ) ) {
			$page_sidebar = 'page-sidebar';
		}
		dynamic_sidebar( $page_sidebar );
	?>
</div>