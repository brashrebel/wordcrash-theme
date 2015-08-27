<?php
/**
 * The theme's page file use for displaying pages.
 *
 * @since 0.1.0
 * @package WordCrash
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

get_header();

the_post();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<div class="row">
				<div id="article-content" class="large-8 columns large-offset-2">	
					
					<h1><?php the_title(); ?></h1>
				
					<?php the_content(); ?>
				</div>
			</div>
				
		</main>
	</div>

<!-- Page HTML -->

<?php
get_footer();