<?php 
add_action( 'vc_before_init', 'upstore_integrate_with_vc' );
function upstore_integrate_with_vc() {
	
	if( !function_exists('vc_map') ){
		return;
	}

	/********************** Content Shortcodes ***************************/
	/*** TS Image Box ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Image Box', 'upstore' ),
		'base' 		=> 'ts_image_box',
		'class' 	=> '',
		'icon' 		=> 'ts_icon_vc',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'upstore' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Vertical', 'upstore')		=>  'vertical-style'
							,esc_html__('Horizontal', 'upstore')	=>  'horizontal-style'
							,esc_html__('Background', 'upstore')	=>  'background-style'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'attach_image'
				,'heading' 		=> esc_html__( 'Image', 'upstore' )
				,'param_name' 	=> 'img_id'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Image Size', 'upstore' )
				,'param_name' 	=> 'img_size'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> esc_html__( 'Ex: thumbnail, medium, large or full', 'upstore' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Image URL', 'upstore' )
				,'param_name' 	=> 'img_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> esc_html__('Input external URL instead of image from library', 'upstore')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Title', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Title Color', 'upstore' )
				,'param_name' 	=> 'title_color'
				,'admin_label' 	=> false
				,'value' 		=> '#27af7d'
				,'description' 	=> ''
				,'dependency' => array('element' => 'style', 'value' => array('horizontal-style'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Description', 'upstore' )
				,'param_name' 	=> 'excerpt'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Button text', 'upstore' )
				,'param_name' 	=> 'button_text'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link', 'upstore' )
				,'param_name' 	=> 'link'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Target', 'upstore' )
				,'param_name' 	=> 'target'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('New Window Tab', 'upstore')	=>  '_blank'
						,esc_html__('Self', 'upstore')			=>  '_self'	
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Effect Color', 'upstore' )
				,'param_name' 	=> 'effect_color'
				,'admin_label' 	=> false
				,'value' 		=> '#000000'
				,'description' 	=> ''
			)
		)
	) );
	/*** TS Features ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Feature', 'upstore' ),
		'base' 		=> 'ts_feature',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'upstore' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Horizontal Icon', 'upstore')			=>  'horizontal-icon'
						,esc_html__('Horizontal Icon Square', 'upstore')	=>  'horizontal-icon-square'
						,esc_html__('Horizontal Icon Circle', 'upstore')	=>  'horizontal-icon-circle'
						,esc_html__('Horizontal Icon Small', 'upstore')		=>  'horizontal-icon-small'
						,esc_html__('Horizontal Box Border', 'upstore')		=>  'horizontal-box-border'
						,esc_html__('Horizontal Box Border 2', 'upstore')	=>  'horizontal-box-border2'
						,esc_html__('Horizontal Icon Image', 'upstore')		=>  'horizontal-icon-image'
						,esc_html__('Vertical Icon Square', 'upstore')		=>  'vertical-icon-square'
						,esc_html__('Vertical Icon Circle', 'upstore')		=>  'vertical-icon-circle'
						,esc_html__('Vertical Icon Circle 2', 'upstore')	=>  'vertical-icon-circle2'
						,esc_html__('Vertical Icon Image', 'upstore')		=>  'vertical-icon-image'
						,esc_html__('Vertical Text', 'upstore')				=>  'vertical-text'
						,esc_html__('Vertical Number', 'upstore')			=>  'vertical-number'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Number Text', 'upstore' )
				,'param_name' 	=> 'number_text'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> esc_html__('01, 02, 03,..', 'upstore')
				,'dependency' => array('element' => 'style', 'value' => array('vertical-number'))
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Icon library', 'upstore' )
				,'param_name' 	=> 'icon_type'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Font Awesome', 'upstore')	=>  'fontawesome'
						,esc_html__('Material', 'upstore')		=>  'material'
						)
				,'description' 	=> ''
				,'dependency' => array('element' => 'style', 'value' => array('horizontal-icon', 'horizontal-icon-square', 'horizontal-icon-circle', 'horizontal-icon-small', 'horizontal-box-border', 'horizontal-box-border2', 'vertical-icon-square', 'vertical-icon-circle', 'vertical-icon-circle2'))
			)
			,array(
				'type' 			=> 'iconpicker'
				,'heading' 		=> esc_html__( 'Icon', 'upstore' )
				,'param_name' 	=> 'icon_fontawesome'
				,'admin_label' 	=> false
				,'value' 		=> 'fa fa-laptop'
				,'settings' 	=> array(
					'emptyIcon' 	=> true
					,'iconsPerPage' => 4000
				)
				,'dependency' => array('element' => 'icon_type', 'value' => 'fontawesome')
			)
			,array(
				'type' 			=> 'iconpicker'
				,'heading' 		=> esc_html__( 'Icon', 'upstore' )
				,'param_name' 	=> 'icon_material'
				,'admin_label' 	=> false
				,'value' 		=> 'vc-material vc-material-autorenew'
				,'settings' 	=> array(
					'emptyIcon' 	=> true
					,'type' 		=> 'material'
					,'iconsPerPage' => 4000
				)
				,'dependency' => array('element' => 'icon_type', 'value' => 'material')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Position Thumbnail Icon', 'upstore' )
				,'param_name' 	=> 'position_thumbnail'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Left', 'upstore')		=>  'thumbnail-left'
						,esc_html__('Right', 'upstore')		=>  'thumbnail-right'
						)
				,'description' 	=> ''
				,'dependency' => array('element' => 'style', 'value' => array('horizontal-icon-image'))
			)
			,array(
				'type' 			=> 'attach_image'
				,'heading' 		=> esc_html__( 'Image', 'upstore' )
				,'param_name' 	=> 'img_id'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
				,'dependency' => array('element' => 'style', 'value' => array('vertical-icon-image','horizontal-icon-image'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Image URL', 'upstore' )
				,'param_name' 	=> 'img_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> esc_html__('Input external URL instead of image from library', 'upstore')
				,'dependency' => array('element' => 'style', 'value' => array('vertical-icon-image','horizontal-icon-image'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Feature title', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Title Color', 'upstore' )
				,'param_name' 	=> 'title_color'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')					=> ''
							,esc_html__('Primary Color', 'upstore')				=> 'title-primary-color'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textarea'
				,'heading' 		=> esc_html__( 'Short description', 'upstore' )
				,'param_name' 	=> 'excerpt'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'style', 'value' => array('horizontal-icon', 'horizontal-icon-square', 'horizontal-icon-circle', 'horizontal-box-border', 'horizontal-box-border2', 'vertical-icon-square', 'vertical-icon-circle','vertical-icon-circle2', 'vertical-icon-image', 'horizontal-icon-image', 'vertical-text', 'vertical-number'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Button text', 'upstore' )
				,'param_name' 	=> 'button_text'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'style', 'value' => array('vertical-icon-square','vertical-icon-circle','vertical-icon-circle2'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link', 'upstore' )
				,'param_name' 	=> 'link'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Target', 'upstore' )
				,'param_name' 	=> 'target'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('New Window Tab', 'upstore')	=>  '_blank'
						,esc_html__('Self', 'upstore')			=>  '_self'	
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra class', 'upstore' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Price Table ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Price Table', 'upstore' ),
		'base' 		=> 'ts_price_table',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'upstore' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('style 1', 'upstore')		=> 'style-1'
							,esc_html__('style 2', 'upstore')		=> 'style-2'
							,esc_html__('style 3', 'upstore')		=> 'style-3'
							,esc_html__('style 4', 'upstore')		=> 'style-4'
							,esc_html__('style 5', 'upstore')		=> 'style-5'
							,esc_html__('style 6', 'upstore')		=> 'style-6'
							,esc_html__('style 7', 'upstore')		=> 'style-7'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'attach_image'
				,'heading' 		=> esc_html__( 'Image', 'upstore' )
				,'param_name' 	=> 'img_id'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'style', 'value' => array('style-5', 'style-6', 'style-7'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Image URL', 'upstore' )
				,'param_name' 	=> 'img_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> esc_html__('Input external URL instead of image from library', 'upstore')
				,'dependency' 	=> array('element' => 'style', 'value' => array('style-5', 'style-6', 'style-7'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Mini Title', 'upstore' )
				,'param_name' 	=> 'title2'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'style', 'value' => array('style-5'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Title Table', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Color Scheme', 'upstore' )
				,'param_name' 	=> 'color_scheme'
				,'admin_label' 	=> false
				,'value' 		=> '#27af7d'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Price', 'upstore' )
				,'param_name' 	=> 'price'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Currency', 'upstore' )
				,'param_name' 	=> 'currency'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'During Price', 'upstore' )
				,'param_name' 	=> 'during_price'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__('Ex: /day, /mon, /year', 'upstore')
			)
			,array(
				'type' 			=> 'textarea'
				,'heading' 		=> esc_html__( 'Description', 'upstore' )
				,'param_name' 	=> 'description'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Button text', 'upstore' )
				,'param_name' 	=> 'button_text'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link', 'upstore' )
				,'param_name' 	=> 'link'
				,'admin_label' 	=> false
				,'value' 		=> '#'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Active Table', 'upstore' )
				,'param_name' 	=> 'active_table'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
						)
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'style', 'value' => array('style-1', 'style-2', 'style-3', 'style-4',
				'style-6', 'style-7'))
			)
		)
	) );
	
	/*** TS Blogs ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Blogs', 'upstore' ),
		'base' 		=> 'ts_blogs',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Block title', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Title style', 'upstore' )
				,'param_name' 	=> 'title_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')				=>  ''
							,esc_html__('Border Thin', 'upstore')			=>  'title-border-thin'
							,esc_html__('Border Primary', 'upstore')		=>  'title-border-primary'
							,esc_html__('Border Primary 2', 'upstore')		=>  'title-border-primary-2'
							,esc_html__('Center', 'upstore')				=>  'title-center'
							,esc_html__('Center Border', 'upstore')			=>  'title-center-border'
							,esc_html__('Background and Border', 'upstore')	=>  'title-background-border'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Layout', 'upstore' )
				,'param_name' 	=> 'layout'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Grid', 'upstore')		=> 'grid'
							,esc_html__('Slider', 'upstore')	=> 'slider'
							,esc_html__('Masonry', 'upstore')	=> 'masonry'
							,esc_html__('Big Style', 'upstore')	=> 'big-style'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Item Layout', 'upstore' )
				,'param_name' 	=> 'item_layout'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Grid', 'upstore')			=> 'grid'
							,esc_html__('List', 'upstore')			=> 'list'
							,esc_html__('Background', 'upstore')	=> 'background'
						)
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'layout', 'value' => array('grid', 'slider', 'masonry') )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Columns', 'upstore' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> true
				,'value' 		=> array(
							'1'				=> '1'
							,'2'			=> '2'
							,'3'			=> '3'
							,'4'			=> '4'
							)
				,'description' 	=> esc_html__( 'Number of Columns', 'upstore' )
				,'std'			=> '3'
				,'dependency'	=> array( 'element' => 'layout', 'value' => array('grid', 'slider', 'masonry') )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'upstore' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 5
				,'description' 	=> esc_html__( 'Number of Posts', 'upstore' )
				,'dependency'	=> array( 'element' => 'layout', 'value' => array('grid', 'slider', 'masonry') )
			)
			,array(
				'type' 			=> 'ts_category'
				,'heading' 		=> esc_html__( 'Categories', 'upstore' )
				,'param_name' 	=> 'categories'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
				,'class'		=> 'post_cat'
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Order by', 'upstore' )
				,'param_name' 	=> 'orderby'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('None', 'upstore')		=> 'none'
						,esc_html__('ID', 'upstore')		=> 'ID'
						,esc_html__('Date', 'upstore')		=> 'date'
						,esc_html__('Name', 'upstore')		=> 'name'
						,esc_html__('Title', 'upstore')		=> 'title'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Order', 'upstore' )
				,'param_name' 	=> 'order'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Descending', 'upstore')	=> 'DESC'
						,esc_html__('Ascending', 'upstore')	=> 'ASC'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show post title', 'upstore' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show thumbnail', 'upstore' )
				,'param_name' 	=> 'show_thumbnail'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show author', 'upstore' )
				,'param_name' 	=> 'show_author'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show comment', 'upstore' )
				,'param_name' 	=> 'show_comment'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show date', 'upstore' )
				,'param_name' 	=> 'show_date'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show post excerpt', 'upstore' )
				,'param_name' 	=> 'show_excerpt'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> esc_html__( 'Post excerpt is disabled if Item Layout is Background', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show read more button', 'upstore' )
				,'param_name' 	=> 'show_readmore'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Number of words in excerpt', 'upstore' )
				,'param_name' 	=> 'excerpt_words'
				,'admin_label' 	=> false
				,'value' 		=> 18
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show load more button', 'upstore' )
				,'param_name' 	=> 'show_load_more'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')	=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'layout', 'value' => array('grid', 'masonry') )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Load more button text', 'upstore' )
				,'param_name' 	=> 'load_more_text'
				,'admin_label' 	=> false
				,'value' 		=> 'Show more'
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'layout', 'value' => array('grid', 'masonry') )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'upstore' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Navigation position', 'upstore' )
				,'param_name' 	=> 'nav_position'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Top', 'upstore')		=> 'nav-top'
							,esc_html__('Middle', 'upstore')	=> 'nav-middle'
						)
				,'description' 	=> esc_html__('Top Navigation is only available when Block Title is not empty', 'upstore')
				,'dependency'	=> array( 'element' => 'show_nav', 'value' => array('1') )
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'upstore' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Margin', 'upstore' )
				,'param_name' 	=> 'margin'
				,'admin_label' 	=> false
				,'value' 		=> 30
				,'description' 	=> esc_html__('Set margin between items', 'upstore')
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
		)
	) );

	/*** TS Button ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Button', 'upstore' ),
		'base' 		=> 'ts_button',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Text', 'upstore' )
				,'param_name' 	=> 'content'
				,'admin_label' 	=> true
				,'value' 		=> 'Button text'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link', 'upstore' )
				,'param_name' 	=> 'link'
				,'admin_label' 	=> true
				,'value' 		=> '#'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Text color', 'upstore' )
				,'param_name' 	=> 'text_color'
				,'admin_label' 	=> false
				,'value' 		=> '#000000'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Text color hover', 'upstore' )
				,'param_name' 	=> 'text_color_hover'
				,'admin_label' 	=> false
				,'value' 		=> '#ffffff'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Background color', 'upstore' )
				,'param_name' 	=> 'bg_color'
				,'admin_label' 	=> false
				,'value' 		=> '#ffffff'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Background color hover', 'upstore' )
				,'param_name' 	=> 'bg_color_hover'
				,'admin_label' 	=> false
				,'value' 		=> '#000000'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Border color', 'upstore' )
				,'param_name' 	=> 'border_color'
				,'admin_label' 	=> false
				,'value' 		=> '#cccccc'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Border color hover', 'upstore' )
				,'param_name' 	=> 'border_color_hover'
				,'admin_label' 	=> false
				,'value' 		=> '#000000'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Border width', 'upstore' )
				,'param_name' 	=> 'border_width'
				,'admin_label' 	=> false
				,'value' 		=> '0'
				,'description' 	=> esc_html__('In pixels. Ex: 1', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Target', 'upstore' )
				,'param_name' 	=> 'target'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Self', 'upstore')				=> '_self'
						,esc_html__('New Window Tab', 'upstore')	=> '_blank'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Size', 'upstore' )
				,'param_name' 	=> 'size'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Small', 'upstore')		=> 'small'
						,esc_html__('Medium', 'upstore')	=> 'medium'
						,esc_html__('Large', 'upstore')		=> 'large'
						,esc_html__('X-Large', 'upstore')	=> 'x-large'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'upstore' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Square', 'upstore')		=> 'square'
						,esc_html__('Round', 'upstore')		=> 'round'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'iconpicker'
				,'heading' 		=> esc_html__( 'Font icon', 'upstore' )
				,'param_name' 	=> 'font_icon'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'settings' 	=> array(
					'emptyIcon' 	=> true /* default true, display an "EMPTY" icon? */
					,'iconsPerPage' => 4000 /* default 100, how many icons per/page to display */
				)
				,'description' 	=> esc_html__('Add an icon before the text. Ex: fa-lock', 'upstore')
			)
		)
	) );
	
	/*** TS Single Image ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Single Image', 'upstore' ),
		'base' 		=> 'ts_single_image',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'attach_image'
				,'heading' 		=> esc_html__( 'Image', 'upstore' )
				,'param_name' 	=> 'img_id'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Image Size', 'upstore' )
				,'param_name' 	=> 'img_size'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__( 'Ex: thumbnail, medium, large or full', 'upstore' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Image URL', 'upstore' )
				,'param_name' 	=> 'img_url'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__('Input external URL instead of image from library', 'upstore')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link', 'upstore' )
				,'param_name' 	=> 'link'
				,'admin_label' 	=> true
				,'value' 		=> '#'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link Title', 'upstore' )
				,'param_name' 	=> 'link_title'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Hover Effect', 'upstore' )
				,'param_name' 	=> 'style_effect'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Widespread Left Right', 'upstore')		=> 'eff-widespread-corner-left-right'
						,esc_html__('Border', 'upstore')					=> 'eff-border'
						,esc_html__('Image Scale', 'upstore')				=> 'eff-image-scale'
						,esc_html__('Image Gray', 'upstore')				=> 'eff-image-gray'
						,esc_html__('Translate Left', 'upstore')			=> 'eff-image-translate-left'
						,esc_html__('Translate Right', 'upstore')			=> 'eff-image-translate-right'
						,esc_html__('None', 'upstore')						=> 'no-eff'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Effect Color', 'upstore' )
				,'param_name' 	=> 'effect_color'
				,'admin_label' 	=> false
				,'value' 		=> '#000000'
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'style_effect', 'value' => array('eff-widespread-corner-left-right', 'eff-border'))
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Target', 'upstore' )
				,'param_name' 	=> 'target'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('New Window Tab', 'upstore')	=> '_blank'
						,esc_html__('Self', 'upstore')			=> '_self'
						)
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Quote ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Quote', 'upstore' ),
		'base' 		=> 'ts_quote',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'upstore' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> true
				,'value' 		=> array(
						'default'			=> 'default'
						,'style 2'			=> 'style-2'
						,'style 3'			=> 'style-3'
						,'style 4'			=> 'style-4'
						,'style 5'			=> 'style-5'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Author', 'upstore' )
				,'param_name' 	=> 'author'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Role', 'upstore' )
				,'param_name' 	=> 'role'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textarea'
				,'heading' 		=> esc_html__( 'Text Content', 'upstore' )
				,'param_name' 	=> 'content'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Heading ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Heading', 'upstore' ),
		'base' 		=> 'ts_heading',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Heading Size', 'upstore' )
				,'param_name' 	=> 'size'
				,'admin_label' 	=> true
				,'value' 		=> array(
						'1'				=> '1'
						,'2'			=> '2'
						,'3'			=> '3'
						,'4'			=> '4'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Heading Style', 'upstore' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Default', 'upstore')				=>  ''
							,esc_html__('Border Thin', 'upstore')			=>  'style-border-thin'
							,esc_html__('Border Primary', 'upstore')		=>  'style-border-primary'
							,esc_html__('Border Primary 2', 'upstore')		=>  'style-border-primary-2'
							,esc_html__('Center', 'upstore')				=>  'style-center'
							,esc_html__('Center Border', 'upstore')			=>  'style-center-border'
							,esc_html__('Background', 'upstore')			=>  'style-background'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Background Color', 'upstore' )
				,'param_name' 	=> 'background_color'
				,'admin_label' 	=> false
				,'value' 		=> '#181818'
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'style', 'value' => array('style-background'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Text', 'upstore' )
				,'param_name' 	=> 'text'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Text Style', 'upstore' )
				,'param_name' 	=> 'text_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')		=> 'text-default'
							,esc_html__('Light', 'upstore')			=> 'text-light'
						)
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Banner ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Banner', 'upstore' ),
		'base' 		=> 'ts_banner',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Banner Style', 'upstore' )
				,'param_name' 	=> 'banner_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Style 1', 'upstore')		=> 	'style-1'
							,esc_html__('Style 2', 'upstore')		=>  'style-2'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'attach_image'
				,'heading' 		=> esc_html__( 'Background Image', 'upstore' )
				,'param_name' 	=> 'bg_id'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Background Url', 'upstore' )
				,'param_name' 	=> 'bg_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> esc_html__('Input external URL instead of image from library', 'upstore')
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Background Color', 'upstore' )
				,'param_name' 	=> 'bg_color'
				,'admin_label' 	=> false
				,'value' 		=> '#000000'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Heading Text', 'upstore' )
				,'param_name' 	=> 'heading_title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Text Color', 'upstore' )
				,'param_name' 	=> 'heading_text_color'
				,'admin_label' 	=> false
				,'value' 		=> '#1f1f1f'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Description', 'upstore' )
				,'param_name' 	=> 'description'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Description Text Color', 'upstore' )
				,'param_name' 	=> 'description_text_color'
				,'admin_label' 	=> false
				,'value' 		=> '#8b8b8b'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Text Align', 'upstore' )
				,'param_name' 	=> 'text_align'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Left', 'upstore')		=> 	'text-left'
							,esc_html__('Center', 'upstore')	=>  'text-center'
							,esc_html__('Right', 'upstore')		=> 	'text-right'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show Button', 'upstore' )
				,'param_name' 	=> 'show_button'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=>  0
							,esc_html__('Yes', 'upstore')	=>  1
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Button Text', 'upstore' )
				,'param_name' 	=> 'button_text'
				,'admin_label' 	=> false
				,'value' 		=> 'Shop Now'
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'show_button', 'value' => array('1') )
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Button Text Color', 'upstore' )
				,'param_name' 	=> 'button_text_color'
				,'admin_label' 	=> false
				,'value' 		=> '#ffffff'
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'show_button', 'value' => array('1') )
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Button Background Color', 'upstore' )
				,'param_name' 	=> 'button_background'
				,'admin_label' 	=> false
				,'value' 		=> '#1f1f1f'
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'show_button', 'value' => array('1') )
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Button Text Color Hover', 'upstore' )
				,'param_name' 	=> 'button_text_color_hover'
				,'admin_label' 	=> false
				,'value' 		=> '#ffffff'
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'show_button', 'value' => array('1') )
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Button Background Color Hover', 'upstore' )
				,'param_name' 	=> 'button_background_hover'
				,'admin_label' 	=> false
				,'value' 		=> '#27af7d'
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'show_button', 'value' => array('1') )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Banner Content Position', 'upstore' )
				,'param_name' 	=> 'position_content'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Left Top', 'upstore')		=>  'left-top'
						,esc_html__('Left Bottom', 'upstore')	=>  'left-bottom'
						,esc_html__('Left Center', 'upstore')	=>  'left-center'
						,esc_html__('Right Top', 'upstore')		=>  'right-top'
						,esc_html__('Right Bottom', 'upstore')	=>  'right-bottom'
						,esc_html__('Right Center', 'upstore')	=>  'right-center'
						,esc_html__('Center Top', 'upstore')	=>  'center-top'
						,esc_html__('Center Bottom', 'upstore')	=>  'center-bottom'
						,esc_html__('Center Center', 'upstore')	=>  'center-center'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link', 'upstore' )
				,'param_name' 	=> 'link'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Target', 'upstore' )
				,'param_name' 	=> 'target'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('New Window Tab', 'upstore')	=>  '_blank'
							,esc_html__('Self', 'upstore')			=>  '_self'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link Title', 'upstore' )
				,'param_name' 	=> 'link_title'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style Effect', 'upstore' )
				,'param_name' 	=> 'style_effect'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Background Scale', 'upstore')					=>  'background-scale'
						,esc_html__('Background Scale Opacity', 'upstore')			=>  'background-scale-opacity'
						,esc_html__('Background Scale Dark', 'upstore')				=>	'background-scale-dark'
						,esc_html__('Background Scale and Line', 'upstore')			=>  'background-scale-and-line'
						,esc_html__('Background Scale Opacity and Line', 'upstore')	=>  'background-scale-opacity-line'
						,esc_html__('Background Scale Dark and Line', 'upstore')	=>  'background-scale-dark-line'
						,esc_html__('Background Opacity and Line', 'upstore')		=>	'background-opacity-and-line'
						,esc_html__('Background Dark and Line', 'upstore')			=>	'background-dark-and-line'
						,esc_html__('Background Opacity', 'upstore')				=>	'background-opacity'
						,esc_html__('Background Dark', 'upstore')					=>	'background-dark'
						,esc_html__('Line', 'upstore')								=>	'eff-line'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Extra Class', 'upstore' )
				,'param_name' 	=> 'extra_class'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Banner 2 ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Banner 2', 'upstore' ),
		'base' 		=> 'ts_banner_image',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'attach_image'
				,'heading' 		=> esc_html__( 'Background Image', 'upstore' )
				,'param_name' 	=> 'img_bg_id'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Background Image URL', 'upstore' )
				,'param_name' 	=> 'img_bg_url'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__('Input external URL instead of image from library', 'upstore')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Background Image Size', 'upstore' )
				,'param_name' 	=> 'img_size'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__( 'Ex: thumbnail, medium, large or full', 'upstore' )
			)
			,array(
				'type' 			=> 'attach_image'
				,'heading' 		=> esc_html__( 'Image Text', 'upstore' )
				,'param_name' 	=> 'img_text_id'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__('Display this image before, after or over the main image', 'upstore')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Image Text URL', 'upstore' )
				,'param_name' 	=> 'img_text_url'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__('Input external URL instead of image from library', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Has Padding', 'upstore' )
				,'param_name' 	=> 'has_padding'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Yes', 'upstore')		=> 1
						,esc_html__('No', 'upstore')		=> 0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Image Text Position', 'upstore' )
				,'param_name' 	=> 'position_img_text'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Left Top', 'upstore')		=>  'left-top'
						,esc_html__('Left Bottom', 'upstore')	=>  'left-bottom'
						,esc_html__('Left Center', 'upstore')	=>  'left-center'
						,esc_html__('Right Top', 'upstore')		=>  'right-top'
						,esc_html__('Right Bottom', 'upstore')	=>  'right-bottom'
						,esc_html__('Right Center', 'upstore')	=>  'right-center'
						,esc_html__('Center Top', 'upstore')	=>  'center-top'
						,esc_html__('Center Bottom', 'upstore')	=>  'center-bottom'
						,esc_html__('Center Center', 'upstore')	=>  'center-center'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link', 'upstore' )
				,'param_name' 	=> 'link'
				,'admin_label' 	=> true
				,'value' 		=> '#'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Link Title', 'upstore' )
				,'param_name' 	=> 'link_title'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Hover Effect', 'upstore' )
				,'param_name' 	=> 'style_effect'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Scale', 'upstore')					=> 'eff-scale'
						,esc_html__('Opacity', 'upstore')				=> 'eff-opacity'
						,esc_html__('Border', 'upstore')				=> 'eff-border'
						,esc_html__('Image Gray', 'upstore')			=> 'eff-image-gray'
						,esc_html__('Translate Left', 'upstore')		=> 'eff-image-translate-left'
						,esc_html__('Translate Right', 'upstore')		=> 'eff-image-translate-right'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Effect Color', 'upstore' )
				,'param_name' 	=> 'effect_color'
				,'admin_label' 	=> false
				,'value' 		=> '#000000'
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'style_effect', 'value' => array('eff-opacity', 'eff-border'))
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show Button', 'upstore' )
				,'param_name' 	=> 'show_button'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('No', 'upstore')		=> 0
						,esc_html__('Yes', 'upstore')	=> 1
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Button text', 'upstore' )
				,'param_name' 	=> 'button_text'
				,'admin_label' 	=> true
				,'value' 		=> 'View Shop Now'
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'show_button', 'value' => array('1') )
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Button Text Color', 'upstore' )
				,'param_name' 	=> 'button_text_color'
				,'admin_label' 	=> false
				,'value' 		=> '#ffffff'
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'show_button', 'value' => array('1') )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Target', 'upstore' )
				,'param_name' 	=> 'target'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('New Window Tab', 'upstore')	=> '_blank'
						,esc_html__('Self', 'upstore')			=> '_self'
						)
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Team Members ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Team Members', 'upstore' ),
		'base' 		=> 'ts_team_members',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'upstore' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Style 1', 'upstore')			=> 'style-1'
						,esc_html__('Style 2', 'upstore')			=> 'style-2'
						,esc_html__('Style 3', 'upstore')			=> 'style-3'
						,esc_html__('Style 4', 'upstore')			=> 'style-4'
						,esc_html__('Style 5', 'upstore')			=> 'style-5'
						,esc_html__('Style 6', 'upstore')			=> 'style-6'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'upstore' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'upstore')	=>  0
							,esc_html__('Yes', 'upstore')	=>  1
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Number of members', 'upstore' )
				,'param_name' 	=> 'limit'
				,'admin_label' 	=> true
				,'value' 		=> 6
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Include these members', 'upstore' )
				,'param_name' 	=> 'ids'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> false
					,'unique_values' 	=> true
				)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Columns', 'upstore' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> true
				,'value' 		=> array(
							'1'				=> '1'
							,'2'			=> '2'
							,'3'			=> '3'
							,'4'			=> '4'
							,'5'			=> '5'
							,'6'			=> '6'
							)
				,'description' 	=> esc_html__( 'Number of Columns. 5 columns is not available on the Grid layout', 'upstore' )
				,'std'			=> '3'
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Number of words in excerpt', 'upstore' )
				,'param_name' 	=> 'excerpt_words'
				,'admin_label' 	=> false
				,'value' 		=> '26'
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'style', 'value' => array('style-3') )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Target', 'upstore' )
				,'param_name' 	=> 'target'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('New Window Tab', 'upstore')	=> '_blank'
						,esc_html__('Self', 'upstore')			=> '_self'	
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'upstore' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'upstore' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Margin', 'upstore' )
				,'param_name' 	=> 'margin'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> esc_html__('Set margin between items is 30px', 'upstore')
				,'dependency'	=> array( 'element' => 'layout', 'value' => array('slider') )
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
		)
	) );
	
	/*** TS Testimonial ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Testimonial', 'upstore' ),
		'base' 		=> 'ts_testimonial',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Block title', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Title style', 'upstore' )
				,'param_name' 	=> 'title_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')				=>  ''
							,esc_html__('Border Thin', 'upstore')			=>  'title-border-thin'
							,esc_html__('Border Primary', 'upstore')		=>  'title-border-primary'
							,esc_html__('Border Primary 2', 'upstore')		=>  'title-border-primary-2'
							,esc_html__('Center', 'upstore')				=>  'title-center'
							,esc_html__('Center Border', 'upstore')			=>  'title-center-border'
							,esc_html__('Background and Border', 'upstore')	=>  'title-background-border'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'upstore' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Style 1', 'upstore')		=> 'style-1'
							,esc_html__('Style 2', 'upstore')		=> 'style-2'
							,esc_html__('Style 3', 'upstore')		=> 'style-3'
							,esc_html__('Style 4', 'upstore')		=> 'style-4'
							,esc_html__('Style 5', 'upstore')		=> 'style-5'
							,esc_html__('Style Quote', 'upstore')		=> 'style-6'
							,esc_html__('Style Quote 2', 'upstore')		=> 'style-7'
							,esc_html__('Style Quote 3', 'upstore')		=> 'style-8'
							,esc_html__('Style Quote 4', 'upstore')		=> 'style-9'
							,esc_html__('Style Quote 5', 'upstore')		=> 'style-10'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'ts_category'
				,'heading' 		=> esc_html__( 'Categories', 'upstore' )
				,'param_name' 	=> 'categories'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
				,'class'		=> 'ts_testimonial'
			)
			,array(
				'type' 			=> 'textarea'
				,'heading' 		=> esc_html__( 'Testimonial IDs', 'upstore' )
				,'param_name' 	=> 'ids'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__('A comma separated list of testimonial ids', 'upstore')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'upstore' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> '4'
				,'description' 	=> esc_html__('Number of Posts', 'upstore')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Number of words in excerpt', 'upstore' )
				,'param_name' 	=> 'excerpt_words'
				,'admin_label' 	=> true
				,'value' 		=> '40'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Text Color Style', 'upstore' )
				,'param_name' 	=> 'text_color_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')	=> 'text-default'
							,esc_html__('Light', 'upstore')		=> 'text-light'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'upstore' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'upstore' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Navigation position', 'upstore' )
				,'param_name' 	=> 'nav_position'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Top', 'upstore')		=> 'nav-top'
							,esc_html__('Middle', 'upstore')	=> 'nav-middle'
						)
				,'description' 	=> esc_html__('Top Navigation is only available when Block Title is not empty', 'upstore')
				,'dependency'	=> array( 'element' => 'show_nav', 'value' => array('1') )
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show dot navigation', 'upstore' )
				,'param_name' 	=> 'show_dots'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> esc_html__('Show dot navigation at the bottom. If it is enabled, the navigation buttons will be removed', 'upstore')
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Dot navigation position', 'upstore' )
				,'param_name' 	=> 'position_dots'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Left', 'upstore')		=> 'dots-left'
							,esc_html__('Right', 'upstore')		=> 'dots-right'
						)
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'style', 'value' => array('style-2') )
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'upstore' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
		)
	) );
	
	/*** TS Portfolio ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Portfolio', 'upstore' ),
		'base' 		=> 'ts_portfolio',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'upstore' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Style 1', 'upstore')	=> 'style-1'
							,esc_html__('Style 2', 'upstore')	=> 'style-2'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Columns', 'upstore' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> true
				,'value' 		=> array(
							'2'		=> '2'
							,'3'	=> '3'
							,'4'	=> '4'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'upstore' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 8
				,'description' 	=> esc_html__('Number of Posts', 'upstore')
			)
			,array(
				'type' 			=> 'ts_category'
				,'heading' 		=> esc_html__( 'Categories', 'upstore' )
				,'param_name' 	=> 'categories'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
				,'class'		=> 'ts_portfolio'
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Order by', 'upstore' )
				,'param_name' 	=> 'orderby'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('None', 'upstore')	=> 'none'
							,esc_html__('ID', 'upstore')	=> 'ID'
							,esc_html__('Date', 'upstore')	=> 'date'
							,esc_html__('Name', 'upstore')	=> 'name'
							,esc_html__('Title', 'upstore')	=> 'title'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Order', 'upstore' )
				,'param_name' 	=> 'order'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Descending', 'upstore')	=> 'DESC'
							,esc_html__('Ascending', 'upstore')	=> 'ASC'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show portfolio title', 'upstore' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=>  1
							,esc_html__('No', 'upstore')	=>  0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show portfolio categories', 'upstore' )
				,'param_name' 	=> 'show_categories'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=>  1
							,esc_html__('No', 'upstore')	=>  0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show like icon', 'upstore' )
				,'param_name' 	=> 'show_like_icon'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=>  1
							,esc_html__('No', 'upstore')	=>  0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show filter bar', 'upstore' )
				,'param_name' 	=> 'show_filter_bar'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=>  1
							,esc_html__('No', 'upstore')	=>  0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show load more button', 'upstore' )
				,'param_name' 	=> 'show_load_more'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=>  1
							,esc_html__('No', 'upstore')	=>  0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Load more button text', 'upstore' )
				,'param_name' 	=> 'load_more_text'
				,'admin_label' 	=> false
				,'value' 		=> 'Show more'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Margin item', 'upstore' )
				,'param_name' 	=> 'margin_item'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=>  1
							,esc_html__('No', 'upstore')	=>  0
						)
				,'description' 	=> esc_html__( 'Default margin item is 30px', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'upstore' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'upstore')	=>  0
							,esc_html__('Yes', 'upstore')	=>  1
						)
				,'description' 	=> esc_html__('If slider is enabled, the filter bar and load more button will be removed', 'upstore')
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Block title', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Title style', 'upstore' )
				,'param_name' 	=> 'title_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')				=>  ''
							,esc_html__('Border Thin', 'upstore')			=>  'title-border-thin'
							,esc_html__('Border Primary', 'upstore')		=>  'title-border-primary'
							,esc_html__('Border Primary 2', 'upstore')		=>  'title-border-primary-2'
							,esc_html__('Center', 'upstore')				=>  'title-center'
							,esc_html__('Center Border', 'upstore')			=>  'title-center-border'
							,esc_html__('Background and Border', 'upstore')	=>  'title-background-border'
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Slider style', 'upstore' )
				,'param_name' 	=> 'slider_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')		=>  'default'
							,esc_html__('Center', 'upstore')		=>  'center'
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Big center item', 'upstore' )
				,'param_name' 	=> 'big_center_item'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=>  0
							,esc_html__('Yes', 'upstore')	=>  1
						)
				,'description' 	=> esc_html__('Make the center item bigger than other items', 'upstore')
				,'dependency'	=> array( 'element' => 'slider_style', 'value' => array('center') )
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'upstore' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=>  1
							,esc_html__('No', 'upstore')	=>  0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Navigation position', 'upstore' )
				,'param_name' 	=> 'nav_position'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Top', 'upstore')		=> 'nav-top'
							,esc_html__('Middle', 'upstore')	=> 'nav-middle'
						)
				,'description' 	=> esc_html__('Top Navigation is only available when Block Title is not empty', 'upstore')
				,'dependency'	=> array( 'element' => 'show_nav', 'value' => array('1') )
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show dot navigation', 'upstore' )
				,'param_name' 	=> 'show_dots'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> esc_html__('Show dot navigation at the bottom. If it is enabled, the navigation buttons will be removed', 'upstore')
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'upstore' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=>  1
							,esc_html__('No', 'upstore')	=>  0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
		)
	) );
	
	
	/*** TS Logos Slider ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Logos Slider', 'upstore' ),
		'base' 		=> 'ts_logos_slider',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'upstore' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> '7'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Rows', 'upstore' )
				,'param_name' 	=> 'rows'
				,'admin_label' 	=> true
				,'value' 		=> 1
				,'description' 	=> esc_html__( 'Number of Rows', 'upstore' )
			)
			,array(
				'type' 			=> 'ts_category'
				,'heading' 		=> esc_html__( 'Categories', 'upstore' )
				,'param_name' 	=> 'categories'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
				,'class'		=> 'ts_logo'
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Margin', 'upstore' )
				,'param_name' 	=> 'margin_image'
				,'admin_label' 	=> false
				,'value' 		=> '0'
				,'description' 	=> esc_html__('Set margin between items', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Activate link', 'upstore' )
				,'param_name' 	=> 'active_link'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'upstore' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style navigation', 'upstore' )
				,'param_name' 	=> 'style_nav'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Default', 'upstore')	=> 'text-default'
							,esc_html__('Light', 'upstore')		=> 'text-light'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'upstore' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
		)
	) );
	
	
	/*** TS Google Map ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Google Map', 'upstore' ),
		'base' 		=> 'ts_google_map',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Address', 'upstore' )
				,'param_name' 	=> 'address'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__('You have to input your API Key in Appearance > Theme Options > General tab', 'upstore')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Height', 'upstore' )
				,'param_name' 	=> 'height'
				,'admin_label' 	=> true
				,'value' 		=> 360
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Zoom', 'upstore' )
				,'param_name' 	=> 'zoom'
				,'admin_label' 	=> true
				,'value' 		=> 12
				,'description' 	=> esc_html__('Input a number between 0 and 22', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Map Type', 'upstore' )
				,'param_name' 	=> 'map_type'
				,'admin_label' 	=> true
				,'value' 		=> array(
								esc_html__('ROADMAP', 'upstore')	=> 'ROADMAP'
								,esc_html__('SATELLITE', 'upstore')	=> 'SATELLITE'
								,esc_html__('HYBRID', 'upstore')	=> 'HYBRID'
								,esc_html__('TERRAIN', 'upstore')	=> 'TERRAIN'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textarea_html'
				,'heading' 		=> esc_html__( 'Information', 'upstore' )
				,'param_name' 	=> 'content'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> esc_html__('Display some information over map', 'upstore')
			)
		)
	) );
	
	/*** TS Milestone ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Milestone', 'upstore' ),
		'base' 		=> 'ts_milestone',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'upstore' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('style 1', 'upstore')		=> 'style-1'
							,esc_html__('style 2', 'upstore')		=> 'style-2'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Number', 'upstore' )
				,'param_name' 	=> 'number'
				,'admin_label' 	=> true
				,'value' 		=> '0'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Subject', 'upstore' )
				,'param_name' 	=> 'subject'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Text Color Style', 'upstore' )
				,'param_name' 	=> 'text_color_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')	=> 'text-default'
							,esc_html__('Light', 'upstore')		=> 'text-light'
						)
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Countdown ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Countdown', 'upstore' ),
		'base' 		=> 'ts_countdown',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Day', 'upstore' )
				,'param_name' 	=> 'day'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Month', 'upstore' )
				,'param_name' 	=> 'month'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Year', 'upstore' )
				,'param_name' 	=> 'year'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Text Color Style', 'upstore' )
				,'param_name' 	=> 'text_color_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')	=> 'text-default'
							,esc_html__('Light', 'upstore')		=> 'text-light'
						)
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Social Icons ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Social Icons', 'upstore' ),
		'base' 		=> 'ts_social',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Title', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Description', 'upstore' )
				,'param_name' 	=> 'desc'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'upstore' )
				,'param_name' 	=> 'social_style'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Square', 'upstore')				=> 'style-square'
							,esc_html__('Square Fullwidth', 'upstore')	=> 'style-square-fullwidth'
							,esc_html__('Circle', 'upstore')			=> 'style-circle'
							,esc_html__('Circle Border', 'upstore')		=> 'style-circle-border'
							,esc_html__('Opacity Circle', 'upstore')	=> 'style-opacity-circle'
							,esc_html__('Circle White', 'upstore')		=> 'style-circle-white'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Facebook URL', 'upstore' )
				,'param_name' 	=> 'facebook_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Twitter URL', 'upstore' )
				,'param_name' 	=> 'twitter_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Flickr URL', 'upstore' )
				,'param_name' 	=> 'flickr_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Vimeo URL', 'upstore' )
				,'param_name' 	=> 'vimeo_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Feedburner URL', 'upstore' )
				,'param_name' 	=> 'feedburner_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Youtube URL', 'upstore' )
				,'param_name' 	=> 'youtube_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Viber Number', 'upstore' )
				,'param_name' 	=> 'viber_number'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Skype Username', 'upstore' )
				,'param_name' 	=> 'skype_username'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Instagram URL', 'upstore' )
				,'param_name' 	=> 'instagram_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Pinterest URL', 'upstore' )
				,'param_name' 	=> 'pinterest_url'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Custom Link', 'upstore' )
				,'param_name' 	=> 'custom_link'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Custom Text', 'upstore' )
				,'param_name' 	=> 'custom_text'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'iconpicker'
				,'heading' 		=> esc_html__( 'Custom Icon', 'upstore' )
				,'param_name' 	=> 'custom_font'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'settings' 	=> array(
					'emptyIcon' 	=> true
					,'iconsPerPage' => 4000
				)
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show Tooltip', 'upstore' )
				,'param_name' 	=> 'show_tooltip'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')		=> 1
							,esc_html__('No', 'upstore')		=> 0
						)
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Mailchimp Subscription ***/
	$mc_forms = upstore_get_mailchimp_forms();
	$mc_form_option = array('' => '');
	foreach( $mc_forms as $mc_form ){
		$mc_form_option[$mc_form['title']] = $mc_form['id'];
	}
	vc_map( array(
		'name' 		=> esc_html__( 'TS Mailchimp Subscription', 'upstore' ),
		'base' 		=> 'ts_mailchimp_subscription',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'upstore' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Vertical', 'upstore')		=> 'style-vertical'
							,esc_html__('Horizontal', 'upstore')	=> 'style-horizontal'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Horizontal Style', 'upstore' )
				,'param_name' 	=> 'horizontal_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')			=> 'horizontal-background'
							,esc_html__('Background Image', 'upstore')		=> 'horizontal-border-image'
						)
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'style', 'value' => array('style-horizontal') )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Vertical Style', 'upstore' )
				,'param_name' 	=> 'vertical_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')						=> 'vertical-default'
							,esc_html__('Button Text', 'upstore')					=> 'vertical-button-text'
							,esc_html__('Button Icon', 'upstore')					=> 'vertical-button-icon'
							,esc_html__('Border and Button Icon', 'upstore')		=> 'vertical-border-button-icon'
							,esc_html__('Border Round Button Icon', 'upstore')		=> 'vertical-border-round-button-icon'
							,esc_html__('Border Round Button Icon 2', 'upstore')	=> 'vertical-border-round-button-icon-2'
						)
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'style', 'value' => array('style-vertical') )
			)
			,array(
				'type' 			=> 'attach_image'
				,'heading' 		=> esc_html__( 'Background Image', 'upstore' )
				,'param_name' 	=> 'img_border_id'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'horizontal_style', 'value' => array('horizontal-border-image') )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Background Image URL', 'upstore' )
				,'param_name' 	=> 'img_border_url'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__('Input external URL instead of image from library', 'upstore')
				,'dependency'	=> array( 'element' => 'horizontal_style', 'value' => array('horizontal-border-image') )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Form', 'upstore' )
				,'param_name' 	=> 'form'
				,'admin_label' 	=> true
				,'value' 		=> $mc_form_option
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Title', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> 'Newsletter'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Intro Text', 'upstore' )
				,'param_name' 	=> 'intro_text'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Text Style', 'upstore' )
				,'param_name' 	=> 'text_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')		=> 'text-default'
							,esc_html__('Light', 'upstore')			=> 'text-light'
						)
				,'description' 	=> ''
			)
		)
	) );

	/*** TS Image Gallery ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Image Gallery', 'upstore' ),
		'base' 		=> 'ts_image_gallery',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Block title', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Title style', 'upstore' )
				,'param_name' 	=> 'title_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')				=>  ''
							,esc_html__('Border Thin', 'upstore')			=>  'title-border-thin'
							,esc_html__('Border Primary', 'upstore')		=>  'title-border-primary'
							,esc_html__('Border Primary 2', 'upstore')		=>  'title-border-primary-2'
							,esc_html__('Center', 'upstore')				=>  'title-center'
							,esc_html__('Center Border', 'upstore')			=>  'title-center-border'
							,esc_html__('Background and Border', 'upstore')	=>  'title-background-border'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'attach_images'
				,'heading' 		=> esc_html__( 'Images', 'upstore' )
				,'param_name' 	=> 'images'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Image size', 'upstore' )
				,'param_name' 	=> 'image_size'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Thumbnail', 'upstore')	=> 'thumbnail'
							,esc_html__('Medium', 'upstore')	=> 'medium'
							,esc_html__('Large', 'upstore')		=> 'large'
							,esc_html__('Full', 'upstore')		=> 'full'
						)
				,'description' 	=> esc_html__('You go to Settings > Media to change image size', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Columns', 'upstore' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> false
				,'value' 		=> array(
							1 	=> 1
							,2 	=> 2
							,3 	=> 3
							,4 	=> 4
							,5 	=> 5
							,6 	=> 6
							)
				,'description' 	=> esc_html__( 'Number of Columns', 'upstore' )
				,'std'			=> 4
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Margin item', 'upstore' )
				,'param_name' 	=> 'margin_item'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')	=>  0
							,esc_html__('Yes', 'upstore')	=>  1
						)
				,'description' 	=> esc_html__( 'Default margin item is 10px', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'On click', 'upstore' )
				,'param_name' 	=> 'on_click'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('None', 'upstore')					=> 'none'
							,esc_html__('Open prettyPhoto', 'upstore')		=> 'prettyphoto'
							,esc_html__('Open custom links', 'upstore')		=> 'custom_link'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textarea'
				,'heading' 		=> esc_html__( 'Custom links', 'upstore' )
				,'param_name' 	=> 'custom_links'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> esc_html__('A comma separated list of links. Ex: if you have 3 images, the value of this field should be "link1, link2, link3"', 'upstore')
				,'dependency'	=> array( 'element' => 'on_click', 'value' => array('custom_link') )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Custom link target', 'upstore' )
				,'param_name' 	=> 'custom_link_target'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Self', 'upstore')				=> '_self'
							,esc_html__('New Window Tab', 'upstore')	=> '_blank'
						)
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'on_click', 'value' => array('custom_link') )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'upstore' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'upstore' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=>  1
							,esc_html__('No', 'upstore')	=>  0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Navigation position', 'upstore' )
				,'param_name' 	=> 'nav_position'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Top', 'upstore')		=> 'nav-top'
							,esc_html__('Middle', 'upstore')	=> 'nav-middle'
						)
				,'group'		=> esc_html__('Slider Options', 'upstore')
				,'description' 	=> esc_html__('Top Navigation is only available when Block Title is not empty', 'upstore')
				,'dependency'	=> array( 'element' => 'show_nav', 'value' => array('1') )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'upstore' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=>  1
							,esc_html__('No', 'upstore')	=>  0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
		)
	) );
	
	/*** TS Instagram ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Instagram', 'upstore' ),
		'base' 		=> 'ts_instagram',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Block title', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'iconpicker'
				,'heading' 		=> esc_html__( 'Icon', 'upstore' )
				,'param_name' 	=> 'icon'
				,'admin_label' 	=> true
				,'value' 		=> 'fa fa-instagram'
				,'settings' 	=> array(
					'emptyIcon' 	=> true
					,'iconsPerPage' => 4000
				)
				,'description' 	=> esc_html__('Add this icon before the block title', 'upstore')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Username', 'upstore' )
				,'param_name' 	=> 'username'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Access Token', 'upstore' )
				,'param_name' 	=> 'access_token'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Number of photos', 'upstore' )
				,'param_name' 	=> 'number'
				,'admin_label' 	=> true
				,'value' 		=> '9'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Columns', 'upstore' )
				,'param_name' 	=> 'column'
				,'admin_label' 	=> true
				,'value' 		=> array(
							2	=> 2
							,3	=> 3
							,4	=> 4
							,5	=> 5
							,6	=> 6
							)
				,'description' 	=> ''
				,'std'			=> 5
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Size', 'upstore' )
				,'param_name' 	=> 'size'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Thumbnail', 'upstore')	=> 'thumbnail'
							,esc_html__('Small', 'upstore')		=> 'small'
							,esc_html__('Large', 'upstore')		=> 'large'
							,esc_html__('Original', 'upstore')	=> 'original'
							)
				,'description' 	=> ''
				,'std'			=> 'large'
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Margin item', 'upstore' )
				,'param_name' 	=> 'margin_item'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')	=>  0
							,esc_html__('Yes', 'upstore')	=>  1
						)
				,'description' 	=> esc_html__( 'Default margin item is 30px', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Target', 'upstore' )
				,'param_name' 	=> 'target'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Self', 'upstore')			=> '_self'
							,esc_html__('New window tab', 'upstore')=> '_blank'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Cache time (hours)', 'upstore' )
				,'param_name' 	=> 'cache_time'
				,'admin_label' 	=> false
				,'value' 		=> '12'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'upstore' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'upstore' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'upstore' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
		)
	) );
	
	/*** TS Instagram Shop ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Instagram Shop', 'upstore' ),
		'base' 		=> 'ts_instagram_shop',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Your Snapppt Account ID', 'upstore' )
				,'param_name' 	=> 'account_id'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> esc_html__( 'You create and get Account ID on https://snapppt.com/. Your Account ID should look like XXXXX-XXXX-XXXX-XXX-XXXXXXX', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Embed Stype', 'upstore' )
				,'param_name' 	=> 'embed_stype'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Grid', 'upstore')		=>  'grid'
							,esc_html__('Carousel', 'upstore')	=>  'carousel'
							,esc_html__('Stack', 'upstore')		=>  'masonry'
						)
				,'description' 	=> esc_html__( 'It should match with your setting on https://snapppt.com/', 'upstore' )
			)
		)
	) );
	
	/*** TS List Of Tribe Events ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS List Of Tribe Events', 'upstore' ),
		'base' 		=> 'ts_list_of_tribe_events',
		'icon' 		=> 'ts_icon_vc',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'upstore' )
				,'param_name' 	=> 'limit'
				,'admin_label' 	=> true
				,'value' 		=> 4
				,'description' 	=> esc_html__( 'Number of events', 'upstore' )
			)
			,array(
				'type' 			=> 'ts_category'
				,'heading' 		=> esc_html__( 'Categories', 'upstore' )
				,'param_name' 	=> 'categories'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
				,'class'		=> 'tribe_events_cat'
			)
		)
	) );
	
	/********************** TS Product Shortcodes ************************/

	/*** TS Products ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Products', 'upstore' ),
		'base' 		=> 'ts_products',
		'icon' 		=> 'ts_icon_vc_shop',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Block title', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Title style', 'upstore' )
				,'param_name' 	=> 'title_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')				=>  ''
							,esc_html__('Border Thin', 'upstore')			=>  'title-border-thin'
							,esc_html__('Border Primary', 'upstore')		=>  'title-border-primary'
							,esc_html__('Border Primary 2', 'upstore')		=>  'title-border-primary-2'
							,esc_html__('Center', 'upstore')				=>  'title-center'
							,esc_html__('Center Border', 'upstore')			=>  'title-center-border'
							,esc_html__('Background and Border', 'upstore')	=>  'title-background-border'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Product type', 'upstore' )
				,'param_name' 	=> 'product_type'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Recent', 'upstore')			=> 'recent'
						,esc_html__('Sale', 'upstore')			=> 'sale'
						,esc_html__('Featured', 'upstore')		=> 'featured'
						,esc_html__('Best Selling', 'upstore')	=> 'best_selling'
						,esc_html__('Top Rated', 'upstore')		=> 'top_rated'
						,esc_html__('Mixed Order', 'upstore')	=> 'mixed_order'
						)
				,'description' 	=> esc_html__( 'Select type of product', 'upstore' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Columns', 'upstore' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> true
				,'value' 		=> 4
				,'description' 	=> esc_html__( 'Number of Columns', 'upstore' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'upstore' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 4
				,'description' 	=> esc_html__( 'Number of Products', 'upstore' )
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product Categories', 'upstore' )
				,'param_name' 	=> 'product_cats'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product IDs', 'upstore' )
				,'param_name' 	=> 'ids'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'description' 	=> esc_html__('Enter product name or slug to search', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Product Meta Position', 'upstore' )
				,'param_name' 	=> 'meta_position'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Bottom', 'upstore')			=> 'bottom'
							,esc_html__('On Thumbnail', 'upstore')	=> 'on-thumbnail'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Item line', 'upstore' )
				,'param_name' 	=> 'item_line'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> esc_html__( 'Add a line between items', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product image', 'upstore' )
				,'param_name' 	=> 'show_image'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product name', 'upstore' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product SKU', 'upstore' )
				,'param_name' 	=> 'show_sku'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product price', 'upstore' )
				,'param_name' 	=> 'show_price'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product short description', 'upstore' )
				,'param_name' 	=> 'show_short_desc'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product rating', 'upstore' )
				,'param_name' 	=> 'show_rating'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product label', 'upstore' )
				,'param_name' 	=> 'show_label'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product categories', 'upstore' )
				,'param_name' 	=> 'show_categories'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show add to cart button', 'upstore' )
				,'param_name' 	=> 'show_add_to_cart'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show color swatches', 'upstore' )
				,'param_name' 	=> 'show_color_swatch'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> esc_html__( 'Show the color attribute of variations. The slug of the color attribute has to be "color"', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Number of color swatches', 'upstore' )
				,'param_name' 	=> 'number_color_swatch'
				,'admin_label' 	=> false
				,'value' 		=> array(
							2		=> 2
							,3		=> 3
							,4		=> 4
							,5		=> 5
							,6		=> 6
							)
				,'description' 	=> ''
				,'std'			=> 3
				,'dependency' 	=> array('element' => 'show_color_swatch', 'value' => array('1'))
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'upstore' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Row', 'upstore' )
				,'param_name' 	=> 'rows'
				,'admin_label' 	=> false
				,'value' 		=> array(
								1 	=> 1
								,2 	=> 2
								,3 	=> 3
							)
				,'description' 	=> esc_html__( 'Number of Rows for slider', 'upstore' )
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'upstore' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Navigation position', 'upstore' )
				,'param_name' 	=> 'nav_position'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Top', 'upstore')		=> 'nav-top'
							,esc_html__('Middle', 'upstore')	=> 'nav-middle'
						)
				,'description' 	=> esc_html__('Top Navigation is only available when Block Title is not empty', 'upstore')
				,'dependency'	=> array( 'element' => 'show_nav', 'value' => array('1') )
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'upstore' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Overlay style', 'upstore' )
				,'param_name' 	=> 'overlay_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> esc_html__('Add background overlay to the first and last items', 'upstore')
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Disable slider responsive', 'upstore' )
				,'param_name' 	=> 'disable_slider_responsive'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> esc_html__('You should only enable this option when Columns is 1 or 2', 'upstore')
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
		)
	) );
	
	/*** TS Products Widget ***/
	vc_map( array(
		'name' 			=> esc_html__( 'TS Products Widget', 'upstore' ),
		'base' 			=> 'ts_products_widget',
		'icon' 			=> 'ts_icon_vc_shop',
		'class' 		=> '',
		'description' 	=> '',
		'category' 		=> esc_html__('Theme-Sky', 'upstore'),
		'params' 		=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Block title', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Title Style', 'upstore' )
				,'param_name' 	=> 'title_style'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Default', 'upstore')				=>  ''
							,esc_html__('Border Thin', 'upstore')			=>  'title-border-thin'
							,esc_html__('Border Primary', 'upstore')		=>  'title-border-primary'
							,esc_html__('Border Primary 2', 'upstore')		=>  'title-border-primary-2'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Product type', 'upstore' )
				,'param_name' 	=> 'product_type'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Recent', 'upstore')			=> 'recent'
						,esc_html__('Sale', 'upstore')			=> 'sale'
						,esc_html__('Featured', 'upstore')		=> 'featured'
						,esc_html__('Best Selling', 'upstore')	=> 'best_selling'
						,esc_html__('Top Rated', 'upstore')		=> 'top_rated'
						,esc_html__('Mixed Order', 'upstore')	=> 'mixed_order'
						)
				,'description' 	=> esc_html__( 'Select type of product', 'upstore' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'upstore' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 6
				,'description' 	=> esc_html__( 'Number of Products', 'upstore' )
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product Categories', 'upstore' )
				,'param_name' 	=> 'product_cats'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product image', 'upstore' )
				,'param_name' 	=> 'show_image'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Thumbnail style', 'upstore' )
				,'param_name' 	=> 'thumbnail_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')	=> 'default-thumbnail'
							,esc_html__('Big', 'upstore')		=> 'big-thumbnail'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product name', 'upstore' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product price', 'upstore' )
				,'param_name' 	=> 'show_price'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product rating', 'upstore' )
				,'param_name' 	=> 'show_rating'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product categories', 'upstore' )
				,'param_name' 	=> 'show_categories'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'upstore' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Column', 'upstore' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> false
				,'value' 		=> 1
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Row', 'upstore' )
				,'param_name' 	=> 'rows'
				,'admin_label' 	=> false
				,'value' 		=> 3
				,'description' 	=> esc_html__( 'Number of Rows for slider', 'upstore' )
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'upstore' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'upstore' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
		)
	) );
	
	/*** TS Product Deals ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Product Deals', 'upstore' ),
		'base' 		=> 'ts_product_deals',
		'icon' 		=> 'ts_icon_vc_shop',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Block title', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Title style', 'upstore' )
				,'param_name' 	=> 'title_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')				=>  ''
							,esc_html__('Border Thin', 'upstore')			=>  'title-border-thin'
							,esc_html__('Border Primary', 'upstore')		=>  'title-border-primary'
							,esc_html__('Border Primary 2', 'upstore')		=>  'title-border-primary-2'
							,esc_html__('Center', 'upstore')				=>  'title-center'
							,esc_html__('Center Border', 'upstore')			=>  'title-center-border'
							,esc_html__('Background and Border', 'upstore')	=>  'title-background-border'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Text Style', 'upstore' )
				,'param_name' 	=> 'text_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')	=> 'text-default'
							,esc_html__('Light', 'upstore')		=> 'text-light'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Single Style', 'upstore' )
				,'param_name' 	=> 'single_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=>  0
							,esc_html__('Yes', 'upstore')	=>  1
						)
				,'description' 	=> esc_html__( 'If enabled, it will only show one product. Everything will also be bigger', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Single Style Layout', 'upstore' )
				,'param_name' 	=> 'single_style_layout'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('List', 'upstore')	=>  'list'
							,esc_html__('Grid', 'upstore')	=>  'grid'
						)
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'single_style', 'value' => array('1'))
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Counter Style', 'upstore' )
				,'param_name' 	=> 'counter_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Horizontal', 'upstore')	=> 'counter-horizontal'
							,esc_html__('Vertical', 'upstore')	=> 'counter-vertical'
							)
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'single_style_layout', 'value' => array('list'))
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Layout', 'upstore' )
				,'param_name' 	=> 'layout'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Slider', 'upstore')	=>  'slider'
							,esc_html__('Grid', 'upstore')	=>  'grid'
						)
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'single_style', 'value' => array('0'))
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Item border', 'upstore' )
				,'param_name' 	=> 'item_border'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> esc_html__( 'Add border between items', 'upstore' )
				,'dependency' 	=> array('element' => 'single_style', 'value' => array('0'))
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Product type', 'upstore' )
				,'param_name' 	=> 'product_type'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Recent', 'upstore')			=> 'recent'
						,esc_html__('Featured', 'upstore')		=> 'featured'
						,esc_html__('Best Selling', 'upstore')	=> 'best_selling'
						,esc_html__('Top Rated', 'upstore')		=> 'top_rated'
						,esc_html__('Mixed Order', 'upstore')	=> 'mixed_order'
						)
				,'description' 	=> esc_html__( 'Select type of product', 'upstore' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Columns', 'upstore' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> false
				,'value' 		=> 4
				,'description' 	=> esc_html__( 'Number of Columns', 'upstore' )
				,'dependency' 	=> array('element' => 'single_style', 'value' => array('0'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'upstore' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 5
				,'description' 	=> esc_html__( 'Number of Products', 'upstore' )
				,'dependency' 	=> array('element' => 'single_style', 'value' => array('0'))
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product Categories', 'upstore' )
				,'param_name' 	=> 'product_cats'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product IDs', 'upstore' )
				,'param_name' 	=> 'ids'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> false
					,'unique_values' 	=> true
				)
				,'description' 	=> esc_html__('Enter product name or slug to search', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show counter', 'upstore' )
				,'param_name' 	=> 'show_counter'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product image', 'upstore' )
				,'param_name' 	=> 'show_image'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product name', 'upstore' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product SKU', 'upstore' )
				,'param_name' 	=> 'show_sku'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product price', 'upstore' )
				,'param_name' 	=> 'show_price'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product short description', 'upstore' )
				,'param_name' 	=> 'show_short_desc'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Number of words in short description', 'upstore' )
				,'param_name' 	=> 'short_desc_words'
				,'admin_label' 	=> false
				,'value' 		=> 8
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product rating', 'upstore' )
				,'param_name' 	=> 'show_rating'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product label', 'upstore' )
				,'param_name' 	=> 'show_label'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product categories', 'upstore' )
				,'param_name' 	=> 'show_categories'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show add to cart button', 'upstore' )
				,'param_name' 	=> 'show_add_to_cart'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show availability bar', 'upstore' )
				,'param_name' 	=> 'availability_bar'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> esc_html__( 'The availability bar only shows if stock quantity is set', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'upstore' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Navigation position', 'upstore' )
				,'param_name' 	=> 'nav_position'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Top', 'upstore')		=> 'nav-top'
							,esc_html__('Middle', 'upstore')	=> 'nav-middle'
						)
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'show_nav', 'value' => array('1') )
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'upstore' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
		)
	) );
	
	/*** TS Product Deals 2 ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Product Deals 2', 'upstore' ),
		'base' 		=> 'ts_product_deals_2',
		'icon' 		=> 'ts_icon_vc_shop',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Block title', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Title style', 'upstore' )
				,'param_name' 	=> 'title_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')				=>  ''
							,esc_html__('Border Thin', 'upstore')			=>  'title-border-thin'
							,esc_html__('Border Primary', 'upstore')		=>  'title-border-primary'
							,esc_html__('Border Primary 2', 'upstore')		=>  'title-border-primary-2'
							,esc_html__('Center', 'upstore')				=>  'title-center'
							,esc_html__('Center Border', 'upstore')			=>  'title-center-border'
							,esc_html__('Background and Border', 'upstore')	=>  'title-background-border'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show small products', 'upstore' )
				,'param_name' 	=> 'show_small_products'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=>  1
							,esc_html__('No', 'upstore')	=>  0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Product type', 'upstore' )
				,'param_name' 	=> 'product_type'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Recent', 'upstore')			=> 'recent'
						,esc_html__('Featured', 'upstore')		=> 'featured'
						,esc_html__('Best Selling', 'upstore')	=> 'best_selling'
						,esc_html__('Top Rated', 'upstore')		=> 'top_rated'
						,esc_html__('Mixed Order', 'upstore')	=> 'mixed_order'
						)
				,'description' 	=> esc_html__( 'Select type of product', 'upstore' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'upstore' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 4
				,'description' 	=> esc_html__( 'Number of Products', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Columns', 'upstore' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> false
				,'value' 		=> array(
							1	=>  1
							,2	=>  2
						)
				,'description' 	=> ''
				,'std'			=> 2
				,'dependency' 	=> array('element' => 'show_small_products', 'value' => array('0'))
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Item line', 'upstore' )
				,'param_name' 	=> 'item_line'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> esc_html__( 'Add a line between items', 'upstore' )
				,'dependency' 	=> array('element' => 'show_small_products', 'value' => array('0'))
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product Categories', 'upstore' )
				,'param_name' 	=> 'product_cats'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product IDs', 'upstore' )
				,'param_name' 	=> 'ids'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> false
					,'unique_values' 	=> true
				)
				,'description' 	=> esc_html__('Enter product name or slug to search', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show counter', 'upstore' )
				,'param_name' 	=> 'show_counter'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product image', 'upstore' )
				,'param_name' 	=> 'show_image'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product name', 'upstore' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product SKU', 'upstore' )
				,'param_name' 	=> 'show_sku'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product price', 'upstore' )
				,'param_name' 	=> 'show_price'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product short description', 'upstore' )
				,'param_name' 	=> 'show_short_desc'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Number of words in short description', 'upstore' )
				,'param_name' 	=> 'short_desc_words'
				,'admin_label' 	=> false
				,'value' 		=> 20
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product rating', 'upstore' )
				,'param_name' 	=> 'show_rating'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product label', 'upstore' )
				,'param_name' 	=> 'show_label'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product categories', 'upstore' )
				,'param_name' 	=> 'show_categories'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show add to cart button', 'upstore' )
				,'param_name' 	=> 'show_add_to_cart'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show availability bar', 'upstore' )
				,'param_name' 	=> 'availability_bar'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> esc_html__( 'The availability bar only shows if stock quantity is set', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'upstore' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Prev navigation label', 'upstore' )
				,'param_name' 	=> 'prev_nav_text'
				,'admin_label' 	=> false
				,'value' 		=> 'Prev deal'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Next navigation label', 'upstore' )
				,'param_name' 	=> 'next_nav_text'
				,'admin_label' 	=> false
				,'value' 		=> 'Next deal'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'upstore' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
		)
	) );
	
	/*** TS Product Categories ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Product Categories', 'upstore' ),
		'base' 		=> 'ts_product_categories',
		'icon' 		=> 'ts_icon_vc_shop',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Block title', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Title style', 'upstore' )
				,'param_name' 	=> 'title_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')				=>  ''
							,esc_html__('Border Thin', 'upstore')			=>  'title-border-thin'
							,esc_html__('Border Primary', 'upstore')		=>  'title-border-primary'
							,esc_html__('Border Primary 2', 'upstore')		=>  'title-border-primary-2'
							,esc_html__('Center', 'upstore')				=>  'title-center'
							,esc_html__('Center Border', 'upstore')			=>  'title-center-border'
							,esc_html__('Background and Border', 'upstore')	=>  'title-background-border'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'upstore' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Style 1', 'upstore')	=>  'style-1'
							,esc_html__('Style 2', 'upstore')	=>  'style-2'
							,esc_html__('Style 3', 'upstore')	=>  'style-3'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Layout', 'upstore' )
				,'param_name' 	=> 'layout'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Slider', 'upstore')	=>  'slider'
							,esc_html__('Grid', 'upstore')	=>  'grid'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Columns', 'upstore' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> true
				,'value' 		=> 4
				,'description' 	=> esc_html__( 'Number of Columns', 'upstore' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'upstore' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 5
				,'description' 	=> esc_html__( 'Number of Product Categories', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Only display the first level', 'upstore' )
				,'param_name' 	=> 'first_level'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Parent', 'upstore' )
				,'param_name' 	=> 'parent'
				,'admin_label' 	=> true
				,'settings' => array(
					'multiple' 			=> false
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'value' 		=> ''
				,'description' 	=> esc_html__( 'Select a category. Get direct children of this category', 'upstore' )
				,'dependency' 	=> array('element' => 'first_level', 'value' => array('0'))
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Child Of', 'upstore' )
				,'param_name' 	=> 'child_of'
				,'admin_label' 	=> true
				,'settings' => array(
					'multiple' 			=> false
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'value' 		=> ''
				,'description' 	=> esc_html__( 'Select a category. Get all descendents of this category', 'upstore' )
				,'dependency' 	=> array('element' => 'first_level', 'value' => array('0'))
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product Categories', 'upstore' )
				,'param_name' 	=> 'ids'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'description' 	=> esc_html__('Include these categories', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Hide empty product categories', 'upstore' )
				,'param_name' 	=> 'hide_empty'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product category title', 'upstore' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product count', 'upstore' )
				,'param_name' 	=> 'show_product_count'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show view shop button', 'upstore' )
				,'param_name' 	=> 'show_view_shop_button'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'View shop button text', 'upstore' )
				,'param_name' 	=> 'view_shop_button_text'
				,'admin_label' 	=> false
				,'value' 		=> 'View Shop Now'
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'show_view_shop_button', 'value' => array('1') )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'upstore' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Navigation position', 'upstore' )
				,'param_name' 	=> 'nav_position'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Top', 'upstore')		=> 'nav-top'
							,esc_html__('Middle', 'upstore')	=> 'nav-middle'
						)
				,'description' 	=> esc_html__('Top Navigation is only available when Block Title is not empty', 'upstore')
				,'dependency'	=> array( 'element' => 'show_nav', 'value' => array('1') )
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'upstore' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Margin', 'upstore' )
				,'param_name' 	=> 'margin'
				,'admin_label' 	=> false
				,'value' 		=> '0'
				,'description' 	=> esc_html__('Set margin between items', 'upstore')
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
		)
	) );
	
	/*** TS List Of Product Categories ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS List Of Product Categories', 'upstore' ),
		'base' 		=> 'ts_list_of_product_categories',
		'icon' 		=> 'ts_icon_vc_shop',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Block title', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'upstore' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Style 1', 'upstore')	=> 'style-1'
							,esc_html__('Style 2', 'upstore')	=> 'style-2'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Color', 'upstore' )
				,'param_name' 	=> 'color'
				,'admin_label' 	=> true
				,'value' 		=> '#27af7d'
				,'description' 	=> ''
				,'dependency' => array('element' => 'style', 'value' => array('style-1'))
			)
			,array(
				'type' 			=> 'attach_images'
				,'heading' 		=> esc_html__( 'Banners', 'upstore' )
				,'param_name' 	=> 'banners'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Parent Category', 'upstore' )
				,'param_name' 	=> 'parent'
				,'admin_label' 	=> true
				,'settings' => array(
					'multiple' 			=> false
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'value' 		=> ''
				,'description' 	=> esc_html__( 'Display children of this category', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Direct child categories', 'upstore' )
				,'param_name' 	=> 'direct_child'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> esc_html__('Only display direct children of Parent Category', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Include Parent Category', 'upstore' )
				,'param_name' 	=> 'include_parent'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> esc_html__('Show Parent Category at the top of list', 'upstore')
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__('Product categories', 'upstore')
				,'param_name' 	=> 'ids'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'description' 	=> esc_html__('Include these categories. If you select a Parent Category, you will only be able to include the child categories of Parent Category', 'upstore')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'upstore' )
				,'param_name' 	=> 'limit'
				,'admin_label' 	=> true
				,'value' 		=> 8
				,'description' 	=> esc_html__( 'Number of product categories', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Hide empty product categories', 'upstore' )
				,'param_name' 	=> 'hide_empty'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show view all button', 'upstore' )
				,'param_name' 	=> 'show_view_all_button'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'View all button text', 'upstore' )
				,'param_name' 	=> 'view_all_button_text'
				,'admin_label' 	=> false
				,'value' 		=> '+ View All'
				,'description' 	=> ''
				,'dependency' => array('element' => 'show_view_all_button', 'value' => array('1'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'View all button link', 'upstore' )
				,'param_name' 	=> 'view_all_button_link'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> esc_html__( 'If empty, it will use the Parent Category or Shop page link', 'upstore' )
				,'dependency' => array('element' => 'show_view_all_button', 'value' => array('1'))
			)
		)
	) );
	
	/*** TS Product Brands ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Product Brands Slider', 'upstore' ),
		'base' 		=> 'ts_product_brands',
		'icon' 		=> 'ts_icon_vc_shop',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Use logo\'s settings', 'upstore' )
				,'param_name' 	=> 'use_logo_setting'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> esc_html__( 'If enabled, you go to Logos > Settings to configure image size and slider responsive', 'upstore' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Columns', 'upstore' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> false
				,'value' 		=> 5
				,'description' 	=> esc_html__( 'Number of Columns', 'upstore' )
				,'dependency' 	=> array('element' => 'use_logo_setting', 'value' => array('0'))
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'upstore' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 6
				,'description' 	=> esc_html__( 'Number of Product Brands', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Only display the first level', 'upstore' )
				,'param_name' 	=> 'first_level'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Hide empty product brands', 'upstore' )
				,'param_name' 	=> 'hide_empty'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product brand title', 'upstore' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product count', 'upstore' )
				,'param_name' 	=> 'show_product_count'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'upstore' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Navigation position', 'upstore' )
				,'param_name' 	=> 'nav_position'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Top', 'upstore')		=> 'nav-top'
							,esc_html__('Middle', 'upstore')	=> 'nav-middle'
						)
				,'description' 	=> esc_html__('Top Navigation is only available when Block Title is not empty', 'upstore')
				,'dependency'	=> array( 'element' => 'show_nav', 'value' => array('1') )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'upstore' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Margin', 'upstore' )
				,'param_name' 	=> 'margin'
				,'admin_label' 	=> false
				,'value' 		=> '0'
				,'description' 	=> esc_html__('Set margin between items', 'upstore')
			)
		)
	) );
	
	/*** TS Products In Category Tabs ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Products In Category Tabs', 'upstore' ),
		'base' 		=> 'ts_products_in_category_tabs',
		'icon' 		=> 'ts_icon_vc_shop',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Block title', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Style', 'upstore' )
				,'param_name' 	=> 'style'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Style 1', 'upstore')	=> 'style-1'
						,esc_html__('Style 2', 'upstore')	=> 'style-2'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab heading style', 'upstore' )
				,'param_name' 	=> 'tab_heading_style'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Style 1', 'upstore')	=> 'tab-heading-style-1'
						,esc_html__('Style 2', 'upstore')	=> 'tab-heading-style-2'
						)
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'style', 'value' => array('style-1') )
			)
			,array(
				'type' 			=> 'attach_images'
				,'heading' 		=> esc_html__( 'Tab icons', 'upstore' )
				,'param_name' 	=> 'tab_icons'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'style', 'value' => array('style-2') )
			)
			,array(
				'type' 			=> 'attach_images'
				,'heading' 		=> esc_html__( 'Tab icons hover', 'upstore' )
				,'param_name' 	=> 'tab_icons_hover'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
				,'dependency'	=> array( 'element' => 'style', 'value' => array('style-2') )
			)
			,array(
				'type' 			=> 'attach_images'
				,'heading' 		=> esc_html__( 'Background images', 'upstore' )
				,'param_name' 	=> 'background_images'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> esc_html__( 'If you add background images, you should set \'Row stretch\' to \'Stretch row and content (no paddings)\' for row which contains this element', 'upstore' )
				,'dependency' 	=> array( 'element' => 'style', 'value' => array('style-2') )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Product type', 'upstore' )
				,'param_name' 	=> 'product_type'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Recent', 'upstore')			=> 'recent'
						,esc_html__('Sale', 'upstore')			=> 'sale'
						,esc_html__('Featured', 'upstore')		=> 'featured'
						,esc_html__('Best Selling', 'upstore')	=> 'best_selling'
						,esc_html__('Top Rated', 'upstore')		=> 'top_rated'
						,esc_html__('Mixed Order', 'upstore')	=> 'mixed_order'
						)
				,'description' 	=> esc_html__( 'Select type of product', 'upstore' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Columns', 'upstore' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> true
				,'value' 		=> 4
				,'description' 	=> esc_html__( 'Number of Columns', 'upstore' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'upstore' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 8
				,'description' 	=> esc_html__( 'Number of Products', 'upstore' )
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product Categories', 'upstore' )
				,'param_name' 	=> 'product_cats'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Parent Category', 'upstore' )
				,'param_name' 	=> 'parent_cat'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> false
					,'sortable' 		=> false
					,'unique_values' 	=> true
				)
				,'description' 	=> esc_html__('Each tab will be a sub category of this category. This option is available when the Product Categories option is empty', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Include children', 'upstore' )
				,'param_name' 	=> 'include_children'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('No', 'upstore')		=> 0
						,esc_html__('Yes', 'upstore')	=> 1
						)
				,'description' 	=> esc_html__( 'Load the products of sub categories in each tab', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show general tab', 'upstore' )
				,'param_name' 	=> 'show_general_tab'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> esc_html__('Get products from all categories or sub categories', 'upstore')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'General tab heading', 'upstore' )
				,'param_name' 	=> 'general_tab_heading'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Product type of general tab', 'upstore' )
				,'param_name' 	=> 'product_type_general_tab'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Recent', 'upstore')			=> 'recent'
						,esc_html__('Sale', 'upstore')			=> 'sale'
						,esc_html__('Featured', 'upstore')		=> 'featured'
						,esc_html__('Best Selling', 'upstore')	=> 'best_selling'
						,esc_html__('Top Rated', 'upstore')		=> 'top_rated'
						)
				,'description' 	=> esc_html__( 'Select type of product', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product image', 'upstore' )
				,'param_name' 	=> 'show_image'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product name', 'upstore' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product SKU', 'upstore' )
				,'param_name' 	=> 'show_sku'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product price', 'upstore' )
				,'param_name' 	=> 'show_price'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product short description', 'upstore' )
				,'param_name' 	=> 'show_short_desc'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product rating', 'upstore' )
				,'param_name' 	=> 'show_rating'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product label', 'upstore' )
				,'param_name' 	=> 'show_label'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product categories', 'upstore' )
				,'param_name' 	=> 'show_categories'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show add to cart button', 'upstore' )
				,'param_name' 	=> 'show_add_to_cart'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show see more button', 'upstore' )
				,'param_name' 	=> 'show_see_more_button'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show see more button in general tab', 'upstore' )
				,'param_name' 	=> 'show_see_more_general_tab'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'See more button label', 'upstore' )
				,'param_name' 	=> 'see_more_button_text'
				,'admin_label' 	=> true
				,'value' 		=> 'See more'
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'upstore' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Rows', 'upstore' )
				,'param_name' 	=> 'rows'
				,'admin_label' 	=> true
				,'value' 		=> array(
						'1'			=> '1'
						,'2'		=> '2'
						)
				,'description' 	=> esc_html__( 'Number of Rows in slider', 'upstore' )
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'upstore' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Navigation position', 'upstore' )
				,'param_name' 	=> 'nav_position'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Top', 'upstore')		=> 'nav-top'
							,esc_html__('Middle', 'upstore')	=> 'nav-middle'
						)
				,'description' 	=> esc_html__('Top Navigation is only available when Block Title is not empty', 'upstore')
				,'dependency'	=> array( 'element' => 'show_nav', 'value' => array('1') )
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'upstore' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__('Slider Options', 'upstore')
			)
		)
	) );
	
	/*** TS Products In Product Type Tabs ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Products In Product Type Tabs', 'upstore' ),
		'base' 		=> 'ts_products_in_product_type_tabs',
		'icon' 		=> 'ts_icon_vc_shop',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Block title', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab style', 'upstore' )
				,'param_name' 	=> 'tab_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Style 1', 'upstore')	=> 'style-1'
							,esc_html__('Style 2', 'upstore')	=> 'style-2'
							,esc_html__('Style 3', 'upstore')	=> 'style-3'
							,esc_html__('Style 4', 'upstore')	=> 'style-4'
							,esc_html__('Style 5', 'upstore')	=> 'style-5'
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 1', 'upstore' )
				,'param_name' 	=> 'tab_1'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Tab 1 heading', 'upstore' )
				,'param_name' 	=> 'tab_1_heading'
				,'admin_label' 	=> false
				,'value' 		=> 'Featured'
				,'description' 	=> ''
				,'dependency' => array('element' => 'tab_1', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 1 product type', 'upstore' )
				,'param_name' 	=> 'tab_1_product_type'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Recent', 'upstore')			=> 'recent'
						,esc_html__('Sale', 'upstore')			=> 'sale'
						,esc_html__('Featured', 'upstore')		=> 'featured'
						,esc_html__('Best Selling', 'upstore')	=> 'best_selling'
						,esc_html__('Top Rated', 'upstore')		=> 'top_rated'
						,esc_html__('Mixed Order', 'upstore')	=> 'mixed_order'
						)
				,'std'			=> 'featured'
				,'dependency' 	=> array('element' => 'tab_1', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 2', 'upstore' )
				,'param_name' 	=> 'tab_2'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Tab 2 heading', 'upstore' )
				,'param_name' 	=> 'tab_2_heading'
				,'admin_label' 	=> false
				,'value' 		=> 'Best Selling'
				,'description' 	=> ''
				,'dependency' => array('element' => 'tab_2', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 2 product type', 'upstore' )
				,'param_name' 	=> 'tab_2_product_type'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Recent', 'upstore')			=> 'recent'
						,esc_html__('Sale', 'upstore')			=> 'sale'
						,esc_html__('Featured', 'upstore')		=> 'featured'
						,esc_html__('Best Selling', 'upstore')	=> 'best_selling'
						,esc_html__('Top Rated', 'upstore')		=> 'top_rated'
						,esc_html__('Mixed Order', 'upstore')	=> 'mixed_order'
						)
				,'std'			=> 'best_selling'
				,'dependency' 	=> array('element' => 'tab_2', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 3', 'upstore' )
				,'param_name' 	=> 'tab_3'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Tab 3 heading', 'upstore' )
				,'param_name' 	=> 'tab_3_heading'
				,'admin_label' 	=> false
				,'value' 		=> 'On Sale'
				,'description' 	=> ''
				,'dependency' => array('element' => 'tab_3', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 3 product type', 'upstore' )
				,'param_name' 	=> 'tab_3_product_type'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Recent', 'upstore')			=> 'recent'
						,esc_html__('Sale', 'upstore')			=> 'sale'
						,esc_html__('Featured', 'upstore')		=> 'featured'
						,esc_html__('Best Selling', 'upstore')	=> 'best_selling'
						,esc_html__('Top Rated', 'upstore')		=> 'top_rated'
						,esc_html__('Mixed Order', 'upstore')	=> 'mixed_order'
						)
				,'std'			=> 'sale'
				,'dependency' 	=> array('element' => 'tab_3', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 4', 'upstore' )
				,'param_name' 	=> 'tab_4'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Tab 4 heading', 'upstore' )
				,'param_name' 	=> 'tab_4_heading'
				,'admin_label' 	=> false
				,'value' 		=> 'Top Rated'
				,'description' 	=> ''
				,'dependency' => array('element' => 'tab_4', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 4 product type', 'upstore' )
				,'param_name' 	=> 'tab_4_product_type'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Recent', 'upstore')			=> 'recent'
						,esc_html__('Sale', 'upstore')			=> 'sale'
						,esc_html__('Featured', 'upstore')		=> 'featured'
						,esc_html__('Best Selling', 'upstore')	=> 'best_selling'
						,esc_html__('Top Rated', 'upstore')		=> 'top_rated'
						,esc_html__('Mixed Order', 'upstore')	=> 'mixed_order'
						)
				,'std'			=> 'top_rated'
				,'dependency' 	=> array('element' => 'tab_4', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 5', 'upstore' )
				,'param_name' 	=> 'tab_5'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Tab 5 heading', 'upstore' )
				,'param_name' 	=> 'tab_5_heading'
				,'admin_label' 	=> false
				,'value' 		=> 'Recent'
				,'description' 	=> ''
				,'dependency' => array('element' => 'tab_5', 'value' => '1')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Tab 5 product type', 'upstore' )
				,'param_name' 	=> 'tab_5_product_type'
				,'admin_label' 	=> false
				,'value' 		=> array(
						esc_html__('Recent', 'upstore')			=> 'recent'
						,esc_html__('Sale', 'upstore')			=> 'sale'
						,esc_html__('Featured', 'upstore')		=> 'featured'
						,esc_html__('Best Selling', 'upstore')	=> 'best_selling'
						,esc_html__('Top Rated', 'upstore')		=> 'top_rated'
						,esc_html__('Mixed Order', 'upstore')	=> 'mixed_order'
						)
				,'std'			=> 'recent'
				,'dependency' 	=> array('element' => 'tab_5', 'value' => '1')
			)
			,array(
				'type' 			=> 'colorpicker'
				,'heading' 		=> esc_html__( 'Color', 'upstore' )
				,'param_name' 	=> 'color'
				,'admin_label' 	=> false
				,'value' 		=> '#27af7d'
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'tab_style', 'value' => array('style-2', 'style-4'))
			)
			,array(
				'type' 			=> 'attach_images'
				,'heading' 		=> esc_html__( 'Banners', 'upstore' )
				,'param_name' 	=> 'banners'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'tab_style', 'value' => array('style-5'))
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Active tab', 'upstore' )
				,'param_name' 	=> 'active_tab'
				,'admin_label' 	=> false
				,'value' 		=> array(
						1		=> 1
						,2		=> 2
						,3		=> 3
						,4		=> 4
						,5		=> 5
						)
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Columns', 'upstore' )
				,'param_name' 	=> 'columns'
				,'admin_label' 	=> true
				,'value' 		=> 4
				,'description' 	=> esc_html__( 'Number of Columns', 'upstore' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'upstore' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 6
				,'description' 	=> esc_html__( 'Number of Products', 'upstore' )
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product Categories', 'upstore' )
				,'param_name' 	=> 'product_cats'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show list of categories', 'upstore' )
				,'param_name' 	=> 'show_list_categories'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> esc_html__( 'Display list of categories which you select above', 'upstore' )
				,'dependency' 	=> array('element' => 'tab_style', 'value' => 'style-2')
			)
			,array(
				'type' 			=> 'attach_image'
				,'heading' 		=> esc_html__( 'Banner 1', 'upstore' )
				,'param_name' 	=> 'banner_1'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'tab_style', 'value' => 'style-2')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Banner 1 link', 'upstore' )
				,'param_name' 	=> 'banner_1_link'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'tab_style', 'value' => 'style-2')
			)
			,array(
				'type' 			=> 'attach_image'
				,'heading' 		=> esc_html__( 'Banner 2', 'upstore' )
				,'param_name' 	=> 'banner_2'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'tab_style', 'value' => 'style-2')
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Banner 2 link', 'upstore' )
				,'param_name' 	=> 'banner_2_link'
				,'admin_label' 	=> false
				,'value' 		=> ''
				,'description' 	=> ''
				,'dependency' 	=> array('element' => 'tab_style', 'value' => 'style-2')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Item border', 'upstore' )
				,'param_name' 	=> 'item_border'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> esc_html__( 'Add border between items', 'upstore' )
				,'dependency' 	=> array('element' => 'tab_style', 'value' => 'style-2')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Item line', 'upstore' )
				,'param_name' 	=> 'item_line'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> esc_html__( 'Add a line between items', 'upstore' )
				,'dependency' 	=> array('element' => 'tab_style', 'value' => array('style-1', 'style-5'))
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product image', 'upstore' )
				,'param_name' 	=> 'show_image'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product name', 'upstore' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product SKU', 'upstore' )
				,'param_name' 	=> 'show_sku'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product price', 'upstore' )
				,'param_name' 	=> 'show_price'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product short description', 'upstore' )
				,'param_name' 	=> 'show_short_desc'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product rating', 'upstore' )
				,'param_name' 	=> 'show_rating'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product label', 'upstore' )
				,'param_name' 	=> 'show_label'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product categories', 'upstore' )
				,'param_name' 	=> 'show_categories'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('No', 'upstore')		=> 0
							,esc_html__('Yes', 'upstore')	=> 1
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show add to cart button', 'upstore' )
				,'param_name' 	=> 'show_add_to_cart'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show in a carousel slider', 'upstore' )
				,'param_name' 	=> 'is_slider'
				,'admin_label' 	=> true
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__( 'Slider Options', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Rows', 'upstore' )
				,'param_name' 	=> 'rows'
				,'admin_label' 	=> true
				,'value' 		=> array(
						'1'			=> '1'
						,'2'		=> '2'
						)
				,'description' 	=> esc_html__( 'Number of Rows in slider', 'upstore' )
				,'group'		=> esc_html__( 'Slider Options', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'upstore' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__( 'Slider Options', 'upstore' )
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'upstore' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
						)
				,'description' 	=> ''
				,'group'		=> esc_html__( 'Slider Options', 'upstore' )
			)
		)
	) );
	
	/*** TS Products Video ***/
	vc_map( array(
		'name' 		=> esc_html__( 'TS Products Video', 'upstore' ),
		'base' 		=> 'ts_products_video',
		'icon' 		=> 'ts_icon_vc_shop',
		'class' 	=> '',
		'category' 	=> esc_html__('Theme-Sky', 'upstore'),
		'params' 	=> array(
			array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Block title', 'upstore' )
				,'param_name' 	=> 'title'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Title style', 'upstore' )
				,'param_name' 	=> 'title_style'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Default', 'upstore')				=>  ''
							,esc_html__('Border Thin', 'upstore')			=>  'title-border-thin'
							,esc_html__('Border Primary', 'upstore')		=>  'title-border-primary'
							,esc_html__('Border Primary 2', 'upstore')		=>  'title-border-primary-2'
							,esc_html__('Center', 'upstore')				=>  'title-center'
							,esc_html__('Center Border', 'upstore')			=>  'title-center-border'
							,esc_html__('Background and Border', 'upstore')	=>  'title-background-border'
						)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Product type', 'upstore' )
				,'param_name' 	=> 'product_type'
				,'admin_label' 	=> true
				,'value' 		=> array(
						esc_html__('Recent', 'upstore')			=> 'recent'
						,esc_html__('Featured', 'upstore')		=> 'featured'
						,esc_html__('Best Selling', 'upstore')	=> 'best_selling'
						,esc_html__('Top Rated', 'upstore')		=> 'top_rated'
						,esc_html__('Mixed Order', 'upstore')	=> 'mixed_order'
						)
				,'description' 	=> esc_html__( 'Select type of product', 'upstore' )
			)
			,array(
				'type' 			=> 'textfield'
				,'heading' 		=> esc_html__( 'Limit', 'upstore' )
				,'param_name' 	=> 'per_page'
				,'admin_label' 	=> true
				,'value' 		=> 5
				,'description' 	=> esc_html__( 'Number of Products', 'upstore' )
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product Categories', 'upstore' )
				,'param_name' 	=> 'product_cats'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> true
					,'unique_values' 	=> true
				)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'autocomplete'
				,'heading' 		=> esc_html__( 'Product IDs', 'upstore' )
				,'param_name' 	=> 'ids'
				,'admin_label' 	=> true
				,'value' 		=> ''
				,'settings' => array(
					'multiple' 			=> true
					,'sortable' 		=> false
					,'unique_values' 	=> true
				)
				,'description' 	=> esc_html__('Enter product name or slug to search', 'upstore')
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product image', 'upstore' )
				,'param_name' 	=> 'show_image'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product name', 'upstore' )
				,'param_name' 	=> 'show_title'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product price', 'upstore' )
				,'param_name' 	=> 'show_price'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show product rating', 'upstore' )
				,'param_name' 	=> 'show_rating'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Show navigation button', 'upstore' )
				,'param_name' 	=> 'show_nav'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
			,array(
				'type' 			=> 'dropdown'
				,'heading' 		=> esc_html__( 'Auto play', 'upstore' )
				,'param_name' 	=> 'auto_play'
				,'admin_label' 	=> false
				,'value' 		=> array(
							esc_html__('Yes', 'upstore')	=> 1
							,esc_html__('No', 'upstore')	=> 0
							)
				,'description' 	=> ''
			)
		)
	) );
}

/*** Add Shortcode Param ***/
WpbakeryShortcodeParams::addField('ts_category', 'upstore_product_catgories_shortcode_param');
if( !function_exists('upstore_product_catgories_shortcode_param') ){
	function upstore_product_catgories_shortcode_param($settings, $value){
		$categories = upstore_get_list_categories_shortcode_param(0, $settings);
		$arr_value = explode(',', $value);
		ob_start();
		?>
		<input type="hidden" class="wpb_vc_param_value wpb-textinput product_cats textfield ts-hidden-selected-categories" name="<?php echo esc_attr($settings['param_name']); ?>" value="<?php echo esc_attr($value); ?>" />
		<div class="categorydiv">
			<div class="tabs-panel">
				<ul class="categorychecklist">
					<?php foreach($categories as $cat){ ?>
					<li>
						<label>
							<input type="checkbox" class="checkbox ts-select-category" value="<?php echo esc_attr($cat->term_id); ?>" <?php echo (in_array($cat->term_id, $arr_value))?'checked':''; ?> />
							<?php echo esc_html($cat->name); ?>
						</label>
						<?php upstore_get_list_sub_categories_shortcode_param($cat->term_id, $arr_value, $settings); ?>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<script type="text/javascript">
			jQuery('.ts-select-category').bind('change', function(){
				"use strict";
				
				var selected = jQuery('.ts-select-category:checked');
				jQuery('.ts-hidden-selected-categories').val('');
				var selected_id = new Array();
				selected.each(function(index, ele){
					selected_id.push(jQuery(ele).val());
				});
				selected_id = selected_id.join(',');
				jQuery('.ts-hidden-selected-categories').val(selected_id);
			});
		</script>
		<?php
		return ob_get_clean();
	}
}

if( !function_exists('upstore_get_list_categories_shortcode_param') ){
	function upstore_get_list_categories_shortcode_param( $cat_parent_id, $settings ){
		$taxonomy = 'product_cat';
		if( isset($settings['class']) ){
			if( $settings['class'] == 'post_cat' ){
				$taxonomy = 'category';
			}
			if( $settings['class'] == 'ts_testimonial' ){
				$taxonomy = 'ts_testimonial_cat';
			}
			if( $settings['class'] == 'ts_portfolio' ){
				$taxonomy = 'ts_portfolio_cat';
			}
			if( $settings['class'] == 'ts_logo' ){
				$taxonomy = 'ts_logo_cat';
			}
			if( $settings['class'] == 'tribe_events_cat' ){
				$taxonomy = 'tribe_events_cat';
			}
		}
		
		$args = array(
				'taxonomy' 			=> $taxonomy
				,'hierarchical'		=> 1
				,'hide_empty'		=> 0
				,'parent'			=> $cat_parent_id
				,'title_li'			=> ''
				,'child_of'			=> 0
			);
		$cats = get_categories($args);
		return $cats;
	}
}

if( !function_exists('upstore_get_list_sub_categories_shortcode_param') ){
	function upstore_get_list_sub_categories_shortcode_param( $cat_parent_id, $arr_value, $settings ){
		$sub_categories = upstore_get_list_categories_shortcode_param($cat_parent_id, $settings); 
		if( count($sub_categories) > 0){
		?>
			<ul class="children">
				<?php foreach( $sub_categories as $sub_cat ){ ?>
					<li>
						<label>
							<input type="checkbox" class="checkbox ts-select-category" value="<?php echo esc_attr($sub_cat->term_id); ?>" <?php echo (in_array($sub_cat->term_id, $arr_value))?'checked':''; ?> />
							<?php echo esc_html($sub_cat->name); ?>
						</label>
						<?php upstore_get_list_sub_categories_shortcode_param($sub_cat->term_id, $arr_value, $settings); ?>
					</li>
				<?php } ?>
			</ul>
		<?php }
	}
}

function upstore_team_member_autocomplete_suggester( $query ){
	$args = array(
			'post_type'				=> 'ts_team'
			,'post_status'			=> 'publish'
			,'posts_per_page'		=> -1
			,'s'					=> $query
			);
	$results = array();
	$teams = new WP_Query($args);
	if( !empty( $teams->posts ) && is_array( $teams->posts ) ){
		foreach( $teams->posts as $p ){
			$data = array();
			$data['value'] = $p->ID;
			$data['label'] = esc_html__( 'ID', 'upstore' ) . ': ' . $p->ID . ( ( strlen( $p->post_title ) > 0 ) ? ' - ' . esc_html__( 'Name', 'upstore' ) . ': ' . $p->post_title : '' );
			$results[] = $data;
		}
	}
	return $results;
}

function upstore_team_member_autocomplete_render( $query ){
	$query = trim( $query['value'] );
	if ( ! empty( $query ) ) {
		
		$args = array(
			'post_type'				=> 'ts_team'
			,'post_status'			=> 'publish'
			,'posts_per_page'		=> 1
			,'p'					=> (int) $query
			);
		$teams = new WP_Query($args);
		if( isset($teams->post) ){
			$team = $teams->post;
			
			$team_id_display = esc_html__( 'ID', 'upstore' ) . ': ' . $team->ID;
			$team_title_display = '';
			if ( ! empty( $team->post_title ) ) {
				$team_title_display = ' - ' . esc_html__( 'Name', 'upstore' ) . ': ' . $team->post_title;
			}
			
			$data = array();
			$data['value'] = $team->ID;
			$data['label'] = $team_id_display . $team_title_display;

			wp_reset_postdata();
			
			return $data;
		}
		return false;
	}
	return false;
}

if( class_exists('Vc_Vendor_Woocommerce') ){
	$vc_woo_vendor = new Vc_Vendor_Woocommerce();

	/* autocomplete callback */
	add_filter( 'vc_autocomplete_ts_products_ids_callback', array($vc_woo_vendor, 'productIdAutocompleteSuggester') );
	add_filter( 'vc_autocomplete_ts_products_ids_render', array($vc_woo_vendor, 'productIdAutocompleteRender') );
	
	add_filter( 'vc_autocomplete_ts_product_deals_ids_callback', array($vc_woo_vendor, 'productIdAutocompleteSuggester') );
	add_filter( 'vc_autocomplete_ts_product_deals_ids_render', array($vc_woo_vendor, 'productIdAutocompleteRender') );
	
	add_filter( 'vc_autocomplete_ts_product_deals_2_ids_callback', array($vc_woo_vendor, 'productIdAutocompleteSuggester') );
	add_filter( 'vc_autocomplete_ts_product_deals_2_ids_render', array($vc_woo_vendor, 'productIdAutocompleteRender') );
	
	add_filter( 'vc_autocomplete_ts_products_video_ids_callback', array($vc_woo_vendor, 'productIdAutocompleteSuggester') );
	add_filter( 'vc_autocomplete_ts_products_video_ids_render', array($vc_woo_vendor, 'productIdAutocompleteRender') );
	
	add_filter( 'vc_autocomplete_ts_team_members_ids_callback', 'upstore_team_member_autocomplete_suggester' );
	add_filter( 'vc_autocomplete_ts_team_members_ids_render', 'upstore_team_member_autocomplete_render' );
	
	$shortcode_field_cats = array();
	$shortcode_field_cats[] = array('ts_products', 'product_cats');
	$shortcode_field_cats[] = array('ts_products_widget', 'product_cats');
	$shortcode_field_cats[] = array('ts_product_deals', 'product_cats');
	$shortcode_field_cats[] = array('ts_product_deals_2', 'product_cats');
	$shortcode_field_cats[] = array('ts_products_in_category_tabs', 'product_cats');
	$shortcode_field_cats[] = array('ts_products_in_category_tabs', 'parent_cat');
	$shortcode_field_cats[] = array('ts_products_in_product_type_tabs', 'product_cats');
	$shortcode_field_cats[] = array('ts_products_video', 'product_cats');
	$shortcode_field_cats[] = array('ts_product_categories', 'parent');
	$shortcode_field_cats[] = array('ts_product_categories', 'child_of');
	$shortcode_field_cats[] = array('ts_product_categories', 'ids');
	$shortcode_field_cats[] = array('ts_list_of_product_categories', 'parent');
	$shortcode_field_cats[] = array('ts_list_of_product_categories', 'ids');
		
	foreach( $shortcode_field_cats as $shortcode_field ){
		add_filter( 'vc_autocomplete_'.$shortcode_field[0].'_'.$shortcode_field[1].'_callback', array($vc_woo_vendor, 'productCategoryCategoryAutocompleteSuggester') );
		add_filter( 'vc_autocomplete_'.$shortcode_field[0].'_'.$shortcode_field[1].'_render', array($vc_woo_vendor, 'productCategoryCategoryRenderByIdExact') );
	}
}
?>