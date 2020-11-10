<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: shop
 */
$options = [
    'shop_settings' => [
            'title'		 => esc_html__( 'Shop settings', 'buildbench' ),
            'options'	 => [
                
                'shop_sidebar' => [
                    'type'        => 'select',
                    'label'       => esc_html__( 'Shop sidebar position', 'buildbench' ),
                    'section'     => 'shop_section',
                    'default'     => '3',
                    'choices'     => [
                        '1'      => esc_html__('Full width','buildbench'),
                        '2'      => esc_html__('Left sidebar','buildbench'),
                        '3'      => esc_html__('Right sidebar','buildbench'),
                    ],
                ],
            ],
        ],
    ];