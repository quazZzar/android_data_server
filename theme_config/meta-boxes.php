<?php
return array(
		'metaboxes'=>array(		
			array(
				'id'             => 'pharmacy_contacts_',            // meta box id, unique per meta box
				'title'          => esc_attr_x('Pharmacy Contacts','meta boxes','locales'),   // meta box title
				'post_type'      => array('pharmacy'),		// post types, accept custom post types as well, default is array('post'); optional
				'taxonomy'       => array(),    // taxonomy name, accept categories, post_tag and custom taxonomies
				'context'		 => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
				'priority'		 => 'low',						// order of meta box: high (default), low; optional
				'input_fields'   => array(
					
					'phone'  =>  array(
						'name'  =>  esc_attr_x('Phone Number','meta boxes','locales'),
						'type'  =>  'text',
					),
					'email'  =>  array(
						'name'  =>  esc_attr_x('Email Address','meta boxes','locales'),
						'type'  =>  'text',
					),
					'website'  =>  array(
						'name'  =>  esc_attr_x('Website','meta boxes','locales'),
						'type'  =>  'text',
					)
				)
			),
			array(
				'id'             => 'pharmacy_location_',            // meta box id, unique per meta box
				'title'          => esc_attr_x('Pharmacy Location','meta boxes','locales'),   // meta box title
				'post_type'      => array('pharmacy'),		// post types, accept custom post types as well, default is array('post'); optional
				'taxonomy'       => array(),    // taxonomy name, accept categories, post_tag and custom taxonomies
				'context'		 => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
				'priority'		 => 'low',						// order of meta box: high (default), low; optional
				'input_fields'   => array(
					'street'  =>  array(
						'name'  =>  esc_attr_x('Street','meta boxes','locales'),
						'type'  =>  'text',
					),
					'latitude'  =>  array(
						'name'  =>  esc_attr_x('Latitude','meta boxes','locales'),
						'type'  =>  'text',
					),
					'longitude'  =>  array(
						'name'  =>  esc_attr_x('Longitude','meta boxes','locales'),
						'type'  =>  'text',
					)
				)
			),
			array(
				'id'             => 'pharmacy_working_day_',            // meta box id, unique per meta box
				'title'          => esc_attr_x('Pharmacy working day','meta boxes','locales'),   // meta box title
				'post_type'      => array('pharmacy'),		// post types, accept custom post types as well, default is array('post'); optional
				'taxonomy'       => array(),    // taxonomy name, accept categories, post_tag and custom taxonomies
				'context'		 => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
				'priority'		 => 'low',						// order of meta box: high (default), low; optional
				'input_fields'   => array(
					
					'opening_at'  =>  array(
						'name'  =>  esc_attr_x('Opens at','meta boxes','locales'),
						'type'  =>  'text',
					),
					'closing_at'  =>  array(
						'name'  =>  esc_attr_x('Closes at','meta boxes','locales'),
						'type'  =>  'text',
					)
				)
			),
		)
	);