<div class="vw-breaking-news-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 clearfix">

				<div class="vw-language-bar">
					
					<?php if( function_exists( 'qtrans_generateLanguageSelectCode' ) ) qtrans_generateLanguageSelectCode( 'image' ); ?>

				</div>
				
				<div class="vw-breaking-news">
					<span class="vw-breaking-news-title"><?php _e( 'BREAKING &nbsp; /', 'envirra' ); ?></span>

					<ul class="vw-breaking-news-list list-unstyled">

						<?php $the_query = vw_get_breaking_news_posts(); ?>

						<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<li><?php the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' ); ?></li>

						<?php endwhile; wp_reset_postdata(); ?>

					</ul>
				</div>

				

			</div>
		</div>
	</div>
</div>