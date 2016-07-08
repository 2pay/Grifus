<?php if (!function_exists('grifus_comment')): 
	function grifus_comment($comment, $args, $depth) 
	{ $GLOBALS['comment'] = $comment; 
	switch ($comment->comment_type): 
	case '' : ?>


	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	    <div class="com_avat"><?php echo get_avatar( $comment, 50 ); ?></div>
		<div id="comment-<?php comment_ID(); ?>" class="the_comment">
		<div class="comment-author"><span class="date"><?php printf( __( '%1$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( __( 'Edit', 'rafael' ), ' ' ); ?></span>
		<div class="comment-body">
		<B><?php printf( __( '%s', 'twentyten' ), sprintf( '%s', get_comment_author_link() ) ); ?></B>
		<?php if ($comment->comment_approved == '0'): ?>
		<div class="mod"><?php _e('Your comment is pending moderation', 'rafael'); ?></div>
        <?php endif; ?>
		<div class="texto">
		<?php comment_text(); ?>
		</div>
        <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
        </div>
	</div></div>




<?php break; case 'pingback' : case 'trackback' : ?>



	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	    <div class="com_avat"><?php echo get_avatar( $comment, 50 ); ?></div>
		<div id="comment-<?php comment_ID(); ?>" class="the_comment">
		<div class="comment-author"><span class="fecha"><?php printf( __( '%1$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( __( 'Edit', 'rafael' ), ' ' ); ?></span>
       <div class="comment-body"><B><?php printf( __( '%s', 'twentyten' ), sprintf( '%s', get_comment_author_link() ) ); ?></B>
		<div class="texto">
		<?php comment_text(); ?>
		</div>
		<?php if ($comment->comment_approved == '0'): ?>
		<div class="mod"><?php _e('Your comment is pending moderation', 'mundothemes'); ?></div>
        <?php endif; ?>
		</div>
	</div></div>



<?php break; endswitch; } endif; ?>