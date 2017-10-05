<div class="pagination">
    <?php
	    $pagination = get_the_posts_pagination( 
	    	array(
				'mid_size' => 3,
				'prev_text' => __( 'Newer', 'textdomain' ),
				'next_text' => __( 'Older', 'textdomain' ),
				'screen_reader_text' => __( ' ', 'textdomain' )
			) 
		);
		echo $pagination;
    ?>
</div>