<div class="responsive-menu-wrap">
	<span class="mobile-menu-icon"><i class="mobile-menu-icon-toggle feather-icon-menu"></i></span>
	<div class="mobile-menu-toggle">
		<div class="logo-mobile">
			<a href="https://imaginem.io/kinetika?themeskin=light">
				<img class="logoimage" src="https://imaginem.io/kinetika/wp-content/themes/kinetika/images/logo_dark.png" alt="logo">
			</a>
		</div>
	</div>
</div>
<div class="responsive-mobile-menu">
	<div class="mobile-wpml-lang-selector-wrap"></div>
	<div class="mobile-social-header">
		<div class="footer-column">
			<div class="sidebar-widget">
				<aside id="msocial-widget-3" class="widget MSocial_Widget">
					<div class="social-header-wrap">
						<social-media-list></social-media-list>
					</div>
				</aside>
			</div>
		</div>
	</div>
	<nav>
		@include('includes.nav-menu', [ 'isMobile' => true ])
	</nav>
	<div class="cleafix"></div>
</div>
<div class="mtheme-fullscreen-toggle fullscreen-toggle-off"><i class="fa fa-expand"></i></div>
<div class="stickymenu-zone outer-wrap">
	<div class="outer-header-wrap clearfix">
		<nav>
			<div class="mainmenu-navigation">
				<div class="header-logo-section">
					<div class="logo">
						<a href="https://imaginem.io/kinetika?menu_type=middle">
							<img class="logo-theme-main" src="https://imaginem.io/kinetika/wp-content/themes/kinetika/images/logo_dark.png" alt="logo" />
						</a>
					</div>
				</div>
				<div class="homemenu">
					@include('includes.nav-menu', [ 'isMobile' => false ])
				</div>
			</div>
		</nav>
	</div>
</div>
<div class="wpml-lang-selector-wrap"></div>