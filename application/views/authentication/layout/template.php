<!DOCTYPE html>
<html lang="en">

<head>
	<title>
		<?php echo $title ?>
	</title>
	<link href='<?php echo base_url("assets/upload/images/$favicon"); ?>' rel='shortcut icon' type='image/x-icon' />
	<!-- meta -->
	<?php require_once('_meta.php') ;?>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- css -->
	<?php require_once('_css.php') ;?>
</head>

<body background = "<?php echo base_url('assets');?>/img/bg-img/dd.jpg">
	<div id="container" class="cls-container">
		<?php echo $contents ;?>
	</div>
	<!-- js -->
	<?php require_once('_js.php') ;?>
</body>

</html>
