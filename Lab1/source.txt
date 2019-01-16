<!DOCTYPE html>
<html>
<head>
	<title>Tip of the day</title>
</head>

<body>
	<h1>Tip of the day</h1>
	<?php
		echo "<h3>Here's your tip:</h3>";
	?>

	<div style = "border-color: green; border-style: groove; border=width: 2px">
		<?php
			readfile("tips.txt");
		?>
	</div>
	<p><a href="source.txt">Source Code</a></p>
</body>
</html>