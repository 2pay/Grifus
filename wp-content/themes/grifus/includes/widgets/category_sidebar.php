<?php class cat_widget extends WP_Widget{
	function cat_widget() {
		$widget_opts = array("class_name" => "cat_widget","description" => __('Sidebar on Category page','mundothemes'));
		$this->WP_Widget("cat_widget","GRIFUS: Category Sidebar",$widget_opts);
	}
function widget($args, $instance) { echo $before_widget; ?>
<?php get_template_part('loop/sidebar-home'); ?>
<?php echo $after_widget; } function update($new_instance, $old_instance) { } function form($instance) { ?>
<div class="widget_note_muntothemes">
<?php _e('Sidebar on Category page','mundothemes'); ?>
</div>
<?php }	 } add_action('widgets_init', create_function('', 'return register_widget("cat_widget");'));