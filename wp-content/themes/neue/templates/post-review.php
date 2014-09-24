<?php
$score_style = get_post_meta( get_the_id(), 'vw_review_score_style', true );
$review_position = get_post_meta( get_the_id(), 'vw_review_position', true );
?>
<div class="vw-review-box clearfix <?php printf( 'vw-review-position-%s', $review_position ) ?>" itemprop="review" itemscope itemtype="http://schema.org/Review">
	<meta itemprop="name" content="<?php echo esc_attr( get_the_title() ); ?>">
	<meta itemprop="author" content="<?php echo esc_attr( get_the_author() ); ?>">
	<meta itemprop="datePublished" content="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>">

	<h3 class="vw-review-box-title"><?php _e( "Editor's Rating", 'envirra' ); ?></h3>

	<?php
	$counter = 1;
	for( $counter=1; $counter<=10; $counter++ ) :
		$label = get_post_meta( get_the_id(), 'vw_review_score_'.$counter.'_label', true );
		$score = get_post_meta( get_the_id(), 'vw_review_score_'.$counter.'_score', true );

		if ( empty( $score ) ) break;

		$score_percent = floatval( $score ) . '%';
	?>
	<div class="vw-review-item clearfix">
		<div class="vw-review-item-title">

			<span><?php echo esc_html( $label ) ?></span>

			<?php if ( 'percentage' == $score_style ) : ?>
				<span class="vw-review-item-title-separator">&ndash;</span>
				<span class="vw-review-item-title-score"><?php echo $score_percent; ?></span>

			<?php elseif ( 'points' == $score_style ) : ?>
				<span class="vw-review-item-title-separator">&ndash;</span>
				<span class="vw-review-item-title-score"><?php echo number_format( $score / 10.0, 1 ); ?></span>

			<?php endif; ?>

		</div>

		<?php if ( 'star' == $score_style ) : ?>
			<div class="vw-review-item-score vw-review-score-star">
				<div class="vw-review-score-number" data-score="<?php echo vw_get_stared_score( $score ); ?>"></div>
			</div>

		<?php elseif ( 'percentage' == $score_style || 'points' == $score_style ) : ?>
			<div class="vw-review-item-score vw-review-score-percentage" style="width: <?php echo $score_percent; ?>;"></div>
		<?php endif; ?>

	</div>
	<?php endfor; ?>

	<div class="vw-review-box-summary">
		<?php $review_summary = esc_html( get_post_meta( get_the_id(), 'vw_review_summary', true ) ); ?>
		<div class="vw-review-summary" itemprop="description"><?php echo $review_summary; ?></div>

		<?php $total_score = get_post_meta( get_the_id(), 'vw_review_average_score', true ); ?>
		<?php if ( 'star' == $score_style ) : ?>
			<div class="vw-review-total-score vw-review-score-star">
				<div class="vw-review-score-number" data-score="<?php echo vw_get_stared_score( $total_score ); ?>"></div>
			</div>

		<?php elseif ( 'percentage' == $score_style ) : ?>
			<div class="vw-review-total-score vw-review-score-percentage"><?php echo intval( $total_score ); ?></div>

		<?php elseif ( 'points' == $score_style ) : ?>
			<div class="vw-review-total-score vw-review-score-point"><?php echo number_format( $total_score / 10.0, 1 ); ?></div>

		<?php endif; ?>
		
	</div>

	<div class="hidden" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
		<meta itemprop="worstRating" content="0">
		<meta itemprop="bestRating" content="10">
		<meta itemprop="ratingValue" content="<?php echo esc_attr( $total_score ); ?>">
	</div>
</div>