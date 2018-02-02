<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Campus Lite
 */

get_header(); ?>
  <div class="main-container">
<div class="content-area">
    <div class="middle-align content_sidebar">
        <div class="site-main" id="sitemain">
			<?php if ( have_posts() ) : ?>
                <header class="page-header">
                    <h1>Departamentos</h1>
                </header><!-- .page-header -->
				<?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

                <?php endwhile; ?>
                <?php the_posts_pagination(); ?>
            <?php else : ?>
                <?php get_template_part( 'no-results'); ?>
            <?php endif; ?>
        </div>
        <?php get_sidebar();?>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>