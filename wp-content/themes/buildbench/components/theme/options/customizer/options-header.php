<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * customizer option: Header
 */

$options =[
    'header_settings' => [
        'title'		 => esc_html__( 'Header settings', 'buildbench' ),

        'options'	 => [

            'header_layout_style' => [
                'label'	        => esc_html__( 'Header style', 'buildbench' ),
                'desc'	        => esc_html__( 'This is the site\'s main header style.', 'buildbench' ),
                'type'	        => 'image-picker',
                'choices'       => [
                    'transparent'    => [
                        'small'     => BUILDBENCH_IMG . '/admin/header-style/style1.png',
                        'large'     => BUILDBENCH_IMG . '/admin/header-style/style1.png',
                    ],
                    'standard'    => [
                        'small'     => BUILDBENCH_IMG . '/admin/header-style/style4.png',
                        'large'     => BUILDBENCH_IMG . '/admin/header-style/style4.png',
                    ],
                    'classic'    => [
                     'small'     => BUILDBENCH_IMG . '/admin/header-style/style3.png',
                     'large'     => BUILDBENCH_IMG . '/admin/header-style/style3.png',
                   ],
                
                   'box'    => [
                     'small'     => BUILDBENCH_IMG . '/admin/header-style/style5.png',
                     'large'     => BUILDBENCH_IMG . '/admin/header-style/style5.png',
                   ],
                   'solid'    => [
                        'small'     => BUILDBENCH_IMG . '/admin/header-style/style6.png',
                        'large'     => BUILDBENCH_IMG . '/admin/header-style/style6.png',
                  ],
                ],
                'value'         => 'solid',
             ], //Header style

             'header_nav_sticky' => [
               'type'			   => 'switch',
               'label'			   => esc_html__( 'Sticky header', 'buildbench' ),
               'desc'			   => esc_html__('Do you want to enable sticky nav?', 'buildbench' ),
               'value'           => 'no',
               'left-choice'	 => [
                   'value'	 => 'yes',
                   'label'	 => esc_html__('Yes', 'buildbench'),
               ],
               'right-choice'	 => [
                  'value'	 => 'no',
                  'label'	 => esc_html__('No', 'buildbench'),
                 ],
              ],

             'header_contact_info_show' => [
               'type'			    => 'switch',
               'label'			 => esc_html__( 'Contact', 'buildbench' ),
               'desc'			    => esc_html__( 'Do you want to show contact?', 'buildbench' ),
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

               'header_contact_phone_title' => [
                  'type'			    => 'text',
                  'label'			    => esc_html__( 'Contact phone title', 'buildbench' ),
                  'desc'			    => esc_html__( 'Give contact phone number title.', 'buildbench' ),
                  'value'            => 'GIVE US A CALL',
               ],


               'header_contact_phone' => [
                     'type'			    => 'text',
                     'label'			    => esc_html__( 'Contact phone', 'buildbench' ),
                     'desc'			    => esc_html__( 'Give contact phone number.', 'buildbench' ),
                     'value'            => esc_html__(' +001 458 654 528','buildbench'),
               ],
               'header_contact_link' => [
                     'type'			    => 'text',
                     'label'			    => esc_html__( 'Contact phone link', 'buildbench' ),
                     'desc'			    => esc_html__( 'Give contact phone number link for example [ tel:123-456-7890 ].', 'buildbench' ),
               ],


               'header_contact_mail_title' => [
                  'type'			    => 'text',
                  'label'			    => esc_html__( 'Contact mail title', 'buildbench' ),
                  'desc'			    => esc_html__( 'Give mail title.', 'buildbench' ),
                  'value'            => esc_html__('SEND MAIL TO US','buildbench'),
               ],

               'header_contact_mail' => [
                  'type'			    => 'text',
                  'label'			    => esc_html__( 'Contact mail', 'buildbench' ),
                  'desc'			    => esc_html__( 'Give mail.', 'buildbench' ),
                  'value'            => esc_html__('contact@domain.com','buildbench'),
               ],

               'header_mail_link' => [
                  'type'			    => 'text',
                  'label'			    => esc_html__( 'Contact Mail link', 'buildbench' ),
                  'desc'			    => esc_html__( 'Give contact mail link for example [ mailto:example@example.com ].', 'buildbench' ),
               ],


               'header_contact_address_title' => [
                  'type'			    => 'text',
                  'label'			    => esc_html__( 'Contact office address', 'buildbench' ),
                  'desc'			    => esc_html__( 'Give office address.', 'buildbench' ),
                  'value'            => esc_html__('VISIT OUR OFFICE AT','buildbench'),
               ],

               'header_contact_address' => [
                  'type'			    => 'textarea',
                  'label'		    	 => esc_html__( 'Contact office address', 'buildbench' ),
                  'desc'			    => esc_html__( 'Give office address.', 'buildbench' ),
                  'value'            => esc_html__('105 Roosevelt Street CA','buildbench'),
               ],

               'header_address_link' => [
                  'type'			    => 'text',
                  'label'			    => esc_html__( 'Address link', 'buildbench' ),
                  'desc'			    => esc_html__( 'Give address link. you can use google map link', 'buildbench' ),
               ],



               'header_nav_search_section' => [
                  'type'			 => 'switch',
                  'label'		    => esc_html__( 'Search button show', 'buildbench' ),
                  'desc'			 => esc_html__( 'Do you want to show search button in header ?', 'buildbench' ),
                  'value'         => 'no',
                  'left-choice'	 => [
                     'value'     => 'yes',
                     'label'	   => esc_html__( 'Yes', 'buildbench' ),
                  ],
                  'right-choice'	 => [
                     'value'	 => 'no',
                     'label'	 => esc_html__( 'No', 'buildbench' ),
                  ],
                ],
            

                'header_quota_button' => array(
                  'type'         => 'multi-picker',
                  'label'        => false,
                  'desc'         => false,
                  'picker'       => array(
                      'style' => array(
                          'type'			 => 'switch',
                          'label'		 => esc_html__( 'Quote button show', 'buildbench' ),
                          'value'       => 'yes',
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
                        'header_quota_text' => [
                           'type'			    => 'text',
                           'label'			    => esc_html__( 'Quote text', 'buildbench' ),
                           'desc'			    => esc_html__( 'Navigation quote text.', 'buildbench' ),
                           'value'            => esc_html__('Get a quote','buildbench'),
                        ],
                       'header_quota_url' => [
                           'type'			    => 'text',
                           'label'			    => esc_html__( 'Quote link', 'buildbench' ),
                           'desc'			    => esc_html__( 'Navigation quote link.', 'buildbench' ),
                           'value'            => esc_html__('#','buildbench'),
                        ],
                       ),
                    
                    
                   
                  ),
                  'show_borders' => false,
              ), 

              'header_nav_shopping_cart_section' => [
               'type'			 => 'switch',
               'label'		 => esc_html__( 'Shopping cart show', 'buildbench' ),
               'desc'			 => esc_html__( 'Do you want to show shopping cart button in header ?', 'buildbench' ),
               'value'       => 'yes',
               'left-choice'	 => [
                  'value'   	     => 'yes',
                  'label'	        => esc_html__( 'Yes', 'buildbench' ),
               ],
               'right-choice'	 => [
                  'value'	 => 'no',
                  'label'	 => esc_html__( 'No', 'buildbench' ),
               ],
          ],


             
        
        ], //Options end
    ]
];