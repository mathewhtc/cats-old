<?php

if ( ! defined( 'VW_CONST_SOCIAL_COUNTER_CACHE_EXPIRE' ) ) define( 'VW_CONST_SOCIAL_COUNTER_CACHE_EXPIRE', 14400 ); // 60*60*4 = 4 Hrs cache

add_action( 'widgets_init', 'vw_widgets_init_social_counter' );
if ( ! function_exists( 'vw_widgets_init_social_counter' ) ) {
	function vw_widgets_init_social_counter() {
		register_widget( 'Vw_widget_social_counter' );
	}
}

if ( ! class_exists( 'Vw_widget_social_counter' ) ) {
	class Vw_widget_social_counter extends WP_Widget {
		private $default = array(
			'title' => '',
			'twitter' => '',
			'twitter_key' => 'l9e7w4GDJUOvjhNPzGU4Kw',
			'twitter_secret' => 'N1wS0SXR5m41R2fsSm80YO8ymrFGA42X1GuVNVKFgo',
			'facebook' => '',
			'youtube' => '',
			'googleplus' => '',
			'is_saved' => false,
		);

		public function __construct() {
			// widget actual processes
			parent::__construct(
		 		'vw_widget_social_counter', // Base ID
				VW_THEME_NAME.': Social Counter', // Name
				array( 'description' => 'Display social icon with counter' ) // Args
			);
		}

		function widget( $args, $instance ) {
			extract($args);

			if ( function_exists( 'icl_t' ) ) {
				$instance['title'] = icl_t( VW_THEME_NAME.' Widget', $this->id.'_title', $instance['title'] );
			}

			$title_html = '';
			if ( ! empty( $instance['title'] ) ) {
				$title_html = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base);
			}

			$twitter = strip_tags( $instance['twitter'] );
			$twitter_key = strip_tags( $instance['twitter_key'] );
			$twitter_secret = strip_tags( $instance['twitter_secret'] );
			$facebook = strip_tags( $instance['facebook'] );
			$youtube = strip_tags( $instance['youtube'] );
			$googleplus = strip_tags( $instance['googleplus'] );

			echo $before_widget;
			if ( $instance['title'] ) echo $before_title . $title_html . $after_title;

			if ( $twitter ) {
				$twitter_count = vw_get_twitter_count( $twitter, $twitter_key, $twitter_secret );
				?>
					<div class="vw-social-counter vw-social-counter-twitter">
						<a class="vw-social-counter-icon" href="<?php echo esc_attr( $twitter_count['page_url'] ); ?>" title="<?php esc_attr_e( 'Follow our twitter', 'envirra' ) ?>" target="_blank"><i class="icon-social-twitter"></i></a>
						<div class="vw-social-counter-counter">
							<div class="vw-social-counter-count"><?php echo number_format( $twitter_count['followers_count'] ); ?></div>
							<div class="vw-social-counter-unit"><?php _e( 'Followers', 'envirra' ) ?></div>
						</div>
						<div class="clearfix"></div>
					</div>
				<?php
			}

			if ( $facebook ) {
				$facebook_count = vw_get_facebook_count( $facebook );
				?>
					<div class="vw-social-counter vw-social-counter-facebook">
						<a class="vw-social-counter-icon" href="<?php echo esc_attr( $facebook_count['page_url'] ); ?>" title="<?php esc_attr_e( 'Like our facebook', 'envirra' ) ?>" target="_blank"><i class="icon-social-facebook"></i></a>
						<div class="vw-social-counter-counter">
							<div class="vw-social-counter-count"><?php echo number_format( $facebook_count['fans_count'] ); ?></div>
							<div class="vw-social-counter-unit"><?php _e( 'Fans', 'envirra' ) ?></div>
						</div>
						<div class="clearfix"></div>
					</div>
				<?php
			}

			if ( $youtube ) {
				$youtube_count = vw_get_youtube_count( $youtube );
				?>
					<div class="vw-social-counter vw-social-counter-youtube">
						<a class="vw-social-counter-icon" href="<?php echo esc_attr( $youtube_count['page_url'] ); ?>" title="<?php esc_attr_e( 'Subscribe our youtube', 'envirra' ) ?>" target="_blank"><i class="icon-social-youtube"></i></a>
						<div class="vw-social-counter-counter">
							<div class="vw-social-counter-count"><?php echo number_format( $youtube_count['subscriber_count'] ); ?></div>
							<div class="vw-social-counter-unit"><?php _e( 'Subscribers', 'envirra' ) ?></div>
						</div>
						<div class="clearfix"></div>
					</div>
				<?php
			}

			if ( $googleplus ) {
				$googleplus_count = vw_get_googleplus_count( $googleplus );
				?>
					<div class="vw-social-counter vw-social-counter-googleplus">
						<a class="vw-social-counter-icon" href="<?php echo esc_attr( $googleplus_count['page_url'] ); ?>" title="<?php esc_attr_e( '+1 our page', 'envirra' ) ?>" target="_blank"><i class="icon-social-gplus"></i></a>
						<div class="vw-social-counter-counter">
							<div class="vw-social-counter-count"><?php echo number_format( $googleplus_count['people_count'] ); ?></div>
							<div class="vw-social-counter-unit"><?php _e( 'People', 'envirra' ) ?></div>
						</div>
						<div class="clearfix"></div>
					</div>
				<?php
			}
			?>
			<div class="clearfix"></div>
			<?php

			wp_reset_postdata();
			echo $after_widget;
		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$new_instance = wp_parse_args( (array) $new_instance, $this->default );
			$instance['title'] = $new_instance['title'];
			$instance['twitter'] = strip_tags( $new_instance['twitter'] );
			$instance['twitter_key'] = strip_tags( $new_instance['twitter_key'] );
			$instance['twitter_secret'] = strip_tags( $new_instance['twitter_secret'] );
			$instance['facebook'] = strip_tags( $new_instance['facebook'] );
			$instance['youtube'] = strip_tags( $new_instance['youtube'] );
			$instance['googleplus'] = strip_tags( $new_instance['googleplus'] );
			$instance['is_saved'] = true;

			delete_transient( 'vw_twitter_count' );
			delete_transient( 'vw_facebook_count' );
			delete_transient( 'vw_youtube_count' );
			delete_transient( 'vw_googleplus_count' );

			if ( function_exists( 'icl_register_string' ) ) {
				icl_register_string( VW_THEME_NAME.' Widget', $this->id.'_title', $instance['title'] );
			}

			return $instance;
		}

		function form( $instance ) {
			$instance = wp_parse_args( (array) $instance, $this->default );

			$title = $instance['title'];
			$twitter = strip_tags( $instance['twitter'] );
			$twitter_key = strip_tags( $instance['twitter_key'] );
			$twitter_secret = strip_tags( $instance['twitter_secret'] );
			$facebook = strip_tags( $instance['facebook'] );
			$youtube = strip_tags( $instance['youtube'] );
			$googleplus = strip_tags( $instance['googleplus'] );
			?>

			<!-- title -->
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
			</p>

			<!-- twitter username -->
			<p>
				<label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter Username:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" />
			</p>

			<!-- twitter consumer key -->
			<p>
				<label for="<?php echo $this->get_field_id('twitter_key'); ?>">Twitter consumer key:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('twitter_key'); ?>" name="<?php echo $this->get_field_name('twitter_key'); ?>" type="text" value="<?php echo esc_attr($twitter_key); ?>" />
			</p>

			<!-- twitter consumer secret -->
			<p>
				<label for="<?php echo $this->get_field_id('twitter_secret'); ?>">Twitter Consumer Secret:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('twitter_secret'); ?>" name="<?php echo $this->get_field_name('twitter_secret'); ?>" type="text" value="<?php echo esc_attr($twitter_secret); ?>" />
			</p>

			<!-- facebook id -->
			<p>
				<label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook Page ID:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" />
				<p class="description">The value should be a page id like "<strong>80655071208</strong>".You can find the page id <a href="http://findmyfacebookid.com/" target="_blank">here</a>.</p>
			</p>

			<!-- youtube username -->
			<p>
				<label for="<?php echo $this->get_field_id('youtube'); ?>">Youtube Username:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" />
			</p>

			<!-- googleplus username -->
			<p>
				<label for="<?php echo $this->get_field_id('googleplus'); ?>">Google+ Page Name:</label>
				<input class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" name="<?php echo $this->get_field_name('googleplus'); ?>" type="text" value="<?php echo esc_attr($googleplus); ?>" />
			</p>
			<p class="description">The value should be a name or id like "<strong>+envato</strong>"" or "<strong>107285294994146126204</strong>"</p>

			<?php
		}
	}
}

/* -----------------------------------------------------------------------------
 * Get Counter Functions
 * -------------------------------------------------------------------------- */

if ( ! function_exists( 'vw_get_twitter_count' ) ) {
	function vw_get_twitter_count( $twitter_id, $consumer_key, $consumer_secret ) {
		$twitter = get_transient('vw_twitter_count');
		if ($twitter !== false) return $twitter;

		// some variables
		$token = get_option('vw_twitter_token');
		$twitter['page_url'] = "http://www.twitter.com/$twitter_id";

		if($twitter_id && $consumer_key && $consumer_secret) {
			if(!$token) {
				// preparing credentials
				$credentials = $consumer_key . ':' . $consumer_secret;
				$toSend = base64_encode($credentials);

				// http post arguments
				$args = array(
					'method' => 'POST',
					'httpversion' => '1.1',
					'blocking' => true,
					'headers' => array(
						'Authorization' => 'Basic ' . $toSend,
						'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
					),
					'body' => array( 'grant_type' => 'client_credentials' )
				);

				add_filter('https_ssl_verify', '__return_false');
				$response = wp_remote_post('https://api.twitter.com/oauth2/token', $args);

				$keys = json_decode(wp_remote_retrieve_body($response));

				if($keys) {
					// saving token to wp_options table
					update_option('vw_twitter_token', $keys->access_token);
					$token = $keys->access_token;
				}
			}
			// we have bearer token wether we obtained it from API or from options
			$args = array(
				'httpversion' => '1.1',
				'blocking' => true,
				'headers' => array(
					'Authorization' => "Bearer $token"
				)
			);

			add_filter('https_ssl_verify', '__return_false');
			$api_url = "https://api.twitter.com/1.1/users/show.json?screen_name=$twitter_id";
			$response = wp_remote_get($api_url, $args);

			if (!is_wp_error($response)) {
				$twitter_reply = json_decode(wp_remote_retrieve_body($response));
				if ( isset( $twitter_reply->followers_count ) ) {
					$twitter['followers_count'] = $twitter_reply->followers_count;
				} else {
					$twitter['followers_count'] = 0;
				}
			}
		} else {
			$twitter['followers_count'] = 0;
		}
		
		set_transient( 'vw_twitter_count', $twitter, VW_CONST_SOCIAL_COUNTER_CACHE_EXPIRE );
		return $twitter;
	}
}

if ( ! function_exists( 'vw_get_facebook_count' ) ) {
	function vw_get_facebook_count( $page_id ) {
		$facebook = get_transient('vw_facebook_count');
		if ($facebook !== false) return $facebook;

		try {
			$url = "http://graph.facebook.com/".$page_id;
			@$reply = json_decode(@vw_get_subscriber_counter($url));
			@$facebook['fans_count'] = $reply->likes;
			@$facebook['page_url'] = $reply->link;
		} catch (Exception $e) {
			$facebook['fans_count'] = '0';
			$facebook['page_url'] = 'http://www.facebook.com';
		}

		set_transient( 'vw_facebook_count', $facebook, VW_CONST_SOCIAL_COUNTER_CACHE_EXPIRE );
		return $facebook;
	}
}

if ( ! function_exists( 'vw_get_youtube_count' ) ) {
	function vw_get_youtube_count( $username ) {
		$youtube = get_transient('vw_youtube_count');
		if ($youtube !== false) return $youtube;

		try {
			@$xmlData = @vw_get_subscriber_counter('http://gdata.youtube.com/feeds/api/users/' . strtolower($username)); 
			@$xmlData = str_replace('yt:', 'yt', $xmlData); 
			@$xml = new SimpleXMLElement($xmlData); 
			@$youtube['subscriber_count'] = ( string ) $xml->ytstatistics['subscriberCount'];
			@$youtube['page_url'] = "http://www.youtube.com/user/".$username;
		} catch (Exception $e) {
			$youtube['subscriber_count'] = 0;
			$youtube['page_url'] = "http://www.youtube.com";
		}

		set_transient( 'vw_youtube_count', $youtube, VW_CONST_SOCIAL_COUNTER_CACHE_EXPIRE );
		return($youtube); 
	}
}

if ( ! function_exists( 'vw_get_googleplus_count' ) ) {
	function vw_get_googleplus_count( $username ) {
		$googleplus = get_transient('vw_googleplus_count');
		if ($googleplus !== false) return $googleplus;

		if ( preg_match( '/[^0-9]/', $username ) && strpos( $username, '+' ) !== 0 ) {
			$username = '+'.$username;
		}
		
		$api_url = 'https://www.googleapis.com/plus/v1/people/'.$username.'?key=AIzaSyCfbKKE_GQqyuxXT38eVCRtlKgmMrwZz4o';
		$googleplus['page_url'] = '#';
		$googleplus['people_count'] = 0;
		
		$data = vw_get_subscriber_counter($api_url); 

		if ( ! is_wp_error( $data ) ) {
			$json = json_decode( $data );

			if ( isset( $json->url ) ) {
				$googleplus['page_url'] = $json->url;
			}

			if ( isset( $json->plusOneCount ) ) {
				$googleplus['people_count'] = $json->plusOneCount;
			}
		}

		set_transient( 'vw_googleplus_count', $googleplus, VW_CONST_SOCIAL_COUNTER_CACHE_EXPIRE );
		return $googleplus;
	}
}

if ( ! function_exists( 'vw_get_vimeo_count' ) ) {
	function vw_get_vimeo_count( $page_name ) {
		$vimeo = get_transient( 'vw_vimeo_count' );
		if ($vimeo !== false) return $vimeo;
		
		$api_url = 'http://vimeo.com/api/v2/channel/'.$page_name.'/info.json';
		$vimeo['page_url'] = '#';
		$vimeo['count'] = 0;
		
		$data = vw_get_subscriber_counter( $api_url ); 

		if ( ! is_wp_error( $data ) ) {
			$json = json_decode( $data );

			if ( isset( $json->url ) ) {
				$vimeo['page_url'] = $json->url;
			}

			if ( isset( $json->plusOneCount ) ) {
				$vimeo['count'] = $json->plusOneCount;
			}
		}

		set_transient( 'vw_vimeo_count', $vimeo, VW_CONST_SOCIAL_COUNTER_CACHE_EXPIRE );
		return $vimeo;
	}
}

if ( ! function_exists( 'vw_get_subscriber_counter' ) ) {
	function vw_get_subscriber_counter( $api_url ) {
		$args = array(
			'httpversion' => '1.1',
			'blocking' => true,
		);

		$response = wp_remote_get( $api_url, $args );
		if ( ! is_wp_error( $response ) ) {
			return wp_remote_retrieve_body( $response );
		}
	}
}