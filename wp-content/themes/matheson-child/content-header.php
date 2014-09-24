<?php
/**
 * The template for displaying article headers
 *
 * @since 1.0.6
 */
$bavotasan_theme_options = bavotasan_theme_options();
?>

	<?php if ( is_single() ) { ?>
		<h5><?php $posttags = get_the_tags();
				$count=0;
					if ($posttags) {
  						foreach($posttags as $tag) {
   						 $count++;
    							if (1 == $count) {
      							echo $tag->name . ' ';
    							}
  						}
			} ?></h5>
	
    	
		<h1 class="entry-title">
			<?php the_title(); ?>
        </h1>
	<?php }else { ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h1>
	<?php } // is_single() ?>
	<div class="entry-meta">
    	<?php
        $display_date = $bavotasan_theme_options['display_date'];
		if( $display_date ) { echo '<span class="date">Last updated <time class="date published updated" datetime="' . get_the_date( 'Y-m-d' ) . '">' . get_the_date() . '</time></span>';
	    }
		?>
    </div>