<?php get_header(); ?>

<section id="main" class="index">
	<section id="articles_list_index">
		<?php query_posts("paged=$paged"); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article>
				<div class="thumb">
					<a href="<?php the_permalink();?>">
						<?php if(has_post_thumbnail()) {the_post_thumbnail('list_articles_thumbs');} ?>	
					</a>
				</div>
				<hgroup><h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2></hgroup>
				<div class="date">
					<a href=""><?php the_author_posts_link(); ?></a>: <?php the_time('F j, Y') ?> en <span><?php the_category(' • ') ;?></span>
				</div>
				<div class="pie_post">
					<span><?php the_tags( 'Etiquetas: ', ' • ', '<br />' ); ?></span>
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