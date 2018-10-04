<?php
/**
 * @package Campus Lite
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header><!-- .entry-header -->
    <div class="entry-content">

		<?php 
        if (has_post_thumbnail() ){
			echo '<div class="post-thumb">';
            the_post_thumbnail();
			echo '</div><br />';
		}
        ?>
        <?php #the_content(); ?>
<?php 
$writer_id = wpcf_pr_post_get_belongs( get_the_ID(), 'departament' );
if ($writer_id) {
    # code...
$writer_post = get_post( $writer_id );
$writer_name = $writer_post->post_title;
?>
<p>Departamento al que pertenece: <a href="<?php echo get_permalink($writer_post); ?>"><?php echo $writer_name; ?></a></p>

<?php } ?>

    <?php if (types_render_field( "codigo" )): ?>
    <p><strong>Codigo: <?php echo types_render_field( "codigo" );  // Call to Types function for rendering a custom field "Consultant Roles" ?></strong></p>
    <?php endif ?>

    <?php if (types_render_field( "unidades-de-credito" )): ?>
        <p><strong>UC: <?php echo types_render_field( "unidades-de-credito" );  // Call to Types function for rendering a custom field "Consultant Roles" ?></strong></p>
    <?php endif ?>
            <?php if (types_render_field( "justificacion" )): ?>
            <p><strong>Justificacion:</strong></p><p>
            <?php echo types_render_field( "justificacion" ); ?></p>
            <?php endif ?>
            <?php if(types_render_field( "objetivo" )): ?>
                <p><strong>Objetivo:</strong></p><p>
                <?php echo types_render_field( "objetivo" ); ?></p>
            <?php endif ?>
            <?php if(types_render_field( "contenido" )): ?>
            <h2>Contenido</h2>
            
            <div>
                <?php echo types_render_field( "contenido" ); ?>
            </div>
            <?php endif; ?>
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
        <?php $child_posts = types_child_posts('materia'); ?>
        <?php if ($child_posts): ?>
            
    <h3>Profesores que Dictan esta asignatura</h3>
    <?php 
    //It will query all child posts of the current event, that are appearance type

foreach ($child_posts as $child_post) {
    $band_id = wpcf_pr_post_get_belongs($child_post->ID, 'profesor');
 
    //You can also use WP Native API get_post_meta to get the parent post ID
    //as it is stored in a hidden custom field _wpcf_belongs_post-type-slug_id
    //$band_id = get_post_meta($child_post->ID, '_wpcf_belongs_band_id', true);

    $band = get_post($band_id);
    ?>
    <a href="<?php echo get_permalink($band->ID); ?>"><?php echo $band->post_title; ?> </a><br>
    <?php
}
    ?>
        <?php endif ?>
   
    <footer class="entry-meta">
        <?php edit_post_link( __( 'Edit', 'campus-lite' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->

</article>