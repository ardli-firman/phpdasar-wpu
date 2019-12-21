<!DOCTYPE html>
<html>
<head>
	<title>Lat1</title>
</head>
<body>
<!-- Perulangan membuat table dengan php dan perulangan while -->
<table border="1" cellpadding="10" cellspacing="0">
	<?php $i=1; while ( $i <= 5) :?>
			<tr>
				<?php $j=1; while ( $j <= 5) : ?>
				
				<td><?= "$i, $j" ?></td>
			
				<?php $j++; endwhile; ?>
			</tr>
	<?php $i++; endwhile; ?>
</table>

</body>
</html>