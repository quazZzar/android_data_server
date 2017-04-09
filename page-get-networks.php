<?php
/*
Template Name: Get JSON Networks
*/
 get_header(); 

$terms = get_terms( 'pharmacy_tax', array(
	'hide_empty' => true,
) );

$terms_array = array();

foreach($terms as $term) :
	$net_id = $term->term_id;
	$net_name = $term->slug;
	$net_label = $term->name;

	$args = array(
		'post_type' => 'pharmacy',
		'tax_query' => array(
			array(
				'taxonomy' => 'pharmacy_tax',
				'field'    => 'slug',
				'terms'    => $net_name
			)
		)
	);
	$pharms_in_this_network = new WP_Query( $args );
	$net_pharms = $pharms_in_this_network->post_count;

	$network = new Network($net_id, $net_name, $net_label, $net_pharms);
	array_push($terms_array, $network);
endforeach;

$json_terms_array = json_encode($terms_array);
echo $json_terms_array;

 get_footer();