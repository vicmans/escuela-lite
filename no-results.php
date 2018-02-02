<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Campus Lite
 */
?>


	
        <header>
            <h1 class="entry-title"><?php _e( 'No se encontraron resultados', 'campus-lite' ); ?></h1>
        </header>

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'campus-lite' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'campus-lite' ); ?></p><br />
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'No podemos encontrar lo que estas buscando. Quizas la busqueda pueda ayudar.', 'campus-lite' ); ?></p><br />
			<?php get_search_form(); ?>

		<?php endif; ?>
	

