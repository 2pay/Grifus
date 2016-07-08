!function(){var e={jQuery:"http://code.jquery.com/jquery-latest.min.js"},t=function(){!function(e){e.fn.idTabs=function(){for(var t={},n=0;n<arguments.length;++n){var s=arguments[n];switch(s.constructor){case Object:e.extend(t,s);break;case Boolean:t.change=s;break;case Number:t.start=s;break;case Function:t.click=s;break;case String:"."==s.charAt(0)?t.selected=s:"!"==s.charAt(0)?t.event=s:t.start=s}}return"function"==typeof t["return"]&&(t.change=t["return"]),this.each(function(){e.idTabs(this,t)})},e.idTabs=function(t,n){var s=e.metadata?e(t).metadata():{},r=e.extend({},e.idTabs.settings,s,n);"."==r.selected.charAt(0)&&(r.selected=r.selected.substr(1)),"!"==r.event.charAt(0)&&(r.event=r.event.substr(1)),null==r.start&&(r.start=-1);var a=function(){if(e(this).is("."+r.selected))return r.change;var n="#"+this.href.split("#")[1],s=[],a=[];if(e("a",t).each(function(){this.href.match(/#/)&&(s.push(this),a.push("#"+this.href.split("#")[1]))}),r.click&&!r.click.apply(this,[n,a,t,r]))return r.change;for(i in s)e(s[i]).removeClass(r.selected);for(i in a)e(a[i]).hide();return e(this).addClass(r.selected),e(n).show(),r.change},c=e("a[href*='#']",t).unbind(r.event,a).bind(r.event,a);c.each(function(){e("#"+this.href.split("#")[1]).hide()});var h=!1;return(h=c.filter("."+r.selected)).length||"number"==typeof r.start&&(h=c.eq(r.start)).length||"string"==typeof r.start&&(h=c.filter("[href*='#"+r.start+"']")).length,h&&(h.removeClass(r.selected),h.trigger(r.event)),r},e.idTabs.settings={start:0,change:!1,click:null,selected:".selected",event:"!click"},e.idTabs.version="2.2",e(function(){e(".idTabs").idTabs()})}(jQuery)},n=function(e,t){for(t=t.split(".");e&&t.length;)e=e[t.shift()];return e},s=document.getElementsByTagName("head")[0],r=function(e){var t=document.createElement("script");t.type="text/javascript",t.src=e,s.appendChild(t)},a=document.getElementsByTagName("script"),c=a[a.length-1].src,h=!0;for(d in e)n(this,d)||(h=!1,r(e[d]));return h?t():void r(c)}();
jQuery(document).ready(function() {
var formfield;
jQuery('.up_images').click(function() {
jQuery('html').addClass('Image');
formfield = jQuery(this).prev().attr('name');
tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
return false;
});
window.original_send_to_editor = window.send_to_editor;
window.send_to_editor = function(html){
if (formfield) {
fileurl = jQuery('img',html).attr('src');
if(formfield == "imagenes"){
	formboxi = $('#'+formfield).val();
	if(formboxi != ""){ spacex = "\n"; }else{ spacex = "";}
	jQuery('#'+formfield).val(formboxi + spacex + fileurl);
}else{
	jQuery('#'+formfield).val(fileurl);
}
tb_remove();
jQuery('html').removeClass('Image');
} else {
window.original_send_to_editor(html);
}
};
});