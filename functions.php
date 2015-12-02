<?php 
register_nav_menus( array(
	'menu' => 'Menu Superior',
));

add_theme_support('post-thumbnails');
add_image_size('list_articles_thumbs', 450, 370, true);

register_sidebar(array(
 'name' => 'Sidebar',
 'before_widget' => '<section class="widget">',
 'after_widget' => '</section>',
 'before_title' => '<h3>',
 'after_title' => '</h3>',
 ));

register_sidebar(array(
 'name' => 'Footer',
 'before_widget' => '<section class="widget">',
 'after_widget' => '</section>',
 'before_title' => '<h3>',
 'after_title' => '</h3>',
 ));

// Permitir comentarios encadenados
function enable_threaded_comments(){
    if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
       wp_enqueue_script('comment-reply');
    }
}
add_action('get_header', 'enable_threaded_comments');

#para redireccionar si al buscar solo hay un resultado
add_action('template_redirect', 'single_result');
function single_result() {
if (is_search()) {
global $wp_query;
if ($wp_query->post_count == 1) {
wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
}
}
}

#para ver el numero de visitas sin plugin
function getPostViews($postID){
$count_key = 'post_views_count';
$count = get_post_meta($postID, $count_key, true);
if($count==''){
delete_post_meta($postID, $count_key);
add_post_meta($postID, $count_key, '0');
return "0 View";
}
return $count.' Views';
}
function setPostViews($postID) {
$count_key = 'post_views_count';
$count = get_post_meta($postID, $count_key, true);
if($count==''){
$count = 0;
delete_post_meta($postID, $count_key);
add_post_meta($postID, $count_key, '0');
}else{
$count++;
update_post_meta($postID, $count_key, $count);
}
}

#mostrar las vistas en el admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
$defaults['post_views'] = __('Visitas');
return $defaults;
}
function posts_custom_column_views($column_name, $id){
if($column_name === 'post_views'){
echo getPostViews(get_the_ID());
}
}

?>