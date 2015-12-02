<?php get_header(); ?>

<section id="main">
	<section id="articles_list">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php setPostViews(get_the_ID()); ?><!-- para contador de vistas-->
			<article>
				<hgroup><h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2></hgroup>
				<div class="date"><?php the_author_posts_link(); ?>: <?php the_time('F j, Y') ?> en <span><?php the_category(' • ');?></span></div>
				<div class="extract"><?php the_content();?></div>
			<div class="pie_post">
				<span><?php the_tags( 'Etiquetas: ', ' • ', '<br />' ); ?></span>
			</div>
			<div id="autor_art">
				<div id="infoautor">
					<div id="avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'author_bio_avatar_size', 60 ) ); ?>
					</div>
					<div id="info">
						<h3>
							<a href=""><?php the_author_posts_link(); ?></a>
							<?php 
							echo (" - ");
							echo the_author_meta('first_name'); 
							echo (' ');
							echo the_author_meta('last_name');
						?></h3>
						<p><a href="<?php echo the_author_meta( 'user_url' ); ?>">Sitio Web</a></p>
						<p><strong>Biografia: </strong><?php echo the_author_meta('description'); ?></p>
					</div>
				</div>
			</div>
			</article>
		<?php endwhile; else: ?>
			<h3>No se encontraron Articulos</h3>
		<?php endif; ?>

		<div id="comentarios">
			<h3>Comentarios</h3>
			<div id="caja_comentarios">
				<?php comments_template(); ?>
			</div>
		</div>
	</section>
<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>