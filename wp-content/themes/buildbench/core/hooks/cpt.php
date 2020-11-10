<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
//die('cpt found');
/**
 * hooks for wp blog part
 */

// if there is no excerpt, sets a defult placeholder
// ----------------------------------------------------------------------------------------

if ( class_exists( 'BuildbenchCustomPost\Buildbench_CustomPost' ) ) {
    //project 
   $project = new BuildbenchCustomPost\Buildbench_CustomPost( 'buildbench' );
   $slug = sanitize_title(get_option('buildbench_project_setting_slug','project'));
   $plural_name = esc_html(get_option('buildbench_project_plural_name','project'));
   $singular_name = esc_html(get_option('buildbench_project_singular_name','project'));

   if($plural_name==''){
	   $plural_name = esc_html__('Projects','buildbench');
	}
	if($singular_name==''){
	   $singular_name = esc_html__('Project','buildbench'); 
	}
	if($slug==''){
	   $slug = esc_html__('project','buildbench');
	}
    $project->xs_init( 'ts-projects', $singular_name, $plural_name, array( 'menu_icon' => 'dashicons-grid-view',
		'supports'	 => array( 'title','editor','thumbnail'),
		'rewrite'	 => array( 'slug' => $slug ) ) );

   	// project category 

	$project_cat_slug = sanitize_title(get_option('buildbench_project_cat_setting_slug','Project Categories'));
	$project_cat_singular_name = esc_html(get_option('buildbench_project_cat_singular_name','Project Category'));
	if($project_cat_slug==''){
		$project_cat_slug = esc_html__('Project Categories','buildbench');
	}
	if($project_cat_singular_name==''){
		$project_cat_singular_name = esc_html__('Project Category','buildbench'); 
	}
	
	$project_tax = new  BuildbenchCustomPost\Buildbench_Taxonomies('buildbench');
	$project_tax->xs_init('ts-project-cat', $project_cat_singular_name, $project_cat_slug, 'ts-projects');
   
    //Service 
	$service = new BuildbenchCustomPost\Buildbench_CustomPost( 'buildbench' );
	$slug = sanitize_title(get_option('buildbench_service_setting_slug','service'));
	$plural_name = esc_html(get_option('buildbench_service_plural_name','Services'));
	$singular_name = esc_html(get_option('buildbench_service_singular_name','Service'));
	if($plural_name==''){
		$plural_name = esc_html__('Services','buildbench');
	 }
	 if($singular_name==''){
		$singular_name = esc_html__('Service','buildbench'); 
	 }
	 if($slug==''){
		$slug = esc_html__('service','buildbench');
	 }
	$service->xs_init( 'ts-service', $singular_name, $plural_name, array( 'menu_icon' => 'dashicons-clipboard',
	'supports'	 => array( 'title','editor','excerpt','thumbnail'),
	'rewrite'	 => array( 'slug' => $slug ) ) );

	
	// service category 

	$service_cat_slug = sanitize_title(get_option('buildbench_service_cat_setting_slug','service Categories'));
	$service_cat_singular_name = esc_html(get_option('buildbench_service_cat_singular_name','service Category'));
	if($service_cat_slug==''){
		$service_cat_slug = esc_html__('Service Categories','buildbench');
	}
	if($service_cat_singular_name==''){
		$team_cat_singular_name = esc_html__('Service Category','buildbench'); 
	}
	
	$service_tax = new  BuildbenchCustomPost\Buildbench_Taxonomies('buildbench');
	$service_tax->xs_init('ts-service-cat', $service_cat_singular_name, $service_cat_slug, 'ts-service');

    //Team 

    $team = new BuildbenchCustomPost\Buildbench_CustomPost( 'buildbench' );
   
	$team_slug = sanitize_title(get_option('buildbench_team_setting_slug','team'));
	$team_plural_name = esc_html(get_option('buildbench_team_plural_name','Teams'));
	$team_singular_name = esc_html(get_option('buildbench_team_singular_name','Team'));

	if($team_plural_name==''){
		$team_plural_name = esc_html__('Teams','buildbench');
	}
	if($team_singular_name==''){
		$team_singular_name = esc_html__('Team','buildbench'); 
	}
	if($team_slug==''){
		$team_slug = esc_html__('teams','buildbench');
	}

	$team->xs_init( 'ts-team', $team_singular_name, $team_plural_name, array( 'menu_icon' => 'dashicons-admin-users',
		'supports'	 => array( 'title','editor','thumbnail'),
		'rewrite'	 => $slug, 
		) 
	);

    // team category 
	$team_cat_slug = sanitize_title(get_option('buildbench_team_cat_setting_slug','Team Categories'));
	$team_cat_singular_name = esc_html(get_option('buildbench_team_cat_singular_name','Team Category'));
	if($team_cat_slug==''){
		$team_cat_slug = esc_html__('Team Categories','buildbench');
	}
	if($team_cat_singular_name==''){
		$team_cat_singular_name = esc_html__('Team Category','buildbench'); 
	}
		
	$team_tax = new  BuildbenchCustomPost\Buildbench_Taxonomies('buildbench');
	$team_tax->xs_init('ts-team-cat', $team_cat_singular_name, $team_cat_slug, 'ts-team');


}