<?php class singletv_widget extends WP_Widget{
	function singletv_widget() {
		$widget_opts = array("class_name" => "singletv_widget","description" => __('Sidebar on TVShows Single','mundothemes'));
		$this->WP_Widget("singletv_widget","GRIFUS: Single TV Shows Sidebar",$widget_opts);
	}
function widget($args, $instance) { echo $before_widget; ?>
<?php get_template_part('includes/series/loop/relacionados'); ?>
<?php echo $after_widget; } function update($new_instance, $old_instance) { } function form($instance) { ?>
<div class="widget_note_muntothemes">
<?php _e('Sidebar on TVShows Single','mundothemes'); ?>
</div>
<?php }	 } add_action('widgets_init', create_function('', 'return register_widget("singletv_widget");'));