<?php get_header(); ?>
<div class="box">
<div class="header">
<?php 
/* sub-menu */
function_exists('wp_nav_menu') && has_nav_menu('menu_subheader' );
wp_nav_menu( array( 'theme_location' => 'menu_subheader', 'container' => '',  'menu_class' => '') );
?>
<div class="buscador">
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
<div class="imputo">
<input class="buscar" TYPE="text" placeholder="<?php _e('Search..', 'mundothemes'); ?>" name="s" id="s">
</div>
</form>
</div>
</div>
<?php
/**
 * Template Name: User Profile
 *
 * Allow users to update their profiles from Frontend.
 *
 */
/* Get user info. */
global $current_user, $wp_roles;
//get_currentuserinfo(); //deprecated since 3.1
/* Load the registration file. */
//require_once( ABSPATH . WPINC . '/registration.php' ); //deprecated since 3.1
$error = array();    
/* If profile was saved, update profile. */
if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == 'update-user' ) {
    /* Update user password. */
    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
        if ( $_POST['pass1'] == $_POST['pass2'] )
            wp_update_user( array( 'ID' => $current_user->ID, 'user_pass' => esc_attr( $_POST['pass1'] ) ) );
        else
            $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'mundothemes');
    }
    /* Update user information. */
    if ( !empty( $_POST['url'] ) )
        wp_update_user( array( 'ID' => $current_user->ID, 'user_url' => esc_url( $_POST['url'] ) ) );
    if ( !empty( $_POST['email'] ) ){
        if (!is_email(esc_attr( $_POST['email'] )))
            $error[] = __('The Email you entered is not valid.  please try again.', 'mundothemes');
        elseif(email_exists(esc_attr( $_POST['email'] )) != $current_user->id )
            $error[] = __('This email is already used by another user.  try a different one.', 'mundothemes');
        else{
            wp_update_user( array ('ID' => $current_user->ID, 'user_email' => esc_attr( $_POST['email'] )));
        }
    }

    if ( !empty( $_POST['first-name'] ) )
        update_user_meta( $current_user->ID, 'first_name', esc_attr( $_POST['first-name'] ) );
    if ( !empty( $_POST['last-name'] ) )
        update_user_meta($current_user->ID, 'last_name', esc_attr( $_POST['last-name'] ) );   	
	if ( !empty( $_POST['description'] ) )
        update_user_meta( $current_user->ID, 'description', esc_attr( $_POST['description'] ) );

if ( !empty( $_POST['googleplus'] ) )
        update_user_meta( $current_user->ID, 'googleplus', esc_attr( $_POST['googleplus'] ) );
if ( !empty( $_POST['twitter'] ) )
        update_user_meta( $current_user->ID, 'twitter', esc_attr( $_POST['twitter'] ) );
if ( !empty( $_POST['facebook'] ) )
        update_user_meta( $current_user->ID, 'facebook', esc_attr( $_POST['facebook'] ) );


    /* Redirect so the page will show updated info.*/
  /*I am not Author of this Code- i dont know why but it worked for me after changing below line to if ( count($error) == 0 ){ */
    if ( count($error) == 0 ) {
        //action hook for plugins and extra fields saving
        do_action('edit_user_profile_update', $current_user->ID);
        wp_redirect( get_permalink() );
        exit;
    }
}
?>


<div class="box_item">
<div class="peliculas">
<div id="revel2" class="skl">
<?php slk(); ?>
</div>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>">
<div class="entry-content entry">
<?php the_content(); ?>
<?php if ( !is_user_logged_in() ) : ?>
<p class="warning"><?php _e('You must be logged in to edit your profile.', 'mundothemes'); ?></p><!-- .warning -->
<?php else : ?>
<?php if ( count($error) > 0 ) echo '<p class="error">' . implode("<br />", $error) . '</p>'; ?>
<form method="post" id="adduser" action="<?php the_permalink(); ?>?user=true">


<h2><?php _e('My Profile','mundothemes'); ?> <b class="icon-user"></b></h2>
                    
<p class="form-username">
<label for="first-name"><?php _e('First Name', 'mundothemes'); ?></label>
<input class="text-input" name="first-name" type="text" id="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
</p><!-- .form-username -->

<p class="form-username">
<label for="last-name"><?php _e('Last Name', 'mundothemes'); ?></label>
<input class="text-input" name="last-name" type="text" id="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" />
</p><!-- .form-username -->
                    

<p class="form-url">
<label for="url"><?php _e('Website', 'mundothemes'); ?></label>
<input class="text-input" name="url" type="text" id="url" value="<?php the_author_meta( 'user_url', $current_user->ID ); ?>" />
</p><!-- .form-url -->


<p class="form-textarea">
<label for="description"><?php _e('Biographical Information', 'mundothemes') ?></label>
<textarea name="description" id="description" rows="3" cols="50"><?php the_author_meta( 'description', $current_user->ID ); ?></textarea>
</p><!-- .form-textarea -->


<h2><?php _e('My Social networks','mundothemes'); ?> <b class="icon-share2"></b></h2>


<p class="form-googleplus">
<label for="googleplus"><?php _e('Google+', 'mundothemes'); ?></label>
<input class="text-input" name="googleplus" type="text" id="url" value="<?php the_author_meta( 'googleplus', $current_user->ID ); ?>" />
</p><!-- .form-url -->


<p class="form-twitter">
<label for="twitter"><?php _e('Twitter username (without @)', 'mundothemes'); ?></label>
<input class="text-input" name="twitter" type="text" id="twitter" value="<?php the_author_meta( 'twitter', $current_user->ID ); ?>" />
</p><!-- .form-url -->



<p class="form-facebook">
<label for="facebook"><?php _e('Facebook', 'mundothemes'); ?></label>
<input class="text-input" name="facebook" type="text" id="facebook" value="<?php the_author_meta( 'facebook', $current_user->ID ); ?>" />
</p><!-- .form-url -->


<h2><?php _e('Access details','mundothemes'); ?> <b class="icon-lock"></b></h2>


<p class="form-email">
<label for="email"><?php _e('E-mail *', 'mundothemes'); ?></label>
<input class="text-input" name="email" type="text" id="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" />
</p><!-- .form-email -->


                    
<p class="form-password">
<label for="pass1"><?php _e('Password *', 'mundothemes'); ?> </label>
<input class="text-input" name="pass1" type="password" id="pass1" />
</p><!-- .form-password -->
                    
					
<p class="form-password">
<label for="pass2"><?php _e('Repeat Password *', 'mundothemes'); ?></label>
<input class="text-input" name="pass2" type="password" id="pass2" />
</p><!-- .form-password -->




<?php 
//action hook for plugin and extra fields
do_action('edit_user_profile',$current_user); ?>
                    
<p class="form-submit">
<?php echo $referer; ?>
<input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update', 'mundothemes'); ?>" />
<?php wp_nonce_field( 'update-user' ) ?>
<input name="action" type="hidden" id="action" value="update-user" />
</p><!-- .form-submit -->

 </form><!-- #adduser -->
<?php endif; ?>

</div><!-- .entry-content -->
</div><!-- .hentry .post -->
<?php endwhile; ?>
<?php else: ?>
<p class="no-data">
<?php _e('Sorry, no page matched your criteria.', 'mundothemes'); ?>
</p><!-- .no-data -->
<?php endif; ?>
</div>


<div class="lateral">
<?php $active = get_option('widget_home'); if ($active == "true") {  dynamic_sidebar( 'Home' );  } else { ?>
<div id="fixer2">
<?php laterales(); ?>
</div>
<?php } ?>
</div>
</div>
</div>


<?php  get_footer(); ?>