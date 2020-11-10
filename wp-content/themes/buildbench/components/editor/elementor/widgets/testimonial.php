<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Buildbench_Testimonial_Widget extends Widget_Base {


    public $base;

    public function get_name() {
        return 'buildbench-testimonial';
    }

    public function get_title() {
        return esc_html__( 'Buildbench testimonial ', 'buildbench' );
    }

    public function get_icon() { 
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return [ 'buildbench-elements' ];
    }

    protected function _register_controls() { 

      $this->start_controls_section('section_tab',
         [
             'label' => esc_html__('Buildbench settings', 'buildbench'),
         ]
      );
     
      $this->add_control('testimonial_single',[
         'label' => esc_html__( 'Single testimonial', 'buildbench' ),
         'type' => \Elementor\Controls_Manager::SWITCHER,
         'label_on' => esc_html__( 'Enable', 'buildbench' ),
         'label_off' => esc_html__( 'Disble', 'buildbench' ),
         'return_value' => 'yes',
         'default' => '',
        ]
     );

     $this->add_control(
      'single_testimonial_content',
      [
         'label' => esc_html__( 'Content', 'buildbench' ),
         'type' => Controls_Manager::TEXTAREA,
         'condition' => ['testimonial_single' => 'yes'],
         'dynamic' => [
            'active' => true,
         ],
         'rows' => '10',
         'default' => esc_html__('Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.','buildbench'),
       ]
     );

      $this->add_control(
         'single_testimonial_job',
         [
            'label' => esc_html__( 'Title', 'buildbench' ),
            'type' => Controls_Manager::TEXTAREA,
            'default'   => esc_html__( 'Someone famous in {Source Title}', 'buildbench' ),
            'description'=> esc_html__('Use bracket for cite style','buildbench'),
            'condition' => ['testimonial_single' => 'yes']
         ]
      );




      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
			'testimonial_client_image', [
				'label' => esc_html__( 'Client image', 'buildbench' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'label_block' => true,
			]
      );
      
		$repeater->add_control(
			'testimonial_client_name', [
				'label' => esc_html__( 'Client name', 'buildbench' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'buildbench' ),
				'label_block' => true,
			]
      );
      
      $repeater->add_control(
			'testimonial_client_designation', [
				'label' => esc_html__( 'Client designation', 'buildbench' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'buildbench' ),
				'label_block' => true,
			]
      );
 

		$repeater->add_control(
			'testimonial_content', [
				'label' => esc_html__( 'Content', 'buildbench' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'testimonial Content' , 'buildbench' ),
				'show_label' => false,
			]
		);

	

		$this->add_control(
			'testimonials',
			[
				'label' => esc_html__( 'Testimonial List', 'buildbench' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'condition' => ['testimonial_single' => ''],
				'default' => [
					[
						'testimonial_client_name' =>  'Jonas Blue',
						'testimonial_client_designation' => 'Ceo Media',
					],
				
				],
				'title_field' => '{{{ testimonial_client_name }}}',
			]
      );
      
      $this->add_responsive_control(
			'testimonial_content_align', [
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
                  '{{WRAPPER}} .ts-testimonial-standard .testimonial-author-content' => 'text-align: {{VALUE}};',
            
				],
			]
        );//Responsive control end

     $this->end_controls_section(); 

     $this->start_controls_section(
      'section_content_style', [
         'label'	 => esc_html__( 'Content', 'buildbench' ),
         'tab'	 => Controls_Manager::TAB_STYLE,
      ]
     );

     $this->add_control(
      'content_color', [
         'label'		 => esc_html__( 'Content color', 'buildbench' ),
         'type'		 => Controls_Manager::COLOR,
         'selectors'	 => [
            '{{WRAPPER}} .testimonial-author-content .testimonial-text' => 'color: {{VALUE}};',
            '{{WRAPPER}} blockquote > p' => 'color: {{VALUE}};',
         
         ],
      ]
     );

     $this->add_control(
      'client_name_color', [
         'label'		 => esc_html__( 'Client / title color', 'buildbench' ),
         'type'		 => Controls_Manager::COLOR,
         'selectors'	 => [
            '{{WRAPPER}} .testimonial-author-content .testimonial-footer .author-name' => 'color: {{VALUE}};',
            '{{WRAPPER}} blockquote > small' => 'color: {{VALUE}};',
         ],
      ]
     );

     $this->add_control(
      'designation_color', [
         'label'		 => esc_html__( 'Designation color', 'buildbench' ),
         'type'		 => Controls_Manager::COLOR,
         'selectors'	 => [
            '{{WRAPPER}} .testimonial-author-content .testimonial-footer .author-designation ' => 'color: {{VALUE}};',
         
         ],
      ]
     );

     $this->add_control(
      'nav_arrow_color', [
         'label'		 => esc_html__( 'Nav color', 'buildbench' ),
         'type'		 => Controls_Manager::COLOR,
         'selectors'	 => [
            '{{WRAPPER}} .testimonial-carousel .owl-nav i' => 'color: {{VALUE}};',
         
         ],
      ]
     );

     $this->add_group_control(Group_Control_Typography::get_type(),
         [
			'name'		 => 'testimonial_typography',
			'selector'	 => '{{WRAPPER}} .testimonial-author-content .testimonial-text',
			]
		);
   

   }
   protected function render(){
     $settings = $this->get_settings();
     $testimonials = $settings['testimonials']; 
     $testimonial_single = $settings['testimonial_single']; 
     $single_testimonial_title = $settings['single_testimonial_job']; 
     $single_testimonial_content = $settings['single_testimonial_content']; 
     $single_testimonial_content  = str_replace(['{', '}'], ['<cite>', '</cite>'], $single_testimonial_content); 
     $single_t_title  = str_replace(['{', '}'], ['<cite>', '</cite>'], $single_testimonial_title); 

    ?>
   <?php if($testimonial_single=='yes'): ?>

     <blockquote>
         <p>
            <?php echo esc_html($single_testimonial_content); ?>
         </p>
         <small>
         <?php echo wp_kses_post($single_t_title); ?>
         </small>
      </blockquote>

   <?php else: ?>
    <section class="ts-testimonial-standard">
      <div class="testimonial-carousel owl-carousel">
         <?php foreach($testimonials as $testimonial): ?> 
               <div class="testimonial-author-content">
                  <span class="testimonial-text">
                     <i class="fa fa-quote-left" aria-hidden="true"></i>
                     <?php echo esc_html($testimonial["testimonial_content"]); ?>
                  </span>
                  <div class="testimonial-footer clearfix">
                        <?php if(isset( $testimonial["testimonial_client_image"] )): ?>
                        
                        <div class="pull-left mr-15">
                           <img src="<?php echo esc_url($testimonial['testimonial_client_image']['url']); ?>"  alt="<?php echo esc_html__('Testimoinal','buildbench'); ?>" class="img-fluid testimonial-img">
                        </div>     
                     
                        <?php endif; ?>
                           <h3 class="author-name"> 
                              <?php echo esc_html($testimonial['testimonial_client_name']); ?> 
                           </h3>
                           <span class="author-designation"> 
                              <?php echo esc_html($testimonial['testimonial_client_designation']); ?> 
                           </span>
                  </div>
            </div>
         <?php endforeach; ?>        
      </div>
   </section>
   
   <?php endif; ?>
   <?php  
   }
}  