<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: banner
 */

 
$options = [
    'banner_setting' => [
        'title' => esc_html__('Banner settings', 'buildbench'),

        'options' => [
               'sub_page_banner_style' => [
                  'type'			 => 'switch',
                  'label'			 => esc_html__( 'Banner style', 'buildbench' ),
                  'desc'          => esc_html__('Box or Full width the banner', 'buildbench'),
                  'value'         => 'full',
                  'left-choice'	 => [
                     'value'	 => 'box',
                     'label'	 => esc_html__( 'box', 'buildbench' ),
                  ],
                  'right-choice'	 => [
                     'value'	 => 'full',
                     'label'	 => esc_html__( 'full', 'buildbench' ),
                  ],
            ],
            'page_banner_setting' => [
                'type'        => 'popup',
                'label'       => esc_html__('Page banner settings', 'buildbench'),
                'popup-title' => esc_html__('Page banner settings', 'buildbench'),
                'button'      => esc_html__('Edit page Banner Button', 'buildbench'),
                'size'        => 'medium', // small, medium, large
                'popup-options' => [
                    'page_show_banner' => [
                        'type'			 => 'switch',
                        'label'			 => esc_html__( 'Show banner?', 'buildbench' ),
                        'desc'          => esc_html__('Show or hide the banner', 'buildbench'),
                        'value'         => 'yes',
                        'left-choice'	 => [
                            'value'	 => 'yes',
                            'label'	 => esc_html__( 'Yes', 'buildbench' ),
                        ],
                        'right-choice'	 => [
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'buildbench' ),
                        ],
                    ],
                    'page_show_breadcrumb' => [
                        'type'			 => 'switch',
                        'label'			 => esc_html__( 'Show Breadcrumb?', 'buildbench' ),
                        'desc'          => esc_html__('Show or hide the Breadcrumb', 'buildbench'),
                        'value'         => 'yes',
                        'left-choice'	 => [
                            'value'	 => 'yes',
                            'label'	 => esc_html__( 'Yes', 'buildbench' ),
                        ],
                        'right-choice'	 => [
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'buildbench' ),
                        ],
                    ],
                    'banner_page_title'	 => [
                        'type'	 => 'text',
                        'label'	 => esc_html__( 'Banner title', 'buildbench' ),
                        'value'  => '',
                    ],

                    'banner_page_image'	 =>array(
                        'label'			 => esc_html__( 'Banner image', 'buildbench' ),
                        'type'			 => 'upload',
                        'images_only'	 => true,
                        'files_ext'		 => array( 'jpg', 'png', 'jpeg', 'gif', 'svg' ),
                              
                        )

                ],
            ], 
        
            'blog_banner_setting' => [
                'type'         => 'popup',
                'label'        => esc_html__('Blog banner settings', 'buildbench'),
                'popup-title'  => esc_html__('Blog banner settings', 'buildbench'),
                'button'       => esc_html__('Edit Blog Banner Button', 'buildbench'),
                'size'         => 'medium', // small, medium, large
                'popup-options' => [
                    'blog_show_banner' => [
                        'type'			 => 'switch',
                        'label'			 => esc_html__( 'Show banner?', 'buildbench' ),
                        'desc'          => esc_html__('Show or hide the banner', 'buildbench'),
                        'value'         => 'yes',
                        'left-choice'	 => [
                            'value'	 => 'yes',
                            'label'	 => esc_html__( 'Yes', 'buildbench' ),
                        ],
                        'right-choice'	 => [
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'buildbench' ),
                        ],
                    ],
                    'blog_show_breadcrumb' => [
                        'type'			 => 'switch',
                        'label'			 => esc_html__( 'Show Breadcrumb?', 'buildbench' ),
                        'desc'          => esc_html__('Show or hide the Breadcrumb', 'buildbench'),
                        'value'         => 'yes',
                        'left-choice'	 => [
                            'value'	 => 'yes',
                            'label'	 => esc_html__( 'Yes', 'buildbench' ),
                        ],
                        'right-choice'	 => [
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'buildbench' ),
                        ],
                    ],
                    'banner_blog_title'	 => [
                        'type'	 => 'text',
                        'label'	 => esc_html__( 'Banner title', 'buildbench' ),
                    ],
                   
                    'banner_blog_image'	 =>array(
                        'type'  => 'upload',
                        'label' => esc_html__('Image', 'buildbench'),
                        'desc'  => esc_html__('Banner blog image', 'buildbench'),
                        'images_only' => true,
                        'files_ext' => array( 'PNG', 'JPEG', 'JPG','GIF'),
                              
                     
                    )

                ],
            ],
            
            'service_banner_settings' => [
               'type'        => 'popup',
               'label'       => esc_html__('Service banner settings', 'buildbench'),
               'popup-title' => esc_html__('Service banner settings', 'buildbench'),
               'button'      => esc_html__('Edit Service banner settings', 'buildbench'),

           
               'size' => 'small', // small, medium, large
               'popup-options' => array(
                   'show' => array(
                       'type'			 => 'switch',

                       'label'			 => esc_html__( 'Show banner?', 'buildbench' ),
                       'value' => 'yes',
                       'left-choice'	 => array(
                           'value'	 => 'yes',
                           'label'	 => esc_html__( 'Yes', 'buildbench' ),
                       ),
                       'right-choice'	 => array(
                           'value'	 => 'no',
                           'label'	 => esc_html__( 'No', 'buildbench' ),

                       ),
                   ),
                   'show_breadcrumb' => array(
                       'type'			 => 'switch',
                       'label'			 => esc_html__( 'Show breadcrumb?', 'buildbench' ),
                       'value' => 'yes',
                       'left-choice'	 => array(
                           'value'	 => 'yes',
                           'label'	 => esc_html__( 'Yes', 'buildbench' ),
                       ),
                       'right-choice'	 => array(
                           'value'	 => 'no',
                           'label'	 => esc_html__( 'No', 'buildbench' ),
                       ),
                   ),
                 
                   'single_title'		 => array(
                       'label'	 => esc_html__( 'Single Service Banner title', 'buildbench' ),
                       'type'	 => 'text',
                   ),
                   
                   'image'			 => array(
                       'label'			 => esc_html__( 'Banner image', 'buildbench' ),
                       'type'			 => 'upload',
                       'images_only'	 => true,
                       'files_ext'		 => array( 'jpg', 'png', 'jpeg', 'gif', 'svg' ),
                   ),
               ),
            ],

              
            'project_banner_settings' => [
                'type'        => 'popup',
                'label'       => esc_html__('Project banner settings', 'buildbench'),
                'popup-title' => esc_html__('Project banner settings', 'buildbench'),
                'button'      => esc_html__('Edit Project banner settings', 'buildbench'),
 
            
                'size' => 'small', // small, medium, large
                'popup-options' => array(
                    'show' => array(
                        'type'			 => 'switch',
 
                        'label'			 => esc_html__( 'Show banner?', 'buildbench' ),
                        'value' => 'yes',
                        'left-choice'	 => array(
                            'value'	 => 'yes',
                            'label'	 => esc_html__( 'Yes', 'buildbench' ),
                        ),
                        'right-choice'	 => array(
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'buildbench' ),
 
                        ),
                    ),
                    'show_breadcrumb' => array(
                        'type'			 => 'switch',
                        'label'			 => esc_html__( 'Show breadcrumb?', 'buildbench' ),
                        'value' => 'yes',
                        'left-choice'	 => array(
                            'value'	 => 'yes',
                            'label'	 => esc_html__( 'Yes', 'buildbench' ),
                        ),
                        'right-choice'	 => array(
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'buildbench' ),
                        ),
                    ),
                  
                    'single_title'		 => array(
                        'label'	 => esc_html__( 'Single project Banner title', 'buildbench' ),
                        'type'	 => 'text',
                    ),
                    
                    'image'			 => array(
                        'label'			 => esc_html__( 'Banner image', 'buildbench' ),
                        'type'			 => 'upload',
                        'images_only'	 => true,
                        'files_ext'		 => array( 'jpg', 'png', 'jpeg', 'gif', 'svg' ),
                    ),
                ),
             ],


            'shop_banner_settings' => [
                'type' => 'popup',
                'label' => esc_html__('Shop banner settings', 'buildbench'),
                'popup-title' => esc_html__('Shop banner settings', 'buildbench'),
                'button' => esc_html__('Edit shop banner settings', 'buildbench'),
                'size' => 'small', // small, medium, large
                'popup-options' => array(
                    'show' => array(
                        'type'			 => 'switch',
                        'label'			 => esc_html__( 'Show banner?', 'buildbench' ),
                        'value' => 'yes',
                        'left-choice'	 => array(
                            'value'	 => 'yes',
                            'label'	 => esc_html__( 'Yes', 'buildbench' ),
                        ),
                        'right-choice'	 => array(
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'buildbench' ),
                        ),
                    ),
                    'show_breadcrumb' => array(
                        'type'			 => 'switch',
                        'label'			 => esc_html__( 'Show breadcrumb?', 'buildbench' ),
                        'value' => 'yes',
                        'left-choice'	 => array(
                            'value'	 => 'yes',
                            'label'	 => esc_html__( 'Yes', 'buildbench' ),
                        ),
                        'right-choice'	 => array(
                            'value'	 => 'no',
                            'label'	 => esc_html__( 'No', 'buildbench' ),
                        ),
                    ),
                    'title'		 => array(
                        'label'	 => esc_html__( 'Shop Banner title', 'buildbench' ),
                        'type'	 => 'text',
                    ),
                    'single_title'		 => array(
                        'label'	 => esc_html__( 'Single Shop Banner title', 'buildbench' ),
                        'type'	 => 'text',
                    ),
                    'image'			 => array(
                        'label'			 => esc_html__( 'Banner image', 'buildbench' ),
                        'type'			 => 'upload',
                        'images_only'	 => true,
                        'files_ext'		 => array( 'jpg', 'png', 'jpeg', 'gif', 'svg' ),
                    ),
                ),
             ],
        ],
    ],
];