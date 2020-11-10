<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: general
 */

$options =[
    'footer_settings' => [
        'title'		 => esc_html__( 'Footer settings', 'buildbench' ),

        'options'	 => [

            'footer_style' => array(
                'type'         => 'multi-picker',
                'label'        => false,
                'desc'         => false,
                'picker'       => array(
                    'style' => array(
                        'label'   => esc_html__( 'Select Style', 'buildbench' ),
                        'type'    => 'image-picker',
                        'choices'	 => [
                            'style-1' => [
                                'small'	 => [
                                    'height' => 30,
                                    'src'	 => BUILDBENCH_IMG. '/style/footer/style-1.png'
                                ],
                                'large'	 => [
                                    'width'	 => 370,
                                    'src'	 => BUILDBENCH_IMG. '/style/footer/style-1.png'
                                ],
                            ],
                            'style-2' => [
                                'small'	 => [
                                    'height' => 30,
                                    'src'	 => BUILDBENCH_IMG. '/style/footer/style-2.png'
                                ],
                                'large'	 => [
                                    'width'	 => 370,
                                    'src'	 => BUILDBENCH_IMG. '/style/footer/style-2.png'
                                ],
                            ],
                       
                         
                        ],
                      
                    )
                ),
                'choices'      => array(
                     'style-1' => array(
                        'footer_mailchimp' => [
                           'label'	 => esc_html__( 'MailChimp Shortcode', 'buildbench'),
                           'type'	 => 'text',
                           
                        ],
                     
                     ),
               
                 
                ),
                'show_borders' => false,
            ), 

            'footer_bg_img' => [
               'label'	 => esc_html__( 'Footer Background', 'buildbench'),
               'type'	 => 'upload',
               'desc'	 => esc_html__( 'You can change the footer background image ', 'buildbench'),
               'images_only' => true,
               'files_ext' => array( 'jpeg', 'png', 'jpeg' ),
           ],
          
            'footer_bg_color' => [
                'label'	 => esc_html__( 'Copyright Background color', 'buildbench'),
                'type'	 => 'color-picker',
                'value'  => '#101010',
                'desc'	 => esc_html__( 'You can change the copyright background color with rgba color or solid color', 'buildbench'),
            ],
            'footer_copyright_color' => [
                'label'	 => esc_html__( 'Footer Copyright color', 'buildbench'),
                'type'	 => 'color-picker',
                'desc'	 => esc_html__( 'You can change the footer\'s background color with rgba color or solid color', 'buildbench'),
            ],
            'footer_social_links' => [
                'type'  => 'addable-popup',
                'template' => '{{- title }}',
                'popup-title' => null,
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
                'value' => [
                   
                ],
            ],
            'footer_copyright'	 => [
                'type'	 => 'textarea',
                'value'  =>  esc_html__('&copy; 2019, Buildbench. All rights reserved','buildbench'),
                'label'	 => esc_html__( 'Copyright text', 'buildbench' ),
                'desc'	 => esc_html__( 'This text will be shown at the footer of all pages.', 'buildbench' ),
            ],

            'footer_padding_top' => [
                'label'	        => esc_html__( 'Footer Padding Top', 'buildbench' ),
                'desc'	        => esc_html__( 'Use Footer Padding Top', 'buildbench' ),
                'type'	        => 'text',
                'value'         => '250px',
             ],
             'back_to_top'				 => [
                'type'			 => 'switch',
                'value'			 => 'hello',
                'label'			 => esc_html__( 'Back to top', 'buildbench'),
                'left-choice'	 => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__( 'Yes', 'buildbench'),
                ],
                'right-choice'	 => [
                    'value'	 => 'no',
                    'label'	 => esc_html__( 'No', 'buildbench'),
                ],
            ],
            
        ],
            
        ]
    ];