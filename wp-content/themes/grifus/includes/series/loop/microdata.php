<!-- Micro data -->
<meta itemprop="datePublished" content="<?php the_date('c'); ?>"/>
<meta itemprop="url" content="<?php the_permalink() ?>" />
<?php $terms = wp_get_post_terms( $post->ID, 'tvcreator'); foreach($terms as $term) { $term_link = get_term_link( $term ); if ( is_wp_error( $term_link ) ) { continue; }
echo '<div itemprop="creator" itemscope itemtype="http://schema.org/Person"><meta itemprop="name" content="' . $term->name . '"><meta itemprop="url" content="' . esc_url( $term_link ) . '"></div>'; } ?>
<?php $terms = wp_get_post_terms( $post->ID, 'tvcast'); foreach($terms as $term) { $term_link = get_term_link( $term ); if ( is_wp_error( $term_link ) ) { continue; }
echo '<div itemprop="actors" itemscope itemtype="http://schema.org/Person"><meta itemprop="name" content="' . $term->name . '"><meta itemprop="url" content="' . esc_url( $term_link ) . '"></div>'; } ?>
<!-- end Micro data -->
