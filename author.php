<?php get_header(); ?>

<section id="main">
	<div id="autor_page">
		<?php
			if(have_posts()) the_post();
			if(get_the_author_meta('description')):
		?>
		<h3><?php 
			echo get_the_author(); 
			echo (" - ");
			echo the_author_meta('first_name'); 
			echo (' ');
			echo the_author_meta('last_name');
		?></h3>
		<div id="infoautor">
			<div id="avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'author_bio_avatar_size', 60 ) ); ?>
			</div>
			<div id="info">
				<p><a href="<?php echo the_author_meta( 'user_url' ); ?>">Sitio Web</a></p>
			<p><strong>Biografia: </strong><?php echo the_author_meta('description'); ?></p>
			</div>
		</div>
		<div id="autor_post">
			<h3>Todos mis post:</h3>
			<?php endif;
				rewind_posts();
			?>
			<ul>
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<article>
					<hgroup><h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2></hgroup>
					<div class="date">
					<a href=""><?php the_author_posts_link(); ?></a>: <?php the_time('F j, Y') ?> en <span><?php the_category(' • ') ;?></span></div>
				</article>
			<?php endwhile; else: ?>
			<p><?php _e('El Autor no tiene Posts'); ?></p>
			</ul>
			<?php endif; ?>
		</div>
		<div id="pagination">
			<p>
				<?php next_posts_link('Post Siguientes'); ?>
				<?php previous_posts_link('Post Anteriores'); ?>
			</p>
		</div>
	</div>
<?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>