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
        <p><strong>correo: <?php echo types_render_field( "correo" );  // Call to Types function for rendering a custom field "Consultant Roles" ?></strong></p>
            <p><strong>Site: <?php echo types_render_field( "sitio-web-profesor" );  // Call to Types function for rendering a custom field "Consultant Roles" ?></strong></p>
            <p><strong>Telefono: <?php echo types_render_field( "telefono" );  // Call to Types function for rendering a custom field "Consultant Roles" ?></strong></p>
            <div class="post-categories"><?php the_category( __( ', ', 'campus-lite' ));?></div>
            <div class="post-tags"><?php the_tags(__(' | Tags: ','campus-lite'), ', ', '<br />'); ?> </div>
            <div class="clear"></div>
        </div><!-- postmeta -->
    <h3>Asignaturas que Dicta</h3>
            <?php 
                $child_posts = types_child_posts("asignatura");
                foreach ($child_posts as $child_post) 
                { ?>
                         
                <div class="asignatura-listing">
                        <h5><a href="/paste/index.php/asignatura/<?php echo $child_post->post_name; ?>"><?php echo $child_post->post_title; ?></a></h5>
                    </div>
                 
                 
                <?php } ?>
   
    <footer class="entry-meta">
        <?php edit_post_link( __( 'Edit', 'campus-lite' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->

</article>