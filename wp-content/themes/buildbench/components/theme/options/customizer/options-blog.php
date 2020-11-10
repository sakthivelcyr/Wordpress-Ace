<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: blog
 */

$options =[
    'blog_settings' => [
        'title'		 => esc_html__( 'Blog settings', 'buildbench' ),

        'options'	 => [
            'blog_sidebar' =>[
                'type'  => 'select',
                              
                'label' => esc_html__('Sidebar', 'buildbench'),
                'desc'  => esc_html__('Description', 'buildbench'),
                'help'  => esc_html__('Help tip', 'buildbench'),
                'choices' => array(
                    '1' => esc_html__('No sidebar','buildbench'),
                    '2' => esc_html__('Left Sidebar', 'buildbench'),
                    '3' => esc_html__('Right Sidebar', 'buildbench'),
                 
                 ),
              
                'no-validate' => false,
            ],   
            'blog_title' => [
                'label'	 => esc_html__( 'Global blog title', 'buildbench' ),
                'type'	 => 'text',
            ],
            'blog_header_image' => [
                'label'	 => esc_html__( 'Global header background image', 'buildbench' ),
                'type'	 => 'upload',
             ],
            'blog_breadcrumb' => [
                'type'			 => 'switch',
                'label'			 => esc_html__( 'Breadcrumb', 'buildbench' ),
                'desc'			 => esc_html__( 'Do you want to show breadcrumb?', 'buildbench' ),
                'value'          => 'yes',
                'left-choice'	 => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__( 'Yes', 'buildbench' ),
                ],
                'right-choice'	 => [
                    'value'	 => 'no',
                    'label'	 => esc_html__( 'No', 'buildbench' ),
                ],
            ],
            'blog_author' => [
                'type'			 => 'switch',
                'label'			 => esc_html__( 'Blog author', 'buildbench' ),
                'desc'			 => esc_html__( 'Do you want to show blog author?', 'buildbench' ),
                'value'          => 'no',
                'left-choice' => [
                    'value'	 => 'yes',
                    'label'	 => esc_html__( 'Yes', 'buildbench' ),
                ],
                'right-choice' => [
                    'value'	 => 'no',
                    'label'	 => esc_html__( 'No', 'buildbench' ),
                ],
           ],
            'blog_social_share' => [
                'type'			 => 'switch',
                'label'			 => esc_html__( 'Social share', 'buildbench' ),
                'desc'			 => esc_html__( 'Do you want to show social share buttons?', 'buildbench' ),
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
        ],
            
        ]
    ];