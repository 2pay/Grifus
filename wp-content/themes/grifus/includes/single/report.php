<?php 
# Sistema de Reportes de enlaces para Grifus.
# 26/05/2015.
# Erick Meza.
# Mundothemes Inc.
if($_GET['report']) { 
require_once "formularios/recaptchalib.php";
$siteKey = get_option('public_key_rcth');
$secret = get_option('private_key_rcth');
$resp = null;
$error = null;
$reCaptcha = new ReCaptcha($secret);
if ($_POST["g-recaptcha-response"]) {
$resp = $reCaptcha->verifyResponse(
$_SERVER["REMOTE_ADDR"],
$_POST["g-recaptcha-response"] ); }
if ($resp != null && $resp->success) { 
require("formularios/class.phpmailer.php");
$msg = "";
if ($_POST['action'] == "send") {
$varname = $_FILES['archivo']['name'];
$vartemp = $_FILES['archivo']['tmp_name'];
$correo = get_option('admin_email');
$mail = new PHPMailer();
$mail->Host = "localhost";
$mail->From = $correo;
$mail->FromName = __( "New Report", "mundothemes" );
$mail->Subject = $_POST['asunto'];
$mail->AddAddress($correo);
if ($varname != "") {
$mail->AddAttachment($vartemp, $varname); }
$body = "
<strong>".__( "Title", "mundothemes" )."</strong>:&nbsp;".$_POST['titulo']."<br>
<strong>".__( "Post ID", "mundothemes" )."</strong>:&nbsp;".$_POST['id']."<br>
<strong>".__( "Subject", "mundothemes" )."</strong>:&nbsp;".$_POST['asunto']."<br>
<strong>".__( "Permalink", "mundothemes" )."</strong>:&nbsp;".$_POST['enlace']."<br>
<strong>".__( "IP", "mundothemes" )."</strong>:&nbsp;".$_POST['ip']."<br>
<strong>".__( "Email", "mundothemes" )."</strong>:&nbsp;".$_POST['mail']."<br>
<br><br>
".$_POST['detalles']."
<br><br>
<a href='".$_POST['link']."/wp-admin/post.php?post=".$_POST['id']."&action=edit' target=''>".$_POST['link']."/wp-admin/post.php?post=".$_POST['id']."&action=edit</a>
<br><br>";
$mail->Body = $body;
$mail->IsHTML(true);
$mail->Send();
$msg = "ok"; } ?>
<div class="aviso2 azul">
<div class="icon"><b class="icon-check-circle"></b></div>
<div class="contenido32">
<span><?php _e('Report sent','mundothemes'); ?></span>
<?php _e('We have successfully received your report, thank you.','mundothemes'); ?></div>
</div>
<?php } else { ?>
<div class="aviso2 rojo">
<div class="icon"><b class="icon-exclamation-circle"></b></div>
<div class="contenido32">
<span><?php _e('Error','mundothemes'); ?></span>
<?php _e('We can not send your report, try again.','mundothemes'); ?></div>
</div>
<?php }  } ?>
<div class="reportform">
<h3><?php _e('Report error','mundothemes'); ?></h3>
<form method="post" action="<?php the_permalink() ?>?report=<?php echo validar_key(10); ?>#uwee"> 
<div class="aff">
<select name="asunto">
<?php if(get_post_custom_values("embed_pelicula")) { ?>
<option value="<?php _e('Video removed','mundothemes'); ?>"><?php _e('Video removed','mundothemes'); ?></option>
<option value="<?php _e('Faulty video','mundothemes'); ?>"><?php _e('Faulty video','mundothemes'); ?></option>
<option value="<?php _e('Error image','mundothemes'); ?>"><?php _e('Error image','mundothemes'); ?></option>
<option value="<?php _e('Error sound','mundothemes'); ?>"><?php _e('Error sound','mundothemes'); ?></option>
<option value="<?php _e('Error subtitle','mundothemes'); ?>"><?php _e('Error subtitle','mundothemes'); ?></option>
<?php } else { ?>
<option value="<?php _e('Add movie','mundothemes'); ?>"><?php _e('Add movie','mundothemes'); ?></option>
<?php } if(get_option('activar-acf')) { ?>
<option value="<?php _e('Fallen download links','mundothemes'); ?>"><?php _e('Fallen download links','mundothemes'); ?></option>
<?php } ?>
<option value="<?php _e('Incorrect information','mundothemes'); ?>"><?php _e('Incorrect information','mundothemes'); ?></option>
<option value="<?php _e('SPAM','mundothemes'); ?>"><?php _e('SPAM','mundothemes'); ?></option>
<option value="<?php _e('Other','mundothemes'); ?>"><?php _e('Other','mundothemes'); ?></option>


</select>
<input type="text" name="mail" placeholder="<?php _e('Email','mundothemes'); ?>" required>
<textarea name="detalles" placeholder="<?php _e('Details','mundothemes'); ?>"></textarea>
</div>
<div class="bff">
<div class="g-recaptcha" data-sitekey="<?php echo get_option('public_key_rcth') ?>"></div>
<input type="submit" value="<?php _e('Report content','mundothemes'); ?>">
</div>
<input type="hidden" name="titulo" value="<?php the_title(); ?>">
<input type="hidden" name="enlace" value="<?php the_permalink() ?>">
<input type="hidden" name="id" value="<?php the_id(); ?>">
<input type="hidden" name="ip" value="<?php echo la_ip(); ?>">
<input type="hidden" name="link" value="<?php bloginfo('url'); ?>">
<input type="hidden" name="action" value="send" />
</form>
</div>