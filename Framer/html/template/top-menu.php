

	<nav class="navbar">
		<button class="mobile-navbar-icon" data-nav="button"><i class="fr fr-nav-icon"></i> </button>
		<div class="navbar-link-wrapper" data-nav="toggle">
			<?php $walker = new WalkerMenu(); ?>
			<?php wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_id' => 'primary-menu',
				'walker' => $walker
			 ) ); ?>
		</div>
	</nav>
