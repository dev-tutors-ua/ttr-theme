<?php
	// =========== CUSTOM CAROUSEL WIDGET ===========
	require_once("support/tau_carousel.php");

	// =========== CUSTOM SEARCH WIDGET ===========
	require_once("support/tau_search.php");

	// =========== CUSTOM MENU WALKER FOR BOOTSTRAP ===========
	require_once("support/bt_menu_walker.php");

	// =========== THEME SETUP ===========
	function init_tau_theme() {
		register_taxonomy_for_object_type('category', 'attachment');
	}
	add_action('init', 'init_tau_theme');

	//function my_theme_localized() {
		//return "uk_UA";
	//}
	//add_filter( 'locale', 'my_theme_localized' );

	function setup_tau_theme() {

		// Load Text Domain
		load_theme_textdomain('tau_theme', get_template_directory().'/lang');

		// Register Nav Menu
		register_nav_menus(array(
			'main_nav' => __('Primary Menu'),
			//'side_nav' => __('Sidebar Menu')
		));

		// Thumbnail Support
		add_theme_support('post-thumbnails');
		add_image_size('post-thumb', 170, 170, True);

		//add_image_size('carousel-thumb', 1170, 352, True);
	}
	add_action('after_setup_theme', 'setup_tau_theme');

	// =========== THEME MOD SETUP ===========

	/* Color Customatisation Functins */
	function tau_add_color($wp_customize, $label, $default, $slug, $section_slug) {
		$wp_customize->add_setting("tau_".$section_slug."_".$slug."_color", array(
			'default' => $default,
			'transport' => 'refresh'
		));
		$wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, "tau_".$section_slug."_".$slug."_md", array (
			'label' => __($label, 'tau_theme'),
			'section' => "tau_".$section_slug."_section",
			'settings' => "tau_".$section_slug."_".$slug."_color"
		)) );
	}
	function tau_add_section($wp_customize, $label, $slug, $priority) {
		$wp_customize->add_section("tau_".$slug."_section", array(
			'title' => __($label, 'tau_theme'),
			'priority' => $priority
		));
	}
	function tau_the_color($slug, $section) {
		echo get_theme_mod("tau_".$section."_".$slug."_color");
	}

	function tau_theme_customizer($wp_customize) {

		//Add Theme Logo Support
		$wp_customize->add_setting('tau_logo');
		$wp_customize->add_section('tau_logo_section', array(
			'title' => __('Logo', 'tau_theme'),
			'priority' => 30,
			'description' => "Website Logo"
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tau_logo_control', array(
			'label' => __('Logo', 'tau_theme'),
			'section' => 'tau_logo_section',
			'settings' => 'tau_logo'
		)));


		/* Custom Navbar Colors */
		tau_add_section($wp_customize, "Navbar Colors", "navbar", 10);

		tau_add_color($wp_customize, "Background", "#e4800f", "background", "navbar");

		tau_add_color($wp_customize, "Item (Hover)", "#b56204", "item_hover", "navbar");
		tau_add_color($wp_customize, "Item Text (Hover)", "#eaeaea", "item_txt_hover", "navbar");

		tau_add_color($wp_customize, "Item (Selected)", "#b56204", "item_selected", "navbar");
		tau_add_color($wp_customize, "Item Text (Selected)", "#fff", "item_txt_selected", "navbar");

		tau_add_color($wp_customize, "Item (Active)", "#b56204", "item_active", "navbar");
		tau_add_color($wp_customize, "Item Text (Active)", "#fff", "item_txt_active", "navbar");

		/* Custom Dropdown Colors */
		tau_add_section($wp_customize, "Dropdown Colors", "dropdown", 11);

		tau_add_color($wp_customize, "Background", "#e4800f", "background", "dropdown");
		tau_add_color($wp_customize, "Border", "#ccc", "border", "dropdown");
		tau_add_color($wp_customize, "Text", "#fff", "text", "dropdown");

		tau_add_color($wp_customize, "Item (Hover)", "#b56204", "item_hover", "dropdown");
		tau_add_color($wp_customize, "Item Text (Hover)", "#fff", "item_txt_hover", "dropdown");

		tau_add_color($wp_customize, "Item (Active)", "#b56204", "item_active", "dropdown");
		tau_add_color($wp_customize, "Item Text (Active)", "#fff", "item_txt_active", "dropdown");

		/* Custom Carousel Colors */
		tau_add_section($wp_customize, "Carousel Colors", "carousel", 12);

		tau_add_color($wp_customize, "Title", "#b56204", "title", "carousel");
		tau_add_color($wp_customize, "Title (Text)", "#fff", "title_text", "carousel");

		tau_add_color($wp_customize, "Indicator", "#fff", "indicator", "carousel");

		/* Customize News Panel */
		tau_add_section($wp_customize, "News Panel Color", "news_panel", 13);
		tau_add_color($wp_customize, "Panel Border", "#ddd", "border", "news_panel");

		tau_add_color($wp_customize, "Panel Head", "#f5f5f5", "head", "news_panel");
		tau_add_color($wp_customize, "Panel Head (Text)", "#333", "head_text", "news_panel");

		tau_add_color($wp_customize, "Panel Body", "#fff", "body", "news_panel");
		tau_add_color($wp_customize, "Panel Body (Text)", "#333", "body_text", "news_panel");

		tau_add_color($wp_customize, "Panel Footer", "#f5f5f5", "foot", "news_panel");
		tau_add_color($wp_customize, "Panel Footer (Text)", "#333", "foot_text", "news_panel");

		/* Customize Sidebar Panel */
		tau_add_section($wp_customize, "Sidebar Panel Color", "sidebar_panel", 14);
		tau_add_color($wp_customize, "Panel Border", "#ddd", "border", "sidebar_panel");

		tau_add_color($wp_customize, "Panel Head", "#f5f5f5", "head", "sidebar_panel");
		tau_add_color($wp_customize, "Panel Head (Text)", "#333", "head_text", "sidebar_panel");

		tau_add_color($wp_customize, "Panel Body", "#fff", "body", "sidebar_panel");
		tau_add_color($wp_customize, "Panel Body (Text)", "#333", "body_text", "sidebar_panel");

		tau_add_color($wp_customize, "Panel Footer", "#f5f5f5", "foot", "sidebar_panel");
		tau_add_color($wp_customize, "Panel Footer (Text)", "#333", "foot_text", "sidebar_panel");

		/* Customize Back To Top  */
		tau_add_section($wp_customize, "Back To Top Color", "backtop", 15);

		tau_add_color($wp_customize, "Background", "#e4800f", "bg", "backtop");
		tau_add_color($wp_customize, "Background (Hover)", "#e27b04", "bg_color", "backtop");

	}
	add_action('customize_register', 'tau_theme_customizer');


	// Set Customiable Colors
	function setup_tau_custom_css() {
	?>
		<style type="text/css">
			/* ==== Back To Top ==== */
			.cd-top {
				background-color: <?php tau_the_color("bg", "backtop"); ?>;
			}
			.cd-top:hover {
				background-color: <?php tau_the_color("bg_color", "backtop"); ?>;
			}
			/* News Panel Colors */
			.news-panel {
				border-color: <?php tau_the_color("border","news_panel") ?>;
			}
			.news-panel > .panel-heading {
				border-color: <?php tau_the_color("border","news_panel") ?>;
				background-color: <?php tau_the_color("head", "news_panel"); ?>;
				color: <?php tau_the_color("head_text", "news_panel"); ?>;
			}
			.news-panel > .panel-body {
				border-color: <?php tau_the_color("border","news_panel") ?>;
				background-color: <?php tau_the_color("body", "news_panel"); ?>;
				color: <?php tau_the_color("body_text", "news_panel"); ?>;
			}
			.news-panel > .panel-footer {
				border-color: <?php tau_the_color("border","news_panel") ?>;
				background-color: <?php tau_the_color("foot", "news_panel"); ?>;
				color: <?php tau_the_color("foot_text", "news_panel"); ?>;
			}
			/* Sidebar Panel Colors */
			.sidebar-panel {
				border-color: <?php tau_the_color("border","sidebar_panel") ?>;
			}
			.sidebar-panel > .panel-heading {
				border-color: <?php tau_the_color("border","sidebar_panel") ?>;
				background-color: <?php tau_the_color("head", "sidebar_panel"); ?>;
				color: <?php tau_the_color("head_text", "sidebar_panel"); ?>;
			}
			.sidebar-panel > .panel-body {
				border-color: <?php tau_the_color("border","sidebar_panel") ?>;
				background-color: <?php tau_the_color("body", "sidebar_panel"); ?>;
				color: <?php tau_the_color("body_text", "sidebar_panel"); ?>;
			}
			.sidebar-panel > .panel-footer {
				border-color: <?php tau_the_color("border","sidebar_panel") ?>;
				background-color: <?php tau_the_color("foot", "sidebar_panel"); ?>;
				color: <?php tau_the_color("foot_text", "sidebar_panel"); ?>;
			}


			/* ====== Carousel Title ====== */
			.carousel-title {
				background-color: <?php tau_the_color("title", "carousel"); ?>;
				color: <?php tau_the_color("title_text", "carousel"); ?>;
			}
			/* Carousel Indicators */
			.carousel-indicators > li {
				border-color: <?php tau_the_color("indicator", "carousel"); ?>;
			}
			.carousel-indicators > .active {
				background-color: <?php tau_the_color("indicator", "carousel"); ?>;
			}

			/* ===== Navbar ===== */
			.navbar-default {
				background-color: <?php tau_the_color("background", "navbar"); ?>;
			}

			/* Navbar Item (Hover) */
			.navbar-default .navbar-nav > li > a:hover,
			.navbar-default .navbar-nav > li > a:focus {
				background-color: <?php tau_the_color("item_hover", "navbar"); ?>;
				color: <?php tau_the_color("item_txt_hover", "navbar"); ?>;
			}
			/* Navbar Branding Area (Hover) */
			.navbar-default .navbar-brand:hover,
			.navbar-default .navbar-brand:focus {
				background-color: <?php tau_the_color("item_hover", "navbar"); ?>;
				color: <?php tau_the_color("item_txt_hover", "navbar"); ?>;
			}


			/* Navbar Mobile Menu Button (Selected) */
			.navbar-default .navbar-toggle:hover,
			.navbar-default .navbar-toggle:focus {
				background-color: <?php tau_the_color("item_selected", "navbar"); ?>;
			}
			/* Navbar Item (Selected) */
			.navbar-default .navbar-nav > .open > a,
			.navbar-default .navbar-nav > .open > a:hover,
			.navbar-default .navbar-nav > .open > a:focus {
				background-color: <?php tau_the_color("item_selected", "navbar"); ?>;
				color: <?php tau_the_color("item_txt_selected", "navbar"); ?>;
			}

			/* Navbar Item (Active) */
			.navbar-default .navbar-nav > .active > a,
			.navbar-default .navbar-nav > .active > a:hover,
			.navbar-default .navbar-nav > .active > a:focus,
			.navbar-default .navbar-nav > .current-menu-parent > a,
			.navbar-default .navbar-nav > .current-menu-parent > a:hover,
			.navbar-default .navbar-nav > .current-menu-parent > a:focus {
				background-color: <?php tau_the_color("item_active", "navbar"); ?>;
				color: <?php tau_the_color("item_txt_active", "navbar"); ?>;
			}


			/* ===== Dropdown Menu ====== */
			.navbar-default .navbar-nav .dropdown-menu {
				background-color: <?php tau_the_color("background", "dropdown"); ?>;
			}
			/* Dropdown Menu Item  */
			.dropdown-menu > li > a,
			.dropdown-menu > li > a {
				color: <?php tau_the_color("text", "dropdown"); ?>;
			}
			/* Dropdown Menu Item (Active)  */
			.dropdown-menu > .active > a,
			.dropdown-menu > .active > a:hover,
			.dropdown-menu > .active > a:focus {
				background-color: <?php tau_the_color("item_active", "dropdown"); ?>;
				color: <?php tau_the_color("item_txt_active", "dropdown"); ?>;
			}
			/* Dropdown Item (Hover) */
			.dropdown-menu > li > a:hover,
			.dropdown-menu > li > a:focus {
				background-color: <?php tau_the_color("item_hover", "dropdown"); ?>;
				color: <?php tau_the_color("item_txt_hover", "dropdown"); ?>;
			}
			/* Dropdown Menu (Mobile Style) */
			@media (max-width: 767px) {
				/* Dropdown Menu Item (Active) */
				.navbar-default .navbar-nav .open .dropdown-menu > .active > a,
				.navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover,
				.navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus {
					background-color: <?php tau_the_color("item_active", "navbar"); ?>;
					color: <?php tau_the_color("item_txt_active", "navbar"); ?>;
				}

				/* Dropdown Menu Item (Hover) */
				.navbar-default .navbar-nav .open .dropdown-menu > li > a:hover,
				.navbar-default .navbar-nav .open .dropdown-menu > li > a:focus {
					background-color: <?php tau_the_color("item_hover", "navbar"); ?>;
					color: <?php tau_the_color("item_txt_hover", "navbar"); ?>;
				}
			}
		</style>
	<?php
	}
	add_action('wp_head', 'setup_tau_custom_css');

	// =========== WIDGET SETUP ===========
	function setup_tau_widgets() {

		// Register "Right" Sidebar
		register_sidebar(array(
			'name' => 'Right Sidebar',
			'id' => 'right_bar',

			// Title Formating
			'before_title' => '<div class="panel-heading"> <h4 class="panel-title">',
			'after_title' => '</h4> </div> <div class="panel-body"> ',

			// Widget Formating
			'before_widget' => '<div class="panel panel-default sidebar-panel">',
			'after_widget' => '</div> </div>'
		));

		// Register "News Right" Sidebar
		register_sidebar(array(
			'name' => 'Archive Sidebar',
			'id' => 'arch_bar',

			// Title Formating
			'before_title' => '<div class="panel-heading"> <h4 class="panel-title">',
			'after_title' => '</h4> </div> <div class="panel-body sidebar-body"> ',

			// Widget Formating
			'before_widget' => '<div class="panel panel-default sidebar-panel">',
			'after_widget' => '</div> </div>'
		));

		// Register Homepage
		register_sidebar(array(
			'name' => 'Homepage Top Bar',
			'id' => 'home_bar'
		));

		// Register Carousel
		//register_widget('TAU_Carousel');

		// Register Search Widget
		register_widget('TAU_Search');
	}
	add_action('widgets_init', 'setup_tau_widgets');

	// =========== STYLE SHEETS ===========

	// Set Stylesheet
	function TAU_set_style() {
		wp_enqueue_style('style', get_stylesheet_uri());
	}
	add_action('wp_enqueue_scripts', 'TAU_set_style');


	// =========== READ MORE ===========

	// Set Read More Length
	$post_w_length = 50;
	function new_excerpt_length($len) {
		return $len;
	}
	add_filter('excerpt_length', 'new_excerpt_length', $post_w_length);

	// Read More Link
	function new_excerpt_more($more) {
		global $post;
		return '';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

	// Prints Excerpt
	$more_post = False;
	function print_the_excerpt() {
		global $more_post, $post_w_length;

		$excerpt = get_the_excerpt();

		$exwords = explode(' ', $excerpt);
		$wcont = count($exwords);

		if ($wcont >= $post_w_length) {
			$more_post = True;
			$excerpt = $excerpt . " [...]";
		} else {
			$more_post = False;
		}

		echo $excerpt;
	}

?>
