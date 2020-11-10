<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * metabox options for pages
 */

$options = array(
	'settings-page' => array(
		'title'		 => esc_html__( 'Team settings', 'buildbench' ),
		'type'		 => 'box',
		'priority'	 => 'high',
		'options'	 => array(
			  'member_designation' => array(
            'type'  => 'text',
            'value' => '',
            'label' => esc_html__('Designation', 'buildbench'),
        
           ),
           'member_social' => array(
            'type' => 'addable-popup',
            'label' => esc_html__('Social', 'buildbench'),
            'template' => '{{- social_title }}',
            'size' => 'small', 
            'limit' => 0, 
            'add-button-text' => esc_html__('Add', 'buildbench'),
            'sortable' => true,
            'popup-options' => array(
                'social_title' => array(
                    'label' => esc_html__('Title', 'buildbench'),
                    'type' => 'text',
                    ),
                    'social_url' => array(
                     'label' => esc_html__('Link', 'buildbench'),
                     'value' =>  esc_html__('#','buildbench'),
                     'type' => 'text',
                    ),
                     'social_icon'	 => array(
                        'type'  => 'new-icon',
                        'label' => esc_html__('Social Icon', 'buildbench'),
                    
                     ),
               ),
              
            ),
                
         ),
      )
  
);