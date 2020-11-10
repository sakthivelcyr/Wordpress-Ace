<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Buildbench_Working_Process_Widget extends Widget_Base {


    public $base;

    public function get_name() {
        return 'buildbench-working-process';
    }

    public function get_title() {
        return esc_html__( 'Buildbench working process', 'buildbench' );
    }

    public function get_icon() { 
        return 'eicon-arrow-right';
    }

    public function get_categories() {
        return [ 'buildbench-elements' ];
    }

    protected function _register_controls() {

      $this->start_controls_section(
         'section_tab',
         [
             'label' => esc_html__('Working process settings', 'buildbench'),
         ]
      );
    
      $this->add_control(
			'working_process_title',
			[
				'label' => esc_html__( 'Title', 'buildbench' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Design Build', 'buildbench' ),
				'placeholder' => esc_html__( 'Type your title here', 'buildbench' ),
			]
       );

         
      $this->add_control('working_process_number',
			[
				'label' => esc_html__( 'Serial number', 'buildbench' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => esc_html__( '1', 'buildbench' ),
				'placeholder' => esc_html__( 'Type your process number here', 'buildbench' ),
			]
       );
      
      $this->add_control(
			'working_process_image',
			[
				'label' => esc_html__( 'Choose Image', 'buildbench' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => '#',
				],
			]
		);
    
      $this->add_control(
         'show_title',
         [
             'label'     => esc_html__('Show title', 'buildbench'),
             'type' => \Elementor\Controls_Manager::SELECT,
             'default' => 'block',
             'options' => [
                'block'  => esc_html__( 'Show', 'buildbench' ),
                'none' => esc_html__( 'Hide', 'buildbench' ),
             ],
            'selectors' => [
                '{{WRAPPER}} .ts-working-process h3' => 'display: {{VALUE}};',
             ],
            
         ]
      );

      $this->add_responsive_control(
			'show_working_arrow',
			[
				'label' => esc_html__( 'Working arrow', 'buildbench' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'block',
				'options' => [
					'block'  => esc_html__( 'Show', 'buildbench' ),
					'none'   => esc_html__( 'Hide', 'buildbench' ),
				],
           'selectors' => [
               '{{WRAPPER}} .working-arrow' => 'display: {{VALUE}};',
            ],
			]
		);



       
      $this->add_responsive_control(
			'content_align', [
				'label'			 => esc_html__( 'Alignment', 'buildbench' ),
				'type'			 => Controls_Manager::CHOOSE,
				'options'		 => [

               'left'		 => [
                  
                  'title'	 => esc_html__( 'Left', 'buildbench' ),
						'icon'	 => 'fa fa-align-left',
               
               ],
					'center'	     => [
                  
                  'title'	 => esc_html__( 'Center', 'buildbench' ),
						'icon'	 => 'fa fa-align-center',
               
               ],
					'right'		 => [

						'title'	 => esc_html__( 'Right', 'buildbench' ),
                  'icon'	 => 'fa fa-align-right',
                  
					],
					'justify'	 => [

						'title'	 => esc_html__( 'Justified', 'buildbench' ),
                  'icon'	 => 'fa fa-align-justify',
                  
					],
				],
            'default'		 => 'left',
            'selectors' => [
                  '{{WRAPPER}} .ts-working-process h3' => 'text-align: {{VALUE}};',
            
                

				],
			]
        );//Responsive control end

      $this->end_controls_section();

          //Title Style Section
		$this->start_controls_section(
			'section_style', [
				'label'	 => esc_html__( 'Style', 'buildbench' ),
				'tab'	    => Controls_Manager::TAB_STYLE,
			  ]
      );

      
      $this->add_control(
			'title_color', [

				'label'		 => esc_html__( 'Title color', 'buildbench' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
               '{{WRAPPER}} .ts-working-process h3' => 'color: {{VALUE}};',
               
				],
			]
      );
    
      $this->add_control(
			'number_color', [

				'label'		 => esc_html__( 'Number color', 'buildbench' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
               '{{WRAPPER}} .ts-working-process .working-process-number' => 'background: {{VALUE}};',
               
				],
			]
      );

      $this->add_control(
			'working-icon', [

				'label'		 => esc_html__( 'Working icon color', 'buildbench' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
               '{{WRAPPER}} .ts-working-process .working-icon' => 'background: {{VALUE}};',
               
				],
			]
      );

      $this->add_control(
			'working-icon-border', [

				'label'		 => esc_html__( 'Working icon border color', 'buildbench' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
               '{{WRAPPER}} .ts-working-box .working-icon-wrapper' => 'border-color: {{VALUE}};',
               
				],
			]
      );

      $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => esc_html__( 'Typography', 'buildbench' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .ts-working-process h3',
			]
      );
     
      $this->end_controls_section();

    }

    protected function render( ) { 

      $settings               = $this->get_settings();
      $working_process_title  = $settings['working_process_title'];
      $working_process_image  = $settings['working_process_image'];
      $working_process_number  = $settings['working_process_number'];

     
      ?>      
      <div class="ts-working-process">
         <div class="text-center">
            <div class="ts-working-box">
               <div class="working-icon-wrapper">
                  <div class="working-icon">
                     <img src="<?php echo esc_url($working_process_image['url']); ?>" alt="<?php echo esc_html__('Working Process','buildbench'); ?> " class="img-fluid">
                     <span class="working-process-number"> <?php echo esc_html($working_process_number); ?> </span>
                  </div>
                  <div class="working-arrow">
                     <img src="<?php echo esc_url(BUILDBENCH_IMG.'/icon-image/arrow.png'); ?>" alt="<?php echo esc_attr($working_process_title); ?>">
                  </div>
               </div>
               <!-- Icon Wrapper End -->
               <h3><?php echo esc_html($working_process_title); ?></h3>
            </div>
            <!-- Working Box End -->
         </div>
      </div>

      <?php
      
 
	  

    }
    
    protected function _content_template() { }

   
}