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
	<?php if(is_single()){ ?>
		<div class="share-links">
			<p><strong>Share:</strong></p>
			<?php 
				$share_url = urlencode(get_permalink());
				$share_title = urlencode(get_the_title());
				$share_site_url = urlencode(get_site_url());
			?>
			<ul>
				<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank">Facebook</a></li>
				<li><a href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" target="_blank">Twitter</li>
				<li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url; ?>&source=<?php echo $share_site_url; ?>" target="_blank">LinkedIn</a></li>
			</ul>
		</div>
	<?php } ?>
</div>