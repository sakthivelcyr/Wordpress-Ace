<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * metabox options for pages
 */

$options = array(
	'settings-page' => array(
		'title'		 => esc_html__( 'Service settings', 'buildbench' ),
		'type'		 => 'box',
		'priority'	 => 'high',
		'options'	 => array(
			'service_icon'	 => array(
				'type'  => 'upload',
            'label' => esc_html__('Service Icon', 'buildbench'),
            'desc'  => esc_html__('service icon type image', 'buildbench'),
            'images_only' => true,
            'files_ext' => array( 'jpg', 'png', 'jpeg' ),
			),
			'service_header_image'	 => array(
				'label'	 => esc_html__( 'Service Banner image', 'buildbench' ),
				'desc'	 => esc_html__( 'Upload a service single page header image', 'buildbench' ),
				'help'	 => esc_html__( "This default header image will be used for all your services.", 'buildbench' ),
				'type'	 => 'upload'
            ),
	     
		),
	),
);