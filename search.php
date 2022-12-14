<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package icuerious
 */

get_header();
?>

	<main id="primary" class="site-main content-with search-page">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'icuerious' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
		 ?>
		<div class="mobile-search">
			<?php get_search_form(); ?>
		</div>
		
		<?php
	?> <div class="all-search-result"> <?php
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				
				?><div class="each-search-result"> <?php
				get_template_part( 'template-parts/content', 'search' );
				
				?> </div> <?php
			endwhile;

			the_posts_navigation(); else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
