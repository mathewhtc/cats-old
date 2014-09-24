<?php
/**
 * The first/left sidebar widgetized area.
 *
 * If no active widgets in sidebar, default login widget will appear.
 *
 * @since 1.0.0
 */
?>
<?php if(!is_front_page() ): ?>
    <div class="widget widget-menu">
    	<a href="/style-guide" class="cta style-guide-cta">View our Style Guide</a>
        <a href="#" class="cta lifestyle-images-cta">Lifestyle Image Selects</a>
    </div>
<?php endif; ?>
<div class="htc-sidebar">
<?php dynamic_sidebar( 'sidebar' ) ?>
</div>

