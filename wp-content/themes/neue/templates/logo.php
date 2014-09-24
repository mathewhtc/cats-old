<div class="vw-site-logo-wrapper">
	<a class="vw-site-logo-link" href="<?php echo home_url(); ?>">
		<?php $site_logo = vw_get_theme_option( 'site_logo' ); ?>
		<?php $site_logo_2x = vw_get_theme_option( 'site_logo_2x' ); ?>

		<!-- Site Logo -->
		<?php if ( ! empty( $site_logo[ 'url' ] ) ): ?>

			<!-- Retina Site Logo -->
			<?php if ( ! empty( $site_logo_2x[ 'url' ] ) ): ?>
				<img class="vw-site-logo-2x" src="<?php echo $site_logo_2x[ 'url' ]; ?>" width="<?php echo $site_logo[ 'width' ] ?>" height="<?php echo $site_logo[ 'height' ] ?>" alt="<?php bloginfo( 'name' ); ?>">
			<?php endif; ?>

			<img class="vw-site-logo" src="<?php echo $site_logo[ 'url' ]; ?>" width="<?php echo $site_logo[ 'width' ] ?>" height="<?php echo $site_logo[ 'height' ] ?>" alt="<?php bloginfo( 'name' ); ?>">

		<?php else: ?>

			<h1 class="vw-site-title"><?php bloginfo( 'name' ); ?></h1>
			
			<?php if ( get_bloginfo( 'description' ) ): ?>
				<h2 class="vw-site-tagline"><?php bloginfo( 'description' ) ?></h2>
			<?php endif; ?>

		<?php endif; ?>
	</a>

	<!-- <div class="vw-site-tagline "></div> -->
</div>