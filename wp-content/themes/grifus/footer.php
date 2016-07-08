<div id="footer" class="<?php global $post_type; if( $post_type == 'tvshows' ) { if(is_single()) { ?>tvshows_single <?php } } global $post_type; if( $post_type == 'episodes' ) { if(is_single()) { ?>tvshows_single <?php } } ?>">
<?php D82J5N5S4G22142GKJSHR(); ?>
</div>
</div>
</div>
<?php $code = get_option('code_integracion'); if (!empty($code)) echo stripslashes(get_option('code_integracion')); ?>
<script>
$(".se-q").click( function () {
  var container = $(this).parents(".se-c");
  var answer = container.find(".se-a");
  var trigger = container.find(".se-t");
  
  answer.slideToggle(200);
  
  if (trigger.hasClass("se-o")) {
    trigger.removeClass("se-o");
  }
  else {
    trigger.addClass("se-o");
  }
});
</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/functions.min.js?ver=<?php recoger_version();?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scrollbar.js?ver=<?php recoger_version();?>"></script>
<script>
!function(l){l(window).load(function(){l(".scrolling").mCustomScrollbar({theme:"minimal-dark",scrollButtons:{enable:!0},callbacks:{onTotalScroll:function(){addContent(this)},onTotalScrollOffset:100,alwaysTriggerOffsets:!1}})})}(jQuery);
<?php $activar = get_option('activar-scroll'); if ($activar == "true") { } else { ?>
$(function(){for(var i=0,t=$(".items .item"),e=0;e<=t.length;e++)i>3?($(".items .item:nth-child("+e+") .boxinfo").addClass("right"),5>i?i++:(i--,i--,i--,i--)):($(".items .item:nth-child("+e+") .boxinfo").addClass("left"),i++)});
<?php } ?>
</script>
<?php wp_footer(); ?>
<a id="arriba" class="arribatodo" href="#"><b class="icon-chevron-up2"></b></a>
</body>
</html>
