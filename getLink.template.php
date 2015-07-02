<a class="link" href="
	<?php
	$target = $_SERVER['REQUEST_URI'];
	$first = true;
	foreach ($link['operations'] as $name => $val) {
		if ($first) {
			$target .= '?';
			$first = !$first;
		} else {
			$target .= '&';
		}
		$target .= "$name=$val";
	}
	echo $target;
	?>
"><?php echo $link['submit-val']; ?></a>
