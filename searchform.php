<form class="nav-search nav-search-nomedia" action="<?php echo home_url( '/' ) ?>">
	<input placeholder="Что ищем?" class="input search tsm12" type="text" name="s" id="s">
	<button class="nav-search__zoom col-center">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/main/lupa.png" alt="">
	</button>
	
</form>

<form class="nav-search nav-search-media" action="<?php echo home_url( '/' ) ?>" style="display: none;">	
	<div class="nav-search-media__hover">
		<input placeholder="Что ищем?" class="input search input-search-media tsm12" type="text" name="s" id="s">
		<button class="nav-search__zoom nav-search__zoom-in col-center">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/main/lupa.png" alt="">
		</button>	
		<div class="close"></div>
	</div>
</form> 