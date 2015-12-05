	<footer>
		<section id="ft_widgets">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : endif; ?>
		</section>
		<p id="copyright">© 2015 <?php bloginfo('name'); ?>.com by <a href="https://www.facebook.com/saibble/">Saibble</a></p>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>