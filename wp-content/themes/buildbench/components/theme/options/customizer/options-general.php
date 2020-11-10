<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: general
 */

$options =[
    'general_settings' => [
            'title'		 => esc_html__( 'General settings', 'buildbench' ),
            'options'	 => [
                'general_main_logo' => [
                    'label'	        => esc_html__( 'Main logo', 'buildbench' ),
                    'desc'	           => esc_html__( 'It\'s the main logo, mostly it will be shown on "dark or coloreful" type area.', 'buildbench' ),
                    'type'	           => 'upload',
                    'image_only'      => true,
                 ],
                'general_dark_logo' => [
                    'label'	        => esc_html__( 'Dark logo', 'buildbench' ),
                    'desc'	           => esc_html__( 'It will be shown on any "light background" type area.', 'buildbench' ),
                    'type'	           => 'upload',
                    'image_only'      => true,
                 ],
                 'general_body_box_layout' => array(
                     'type'         => 'multi-picker',
                     'label'        => false,
                     'desc'         => false,
                     'picker'       => array(
                         'style' => array(
                             'type'			 => 'switch',
                             'label'		 => esc_html__( 'Body box layout', 'buildbench' ),
                             'value'       => 'no',
                             'left-choice'	 => [
                                'value'   	     => 'yes',
                                'label'	        => esc_html__( 'Yes', 'buildbench' ),
                             ],
                             'right-choice'	 => [
                                'value'	 => 'no',
                                'label'	 => esc_html__( 'No', 'buildbench' ),
                             ],
                           
                         )
                     ),
                     'choices'      => array(
                          'yes' => array(
                           'general_body_box_bg_image' => [
                              'type'  => 'upload',
                              'label'			    => esc_html__( 'Background Image', 'buildbench' ),
                              'desc'			    => esc_html__( 'Body background image', 'buildbench' ),
                              'images_only' => true,
                             
                           ],
                          
                          ),
                       
                       
                      
                     ),
                     'show_borders' => false,
                 ), 

                 'general_sticky_sidebar' => [
                    'type'			    => 'switch',
                    'label'			 => esc_html__( 'Sticky sidebar', 'buildbench' ),
                    'desc'			    => esc_html__( 'Use sticky sidebar?', 'buildbench' ),
                    'value'          => 'yes',
                    'left-choice' => [
                        'value'	 => 'yes',
                        'label'	 => esc_html__( 'Yes', 'buildbench' ),
                    ],
                    'right-choice' => [
                        'value'	 => 'no',
                        'label'	 => esc_html__( 'No', 'buildbench' ),
                    ],
               ],

               'blog_breadcrumb_show' => [
                    'type'			    => 'switch',
                    'label'			 => esc_html__( 'Breadcrumb', 'buildbench' ),
                    'desc'			    => esc_html__( 'Do you want to show breadcrumb?', 'buildbench' ),
                    'value'          => 'yes',
                    'left-choice'	 => [
                        'value'	 => 'yes',
                        'label'	 => esc_html__('Yes', 'buildbench'),
                    ],
                    'right-choice'	 => [
                        'value'	 => 'no',
                        'label'	 => esc_html__('No', 'buildbench'),
                    ],
                ],

                'blog_breadcrumb_length' => [
                    'type'			    => 'text',
                    'label'			 => esc_html__( 'Breadcrumb word length', 'buildbench' ),
                    'desc'			    => esc_html__( 'The length of the breadcumb text.', 'buildbench' ),
                    'value'          => '3',
                ],
                'general_social_links' => [
                    'type'          => 'addable-popup',
                    'template'      => '{{- title }}',
                    'popup-title'   => null,
                    'label' => esc_html__( 'Social links', 'buildbench' ),
                    'desc'  => esc_html__( 'Add social links and it\'s icon class bellow. These are all fontaweseome-4.7 icons.', 'buildbench' ),
                    'add-button-text' => esc_html__( 'Add new', 'buildbench' ),
                    'popup-options' => [
                        'title' => [ 
                            'type' => 'text',
                            'label'=> esc_html__( 'Title', 'buildbench' ),
                        ],
                        'icon_class' => [ 
                            'type' => 'new-icon',
                            'label'=> esc_html__( 'Social icon', 'buildbench' ),
                        ],
                        'url' => [ 
                            'type' => 'text',
                            'label'=> esc_html__( 'Social link', 'buildbench' ),
                        ],
                    ],
                   
                ],
            ],
        ],
    ];
