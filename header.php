<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="description" content="<?php bloginfo('description'); ?>" />
		<meta name="author" content="<?php esc_attr_e('TeslaThemes','locales'); ?>"/>

		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<?php wp_head() ?>
	</head>
	<body id="page" <?php body_class();?>>

		<!-- Main Content Box -->
		<div class="content-box">