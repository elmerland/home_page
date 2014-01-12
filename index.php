<!DOCTYPE html>
<html>
<head>
	<?php
		require_once("php/mainCSS.php");
		require_once("php/homeCSS.php");
	?>
	<title>Learn Code Art</title>
</head>
<body>
	<?php
		require_once("php/header.php"); 
		require_once("php/nav.php");
	?>
	<div id="main">
		<section>
			<?php require_once("php/articleExcerpts.php"); ?>
		</section>
		<aside>
			<?php require_once("php/homeLinks.php"); ?>
		</aside>
	</div>
</body>
</html>
