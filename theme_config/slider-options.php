<?php
return array('pharmacy' => array(
		'name' => 'Pharmacy',
		'term' => 'pharmacy',
		'term_plural' => 'Pharmacies',
		'order' => 'DESC',
		'has_single' => true,
		'hierarchical' => false,
		'label'               => 'Pharmacies',
		'url' => _go('locations_url') ? _go('locations_url') : 'pharmacies',
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'post_options' => array(
			'supports' => array( 'title'),
			'taxonomies' => array(),
			'has_archive'=> false,
			'exclude_from_search' => false
		),
		'taxonomy_options' => array('show_ui' => true),
		'options' => array(
			// 'Pharmacy' => array(
			// 	'type' => array(
			// 		'map' => array(
			// 			'type' => array(
			// 				'lat' => array(
			// 					'type' => 'line',
   //                      							'title' => 'Latitude:',
   //                      							'description' => 'Use this site to get the exact coortinates: http://www.gps-coordinates.net/ - example for New York lat: 40.7127837'
			// 				),
			// 				'long' => array(
			// 					'type' => 'line',
   //                      							'title' => 'Longitude:',
   //                      							'description' => 'Use this site to get the exact coortinates: http://www.gps-coordinates.net/ - example for New York long:  -74.00594130000002'
			// 				)
			// 			),
			// 			'title' => 'Map Location',
			// 			'multiple' => false,
			// 			'group' => true
			// 		),
			// 		'working_hours' => array(
			// 			'type' => array(
			// 				'opening' => array(
			// 					'type' => 'line',
   //                      							'title' => 'Opening at:'
			// 				),
			// 				'closing' => array(
			// 					'type' => 'line',
   //                      							'title' => 'Closing at:',
			// 				)
			// 			),
			// 			'title' => 'Working Hours',
			// 			'multiple' => false,
			// 			'group' => true
			// 		),
			// 		'contacts' => array(
			// 			'type' => array(
			// 				'phone' => array(
			// 					'type' => 'line',
   //                      							'title' => 'Phone:'
			// 				),
			// 				'email' => array(
			// 					'type' => 'line',
   //                      							'title' => 'Email:'
			// 				),
			// 				'website' => array(
			// 					'type' => 'line',
   //                      							'title' => 'Website:',
			// 				)
			// 			),
			// 			'title' => 'Contact Info',
			// 			'multiple' => false,
			// 			'group' => true
			// 		),
				

			// 	),
			// 	'multiple' => false,
			// 	'group' => true
			// )
		),
		'icon' => 'icons/16x16.png',
		'output' => array(

			'main' => array(
				'shortcode' => 'pharmacies',
				'view' => 'views/pharmacy-shortcode',
				'shortcode_defaults' => array(
					'testimonial_background' => '',
					'section_id' => '',
					'el_class' => '',
					'css' => ''
				)
			),
			'single' => array(
				'view'                  => 'views/pharmacy-view',
				'shortcode_defaults'    => array(
				)
			)
		)
	)
);

