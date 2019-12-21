<?php 
	$nomor = [[1,5,4],[3,5,3],[5,5,1]];
?>

<!DOCTYPE html>
<html>
<head>
	<title>ARRaY</title>
</head>
<style>
	.obj{
		width: 50px;
		height: 50px;
		line-height: 50px;
		background-color: salmon;
		margin: 1px;
		text-align: center;
		float: left;
	}

	.obj:hover{
		transform: rotateX(360deg);
		transition: 1s;
	}
	.clear{
		clear: both;
	}
</style>
<body>
	<?php foreach ($nomor as $a) : ?>
		<?php foreach ($a as $b) : ?>
			<div class="obj"><?= $b; ?></div>
		<?php endforeach; ?>
		<div class="clear"></div>
	<?php endforeach; ?>
</body>
</html>