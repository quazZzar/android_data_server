<?php
/*
Template Name: Get JSON Pharmacies
*/

$pharmacies = new WP_Query(array(
	'post_type' => 'pharmacy', 
	'posts_per_page' => -1,
	'tax_query' => array(
		array(
			'taxonomy' => 'pharmacy_tax',
			'field'    => 'slug',
			'terms'    => $_GET['network']
		),
	),));
$pharm_array = array();

if($pharmacies->have_posts()) :
	while($pharmacies->have_posts()) : $pharmacies->the_post();
		
		$phar_id = get_the_ID();
		$phar_name = get_the_title();
		$street = get_post_meta($phar_id, THEME_NAME.'_street', true);
		$latitude = get_post_meta( $phar_id, THEME_NAME.'_latitude', true );
		$longitude = get_post_meta( $phar_id, THEME_NAME.'_longitude', true );
		$phone = get_post_meta( $phar_id, THEME_NAME.'_phone', true );
		$email = get_post_meta( $phar_id, THEME_NAME.'_email', true );
		$website = get_post_meta( $phar_id, THEME_NAME.'_website', true );
		$opening_at = get_post_meta( $phar_id, THEME_NAME.'_opening_at', true );
		$closing_at = get_post_meta( $phar_id, THEME_NAME.'_closing_at', true );
		$distance = ($_GET['latitude'] != null && $_GET['longitude'] != null ) ? get_the_distance($_GET['latitude'], $_GET['longitude'], $latitude, $longitude) : "0 m";

		$pharmacy = new Pharmacy($phar_id, $phar_name, $street, $latitude, $longitude, $phone, $email, $website, $opening_at, $closing_at, $distance);

		array_push($pharm_array, $pharmacy);
	endwhile;
endif;

$json_pharm_array =  json_encode($pharm_array);

echo $json_pharm_array;
