<form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_site_url(); ?>" _lpchecked="1">
	<input type="text" value="<?php the_search_query(); ?>" placeholder="Search" name="s" id="s" />
	<input type="hidden" id="searchsubmit" value="Search" />
</form>