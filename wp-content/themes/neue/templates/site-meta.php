<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<meta name="description" content="<?php bloginfo('description'); ?>">

<meta charset="<?php bloginfo('charset'); ?>">

<link href="//www.google-analytics.com" rel="dns-prefetch">

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes">

<?php $fav_icon_url = vw_get_theme_option( 'fav_icon_url' );
if( ! empty( $fav_icon_url['url'] ) ) : ?><link rel="shortcut icon" href="<?php echo esc_url( $fav_icon_url['url'] ); ?>"><?php endif; ?>
		
<?php $fav_icon_iphone_url = vw_get_theme_option( 'fav_icon_iphone_url' );
if( ! empty( $fav_icon_iphone_url['url'] ) ) : ?><link rel="apple-touch-icon" href="<?php echo esc_url( $fav_icon_iphone_url['url'] ); ?>"><?php endif; ?>

<?php $fav_icon_iphone_retina_url = vw_get_theme_option( 'fav_icon_iphone_retina_url' );
if( ! empty( $fav_icon_iphone_retina_url['url'] ) ) : ?><link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url( $fav_icon_iphone_retina_url['url'] ); ?>"><?php endif; ?>

<?php $fav_icon_ipad_url = vw_get_theme_option( 'fav_icon_ipad_url' );
if( ! empty( $fav_icon_ipad_url['url'] ) ) : ?><link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url( $fav_icon_ipad_url['url'] ); ?>"><?php endif; ?>

<?php $fav_icon_ipad_retina_url = vw_get_theme_option( 'fav_icon_ipad_retina_url' );
if( ! empty( $fav_icon_ipad_retina_url['url'] ) ) : ?><link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url( $fav_icon_ipad_retina_url['url'] ); ?>"><?php endif; ?>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->