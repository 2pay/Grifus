<?php
function current_category() {
    global $cat;
    if (is_category() && $cat) {
        return $cat;
    } else {
        $var = get_the_category();
        return $var[0]->cat_ID;
    }
} 
function limit_posts_per_archive_page() {
if ( is_category() )
$limit = get_option('nu-categorias');
elseif ( is_search() )
$limit = get_option('nu-busqueda');
else
$limit = get_option('posts_per_page'); 
set_query_var('posts_per_archive_page', $limit);
}
add_filter('pre_get_posts', 'limit_posts_per_archive_page');
