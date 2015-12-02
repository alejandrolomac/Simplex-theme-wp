<?php get_header(); ?>

<section id="main">
	<section id="articles_list">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article>
				<hgroup><h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2></hgroup>
				<div class="extract"><?php the_content();?></div>
			</article>
		<?php endwhile; else: ?>
			<h3>No se encontraron Articulos</h3>
		<?php endif; ?>
	</section>
<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>