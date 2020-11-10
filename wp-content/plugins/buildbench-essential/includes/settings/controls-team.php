<?php 

function buildbench_team_settings_api_init() {

    add_settings_section(
       'buildbench_team_setting_section',
       'Buildbench Team Settings',
       null,
       'writing'
   );
 
   add_settings_field(
       'buildbench_team_setting_slug',
       'Team Slug',
       'buildbench_team_slug_setting_callback_function',
       'writing',
       'buildbench_team_setting_section'
   );

   add_settings_field(
    'buildbench_team_singular_name',
    'Team singular name',
    'buildbench_team_singular_setting_callback_function',
    'writing',
    'buildbench_team_setting_section'
   );
   
   add_settings_field(
    'buildbench_team_plural_name',
    'Team plural name',
    'buildbench_team_plural_setting_callback_function',
    'writing',
    'buildbench_team_setting_section'
   );

    register_setting( 'writing', 'buildbench_team_setting_slug' );
    register_setting( 'writing', 'buildbench_team_singular_name' );
    register_setting( 'writing', 'buildbench_team_plural_name' );
} 

add_action( 'admin_init', 'buildbench_team_settings_api_init' );


function buildbench_team_plural_setting_callback_function() {
    $name = get_option('buildbench_team_plural_name');
  
    echo '<input name="buildbench_team_plural_name" id="buildbench_team_plural_name" type="text" value="'.$name.'" />';
}

function buildbench_team_singular_setting_callback_function() {
    $sname = get_option('buildbench_team_singular_name');

    echo '<input name="buildbench_team_singular_name" id="buildbench_team_singular_name" type="text" value="'.$sname.'" />';
}

function buildbench_team_slug_setting_callback_function() {
    $slug = get_option('buildbench_team_setting_slug');
    echo '<input name="buildbench_team_setting_slug" id="buildbench_team_setting_slug" type="text" value="'.$slug.'" />';
}

// team category settings


function buildbench_team_category_settings_api_init() {
 
    add_settings_field(
        'buildbench_team_cat_setting_slug',
        'Team category slug',
        'buildbench_team_cat_slug_setting_callback_function',
        'writing',
        'buildbench_team_setting_section'
    );
 
    add_settings_field(
     'buildbench_team_cat_singular_name',
     'Team category name',
     'buildbench_team_cat_singular_setting_callback_function',
     'writing',
     'buildbench_team_setting_section'
    );
 
     register_setting( 'writing', 'buildbench_team_cat_setting_slug' );
     register_setting( 'writing', 'buildbench_team_cat_singular_name' );
 
 
 } 
 
 add_action( 'admin_init', 'buildbench_team_category_settings_api_init' );
 
 function buildbench_team_cat_singular_setting_callback_function() {
     $sname = get_option('buildbench_team_cat_singular_name');
    
     echo '<input name="buildbench_team_cat_singular_name" id="buildbench_team_cat_singular_name" type="text" value="'.$sname.'" />';
 }
 
 function buildbench_team_cat_slug_setting_callback_function() {
     $slug = get_option('buildbench_team_cat_setting_slug');
     echo '<input name="buildbench_team_cat_setting_slug" id="buildbench_team_cat_setting_slug" type="text" value="'.$slug.'" />';
 }
 
 
 
 
 
 
 
 