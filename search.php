<?php get_header(); ?>

<section id="main">
  <section id="articles_list">
      <h3>Resultados de la búsqueda</h3>
      <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
        <article>
          <div class="thumb">
            <a href="<?php the_permalink();?>">
              <?php if(has_post_thumbnail()) {the_post_thumbnail('list_articles_thumbs');} ?> 
            </a>
          </div>
          <hgroup><h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2></hgroup>
          <div class="date">
          <a href="http://twitter.com/reykrad"><?php the_author_posts_link(); ?></a>: <?php the_time('F j, Y') ?> en <span><?php the_category(' • ');?></span></div>
          <div class="extract"><?php the_excerpt();?></div>
          <div class="pie_post">
          <span><?php the_tags( 'Etiquetas: ', ' • ', '<br />' ); ?></span>
          <p><?php comments_number( '0 Comentarios', 'Un Comentario', '% Comentarios' ); ?></p>
        </div>
        </article>
      <?php endwhile; ?>
      <?php if (function_exists("pagination")) {
        pagination($additional_loop->max_num_pages);
      } ?>
      <?php  else: ?>
      <div class="entry"><?php _e('Lo sentimos, no hay resultados con este término de búsqueda.'); ?></div>
      <?php endif; ?>
  </section>
<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>