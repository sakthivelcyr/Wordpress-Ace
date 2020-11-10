<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * metabox options for pages
 */

$options = array(
	'settings-page' => array(
		'title'		 => esc_html__( 'Page settings', 'buildbench' ),
		'type'		 => 'box',
		'priority'	 => 'high',
		'options'	 => array(
			'header_title'	 => array(
				'type'	 => 'text',
				'label'	 => esc_html__( 'Banner title', 'buildbench' ),
				'desc'	 => esc_html__( 'Add your Page hero title', 'buildbench' ),
			),
			'header_image'	 => array(
				'label'	 => esc_html__( 'Banner image', 'buildbench' ),
				'desc'	 => esc_html__( 'Upload a page header image', 'buildbench' ),
				'help'	 => esc_html__( "This default header image will be used for all your service.", 'buildbench' ),
				'type'	 => 'upload'
         ),
        //  'page_header_override' => [
        //     'type'			 => 'switch',
        //     'label'			 => esc_html__( 'Override default header layout?', 'buildbench' ),
        //     'desc'          => esc_html__('Override customizer header layout', 'buildbench'),
        //     'value'         => 'yes',
        //     'left-choice'	 => [
        //         'value'	 => 'yes',
        //         'label'	 => esc_html__( 'Yes', 'buildbench' ),
        //     ],
        //     'right-choice'	 => [
        //         'value'	 => 'no',
        //         'label'	 => esc_html__( 'No', 'buildbench' ),
        //     ],
        //  ],
        //  'page_header_layout_style' => [
        //     'label'	        => esc_html__( 'Header style', 'buildbench' ),
        //     'desc'	        => esc_html__( 'This is the site\'s single page header style.', 'buildbench' ),
        //     'type'	        => 'image-picker',
        //     'choices'       => [
        //        'transparent'    => [
        //           'small'     => BUILDBENCH_IMG . '/admin/header-style/style1.png',
        //           'large'     => BUILDBENCH_IMG . '/admin/header-style/style1.png',
        //       ],
        //       'standard'    => [
        //           'small'     => BUILDBENCH_IMG . '/admin/header-style/style4.png',
        //           'large'     => BUILDBENCH_IMG . '/admin/header-style/style4.png',
        //       ],
        //       'classic'    => [
        //        'small'     => BUILDBENCH_IMG . '/admin/header-style/style3.png',
        //        'large'     => BUILDBENCH_IMG . '/admin/header-style/style3.png',
        //      ],
          
        //      'box'    => [
        //        'small'     => BUILDBENCH_IMG . '/admin/header-style/style5.png',
        //        'large'     => BUILDBENCH_IMG . '/admin/header-style/style5.png',
        //      ],
        //      'solid'    => [
        //           'small'     => BUILDBENCH_IMG . '/admin/header-style/style6.png',
        //           'large'     => BUILDBENCH_IMG . '/admin/header-style/style6.png',
        //     ],
        //     ],
        //     'value'         => 'standard',
        //  ], //Header style*/

        //  'page_body_box_layout' => [
        //     'type'			 => 'switch',
        //     'label'			 => esc_html__( 'Body background enable', 'buildbench' ),
        //     'desc'          => esc_html__('Body background', 'buildbench'),
        //     'value'         => 'no',
        //     'left-choice'	 => [
        //         'value'	 => 'yes',
        //         'label'	 => esc_html__( 'Yes', 'buildbench' ),
        //     ],
        //     'right-choice'	 => [
        //         'value'	 => 'no',
        //         'label'	 => esc_html__( 'No', 'buildbench' ),
        //     ],
        //  ],
         
		),
	),
);
