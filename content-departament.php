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
    <h3>Asignaturas de este departamento</h3>

            <?php 
                $child_posts = types_child_posts("asignatura");
                foreach ($child_posts as $child_post) 
                { ?>
                         
                <div class="asignatura-listing">
                        <h5><a href="/paste/index.php/asignatura/<?php echo $child_post->post_name; ?>"><?php echo $child_post->post_title; ?></a></h5>
                    </div>
                 
                 
                <?php } ?>

    <h3>Profesores de este departamento</h3>
   <div class="row">
    <?php
    // Obtengo a los profesores
        $child_posts = types_child_posts("profesor");

    // para mostrar los posts hijos de departamentos

        foreach ($child_posts as $child_post) 
        { ?>
                 
<!--         <div class="asignatura-listing col-sm-4">
                <h5><a href="/paste/index.php/asignatura/<?php echo $child_post->post_name; ?>"><?php echo $child_post->post_title; ?></a></h5>
                <a href="/paste/index.php/profesor/<?php echo $child_post->post_name; ?>"><img src="<?php echo $child_post->fields['fotoprofesor']; ?>" width="150px"></a>
        </div> -->
        
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="<?php echo $child_post->fields['fotoprofesor']; ?>">
      <div class="caption">
        <h3><?php echo $child_post->post_title; ?></h3>
        <p>Aqui deberiamos escribir algo</p>
        <p><a href="/paste/index.php/profesor/<?php echo $child_post->post_name; ?>" class="btn btn-primary" role="button">Ver Perfil</a></p>
      </div>
    </div>
  </div>

        <?php } ?>
   </div>
    <footer class="entry-meta">
        <?php edit_post_link( __( 'Edit', 'campus-lite' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->

</article>