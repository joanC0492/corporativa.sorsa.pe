<?php
$redux_url = '';
if( class_exists('ReduxFramework') ){
	$redux_url = ReduxFramework::$_url;
}

$logo_url 		= get_template_directory_uri() . '/images/logo.png'; 
$favicon_url 	= get_template_directory_uri() . '/images/favicon.ico';

$color_image_folder = get_template_directory_uri() . '/admin/assets/images/colors/';
$list_colors = array('default', 'blue', 'blue2', 'red', 'red2' , 'green', 'pink', 'blue3', 'yellow', 'green2', 'red3', 'pink2', 'orange');
$preset_colors_options = array();
foreach( $list_colors as $color ){
	$preset_colors_options[$color] = array(
					'alt'      => $color
					,'img'     => $color_image_folder . $color . '.jpg'
					,'presets' => upstore_get_preset_color_options( $color )
	);
}

$family_fonts = array(
	"Arial, Helvetica, sans-serif"                          => "Arial, Helvetica, sans-serif"
	,"'Arial Black', Gadget, sans-serif"                    => "'Arial Black', Gadget, sans-serif"
	,"'Bookman Old Style', serif"                           => "'Bookman Old Style', serif"
	,"'Comic Sans MS', cursive"                             => "'Comic Sans MS', cursive"
	,"Courier, monospace"                                   => "Courier, monospace"
	,"Garamond, serif"                                      => "Garamond, serif"
	,"Georgia, serif"                                       => "Georgia, serif"
	,"Impact, Charcoal, sans-serif"                         => "Impact, Charcoal, sans-serif"
	,"'Lucida Console', Monaco, monospace"                  => "'Lucida Console', Monaco, monospace"
	,"'Lucida Sans Unicode', 'Lucida Grande', sans-serif"   => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif"
	,"'MS Sans Serif', Geneva, sans-serif"                  => "'MS Sans Serif', Geneva, sans-serif"
	,"'MS Serif', 'New York', sans-serif"                   => "'MS Serif', 'New York', sans-serif"
	,"'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif"
	,"Tahoma,Geneva, sans-serif"                            => "Tahoma, Geneva, sans-serif"
	,"'Times New Roman', Times,serif"                       => "'Times New Roman', Times, serif"
	,"'Trebuchet MS', Helvetica, sans-serif"                => "'Trebuchet MS', Helvetica, sans-serif"
	,"Verdana, Geneva, sans-serif"                          => "Verdana, Geneva, sans-serif"
	,"CustomFont"                          					=> "CustomFont"
);

$header_layout_options = array();
$header_image_folder = get_template_directory_uri() . '/admin/assets/images/headers/';
for( $i = 1; $i <= 11; $i++ ){
	$header_layout_options['v' . $i] = array(
		'alt'  => sprintf(esc_html__('Header Layout %s', 'upstore'), $i)
		,'img' => $header_image_folder . 'header_v'.$i.'.jpg'
	);
}

$footer_block_options = upstore_get_footer_block_options();

$breadcrumb_layout_options = array();
$breadcrumb_image_folder = get_template_directory_uri() . '/admin/assets/images/breadcrumbs/';
for( $i = 1; $i <= 3; $i++ ){
	$breadcrumb_layout_options['v' . $i] = array(
		'alt'  => sprintf(esc_html__('Breadcrumb Layout %s', 'upstore'), $i)
		,'img' => $breadcrumb_image_folder . 'breadcrumb_v'.$i.'.jpg'
	);
}

$sidebar_options = array();
$default_sidebars = upstore_get_list_sidebars();
if( is_array($default_sidebars) ){
	foreach( $default_sidebars as $key => $_sidebar ){
		$sidebar_options[$_sidebar['id']] = $_sidebar['name'];
	}
}

$product_loading_image = get_template_directory_uri() . '/images/prod_loading.gif';

$option_fields = array();

/*** General Tab ***/
$option_fields['general'] = array(
	array(
		'id'        => 'section-logo-favicon'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Logo - Favicon', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_logo'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Logo', 'upstore' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Select an image file for the main logo', 'upstore' )
		,'readonly' => false
		,'default'  => array( 'url' => $logo_url )
	)
	,array(
		'id'        => 'ts_logo_mobile'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Logo On Mobile', 'upstore' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Leave blank to display the main logo on mobile', 'upstore' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_logo_sticky'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Sticky Logo', 'upstore' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Display this logo on sticky header', 'upstore' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_logo_width'
		,'type'     => 'text'
		,'url'      => true
		,'title'    => esc_html__( 'Logo Width', 'upstore' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Set width for logo (in pixels)', 'upstore' )
		,'default'  => '150'
	)
	,array(
		'id'        => 'ts_favicon'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Favicon', 'upstore' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Select a PNG, GIF or ICO image', 'upstore' )
		,'readonly' => false
		,'default'  => array( 'url' => $favicon_url )
	)
	,array(
		'id'        => 'ts_text_logo'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Text Logo', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'UpStore'
	)
	
	,array(
		'id'        => 'section-loading-icons'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Loading Icons', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_small_loading_icon'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Small Loading Icon', 'upstore' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Its size should be about 20x20 (in pixels)', 'upstore' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_big_loading_icon'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Big Loading Icon', 'upstore' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Its size should be about 40x40 (in pixels)', 'upstore' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_blockoverplay'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Overplay Style', 'upstore' )
		,'desc'     => ''
		,'options'  => array(
			'light' 		=> 'Light'
			,'dark' 		=> 'Dark'
		)
		,'default'  => 'light'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'section-layout-style'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Layout Style', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       	=> 'ts_layout_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Layout Style', 'upstore' )
		,'subtitle' => esc_html__( 'You can override this option for the individual page', 'upstore' )
		,'desc'     => ''
		,'options'  => array(
			'wide' 		=> 'Wide'
			,'boxed' 	=> 'Boxed'
		)
		,'default'  => 'wide'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_layout_fullwidth'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Fullwidth Layout', 'upstore' )
		,'subtitle' => esc_html__( 'Set fullwidth layout for all content. If you enable this option, the Layout Style option is not available', 'upstore' )
		,'default'  => false
	)
	,array(
		'id'        => 'section-rtl'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Right To Left', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_enable_rtl'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Right To Left', 'upstore' )
		,'subtitle' => ''
		,'default'  => false
	)
	
	,array(
		'id'        => 'section-responsive'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Responsive', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_responsive'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Responsive', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
	)
	
	,array(
		'id'        => 'section-smooth-scroll'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Smooth Scroll', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_smooth_scroll'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Smooth Scroll', 'upstore' )
		,'subtitle' => ''
		,'default'  => false
	)
	
	,array(
		'id'        => 'section-back-to-top-button'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Back To Top Button', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_back_to_top_button'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Back To Top Button', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_back_to_top_button_on_mobile'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Back To Top Button On Mobile', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
	)
	
	,array(
		'id'        => 'section-nav-style'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Slider Navigation Style', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       	=> 'ts_slider_nav_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Slider Navigation Style', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'nav-square' 	=> esc_html__( 'Square', 'upstore' )
			,'nav-circle' 	=> esc_html__( 'Circle', 'upstore' )
		)
		,'default'  => 'nav-square'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	
	,array(
		'id'        => 'section-google-map-api'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Google Map API Key', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_gmap_api_key'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Enter Your API Key', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
	)
);

/*** Color Scheme Tab ***/
$option_fields['color-scheme'] = array(
	array(
		'id'          => 'ts_color_scheme'
		,'type'       => 'image_select'
		,'presets'    => true
		,'full_width' => false
		,'title'      => esc_html__( 'Select Color Scheme of Theme', 'upstore' )
		,'subtitle'   => ''
		,'desc'       => ''
		,'options'    => $preset_colors_options
		,'default'    => 'default'
	)
	,array(
		'id'        => 'section-general-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'General Colors', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'      => 'info-primary-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Primary Colors', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_primary_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Primary Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#27af7d'
		)
	)
	,array(
		'id'       => 'ts_text_color_in_bg_primary'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Color In Background Primary Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'      => 'info-heading-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Heading Colors', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_heading_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Heading Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#282828'
		)
	)
	,array(
		'id'      => 'info-main-content-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Main Content Colors', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_main_content_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Main Content Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_widget_content_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Widget Content Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#555555'
		)
	)
	,array(
		'id'       => 'ts_text_bold_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Bold Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#181818'
		)
	)
	,array(
		'id'       => 'ts_text_light_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Text Light Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#a9a9a9'
		)
	)
	,array(
		'id'       => 'ts_link_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Link Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#27af7d'
		)
	)
	,array(
		'id'       => 'ts_link_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Link Color Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#27af7d'
		)
	)
	,array(
		'id'       => 'ts_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Border Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#efefef'
		)
	)
	,array(
		'id'      => 'info-input-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Input Colors', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_input_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Input Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#555555'
		)
	)
	,array(
		'id'       => 'ts_input_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Input Border Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#e5e5e5'
		)
	)
	,array(
		'id'       => 'ts_input_text_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Input Text Color Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#666666'
		)
	)
	,array(
		'id'       => 'ts_input_border_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Input Border Color Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#c0c0c0'
		)
	)
	,array(
		'id'      => 'info-button-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Button Colors', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_button_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_button_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#282828'
		)
	)
	,array(
		'id'       => 'ts_button_text_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Text Color Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_button_background_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Background Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#27af7d'
		)
	)
	,array(
		'id'      => 'info-special-button-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Special Button Colors', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_special_button_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Special Button Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_special_button_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Special Button Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ed4545'
		)
	)
	
	,array(
		'id'      => 'info-breadcrumb-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Breadcrumb Colors', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_breadcrumb_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Breadcrumb Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#fafafa'
		)
	)
	,array(
		'id'       => 'ts_breadcrumb_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Breadcrumb Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_breadcrumb_heading_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Breadcrumb Heading Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_breadcrumb_link_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Breadcrumb Link Color Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#27af7d'
		)
	)
	,array(
		'id'        => 'section-header-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Header Colors', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_header_notice_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Notice Header Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_header_logo_background'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Header Logo Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#27af7d'
		)
	)
	,array(
		'id'      => 'info-top-header'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Top Header', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_top_header_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Top Header Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#1b1b1b'
		)
	)
	,array(
		'id'       => 'ts_top_header_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Top Header Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#a9a9a9'
		)
	)
	,array(
		'id'       => 'ts_top_header_text_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Top Header Text Color Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#27af7d'
		)
	)
	,array(
		'id'       => 'ts_top_header_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Top Header Border Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#2c2c2c'
		)
	)
	,array(
		'id'      => 'info-middle-header'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Middle Header', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_middle_header_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Middle Header Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#1f1f1f'
		)
	)
	,array(
		'id'       => 'ts_middle_header_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Middle Header Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'      => 'info-bottom-header'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Bottom Header', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_bottom_header_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Bottom Header Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#27af7d'
		)
	)
	,array(
		'id'       => 'ts_bottom_header_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Bottom Header Border Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#27af7d'
		)
	)
	,array(
		'id'      => 'info-header-search'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Search', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_search_categories_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Search Categories Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#f1f1f1'
		)
	)
	,array(
		'id'       => 'ts_search_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Search Border Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#efefef'
		)
	)
	,array(
		'id'       => 'ts_search_categories_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Search Categories Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#000000'
		)
	)
	,array(
		'id'       => 'ts_search_input_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Search Input Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#666666'
		)
	)
	,array(
		'id'       => 'ts_search_input_text_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Search Input Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'      => 'info-header-shopping-cart'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Shopping Cart', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_header_cart_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Shopping Cart Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#1b1b1b'
		)
	)
	,array(
		'id'       => 'ts_header_cart_text_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Shopping Cart Text Color Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_header_cart_amount_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Shopping Cart Amount Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_header_cart_amount_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Shopping Cart Amount Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#27af7d'
		)
	)
	,array(
		'id'       => 'ts_header_cart_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Shopping Cart Border Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#27af7d'
		)
	)
	,array(
		'id'        => 'section-menu-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Menu Colors', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'      => 'info-vertical-menu-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Vertical Menu Colors', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_vertical_menu_title_text'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Vertical Menu Title Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_vertical_menu_title_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Vertical Menu Title Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#189163'
		)
	)
	,array(
		'id'       => 'ts_vertical_menu_title_text_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Vertical Menu Title Color Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_vertical_menu_title_background_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Vertical Menu Title Background Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#000000'
		)
	)
	,array(
		'id'       => 'ts_vertical_menu_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Vertical Menu Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#000000'
		)
	)
	,array(
		'id'       => 'ts_vertical_menu_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Vertical Menu Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_vertical_menu_text_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Vertical Menu Text Color Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#27af7d'
		)
	)
	,array(
		'id'       => 'ts_vertical_menu_background_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Vertical Menu Background Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#f1f1f1'
		)
	)
	,array(
		'id'      => 'info-main-menu-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Main Menu Colors', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_menu_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Menu Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#000000'
		)
	)
	,array(
		'id'       => 'ts_menu_text_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Menu Text Color Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#27af7d'
		)
	)
	,array(
		'id'       => 'ts_menu_background_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Menu Background Color Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#27af7d'
		)
	)
	,array(
		'id'      => 'info-sub-menu-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Sub Menu Colors', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_sub_menu_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Sub Menu Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_sub_menu_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Sub Menu Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#1f1f1f'
		)
	)
	,array(
		'id'       => 'ts_sub_menu_text_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Sub Menu Text Color Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#27af7d'
		)
	)
	,array(
		'id'       => 'ts_sub_menu_heading_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Sub Menu Heading Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#000000'
		)
	)
	
	,array(
		'id'      => 'info-menu-mobile-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Menu Mobile Colors', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_menu_mobile_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Menu Mobile Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#000000'
		)
	)
	,array(
		'id'       => 'ts_menu_mobile_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Menu Mobile Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	
	,array(
		'id'        => 'section-footer-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Footer Colors', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_footer_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#1b1b1b'
		)
	)
	,array(
		'id'       => 'ts_footer_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#a9a9a9'
		)
	)
	,array(
		'id'       => 'ts_footer_text_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer Text Color Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#27af7d'
		)
	)
	,array(
		'id'       => 'ts_footer_heading_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer Heading Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_footer_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer Border Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#353535'
		)
	)
	,array(
		'id'      => 'info-footer-social-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Footer Social Colors', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_footer_social_icon_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Social Icon Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_footer_social_icon_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Social Icon Border Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#555555'
		)
	)
	,array(
		'id'      => 'info-footer-end-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Footer End Colors', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_footer_end_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer End Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#171717'
		)
	)
	,array(
		'id'       => 'ts_footer_end_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Footer End Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#a9a9a9'
		)
	)
	,array(
		'id'        => 'section-product-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Colors', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_product_name_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Name Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#202020'
		)
	)
	,array(
		'id'       => 'ts_product_price_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Price Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#000000'
		)
	)
	,array(
		'id'       => 'ts_product_del_price_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Del Price Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#999999'
		)
	)
	,array(
		'id'       => 'ts_product_sale_price_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Sale Price Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#000000'
		)
	)
	,array(
		'id'       => 'ts_rating_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Product Rating Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffca27'
		)
	)
	,array(
		'id'      => 'info-product-countdown-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Product Countdown Colors', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_product_countdown_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Countdown Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#f7f7f7'
		)
	)
	,array(
		'id'       => 'ts_product_countdown_number_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Countdown Number Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#1f1f1f'
		)
	)
	,array(
		'id'       => 'ts_product_countdown_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Countdown Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#848484'
		)
	)
	,array(
		'id'       => 'ts_product_countdown_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Countdown Border Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#e5e5e5'
		)
	)
	,array(
		'id'       => 'ts_product_countdown_day_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Countdown Day Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_product_countdown_day_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Countdown Day Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#f43e3d'
		)
	)
	,array(
		'id'      => 'info-product-button-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Thumbnail Product Button Colors', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_product_button_thumbnail_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Thumbnail Button Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#858585'
		)
	)
	,array(
		'id'       => 'ts_product_button_thumbnail_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Thumbnail Button Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_product_button_thumbnail_text_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Thumbnail Button Text Color Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_product_button_thumbnail_background_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Thumbnail Button Background Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#282828'
		)
	)
	,array(
		'id'       => 'ts_product_button_thumbnail_mobile_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Thumbnail Button Mobile Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#666666'
		)
	)
	,array(
		'id'       => 'ts_product_button_thumbnail_mobile_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Thumbnail Button Mobile Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'      => 'info-product-label-colors'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Product Label Colors', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'       => 'ts_product_sale_label_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Sale Label Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_product_sale_label_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Sale Label Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#27af7d'
		)
	)
	,array(
		'id'       => 'ts_product_new_label_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'New Label Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_product_new_label_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'New Label Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#3a93ca'
		)
	)
	,array(
		'id'       => 'ts_product_feature_label_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Feature Label Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_product_feature_label_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Feature Label Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#f43e3e'
		)
	)
	,array(
		'id'       => 'ts_product_outstock_label_text_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'OutStock Label Text Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#ffffff'
		)
	)
	,array(
		'id'       => 'ts_product_outstock_label_background_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'OutStock Label Background Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#989898'
		)
	)
	,array(
		'id'        => 'section-revolution-colors'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Revolution Slider', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       => 'ts_revo_button_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Navi Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#cccccc'
		)
	)
	,array(
		'id'       => 'ts_revo_button_border_color'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Navi Border Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#cccccc'
		)
	)
	,array(
		'id'       => 'ts_revo_button_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Navi Color Hover', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#000000'
		)
	)
	,array(
		'id'       => 'ts_revo_button_border_color_hover'
		,'type'     => 'color_rgba'
		,'title'    => esc_html__( 'Button Navi Border Color', 'upstore' )
		,'subtitle' => ''
		,'default'  => array(
			'color' => '#000000'
		)
	)
);

/*** Typography Tab ***/
$option_fields['typography'] = array(
	array(
		'id'        => 'section-fonts'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Fonts', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       		=> 'ts_body_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Body Font', 'upstore' )
		,'subtitle' 	=> ''
		,'google'   	=> true
		,'font-style'   => false
		,'text-align'   => false
		,'color'   		=> false
		,'preview'		=> array('always_display' => true)
		,'default'  	=> array(
			'font-family'  => 'Poppins'
			,'font-weight' => '400'
			,'font-size'   => '13px'
			,'line-height' => '26px'
			,'google'	   => true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       		=> 'ts_body_2_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Body 2 Font', 'upstore' )
		,'subtitle' 	=> ''
		,'google'   	=> true
		,'font-style'   => false
		,'text-align'   => false
		,'color'   		=> false
		,'preview'		=> array('always_display' => true)
		,'default'  	=> array(
			'font-family'  => 'Poppins'
			,'font-weight' => '600'
			,'font-size'   => '16px'
			,'line-height' => '20px'
			,'google'	   => true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       		=> 'ts_heading_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Heading Font', 'upstore' )
		,'subtitle' 	=> ''
		,'google'   	=> true
		,'font-style'   => false
		,'text-align'   => false
		,'color'   		=> false
		,'preview'		=> array('always_display' => true)
		,'default'  	=> array(
			'font-family'  => 'Poppins'
			,'font-weight' => '600'
			,'font-size'   => '15px'
			,'line-height' => '22px'
			,'google'	   => true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       		=> 'ts_heading_2_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Heading 2 Font', 'upstore' )
		,'subtitle' 	=> ''
		,'google'   	=> true
		,'font-style'   => false
		,'font-size'   	=> false
		,'line-height'  => false
		,'text-align'   => false
		,'color'   		=> false
		,'preview'		=> array('always_display' => true)
		,'default'  	=> array(
			'font-family'  => 'Damion'
			,'font-weight' => '400'
			,'font-size'   => '16px'
			,'line-height' => '22px'
			,'google'	   => true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'       		=> 'ts_menu_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Menu Font', 'upstore' )
		,'subtitle' 	=> ''
		,'google'   	=> true
		,'font-style'   => false
		,'text-align'   => false
		,'color'   		=> false
		,'preview'		=> array('always_display' => true)
		,'default'  	=> array(
			'font-family'  => 'Poppins'
			,'font-weight' => '500'
			,'font-size'   => '13px'
			,'line-height' => '20px'
			,'google'	   => true
		)
		,'fonts'	=> $family_fonts
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 20)
	)
	,array(
		'id'        => 'section-custom-font'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Custom Font', 'upstore' )
		,'subtitle' => esc_html__( 'If you get the error message \'Sorry, this file type is not permitted for security reasons\', you can add this line define(\'ALLOW_UNFILTERED_UPLOADS\', true); to the wp-config.php file', 'upstore' )
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_custom_font_ttf'
		,'type'     => 'media'
		,'url'      => true
		,'preview'  => false
		,'title'    => esc_html__( 'Custom Font ttf', 'upstore' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Upload the .ttf font file. To use it, you select CustomFont in the Standard Fonts group', 'upstore' )
		,'default'  => array( 'url' => '' )
		,'mode'		=> 'application'
	)
	
	,array(
		'id'        => 'section-font-sizes'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Font Sizes', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       		=> 'ts_h1_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H1 Font Size', 'upstore' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'text-align'   => false
		,'color'   		=> false
		,'preview'		=> array('always_display' => false)
		,'default'  	=> array(
			'font-family'  => ''
			,'font-weight' => ''
			,'font-size'   => '44px'
			,'line-height' => '60px'
			,'google'	   => false
		)
	)
	,array(
		'id'       		=> 'ts_h2_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H2 Font Size', 'upstore' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'text-align'   => false
		,'color'   		=> false
		,'preview'		=> array('always_display' => false)
		,'default'  	=> array(
			'font-family'  => ''
			,'font-weight' => ''
			,'font-size'   => '34px'
			,'line-height' => '46px'
			,'google'	   => false
		)
	)
	,array(
		'id'       		=> 'ts_h3_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H3 Font Size', 'upstore' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'text-align'   => false
		,'color'   		=> false
		,'preview'		=> array('always_display' => false)
		,'default'  	=> array(
			'font-family'  => ''
			,'font-weight' => ''
			,'font-size'   => '30px'
			,'line-height' => '40px'
			,'google'	   => false
		)
	)
	,array(
		'id'       		=> 'ts_h4_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H4 Font Size', 'upstore' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'text-align'   => false
		,'color'   		=> false
		,'preview'		=> array('always_display' => false)
		,'default'  	=> array(
			'font-family'  => ''
			,'font-weight' => ''
			,'font-size'   => '24px'
			,'line-height' => '32px'
			,'google'	   => false
		)
	)
	,array(
		'id'       		=> 'ts_h5_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H5 Font Size', 'upstore' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'text-align'   => false
		,'color'   		=> false
		,'preview'		=> array('always_display' => false)
		,'default'  	=> array(
			'font-family'  => ''
			,'font-weight' => ''
			,'font-size'   => '18px'
			,'line-height' => '24px'
			,'google'	   => false
		)
	)
	,array(
		'id'       		=> 'ts_h6_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'H6 Font Size', 'upstore' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'text-align'   => false
		,'color'   		=> false
		,'preview'		=> array('always_display' => false)
		,'default'  	=> array(
			'font-family'  => ''
			,'font-weight' => ''
			,'font-size'   => '14px'
			,'line-height' => '18px'
			,'google'	   => false
		)
	)
	,array(
		'id'       		=> 'ts_button_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Button Font Size', 'upstore' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'text-align'   => false
		,'color'   		=> false
		,'preview'		=> array('always_display' => false)
		,'default'  	=> array(
			'font-family'  => ''
			,'font-weight' => ''
			,'font-size'   => '12px'
			,'line-height' => '20px'
			,'google'	   => false
		)
	)
	,array(
		'id'       		=> 'ts_product_name_font'
		,'type'     	=> 'typography'
		,'title'    	=> esc_html__( 'Product Name Font Size', 'upstore' )
		,'subtitle' 	=> ''
		,'class' 		=> 'typography-no-preview'
		,'google'   	=> false
		,'font-family'  => false
		,'font-weight'  => false
		,'font-style'   => false
		,'text-align'   => false
		,'color'   		=> false
		,'preview'		=> array('always_display' => false)
		,'default'  	=> array(
			'font-family'  => ''
			,'font-weight' => ''
			,'font-size'   => '14px'
			,'line-height' => '18px'
			,'google'	   => false
		)
	)
);

/*** Header Tab ***/
$option_fields['header'] = array(
	array(
		'id'        => 'section-header-options'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Header Options', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_header_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Header Layout', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $header_layout_options
		,'default'  => 'v1'
	)
	,array(
		'id'        => 'ts_header_store_notice'
		,'type'     => 'textarea'
		,'title'    => esc_html__( 'Store Notice', 'upstore' )
		,'subtitle' => esc_html__( 'Add a notice at the top of page', 'upstore' )
		,'desc'     => ''
		,'validate' => 'html'
		,'default'  => ''
	)
	,array(
		'id'        => 'ts_header_store_notice_bg_image'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Store Notice Background Image', 'upstore' )
		,'desc'     => ''
		,'subtitle' => ''
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_header_contact_information'
		,'type'     => 'textarea'
		,'title'    => esc_html__( 'Header Contact Information', 'upstore' )
		,'subtitle' => esc_html__( 'You can add your email, phone number', 'upstore' )
		,'desc'     => ''
		,'validate' => 'html'
		,'default'  => 'Welcome you to <a href="#">UpStore</a> Theme'
	)
	,array(
		'id'        => 'ts_header_middle_content'
		,'type'     => 'textarea'
		,'title'    => esc_html__( 'Header Middle Content', 'upstore' )
		,'subtitle' => esc_html__( 'It is only available on the eighth and ninth header layouts', 'upstore' )
		,'desc'     => ''
		,'validate' => 'html'
		,'default'  => ''
	)
	,array(
		'id'        => 'ts_header_currency'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Header Currency', 'upstore' )
		,'subtitle' => esc_html__( 'If you don\'t install WooCommerce Multilingual plugin, it will display demo html', 'upstore' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'upstore' )
		,'off'		=> esc_html__( 'Disable', 'upstore' )
	)
	,array(
		'id'        => 'ts_header_language'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Header Language', 'upstore' )
		,'subtitle' => esc_html__( 'If you don\'t install WPML plugin, it will display demo html', 'upstore' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'upstore' )
		,'off'		=> esc_html__( 'Disable', 'upstore' )
	)
	,array(
		'id'        => 'ts_enable_tiny_shopping_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Shopping Cart', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'upstore' )
		,'off'		=> esc_html__( 'Disable', 'upstore' )
	)
	,array(
		'id'        => 'ts_shopping_cart_sidebar'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Shopping Cart Sidebar', 'upstore' )
		,'subtitle' => esc_html__( 'Show shopping cart in sidebar instead of dropdown. You need to update cart after changing', 'upstore' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'upstore' )
		,'off'		=> esc_html__( 'Disable', 'upstore' )
		,'required'	=> array( 'ts_enable_tiny_shopping_cart', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_show_shopping_cart_after_adding'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Show Shopping Cart After Adding Product To Cart', 'upstore' )
		,'subtitle' => esc_html__( 'You need to enable Ajax add to cart in WooCommerce > Settings > Products', 'upstore' )
		,'default'  => false
		,'on'		=> esc_html__( 'Enable', 'upstore' )
		,'off'		=> esc_html__( 'Disable', 'upstore' )
		,'required'	=> array( 'ts_shopping_cart_sidebar', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_add_to_cart_effect'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Add To Cart Effect', 'upstore' )
		,'subtitle' => esc_html__( 'You need to enable Ajax add to cart in WooCommerce > Settings > Products. If "Show Shopping Cart After Adding Product To Cart" is enabled, this option will be disabled', 'upstore' )
		,'options'  => array(
			'0'				=> esc_html__( 'None', 'upstore' )
			,'fly_to_cart'	=> esc_html__( 'Fly To Cart', 'upstore' )
			,'show_popup'	=> esc_html__( 'Show Popup', 'upstore' )
		)
		,'default'  => '0'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_enable_search'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Search Bar', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'upstore' )
		,'off'		=> esc_html__( 'Disable', 'upstore' )
	)
	,array(
		'id'        => 'ts_search_by_category'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Search By Category', 'upstore' )
		,'subtitle' => esc_html__( 'Enable or disable category dropdown in search bar. Please note that it is only available on some header layouts', 'upstore' )
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'upstore' )
		,'off'		=> esc_html__( 'Disable', 'upstore' )
		,'required'	=> array( 'ts_enable_search', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_enable_tiny_account'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'My Account', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'upstore' )
		,'off'		=> esc_html__( 'Disable', 'upstore' )
	)
	,array(
		'id'        => 'ts_login_registration_popup'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Login/Registration Popup', 'upstore' )
		,'subtitle' => esc_html__( 'Show the WooCommerce login/registration forms on a popup. Please note that it may not work correctly if you install the third party plugins which customize the login/registration forms', 'upstore' )
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'upstore' )
		,'off'		=> esc_html__( 'Disable', 'upstore' )
		,'required'	=> array( 'ts_enable_tiny_account', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_enable_tiny_wishlist'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Wishlist', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'upstore' )
		,'off'		=> esc_html__( 'Disable', 'upstore' )
	)
	,array(
		'id'        => 'ts_enable_sticky_header'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Sticky Header', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'upstore' )
		,'off'		=> esc_html__( 'Disable', 'upstore' )
	)
	
	,array(
		'id'      => 'info-header-social-icons'
		,'type'   => 'info'
		,'notice' => false
		,'title'  => esc_html__( 'Header Social Icons', 'upstore' )
		,'desc'   => ''
	)
	,array(
		'id'        => 'ts_enable_header_social_icons'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Header Social Icons', 'upstore' )
		,'subtitle' => esc_html__( 'Some header layouts don\'t include the social icons', 'upstore' )
		,'default'  => true
		,'on'		=> esc_html__( 'Enable', 'upstore' )
		,'off'		=> esc_html__( 'Disable', 'upstore' )
	)
	,array(
		'id'        => 'ts_facebook_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Facebook URL', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '#'
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_twitter_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Twitter URL', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '#'
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_youtube_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Youtube URL', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_instagram_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Instagram URL', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '#'
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_linkedin_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'LinkedIn URL', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => '#'
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_custom_social_url'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Custom Icon URL', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_custom_social_class'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Custom Icon Class', 'upstore' )
		,'subtitle' => esc_html__( 'Use FontAwesome. Ex: fa-facebook', 'upstore' )
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_enable_header_social_icons', 'equals', '1' )
	)
	
	,array(
		'id'        => 'section-breadcrumb-options'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Breadcrumb Options', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_breadcrumb_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Breadcrumb Layout', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $breadcrumb_layout_options
		,'default'  => 'v1'
	)
	,array(
		'id'        => 'ts_enable_breadcrumb_background_image'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Breadcrumbs Background Image', 'upstore' )
		,'subtitle' => esc_html__( 'You can set background color by going to Color Scheme tab > Breadcrumb Colors section', 'upstore' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_bg_breadcrumbs'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Breadcrumbs Background Image', 'upstore' )
		,'desc'     => ''
		,'subtitle' => esc_html__( 'Select a new image to override the default background image', 'upstore' )
		,'readonly' => false
		,'default'  => array( 'url' => '' )
	)
	,array(
		'id'        => 'ts_breadcrumb_bg_parallax'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Breadcrumbs Background Parallax', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
	)
);

/*** Footer Tab ***/
$option_fields['footer'] = array(
	array(
		'id'       	=> 'ts_first_footer_area'
		,'type'     => 'select'
		,'title'    => esc_html__( 'First Footer Area', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $footer_block_options
		,'default'  => '0'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_second_footer_area'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Second Footer Area', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $footer_block_options
		,'default'  => '0'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
);

/*** Menu Tab ***/
$option_fields['menu'] = array(
	array(
		'id'             => 'ts_menu_num_widget'
		,'type'          => 'slider'
		,'title'         => esc_html__( 'Mega Menu Widget Area', 'upstore' )
		,'subtitle'      => esc_html__( 'Number Of Widget Areas Available', 'upstore' )
		,'desc'          => esc_html__( 'Min: 1, max: 30, step: 1, default value: 6', 'upstore' )
		,'default'       => 6
		,'min'           => 1
		,'step'          => 1
		,'max'           => 30
		,'display_value' => 'text'
	)
	,array(
		'id'             => 'ts_menu_thumb_width'
		,'type'          => 'slider'
		,'title'         => esc_html__( 'Menu Thumbnail Width', 'upstore' )
		,'subtitle'      => ''
		,'desc'          => esc_html__( 'Min: 5, max: 50, step: 1, default value: 40', 'upstore' )
		,'default'       => 40
		,'min'           => 5
		,'step'          => 1
		,'max'           => 50
		,'display_value' => 'text'
	)
	,array(
		'id'             => 'ts_menu_thumb_height'
		,'type'          => 'slider'
		,'title'         => esc_html__( 'Menu Thumbnail Height', 'upstore' )
		,'subtitle'      => ''
		,'desc'          => esc_html__( 'Min: 5, max: 50, step: 1, default value: 40', 'upstore' )
		,'default'       => 40
		,'min'           => 5
		,'step'          => 1
		,'max'           => 50
		,'display_value' => 'text'
	)
);

/*** Blog Tab ***/
$option_fields['blog'] = array(
	array(
		'id'        => 'section-blog'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Blog', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_blog_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Blog Layout', 'upstore' )
		,'subtitle' => esc_html__( 'This option is available when Front page displays the latest posts', 'upstore' )
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'upstore')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'upstore')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'upstore')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'upstore')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-0'
	)
	,array(
		'id'       	=> 'ts_blog_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_blog_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_blog_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Blog Style', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'0'			=> esc_html__( 'Default', 'upstore' )
			,'list'		=> esc_html__( 'List', 'upstore' )
		)
		,'default'  => '0'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_blog_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Thumbnail', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_date'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Date', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Title', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_author'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Author', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_comment'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Comment', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_read_more'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Read More Button', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_categories'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Categories', 'upstore' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_excerpt'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Excerpt', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_excerpt_strip_tags'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Excerpt Strip All Tags', 'upstore' )
		,'subtitle' => esc_html__( 'Strip all html tags in Excerpt', 'upstore' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_blog_excerpt_max_words'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Blog Excerpt Max Words', 'upstore' )
		,'subtitle' => esc_html__( 'Input -1 to show full excerpt', 'upstore' )
		,'desc'     => ''
		,'default'  => '-1'
	)
	
	,array(
		'id'        => 'section-blog-details'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Blog Details', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_blog_details_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Blog Details Layout', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'upstore')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'upstore')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'upstore')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'upstore')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '1-1-0'
	)
	,array(
		'id'       	=> 'ts_blog_details_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_blog_details_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'blog-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_blog_details_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Thumbnail', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_details_date'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Date', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_details_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Title', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_details_author'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Author', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_details_comment'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Comment', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_details_content'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Content', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_details_tags'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Tags', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_details_categories'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Categories', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_details_sharing'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Sharing', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_details_sharing_sharethis'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Sharing - Use ShareThis', 'upstore' )
		,'subtitle' => esc_html__( 'Use share buttons from sharethis.com. You need to add key below', 'upstore')
		,'default'  => true
		,'required'	=> array( 'ts_blog_details_sharing', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_blog_details_sharing_sharethis_key'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Blog Sharing - ShareThis Key', 'upstore' )
		,'subtitle' => esc_html__( 'You get it from script code. It is the value of "property" attribute', 'upstore' )
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_blog_details_sharing', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_blog_details_author_box'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Author Box', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_details_related_posts'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Related Posts', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_blog_details_comment_form'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Blog Comment Form', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
);

/*** Portfolio Details Tab ***/
$option_fields['portfolio-details'] = array(
	array(
		'id'       	=> 'ts_portfolio_page'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Portfolio Page', 'upstore' )
		,'subtitle' => esc_html__( 'Select the page which displays the list of portfolios. You also need to add our portfolio shortcode to that page', 'upstore' )
		,'desc'     => ''
		,'data'     => 'pages'
		,'default'	=> ''
	)
	,array(
		'id'       	=> 'ts_portfolio_layout'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Layout', 'upstore' )
		,'subtitle' => esc_html__( 'Display thumbnail at the top or left of content', 'upstore' )
		,'desc'     => ''
		,'options'  => array(
			'top-thumbnail'		=> esc_html__( 'Top Thumbnail', 'upstore' )
			,'left-thumbnail'	=> esc_html__( 'Left Thumbnail', 'upstore' )
		)
		,'default'	=> 'top-thumbnail'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_portfolio_thumbnail_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Thumbnail Style', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'slider'	=> esc_html__( 'Slider', 'upstore' )
			,'gallery'	=> esc_html__( 'Gallery', 'upstore' )
		)
		,'default'	=> 'slider'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_portfolio_slider_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Slider Style', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'default'			=> esc_html__( 'Default', 'upstore' )
			,'center'			=> esc_html__( 'Center', 'upstore' )
			,'fullwidth'		=> esc_html__( 'Fullwidth', 'upstore' )
			,'center-fullwidth'	=> esc_html__( 'Center Fullwidth', 'upstore' )
		)
		,'default'	=> 'default'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array(
			array( 'ts_portfolio_layout', 'equals', 'top-thumbnail' )
			,array( 'ts_portfolio_thumbnail_style', 'equals', 'slider' )
		)
	)
	,array(
		'id'        => 'ts_portfolio_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Thumbnail', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_portfolio_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Title', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_portfolio_likes'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Likes', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_portfolio_content'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Content', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_portfolio_client'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Client', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_portfolio_year'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Year', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_portfolio_url'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio URL', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_portfolio_categories'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Categories', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_portfolio_sharing'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Sharing', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_portfolio_related_posts'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Related Posts', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_portfolio_custom_field'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Portfolio Custom Field', 'upstore' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_portfolio_custom_field_title'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Portfolio Custom Field Title', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Custom Field'
		,'required'	=> array( 'ts_portfolio_custom_field', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_portfolio_custom_field_content'
		,'type'     => 'editor'
		,'title'    => esc_html__( 'Portfolio Custom Field Content', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Custom content goes here'
		,'args'     => array(
			'wpautop'        => false
			,'media_buttons' => false
			,'textarea_rows' => 5
			,'teeny'         => false
			,'quicktags'     => false
		)
		,'required'	=> array( 'ts_portfolio_custom_field', 'equals', '1' )
	)
);

/*** WooCommerce Tab ***/
$option_fields['woocommerce'] = array(
	array(
		'id'        => 'section-product-label'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Label', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_product_show_new_label'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product New Label', 'upstore' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_product_new_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product New Label Text', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'New'
		,'required'	=> array( 'ts_product_show_new_label', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_product_show_new_label_time'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product New Label Time', 'upstore' )
		,'subtitle' => esc_html__( 'Number of days which you want to show New label since product is published', 'upstore' )
		,'desc'     => ''
		,'default'  => '30'
		,'required'	=> array( 'ts_product_show_new_label', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_product_sale_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Sale Label Text', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Sale'
	)
	,array(
		'id'        => 'ts_product_feature_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Feature Label Text', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Hot'
	)
	,array(
		'id'        => 'ts_product_out_of_stock_label_text'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Out Of Stock Label Text', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Sold out'
	)
	,array(
		'id'       	=> 'ts_show_sale_label_as'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Show Sale Label As', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'text' 		=> esc_html__( 'Text', 'upstore' )
			,'number' 	=> esc_html__( 'Number', 'upstore' )
			,'percent' 	=> esc_html__( 'Percent', 'upstore' )
		)
		,'default'  => 'text'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	
	,array(
		'id'        => 'section-product-hover'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Hover', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       	=> 'ts_product_hover_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Hover Style', 'upstore' )
		,'subtitle' => esc_html__( 'Select the style of buttons/icons when hovering on product', 'upstore' )
		,'desc'     => ''
		,'options'  => array(
			'style-1' 		=> esc_html__( 'Style 1', 'upstore' )
			,'style-2' 		=> esc_html__( 'Style 2', 'upstore' )
		)
		,'default'  => 'style-1'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_effect_product'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Back Product Image', 'upstore' )
		,'subtitle' => esc_html__( 'Show another product image on hover. It will show an image from Product Gallery', 'upstore' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_product_tooltip'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Tooltip', 'upstore' )
		,'subtitle' => esc_html__( 'Show tooltip when hovering on buttons/icons on product', 'upstore' )
		,'default'  => true
	)
	
	,array(
		'id'        => 'section-lazy-load'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Lazy Load', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_lazy_load'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Activate Lazy Load', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_placeholder_img'
		,'type'     => 'media'
		,'url'      => true
		,'title'    => esc_html__( 'Placeholder Image', 'upstore' )
		,'desc'     => ''
		,'subtitle' => ''
		,'readonly' => false
		,'default'  => array( 'url' => $product_loading_image )
	)
	
	,array(
		'id'        => 'section-quickshop'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Quickshop', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_enable_quickshop'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Activate Quickshop', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
	)
	
	,array(
		'id'        => 'section-catalog-mode'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Catalog Mode', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_enable_catalog_mode'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Catalog Mode', 'upstore' )
		,'subtitle' => esc_html__( 'Hide all Add To Cart buttons on your site. You can also hide Shopping cart by going to Header tab > turn Shopping Cart option off', 'upstore' )
		,'default'  => false
	)
	
	,array(
		'id'        => 'section-ajax-search'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Ajax Search', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_ajax_search'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Enable Ajax Search', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'        => 'ts_ajax_search_number_result'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Number Of Results', 'upstore' )
		,'subtitle' => esc_html__( 'Input -1 to show all results', 'upstore' )
		,'desc'     => ''
		,'default'  => '3'
	)
	
	,array(
		'id'        => 'section-instagram-shop'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Instagram Shop', 'upstore' )
		,'subtitle' => esc_html__( 'Enter your Snapppt Account ID below if you want to track every sale with Instagram Shop', 'upstore' )
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_instagram_shop_account_id'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Your Snapppt Account ID', 'upstore' )
		,'subtitle' => esc_html__( 'You create and get Account ID on https://snapppt.com/. Your Account ID should look like XXXXX-XXXX-XXXX-XXX-XXXXXXX', 'upstore' )
		,'desc'     => ''
		,'default'  => ''
	)
);

/*** Shop/Product Category Tab ***/
$option_fields['shop-product-category'] = array(
	array(
		'id'        => 'ts_prod_cat_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Shop/Product Category Layout', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'upstore')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'upstore')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'upstore')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'upstore')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-0'
	)
	,array(
		'id'       	=> 'ts_prod_cat_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-category-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_prod_cat_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-category-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_prod_cat_columns'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Columns', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			3	=> 3
			,4	=> 4
			,5	=> 5
			,6	=> 6
		)
		,'default'  => '4'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_cat_per_page'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Products Per Page', 'upstore' )
		,'subtitle' => esc_html__( 'Number of products per page', 'upstore' )
		,'desc'     => ''
		,'default'  => '16'
	)
	,array(
		'id'        => 'ts_prod_cat_per_page_dropdown'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Products Per Page Dropdown', 'upstore' )
		,'subtitle' => esc_html__( 'Allow users to select number of products per page', 'upstore' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_cat_glt'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Grid/List Toggle', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'       	=> 'ts_prod_cat_glt_default'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Grid/List Toggle Default', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'grid'	=> esc_html__( 'Grid', 'upstore' )
			,'list'	=> esc_html__( 'List', 'upstore' )
		)
		,'default'  => 'grid'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array( 'ts_prod_cat_glt', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_sidebar_filter_widget_area'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Sidebar Filter Widget Area', 'upstore' )
		,'subtitle' => esc_html__( 'Display Sidebar Filter Widget Area at the top of Left or Right Sidebar. If there is no sidebar on the Shop/Product Category page, it will also be disabled', 'upstore' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_top_filter_widget_area'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Top Filter Widget Area', 'upstore' )
		,'subtitle' => esc_html__( 'Display the Filter button at the top of the Shop/Product Category page. It shows widgets in Top Filter Widget Area', 'upstore' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_top_filter_widget_area_sidebar'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Top Filter Widget Area Sidebar', 'upstore' )
		,'subtitle' => esc_html__( 'Display Top Filter Widget Area in sidebar instead of above content. It is different with Left and Right Sidebar', 'upstore' )
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
		,'required'	=> array( 'ts_top_filter_widget_area', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_cat_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Thumbnail', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_cat_label'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Label', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_cat_brand'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Brands', 'upstore' )
		,'subtitle' => esc_html__( 'Add brands to product list on all pages', 'upstore' )
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_cat_cat'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Categories', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_cat_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Title', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_cat_sku'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product SKU', 'upstore' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_cat_rating'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Rating', 'upstore' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_cat_price'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Price', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_cat_add_to_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Add To Cart Button', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_cat_color_swatch'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Color Swatches', 'upstore' )
		,'subtitle' => esc_html__( 'Show the color attribute of variations. The slug of the color attribute has to be "color"', 'upstore' )
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'       	=> 'ts_prod_cat_number_color_swatch'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Number Of Color Swatches', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			2	=> 2
			,3	=> 3
			,4	=> 4
			,5	=> 5
			,6	=> 6
		)
		,'default'  => '3'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
		,'required'	=> array( 'ts_prod_cat_color_swatch', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_cat_grid_desc'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Short Description - Grid View', 'upstore' )
		,'subtitle' => esc_html__( 'Show product description on grid view', 'upstore' )
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_cat_grid_desc_words'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Short Description - Grid View - Limit Words', 'upstore' )
		,'subtitle' => esc_html__( 'Number of words to show product description on grid view. It is also used for product shortcode', 'upstore' )
		,'desc'     => ''
		,'default'  => '7'
	)
	,array(
		'id'        => 'ts_prod_cat_list_desc'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Short Description - List View', 'upstore' )
		,'subtitle' => esc_html__( 'Show product description on list view', 'upstore' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_cat_list_desc_words'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Short Description - List View - Limit Words', 'upstore' )
		,'subtitle' => esc_html__( 'Number of words to show product description on list view', 'upstore' )
		,'desc'     => ''
		,'default'  => '50'
	)
);

/*** Product Details Tab ***/
$option_fields['product-details'] = array(
	array(
		'id'        => 'ts_prod_layout'
		,'type'     => 'image_select'
		,'title'    => esc_html__( 'Product Layout', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'0-1-0' => array(
				'alt'  => esc_html__('Fullwidth', 'upstore')
				,'img' => $redux_url . 'assets/img/1col.png'
			)
			,'1-1-0' => array(
				'alt'  => esc_html__('Left Sidebar', 'upstore')
				,'img' => $redux_url . 'assets/img/2cl.png'
			)
			,'0-1-1' => array(
				'alt'  => esc_html__('Right Sidebar', 'upstore')
				,'img' => $redux_url . 'assets/img/2cr.png'
			)
			,'1-1-1' => array(
				'alt'  => esc_html__('Left & Right Sidebar', 'upstore')
				,'img' => $redux_url . 'assets/img/3cm.png'
			)
		)
		,'default'  => '0-1-0'
	)
	,array(
		'id'       	=> 'ts_prod_left_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Left Sidebar', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'       	=> 'ts_prod_right_sidebar'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Right Sidebar', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => $sidebar_options
		,'default'  => 'product-detail-sidebar'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_breadcrumb'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Breadcrumb', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
	)
	,array(
		'id'       	=> 'ts_prod_thumbnail_summary_layout'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Thumbnail Summary Layout', 'upstore' )
		,'subtitle' => esc_html__( 'The Fullwidth and Top Thumbnail Slider layouts do not support sidebar', 'upstore' )
		,'desc'     => ''
		,'options'  => array(
			'default'		=> esc_html__( 'Default', 'upstore' )
			,'fullwidth'	=> esc_html__( 'Fullwidth', 'upstore' )
			,'scrolling'	=> esc_html__( 'Scrolling', 'upstore' )
			,'top_thumbnail_slider'	=> esc_html__( 'Top Thumbnail Slider', 'upstore' )
		)
		,'default'  => 'default'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_cloudzoom'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Cloud Zoom', 'upstore' )
		,'subtitle' => esc_html__( 'If you turn it off, product gallery images will open in a lightbox', 'upstore' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_attr_dropdown'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Attribute Dropdown', 'upstore' )
		,'subtitle' => esc_html__( 'If you turn it off, the dropdown will be replaced by image or text label', 'upstore' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_next_prev_navigation'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Next/Prev Product Navigation', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_thumbnail'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Thumbnail', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_thumbnail_border'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Thumbnail Border', 'upstore' )
		,'subtitle' => esc_html__( 'Add border to main thumbnail and gallery', 'upstore' )
		,'default'  => false
		,'required'	=> array( array( 'ts_prod_thumbnail', 'equals', '1' ), array( 'ts_prod_thumbnail_summary_layout', '!=', 'top_thumbnail_slider' ) )
	)
	,array(
		'id'        => 'ts_prod_label'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Label', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_title'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Title', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_title_in_content'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Title In Content', 'upstore' )
		,'subtitle' => esc_html__( 'Display the product title in the page content instead of above the breadcrumbs', 'upstore' )
		,'default'  => true
	)
	,array(
		'id'        => 'ts_prod_rating'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Rating', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_sku'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product SKU', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_availability'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Availability', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_excerpt'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Excerpt', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_count_down'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Count Down', 'upstore' )
		,'subtitle' => esc_html__( 'You have to activate ThemeSky plugin', 'upstore' )
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_price'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Price', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_add_to_cart'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Add To Cart Button', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_email_button'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Email Button', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_brand'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Brands', 'upstore' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_cat'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Categories', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_tag'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Tags', 'upstore' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_sharing'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Sharing', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_sharing_sharethis'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Sharing - Use ShareThis', 'upstore' )
		,'subtitle' => esc_html__( 'Use share buttons from sharethis.com. You need to add key below', 'upstore')
		,'default'  => false
		,'required'	=> array( 'ts_prod_sharing', 'equals', '1' )
	)
	,array(
		'id'        => 'ts_prod_sharing_sharethis_key'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Sharing - ShareThis Key', 'upstore' )
		,'subtitle' => esc_html__( 'You get it from script code. It is the value of "property" attribute', 'upstore' )
		,'desc'     => ''
		,'default'  => ''
		,'required'	=> array( 'ts_prod_sharing', 'equals', '1' )
	)
	
	,array(
		'id'        => 'section-product-thumbnails'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Thumbnails', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'       	=> 'ts_prod_thumbnails_style'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Thumbnails Style', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'vertical'		=> esc_html__( 'Vertical', 'upstore' )
			,'horizontal'	=> esc_html__( 'Horizontal', 'upstore' )
		)
		,'default'  => 'vertical'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	
	,array(
		'id'        => 'section-product-tabs'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Product Tabs', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_tabs'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Tabs', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_accordion_tabs'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Tabs As Accordion', 'upstore' )
		,'subtitle' => ''
		,'default'  => false
	)
	,array(
		'id'       	=> 'ts_prod_tabs_position'
		,'type'     => 'select'
		,'title'    => esc_html__( 'Product Tabs Position', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'options'  => array(
			'after_summary'		=> esc_html__( 'After Summary', 'upstore' )
			,'inside_summary'	=> esc_html__( 'Inside Summary', 'upstore' )
		)
		,'default'  => 'after_summary'
		,'select2'	=> array('allowClear' => false, 'minimumResultsForSearch' => 'Infinity')
	)
	,array(
		'id'        => 'ts_prod_custom_tab'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Product Custom Tab', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_custom_tab_title'
		,'type'     => 'text'
		,'title'    => esc_html__( 'Product Custom Tab Title', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => 'Custom tab'
	)
	,array(
		'id'        => 'ts_prod_custom_tab_content'
		,'type'     => 'editor'
		,'title'    => esc_html__( 'Product Custom Tab Content', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => esc_html__( 'Your custom content goes here. You can add the content for individual product', 'upstore' )
		,'args'     => array(
			'wpautop'        => false
			,'media_buttons' => false
			,'textarea_rows' => 5
			,'teeny'         => false
			,'quicktags'     => false
		)
	)
	
	,array(
		'id'        => 'section-ads-banner'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Ads Banner', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_ads_banner'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Ads Banner', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_ads_banner_content'
		,'type'     => 'editor'
		,'title'    => esc_html__( 'Ads Banner Content', 'upstore' )
		,'subtitle' => ''
		,'desc'     => ''
		,'default'  => ''
		,'args'     => array(
			'wpautop'        => false
			,'media_buttons' => false
			,'textarea_rows' => 5
			,'teeny'         => false
			,'quicktags'     => false
		)
	)
	
	,array(
		'id'        => 'section-related-up-sell-products'
		,'type'     => 'section'
		,'title'    => esc_html__( 'Related - Up-Sell Products', 'upstore' )
		,'subtitle' => ''
		,'indent'   => false
	)
	,array(
		'id'        => 'ts_prod_upsells'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Up-Sell Products', 'upstore' )
		,'subtitle' => ''
		,'default'  => true
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
	,array(
		'id'        => 'ts_prod_related'
		,'type'     => 'switch'
		,'title'    => esc_html__( 'Related Products', 'upstore' )
		,'subtitle' => ''
		,'default'  => false
		,'on'		=> esc_html__( 'Show', 'upstore' )
		,'off'		=> esc_html__( 'Hide', 'upstore' )
	)
);

/*** Custom Code Tab ***/
$option_fields['custom-code'] = array(
	array(
		'id'        => 'ts_custom_css_code'
		,'type'     => 'ace_editor'
		,'title'    => esc_html__( 'Custom CSS Code', 'upstore' )
		,'subtitle' => ''
		,'mode'     => 'css'
		,'theme'    => 'monokai'
		,'desc'     => ''
		,'default'  => ''
	)
	,array(
		'id'        => 'ts_custom_javascript_code'
		,'type'     => 'ace_editor'
		,'title'    => esc_html__( 'Custom Javascript Code', 'upstore' )
		,'subtitle' => ''
		,'mode'     => 'javascript'
		,'theme'    => 'monokai'
		,'desc'     => ''
		,'default'  => ''
	)
);