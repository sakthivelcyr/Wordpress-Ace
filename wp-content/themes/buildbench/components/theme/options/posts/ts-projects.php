<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * metabox options for pages
 */

$options = array(
	'settings-page' => array(
		'title'		 => esc_html__( 'Project settings', 'buildbench' ),
		'type'		 => 'box',
		'priority'	 => 'high',
		'options'	 => array(
			'project_zone'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Project zone', 'buildbench' ),
				'desc'	 => esc_html__( 'Add your Project zone', 'buildbench' ),
			),
			'project_header_image'	 => array(
				'label'	 => esc_html__( 'Project Banner image', 'buildbench' ),
				'desc'	 => esc_html__( 'Upload a project single page header image', 'buildbench' ),
				'help'	 => esc_html__( "This default header image will be used for all your project.", 'buildbench' ),
				'type'	 => 'upload'
            ),
	     
		),
	),
);