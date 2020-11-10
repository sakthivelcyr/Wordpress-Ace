<?php 
function buildbench_project_settings_api_init() {

    add_settings_section(
       'buildbench_project_setting_section',
       'Buildbanch Project Settings',
       null,
       'writing'
   );
 
   add_settings_field(
       'buildbench_project_setting_slug',
       'Project Slug',
       'buildbench_project_slug_setting_callback_function',
       'writing',
       'buildbench_project_setting_section'
   );

   add_settings_field(
    'buildbench_project_singular_name',
    'Project singular name',
    'buildbench_project_singular_setting_callback_function',
    'writing',
    'buildbench_project_setting_section'
   );
   
   add_settings_field(
    'buildbench_project_plural_name',
    'Project plural name',
    'buildbench_project_plural_setting_callback_function',
    'writing',
    'buildbench_project_setting_section'
   );

    register_setting( 'writing', 'buildbench_project_setting_slug' );
    register_setting( 'writing', 'buildbench_project_singular_name' );
    register_setting( 'writing', 'buildbench_project_plural_name' );
} 

add_action( 'admin_init', 'buildbench_project_settings_api_init' );


function buildbench_project_plural_setting_callback_function() {
    $name = get_option('buildbench_project_plural_name');
  
    echo '<input name="buildbench_project_plural_name" id="buildbench_project_plural_name" type="text" value="'.$name.'" />';
}

function buildbench_project_singular_setting_callback_function() {
    $sname = get_option('buildbench_project_singular_name');

    echo '<input name="buildbench_project_singular_name" id="buildbench_project_singular_name" type="text" value="'.$sname.'" />';
}

function buildbench_project_slug_setting_callback_function() {
    $slug = get_option('buildbench_project_setting_slug');
    echo '<input name="buildbench_project_setting_slug" id="buildbench_project_setting_slug" type="text" value="'.$slug.'" />';
}

// case category settings


function buildbench_project_category_settings_api_init() {
 
    add_settings_field(
        'buildbench_project_cat_setting_slug',
        'Project category slug',
        'buildbench_project_cat_slug_setting_callback_function',
        'writing',
        'buildbench_project_setting_section'
    );
 
    add_settings_field(
     'buildbench_project_cat_singular_name',
     'Project category name',
     'buildbench_project_cat_singular_setting_callback_function',
     'writing',
     'buildbench_project_setting_section'
    );
 
     register_setting( 'writing', 'buildbench_project_cat_setting_slug' );
     register_setting( 'writing', 'buildbench_project_cat_singular_name' );
 
 
 } 
 
 add_action( 'admin_init', 'buildbench_project_category_settings_api_init' );
 
 function buildbench_project_cat_singular_setting_callback_function() {
     $sname = get_option('buildbench_project_cat_singular_name');
    
     echo '<input name="buildbench_project_cat_singular_name" id="buildbench_project_cat_singular_name" type="text" value="'.$sname.'" />';
 }
 
 function buildbench_project_cat_slug_setting_callback_function() {
     $slug = get_option('buildbench_project_cat_setting_slug');
     echo '<input name="buildbench_project_cat_setting_slug" id="buildbench_project_cat_setting_slug" type="text" value="'.$slug.'" />';
 }
