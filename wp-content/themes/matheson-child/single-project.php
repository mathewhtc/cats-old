<?php
/*
Single Post Template: [For Project Single Post]
*/
?>


<?php

get_header();

?>





	<div class="container">

		<div class="row">

			<div id="primary" class="col-md-8">

				<?php while ( have_posts() ) : the_post(); ?>



					<?php get_template_part( 'content', get_post_format() ); ?>

                    

				<?php endwhile; // end of the loop. ?>

			</div>

            <div class="col-md-4">

				<?php get_sidebar(); ?>

            </div>

		</div>

	</div>



<?php get_footer(); ?>