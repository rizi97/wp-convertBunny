<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package convertbunny
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">

		<?php 
			if( isset( $_GET['theme_style'] ) == 'dark' ) {
				echo wp_get_attachment_image( 
					get_field('header_logo_dark_version', 'options'), 
					array('278', '92'),
					"",
					array( "class" => "img-fluid" ) ); 
			} 
			else {
				echo wp_get_attachment_image( 
					get_field('header_logo_light_version', 'options'), 
					array('278', '92'),
					"",
					array( "class" => "img-fluid" ) ); 
			}
		?>
  
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'container' 	 => false,
						'menu_class'     => 'navbar-nav me-auto ms-auto mb-2 mb-lg-0',
						'add_li_class'   => 'nav-item'
					)
				);
			?>
			<div class="form-check form-switch">
				<label class="form-check-label" for="flexSwitchCheckDefault"><?php echo ( isset( $_GET['theme_style'] ) == 'dark' ) ? 'Dark' : 'Light'; ?></label>
				<input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value="<?php echo ( isset( $_GET['theme_style'] ) == 'dark' ) ? 1 : 0; ?>" <?php echo ( isset( $_GET['theme_style'] ) == 'dark' ) ? 'checked' : ''; ?> />
			</div>
      </div>
    </div>
</nav>