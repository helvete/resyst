<?php
$i = 0; do {
	if ($i > 0) {
		echo "<span class=\"arrow\">&nbsp;>>&nbsp;</span>";
	} else {
		echo "<span class=\"gap\"></span>";
	}
?>
<span class="post-tag l<?php echo $i; ?>"
	title="Category tag level <?php echo $i; ?>"
	style="border-top: 2px solid #<?php echo $tag->colour?>;">
	<?php
		$link = array(
			'action' => '',
			'operations' => array(
				'displayTag' => $tag->name,
			),
			'submit-val' => $tag->name,
		);
		include './getLink.template.php';
		$i++;
	?>
</span>
<?php
	$tag = $tag->parent;
} while ( ! empty($tag));
?>
