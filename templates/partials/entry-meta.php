<div class="entry-meta">
	<?php 
		$pub_date = get_the_time(get_option('date_format'));
		$mod_date = get_the_modified_date(get_option('date_format'));
	?>
	<p>
		<span class="entry-meta-block"><strong>Published: </strong><?php echo $pub_date; ?></span>
		<?php if($pub_date !== $mod_date){ ?>
			<span class="entry-meta-block"><strong>Updated: </strong><?php echo $mod_date; ?></span>
		<?php } ?>
	</p>
</div>