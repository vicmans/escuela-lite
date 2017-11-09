<?php
/**
 * @package Campus Lite
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header><!-- .entry-header -->
    <h1>Profesor relajao</h1>
    <div class="entry-content">

		<?php 
        if (has_post_thumbnail() ){
			echo '<div class="post-thumb">';
            the_post_thumbnail();
			echo '</div><br />';
		}
        ?>
        <?php the_content(); ?>
        </div><!-- .entry-content --><div class="clear"></div>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'campus-lite' ),
            'after'  => '</div>',
        ) );
        ?>
        <div class="postmeta">
        
            <div class="post-categories"><?php the_category( __( ', ', 'campus-lite' ));?></div>
            <div class="post-tags"><?php the_tags(__(' | Tags: ','campus-lite'), ', ', '<br />'); ?> </div>
            <div class="clear"></div>
        </div><!-- postmeta -->
    <h3>Profesores que Dicta</h3>
            <?php 
                $writer_id = wpcf_pr_post_get_belongs( get_the_ID(), 'profesor' );
                $writer_post = get_post( $writer_id );
                $writer_name = $writer_post->post_title;
                ?>
                <p><a href="<?php echo get_permalink($writer_post); ?>"><?php echo $writer_name; ?></a></p>
   
    <footer class="entry-meta">
        <?php edit_post_link( __( 'Edit', 'campus-lite' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->

</article>