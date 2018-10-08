<?php
/**
 * @package Campus Lite
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    
<div class="container-fliud">
    <!-- .entry-header -->
    <div class="row entry-content">
     <div class="col-sm-4">
        <a href="#" class="thumbnail">
        <?php echo types_render_field( "fotoprofesor" ); ?>
        </a>

     </div>
     <!-- INformacion del profsor -->
     <div class="col-sm-8">
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
        <?php 
                $writer_id = wpcf_pr_post_get_belongs( get_the_ID(), 'departament' );

                if ($writer_id != 0) {
                    $writer_post = get_post( $writer_id );
                    $writer_name = $writer_post->post_title;
                ?>
                <p>Departamento al que pertenece: <a href="<?php echo get_permalink($writer_post); ?>"><?php echo $writer_name; ?></a></p>
                <?php } ?>

         <p><strong><?php imprimir_si_tiene('Correo',types_render_field( "correo" )) ?></strong></p>
        <p><strong><?php imprimir_si_tiene('Sitio Web',types_render_field( "sitio-web-profesor" )); ?></strong></p>
        <p><strong><?php imprimir_si_tiene('Telefono',types_render_field( "telefono" )); ?></strong></p>
        <p><strong><?php imprimir_si_tiene('Facebook',types_render_field( "facebook" )); ?></strong></p>
        <p><strong><?php imprimir_si_tiene('Twitter',types_render_field( "twitter" )); ?></strong></p>
        </div>
    </div>
    <!-- Fin INformacion del profsor -->
        <div class="clear"></div>
<?php $child_posts = types_child_posts('materia');
    if (count($child_posts)>0) {
        # code...
    
 ?>
    <div class="row">

    <div class="col-sm-12">
        <h3>Asignaturas que Dicta</h3>

        <div class="col-sm-12">
    <?php }
    //It will query all child posts of the current event, that are appearance type
$child_posts = types_child_posts('materia');

foreach ($child_posts as $child_post) {
    $band_id = wpcf_pr_post_get_belongs($child_post->ID, 'asignatura');
 
    //You can also use WP Native API get_post_meta to get the parent post ID
    //as it is stored in a hidden custom field _wpcf_belongs_post-type-slug_id
    //$band_id = get_post_meta($child_post->ID, '_wpcf_belongs_band_id', true);
 
    $band = get_post($band_id);
    ?>
    <?php if ($band->post_type!='profesor'): ?>
        
    <a href="<?php echo get_permalink($band->ID); ?>"><?php echo $band->post_title; ?>   </a><br>
    <?php endif ?>
    <?php
}
    ?>
    <br>
    </div>

        <br>
        <?php if(the_content()){ ?>
        <h3>Cartelera informativa</h3>
        <div class="col-sm-12 text-center">
            <?php the_content(); ?>
        </div>
        <?php } ?>

    </div>
    </div>
    </div>

    <footer class="entry-meta">
        <?php edit_post_link( __( 'Edit', 'campus-lite' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->

</article>