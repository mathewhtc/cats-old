<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @since 1.0.0
 */
get_header(); ?>
		<?php if ( have_posts() ) : ?>

			<header id="archive-header" style="background-image:url(<?php header_image_url(); ?>);">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<h1 class="page-title">
								<?php if ( is_category() ) : ?>
									<?php echo single_cat_title( '', false ); ?>
								<?php elseif ( is_author() ) : ?>
									<?php printf( __( 'Author Archive for %s', 'matheson' ), get_the_author_meta( 'display_name', get_query_var( 'author' ) ) ); ?>
								<?php elseif ( is_tag() ) : ?>
									<?php printf( __( 'Tag Archive for %s', 'matheson' ), single_tag_title( '', false ) ); ?>
								<?php elseif ( is_day() ) : ?>
									<?php printf( __( 'Daily Archives: %s', 'matheson' ), get_the_date() ); ?>
								<?php elseif ( is_month() ) : ?>
									<?php printf( __( 'Monthly Archives: %s', 'matheson' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'matheson' ) ) ); ?>
								<?php elseif ( is_year() ) : ?>
									<?php printf( __( 'Yearly Archives: %s', 'matheson' ), get_the_date( _x( 'Y', 'yearly archives date format', 'matheson' ) ) ); ?>
								<?php else : ?>
									<?php _e( 'Blog Archive', 'matheson' ); ?>
								<?php endif; ?>
							</h1><!-- .page-title -->

							<?php
							$description = term_description();
							if ( is_author() )
								$description = get_the_author_meta( 'description' );

			                if ( $description )
								printf( '<h2 class="archive-meta">%s</h2>', $description );
							?>
						</div>
					</div>
				</div>
			</header><!-- #archive-header -->
        <?php endif; ?>
            
 <?php if(is_category('projects')){ ?>           
	<div class="container">
    	<div class="row">
            <div class="col-md-4">
                <div class="widget widget-menu">
                    <h3 class="widget-title">Active</h3>
                    <?php get_template_part( 'content', 'active' ); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget widget-menu">
                    <h3 class="widget-title">Completed</h3>
                    <?php get_template_part( 'content', 'archived' ); ?>
                </div>
            </div>
            <div class="col-md-4">
            	<?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php } elseif(is_category('user-research')) { ?>         
	<div class="container">
    	<div class="row">
        	<div class="col-md-8">
            	<div class="widget widget-menu">
                	<h3 class="widget-title">Testing Reports</h3	>
                    <ul>
                    	<li>test</li>
                    	<li>test</li>
                    	<li>test</li>
                    	<li>test</li>
                    	<li>test</li>
                    	<li>test</li>
                    	<li>test</li>
                    	<li>test</li>
                    	<li>test</li>
                    	<li>test</li>
                    	<li>test</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
            	<?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php get_footer(); ?>