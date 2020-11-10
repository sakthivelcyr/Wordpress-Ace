<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * options for wp customizer
 * section name format: buildbench_section_{section name}
 */
$options = [
	'buildbench_section_theme_settings' => [
		'title'				 => esc_html__( 'Theme settings', 'buildbench' ),
		'options'			 => Buildbench_Theme_Includes::_customizer_options(),
		'wp-customizer-args' => [
			'priority' => 3,
		],
	],
];
