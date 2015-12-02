<?php get_header(); ?>

<section id="main">
	<section id="articles_list">
		<?php $post = $posts[0];  ?>
		<?php  if (is_category()) { ?>
			<h3>Categoria <?php single_cat_title(); ?></h3>
		<?php } elseif( is_tag() ) { ?>
			<h3>Etiqueta <?php single_tag_title(); ?></h3>
		<?php }; ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article>
				<div class="thumb">
					<a href="<?php the_permalink();?>">
						<?php if(has_post_thumbnail()) {the_post_thumbnail('list_articles_thumbs');} ?>	
					</a>
				</div>
				<hgroup><h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2></hgroup>
				<div class="date"><?php the_author_posts_link(); ?>: <?php the_time('F j, Y') ?> en <span><?php the_category(' • ');?></span></div>
				<div class="extract"><?php the_excerpt();?></div>
				<div class="pie_post">
					<span><?php the_tags( 'Etiquetas: ', ' • ', '<br />' ); ?></span>
					<p><?php comments_number( '0 Comentarios', 'Un Comentario', '% Comentarios' ); ?></p>
				</div>
			</article>
		<?php endwhile; else: ?>
			<h3>No se encontraron Articulos</h3>
		<?php endif; ?>

		<div id="pagination">
			<p>
				<?php next_posts_link('Post Siguientes'); ?>
				<?php previous_posts_link('Post Anteriores'); ?>
			</p>
		</div>
	</section>
<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>