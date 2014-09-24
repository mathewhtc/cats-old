<nav class="vw-menu-mobile-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				<div class="vw-menu-mobile-inner">
					<div class="vw-mobile-menu-button">
						<i class="icon-entypo-menu"></i> <?php _e( 'Navigation', 'envirra' ); ?>
					</div>

					<?php
					if ( has_nav_menu('vw_menu_mobile' ) ) {
						wp_nav_menu( apply_filters( 'vw_filter_navigation_mobile_args', array(
							'theme_location' => 'vw_menu_mobile',
							'container' => false,
							'menu_class' => 'vw-menu vw-menu-location-mobile vw-menu-type-vertical-text clearfix',
							'link_before' => '<span>',
							'link_after' => '</span>',
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth' => 3,
							'walker' => new Vw_Walker_Nav_Text_Menu()
						) ) );
					}
					?>

					<?php vw_the_menu_icons(); ?>
					
				</div>

			</div>

		</div>
	</div>
</nav>