<?php
$bavotasan_theme_options = bavotasan_theme_options();
$format = get_post_format();
$featured_image = ( has_post_thumbnail() && 'excerpt' == $bavotasan_theme_options['excerpt_content'] ) ? 'featured-image' : 'no-featured-image';
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( $featured_image ); ?>>
				<?php

			    get_template_part( 'content', 'header' );
				
				$desktopPSD = get_field('link_to_desktop_psd', get_the_ID());
				$mobilePSD = get_field('link_to_mobile_psd', get_the_ID());
				
		if($desktopPSD || $mobilePSD){ ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="entry-content">
			<img src="<?php echo get_field('desktop_psd_image_preview', get_the_ID());?>" /><br /><br />
			<img src="<?php echo get_field('mobile_psd_image_preview', get_the_ID()); ?>" />
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                </div>
                <div class="col-md-4">
                	<div class="psdlinks">
                        <h4 class="widget-title">PSD Templates</h4>
                        <ul class="psd-links">
                        <?php if($desktopPSD != ''){ ?>
                            <li><i class="fa fa-file"></i><p><a href="<?php echo $desktopPSD; ?>">Desktop PSD</a></p></li>
                        <?php } if($mobilePSD !=''){  ?>					
                            <li><i class="fa fa-file"></i><p><a href="<?php echo $mobilePSD; ?>">Mobile PSD</a></p></li>
						<?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="entry-content">
                <?php the_content(); ?>
            </div><!-- .entry-content -->
        <?php } ?>
	</article><!-- #post-<?php the_ID(); ?> -->