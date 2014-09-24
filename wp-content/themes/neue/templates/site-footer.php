<?php $columns = explode( ',', vw_get_theme_option( 'site_footer_layout' ) ); ?>
<footer class="vw-site-footer vw-site-footer-style-default clearfix">
	<div class="container">
		<div class="row">
			<?php
			foreach ( $columns as $i => $column_size ) {
				$column_number = $i+1;
				
				printf( '<div class="vw-footer-sidebar vw-footer-sidebar-%s col-md-%s">', $column_number, $column_size );
				if ( is_active_sidebar( 'footer-sidebar-' . $column_number ) ) {
					dynamic_sidebar( 'footer-sidebar-' . $column_number );
				} else {
					vw_show_no_widget_warning();
				}
				echo '</div>';
			}
			?>
		</div>
	</div>
</footer>