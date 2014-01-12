<div class="fb-like" data-href="
<?php 
	require_once("../php/social/fbLike1.php");
	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	echo $url;
	require_once("../php/social/fbLike2.php");
?>
" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
