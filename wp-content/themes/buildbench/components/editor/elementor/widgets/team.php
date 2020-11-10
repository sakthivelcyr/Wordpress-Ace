<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Buildbench_Team_Widget extends Widget_Base {


    public $base;

    public function get_name() {
        return 'buildbench-team';
    }

    public function get_title() {
        return esc_html__( 'Buildbench Team', 'buildbench' );
    }

    public function get_icon() { 
        return 'eicon-lock-user';
    }

    public function get_categories() {
        return [ 'buildbench-elements' ];
    }

    protected function _register_controls() {

      $this->start_controls_section(
         'section_tab',
         [
             'label' => esc_html__('Team settings', 'buildbench'),
         ]
      );

      $this->add_control('team_member',
         [
            'label'     => esc_html__( 'Select team member', 'buildbench' ),
            'type'      => \Elementor\Controls_Manager::SELECT2,
            'multiple' => true,
            'options'   => $this->getTeam(),
         
         ]
      ); 

      $this->add_control(
         'show_title',
         [
             'label'     => esc_html__('Show name', 'buildbench'),
             'type' => \Elementor\Controls_Manager::SELECT,
             'default' => 'block',
             'options' => [
                'block'  => esc_html__( 'Show', 'buildbench' ),
                'none'   => esc_html__( 'Hide', 'buildbench' ),
             ],
            'selectors' => [
                '{{WRAPPER}} .ts-team-info .team-name' => 'display: {{VALUE}};',
             ],
            
         ]
      );


      $this->add_control(
         'show_designation',
         [
             'label'     => esc_html__('Show designation', 'buildbench'),
             'type' => \Elementor\Controls_Manager::SELECT,
             'default' => 'block',
             'options' => [
                'block'  => esc_html__( 'Show', 'buildbench' ),
                'none'   => esc_html__( 'Hide', 'buildbench' ),
             ],
            'selectors' => [
                '{{WRAPPER}} .ts-team-info .team-designation' => 'display: {{VALUE}};',
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
                  '{{WRAPPER}} .ts-team-info .team-designation' => 'text-align: {{VALUE}};',
                  '{{WRAPPER}} .ts-team-info .team-name' => 'text-align: {{VALUE}};',
                

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
               '{{WRAPPER}} .ts-team-info .team-name' => 'color: {{VALUE}};',
               
				],
			]
      );
    
      $this->add_control(
      'designation_color', [

         'label'		 => esc_html__( 'Designation color', 'buildbench' ),
         'type'		 => Controls_Manager::COLOR,
         'selectors'	 => [

            '{{WRAPPER}} .ts-team-info .team-designation' => 'color: {{VALUE}};',
           
            
         ],
       ]
      );

      $this->add_control(
         'img-wrapper_hover_color', [
   
            'label'		 => esc_html__( 'Image hover color', 'buildbench' ),
            'type'		 => Controls_Manager::COLOR,
            'selectors'	 => [
                  '{{WRAPPER}} .ts-team .team-img-wrapper:after' => 'background: {{VALUE}};',
            ],
         ]
      );
   

      $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'label' => esc_html__( 'Name typography', 'buildbench' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .team-name',
			]
      );

      $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'designation_typography',
				'label' => esc_html__( 'Designation typography', 'buildbench' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            'selector' => '{{WRAPPER}} .team-designation',
			]
      );
    
      $this->end_controls_section();

    }

    protected function render( ) { 

      $settings      = $this->get_settings();
      $team_member   = $settings['team_member'];
     
      $args = array(
         'post__in'         => $team_member,
         'orderby'          => 'post_date',
         'order'            => 'DESC',
         'post_type'        => 'ts-team',
         'post_status'      => 'publish',
         'suppress_filters' => true
      );

      $team = get_posts($args);
      
      
      
      if($team):
      ?>      
         <div class="team-2">
            <div data-numofteam='<?php echo esc_attr(count($team)); ?>'  id="ts-team-slider" class="ts-team-slider owl-carousel">
                  <?php foreach ($team as $member): ?> 
                     <?php  setup_postdata( $member ); ?>       
                     <div class="ts-team">
                           <div class="team-img-wrapper">
                           <?php $team_thumbnail_id = get_post_thumbnail_id( $member->ID ); ?> 
                              <?php echo wp_get_attachment_image($team_thumbnail_id,'full',false,['class'=>'img-fluid']);  ?>
                              
                           </div>
                           <div class="ts-team-info text-center">
                              <h4 class="team-name"> <?php echo esc_html($member->post_title); ?></h4>
                              <?php
                                 $social = buildbench_meta_option($member->ID,'member_social','');
                              
                                 ?>
                              <p class="team-designation"><?php echo buildbench_meta_option($member->ID,'member_designation',''); ?></p>
                              
                           <div class="team-social text-right">
                                 <ul class="unstyled">
                                 <?php foreach($social as $key=>$value): ?>
                                    <?php 
                                         $social_class =  explode('-',$value['social_icon']);
                                    ?>
                                    <li class="social-<?php echo count($social_class)>=2?$social_class[1]:''; ?>" ><a href="<?php echo esc_url($value['social_url']); ?>"><i class="<?php echo esc_attr($value['social_icon']); ?>"></i></a></li>
                                 <?php endforeach; ?>
                              </ul> <!-- Ul end -->
                           </div>
                        </div><!-- Team info 1 end-->
                     </div><!-- Team end-->
                <?php endforeach; ?>  
            </div>
      </div>
      <?php
      
     endif;
	  

    }
    
    protected function _content_template() { }

    public function getTeam(){
      
      $member_list = [];
      $args = array(
         'numberposts'      => -1,
         'orderby'          => 'post_date',
         'order'            => 'DESC',
         'post_type'        => 'ts-team',
         'post_status'      => 'publish',
         'suppress_filters' => true
      );
      $team = get_posts($args);
 
      if($team):
       // Loop the posts
         foreach ($team as $member):
           $member_list[$member->ID]= $member->post_title; 
         endforeach;
      endif;
      return $member_list;

  }
}