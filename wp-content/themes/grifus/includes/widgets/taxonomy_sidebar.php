<?php class tax_widget extends WP_Widget{
	function tax_widget() {
		$widget_opts = array("class_name" => "tax_widget","description" => __('Sidebar on Taxonomy page','mundothemes'));
		$this->WP_Widget("tax_widget","GRIFUS: Taxonomy Sidebar",$widget_opts);
	}
function widget($args, $instance) { echo $before_widget; ?>
<?php get_template_part('loop/sidebar-tvshows'); ?>
<?php echo $after_widget; } function update($new_instance, $old_instance) { } function form($instance) { ?>
<div class="widget_note_muntothemes">
<?php _e('Sidebar on Taxonomy page','mundothemes'); ?>
</div>
<?php }	 } add_action('widgets_init', create_function('', 'return register_widget("tax_widget");'));