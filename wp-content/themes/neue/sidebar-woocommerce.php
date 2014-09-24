<div class="sidebar-inner">
	<?php
	$sidebar = '';

	if ( is_product() ) {
		$sidebar = vw_get_theme_option( 'woocommerce_product_sidebar' );
	} else {
		$sidebar = vw_get_theme_option( 'woocommerce_shop_sidebar' );
	}
	
	dynamic_sidebar( $sidebar );
	?>
</div>