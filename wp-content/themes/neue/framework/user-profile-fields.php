<?php 

add_action( 'after_setup_theme', 'vw_setup_user_profile_fields' );
function vw_setup_user_profile_fields() {
	add_action( 'show_user_profile', 'vw_user_profile_social_fields' );
	add_action( 'edit_user_profile', 'vw_user_profile_social_fields' );
	add_action( 'personal_options_update', 'vw_save_user_profile_social_fields' );
	add_action( 'edit_user_profile_update', 'vw_save_user_profile_social_fields' );
}

if ( ! function_exists( 'vw_user_profile_social_fields' ) ) {
	function vw_user_profile_social_fields( $user ) {
		?>
		<h3><?php _e('Social Profiles', 'envirra'); ?></h3>

		<input type="hidden" name="vw_has_user_social_fields" value="1">
		
		<table class="form-table">
			<tr>
				<th>
					<label for="vw_user_twitter"><?php _e('Twitter', 'envirra'); ?></label>
				</th>
				<td>
					<input type="text" name="vw_user_twitter" id="vw_user_twitter" value="<?php echo esc_attr( get_the_author_meta( 'vw_user_twitter', $user->ID ) ); ?>" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th>
					<label for="vw_user_facebook"><?php _e('Facebook', 'envirra'); ?></label>
				</th>
				<td>
					<input type="text" name="vw_user_facebook" id="vw_user_facebook" value="<?php echo esc_attr( get_the_author_meta( 'vw_user_facebook', $user->ID ) ); ?>" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th>
					<label for="vw_user_google"><?php _e('Google+', 'envirra'); ?></label>
				</th>
				<td>
					<input type="text" name="vw_user_google" id="vw_user_google" value="<?php echo esc_attr( get_the_author_meta( 'vw_user_google', $user->ID ) ); ?>" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th>
					<label for="vw_user_pinterest"><?php _e('Pinterest', 'envirra'); ?></label>
				</th>
				<td>
					<input type="text" name="vw_user_pinterest" id="vw_user_pinterest" value="<?php echo esc_attr( get_the_author_meta( 'vw_user_pinterest', $user->ID ) ); ?>" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th>
					<label for="vw_user_tumblr"><?php _e('Tumblr', 'envirra'); ?></label>
				</th>
				<td>
					<input type="text" name="vw_user_tumblr" id="vw_user_tumblr" value="<?php echo esc_attr( get_the_author_meta( 'vw_user_tumblr', $user->ID ) ); ?>" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th>
					<label for="vw_user_instagram"><?php _e('Instagram', 'envirra'); ?></label>
				</th>
				<td>
					<input type="text" name="vw_user_instagram" id="vw_user_instagram" value="<?php echo esc_attr( get_the_author_meta( 'vw_user_instagram', $user->ID ) ); ?>" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th>
					<label for="vw_user_500px"><?php _e('500px', 'envirra'); ?></label>
				</th>
				<td>
					<input type="text" name="vw_user_500px" id="vw_user_500px" value="<?php echo esc_attr( get_the_author_meta( 'vw_user_500px', $user->ID ) ); ?>" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th>
					<label for="vw_user_dribbble"><?php _e('Dribbble', 'envirra'); ?></label>
				</th>
				<td>
					<input type="text" name="vw_user_dribbble" id="vw_user_dribbble" value="<?php echo esc_attr( get_the_author_meta( 'vw_user_dribbble', $user->ID ) ); ?>" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th>
					<label for="vw_user_flickr"><?php _e('Flickr', 'envirra'); ?></label>
				</th>
				<td>
					<input type="text" name="vw_user_flickr" id="vw_user_flickr" value="<?php echo esc_attr( get_the_author_meta( 'vw_user_flickr', $user->ID ) ); ?>" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th>
					<label for="vw_user_linkedin"><?php _e('Lnkedin', 'envirra'); ?></label>
				</th>
				<td>
					<input type="text" name="vw_user_linkedin" id="vw_user_linkedin" value="<?php echo esc_attr( get_the_author_meta( 'vw_user_linkedin', $user->ID ) ); ?>" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th>
					<label for="vw_user_skype"><?php _e('Skype', 'envirra'); ?></label>
				</th>
				<td>
					<input type="text" name="vw_user_skype" id="vw_user_skype" value="<?php echo esc_attr( get_the_author_meta( 'vw_user_skype', $user->ID ) ); ?>" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th>
					<label for="vw_user_youtube"><?php _e('Youtube', 'envirra'); ?></label>
				</th>
				<td>
					<input type="text" name="vw_user_youtube" id="vw_user_youtube" value="<?php echo esc_attr( get_the_author_meta( 'vw_user_youtube', $user->ID ) ); ?>" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th>
					<label for="vw_user_vimeo"><?php _e('Vimeo', 'envirra'); ?></label>
				</th>
				<td>
					<input type="text" name="vw_user_vimeo" id="vw_user_vimeo" value="<?php echo esc_attr( get_the_author_meta( 'vw_user_vimeo', $user->ID ) ); ?>" class="regular-text" />
				</td>
			</tr>
			<tr>
				<th>
					<label for="vw_user_email"><?php _e('Email', 'envirra'); ?></label>
				</th>
				<td>
					<input type="text" name="vw_user_email" id="vw_user_email" value="<?php echo esc_attr( get_the_author_meta( 'vw_user_email', $user->ID ) ); ?>" class="regular-text" />
				</td>
			</tr>
		</table>
	<?php
	}
}

if ( ! function_exists( 'vw_save_user_profile_social_fields' ) ) {
	function vw_save_user_profile_social_fields( $user_id ) {
		 if ( ! current_user_can( 'edit_user', $user_id ) || ! isset( $_POST['vw_has_user_social_fields'] ) )
			return false;
	
		update_user_meta( $user_id, 'vw_user_twitter', $_POST['vw_user_twitter'] );
		update_user_meta( $user_id, 'vw_user_facebook', $_POST['vw_user_facebook'] );
		update_user_meta( $user_id, 'vw_user_google', $_POST['vw_user_google'] );
		update_user_meta( $user_id, 'vw_user_pinterest', $_POST['vw_user_pinterest'] );
		update_user_meta( $user_id, 'vw_user_tumblr', $_POST['vw_user_tumblr'] );
		update_user_meta( $user_id, 'vw_user_instagram', $_POST['vw_user_instagram'] );
		update_user_meta( $user_id, 'vw_user_500px', $_POST['vw_user_500px'] );
		update_user_meta( $user_id, 'vw_user_dribbble', $_POST['vw_user_dribbble'] );
		update_user_meta( $user_id, 'vw_user_flickr', $_POST['vw_user_flickr'] );
		update_user_meta( $user_id, 'vw_user_linkedin', $_POST['vw_user_linkedin'] );
		update_user_meta( $user_id, 'vw_user_skype', $_POST['vw_user_skype'] );
		update_user_meta( $user_id, 'vw_user_youtube', $_POST['vw_user_youtube'] );
		update_user_meta( $user_id, 'vw_user_vimeo', $_POST['vw_user_vimeo'] );
		update_user_meta( $user_id, 'vw_user_email', $_POST['vw_user_email'] );
	}
}