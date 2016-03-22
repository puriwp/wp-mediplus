<?php
/**
 * MediPlus Content Shortcode
 * Include and setup custom shortcode for all Bootstrap elements.
 *
 * @package mediplus
 * @since MediPlus 1.0
 */

class MediPlus_BoostrapShortcodes {

	protected static $shortcodes = array(
		  'alert',
		  'badge',
		  'button',
		  'button-toolbar',
		  'code',
		  'column',
		  'clearfix',
		  'divider',
		  'image',
		  'li',
		  'list',
//		  'list-group',
//		  'list-group-item',
//		  'list-group-item-heading',
//		  'list-group-item-text',
//		  'modal',
//		  'modal-footer',
//		  'nav',
//		  'nav-item',
//		  'page-header',
//		  'panel',
		  'row',
		  'slides',
		  'slide',
		  'tab',
//		  'table',
//		  'table-wrap',
		  'tabs',
		  'thumbnail',
		  'title',
		  'toggles',
		  'toggle',
//		  'well',
	);

	public function button_groups( $grps = array() ){
		$grps=array(
			'basic'			=> array( 'name'=>'Basic Elements', 'icon'=>'fa-cube' ),
			'columns'		=> array( 'name'=>'Columns', 'icon'=>'fa-clone' ),
			'interactive'	=> array( 'name'=>'Interactive', 'icon'=>'fa-random' ),
			'content'		=> array( 'name'=>'Content', 'icon'=>'fa-newspaper-o' ),
			'miscellaneous'	=> array( 'name'=>'Miscellaneous', 'icon'=>'fa-puzzle-piece' )
		);
		return $grps;
	}

	public function button_shortcodes( $shortcodes = array() ){
		$shortcodes = array(
			'alert' => array(
				'group'	=> 'basic',
				'name'	=> 'Notifications',
                'icon'  => 'fa-bell',
				'width'	=> 600,
				'height'=> ''
			),
			'badge' => array(
				'group'	=> 'basic',
				'name'	=> 'Badges',
                'icon'  => 'fa-tag',
				'width'	=> '',
				'height'=> ''
			),
			'button' => array(
				'group'	=> 'basic',
				'name'	=> 'Buttons',
                'icon'  => 'fa-square',
				'width'	=> 800,
				'height'=> ''
			),
			'button-toolbar' => array(
				'group'	=> 'basic',
				'name'	=> 'Button Group',
                'icon'  => 'fa-th-large',
				'width'	=> 800,
				'height'=> ''
			),
			'toggles' => array(
				'group'	=> 'interactive',
				'name'	=> 'Toggles',
                'icon'  => 'fa-th-list',
				'width'	=> 980,
				'height'=> ''
			),
			'tabs' => array(
				'group'	=> 'interactive',
				'name'	=> 'Tabs',
                'icon'  => 'fa-list-alt',
				'width'	=> 1170,
				'height'=> ''
			),
			'slides'=>array(
				'group'	=> 'interactive',
				'name'	=> 'Slider',
                'icon'  => 'fa-sliders',
				'width'	=> 900,
				'height'=> 450
			),
			'list' => array(
				'group'	=> 'content',
				'name'	=> 'List',
                'icon'  => 'fa-list-ol',
				'width'	=> 800,
				'height'=> ''
			),
			'title' => array(
				'group'	=> 'content',
				'name'	=> 'Title Heading',
                'icon'  => 'fa-header',
				'width'	=> 800,
				'height'=> ''
			),
			'thumbnail' => array(
				'group'	=> 'miscellaneous',
				'name'	=> 'Thumbnail Image',
                'icon'  => 'fa-picture-o',
				'width'	=> 800,
				'height'=> ''
			),
			'image' => array(
				'group'	=> 'miscellaneous',
				'name'	=> 'Responsive Image',
                'icon'  => 'fa-camera-retro',
				'width'	=> 800,
				'height'=> ''
			),
            'row' => array(
				'group'	=> 'columns',
				'name'	=> 'Row',
                'icon'  => 'fa-bars',
				'width'	=> '',
				'height'=> ''
			),
			'column' => array(
				'group'	=> 'columns',
				'name'	=> 'Columns',
                'icon'  => 'fa-columns',
				'width'	=> 900,
				'height'=> ''
			)
		);
	return $shortcodes;
	}

	function __construct() {
		add_action( 'admin_head', array( $this, 'mediplus_var_buttons' ) );
		add_action( 'init', array( $this, 'add_shortcodes' ) );
	}

    /*
     * add_shortcodes
     */
    function add_shortcodes() {

        foreach ( self::$shortcodes as $shortcode ) {
            $function = 'mediplus_bs_' . str_replace( '-', '_', $shortcode );
            add_shortcode( $shortcode, array( $this, $function ) );
        }
    }

	/*
     * Load global variables
     */
	function mediplus_var_buttons() {
	?>
<script type="text/javascript">/* <![CDATA[ */
    var img_url='<?php echo MEDIPLUS_THEME_IMG.'editor/';?>';
    var editor_opt='dropdown';
    var dropdown_obj='<?php echo json_encode($this->button_shortcodes()); ?>';
    var dropdown_grp='<?php echo json_encode($this->button_groups()); ?>';/* ]]> */
</script>
	<?php
	}

	/*
     * mediplus_bs_alert
     */
	function mediplus_bs_alert( $atts, $content = null ) {

		$atts = shortcode_atts( array(
		"type"          => false,
		"dismissable"   => false,
		"xclass"        => false,
		"data"          => false
		), $atts );

		$class  = 'alert mediplus';
		$class .= ( $atts['type'] )         ? ' alert-' . $atts['type'] : ' alert-success';
		$class .= ( $atts['dismissable']   == 'true' )  ? ' alert-dismissable' : '';
		$class .= ( $atts['xclass'] )       ? ' ' . $atts['xclass'] : '';

		$dismissable = ( $atts['dismissable'] ) ? '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' : '';
		switch( $atts['type'] ){
			case 'success':
				$icon = '<i class="fa fa-check-circle"></i>&nbsp;';
				break;
			case 'info':
				$icon = '<i class="fa fa-info-circle"></i>&nbsp;';
				break;
			case 'warning':
				$icon = '<i class="fa fa-exclamation-circle"></i>&nbsp;';
				break;
			case 'danger':
				$icon = '<i class="fa fa-times-circle"></i>&nbsp;';
				break;
			default:
				$icon = '<i class="fa fa-check-circle"></i>&nbsp;';
				break;
		}

		$data_props = $this->parse_data_attributes( $atts['data'] );

		return sprintf(
		'<div class="%s" role="alert"%s>%s%s%s</div>',
		esc_attr( $class ),
		( $data_props )  ? ' ' . $data_props : '',
		$dismissable,
		$icon,
		do_shortcode( $content )
		);
	}

	/*
     * mediplus_bs_badge
     */
	function mediplus_bs_badge( $atts, $content = null ) {

		$atts = shortcode_atts( array(
		"right"   => false,
		"xclass"  => false,
		"data"    => false
		), $atts );

		$class  = 'badge';
		$class .= ( $atts['right']   == 'true' )    ? ' pull-right' : '';
		$class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

		$data_props = $this->parse_data_attributes( $atts['data'] );

		return sprintf(
		'<span class="%s"%s>%s</span>',
		esc_attr( $class ),
		( $data_props ) ? ' ' . $data_props : '',
		do_shortcode( $content )
		);
	}

	/*
     * mediplus_bs_button
     */
	function mediplus_bs_button( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			"type"     => false,
			"size"     => false,
			"block"    => false,
			"dropdown" => false,
			"link"     => '',
			"target"   => false,
			"disabled" => false,
			"active"   => false,
			"xclass"   => false,
			"title"    => false,
			"data"     => false
		), $atts );

		$class  = 'btn mediplus';
		$class .= ( $atts['type'] )     ? ' btn-' . $atts['type'] : ' btn-default';
		$class .= ( $atts['size'] )     ? ' btn-' . $atts['size'] : '';
		$class .= ( $atts['block'] == 'true' )    ? ' btn-block' : '';
		$class .= ( $atts['dropdown']   == 'true' ) ? ' dropdown-toggle' : '';
		$class .= ( $atts['disabled']   == 'true' ) ? ' disabled' : '';
		$class .= ( $atts['active']     == 'true' )   ? ' active' : '';
		$class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

		$data_props = $this->parse_data_attributes( $atts['data'] );

		return sprintf(
			'<a class="%s" href="%s"%s%s%s>%s</a>',
			esc_attr( $class ),
			esc_url( $atts['link'] ),
			( $atts['target'] )     ? sprintf( ' target="%s"', esc_attr( $atts['target'] ) ) : '',
			( $atts['title'] )      ? sprintf( ' title="%s"',  esc_attr( $atts['title'] ) )  : '',
			( $data_props ) ? ' ' . $data_props : '',
			do_shortcode( $content )
		);

	}

	/*
     * mediplus_bs_button_toolbar
     */
	function mediplus_bs_button_toolbar( $atts, $content = null ) {

		$atts = shortcode_atts( array(
		  "xclass" => false,
		  "data"   => false
		), $atts );

		$class  = 'btn-toolbar';
		$class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

		$data_props = $this->parse_data_attributes( $atts['data'] );

		return sprintf(
		  '<div class="%s"%s>%s</div>',
		  esc_attr( $class ),
		  ( $data_props ) ? ' ' . $data_props : '',
		  do_shortcode( $content )
		);
	}

    /*
     * mediplus_bs_code
     */
    function mediplus_bs_code( $atts, $content = null ) {

        $atts = shortcode_atts( array(
            "inline"      => false,
            "scrollable"  => false,
            "xclass"      => false,
            "data"        => false
        ), $atts );

        $class  = 'mediplus';
        $class .= ( $atts['scrollable']   == 'true' )  ? ' pre-scrollable' : '';
        $class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

        $data_props = $this->parse_data_attributes( $atts['data'] );

        return sprintf(
            '<%1$s class="%2$s"%3$s>%4$s</%1$s>',
            ( $atts['inline'] ) ? 'code' : 'pre',
            esc_attr( $class ),
            ( $data_props ) ? ' ' . $data_props : '',
            $this->strip_paragraph( $content )
        );
    }

    /*
     * mediplus_bs_row
     */
    function mediplus_bs_row( $atts, $content = null ) {

        $atts = shortcode_atts( array(
          "xclass" => false,
          "data"   => false
        ), $atts );

        $class  = 'row mediplus';
        $class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

        $data_props = $this->parse_data_attributes( $atts['data'] );

        return sprintf(
          '<div class="%s"%s>%s</div>',
          esc_attr( $class ),
          ( $data_props ) ? ' ' . $data_props : '',
          do_shortcode( $content )
        );
    }

    /*
     * mediplus_bs_column
     */
    function mediplus_bs_column( $atts, $content = null ) {

        $atts = shortcode_atts( array(
          "lg"          => false,
          "md"          => false,
          "sm"          => false,
          "xs"          => false,
          "offset_lg"   => false,
          "offset_md"   => false,
          "offset_sm"   => false,
          "offset_xs"   => false,
          "pull_lg"     => false,
          "pull_md"     => false,
          "pull_sm"     => false,
          "pull_xs"     => false,
          "push_lg"     => false,
          "push_md"     => false,
          "push_sm"     => false,
          "push_xs"     => false,
          "hide_lg"     => false,
          "hide_md"     => false,
          "hide_sm"     => false,
          "hide_xs"     => false,
          "xclass"      => false,
          "data"        => false
        ), $atts );

        $class  = '';
        $class .= ( $atts['lg'] )			                                ? ' col-lg-' . $atts['lg'] : '';
        $class .= ( $atts['md'] )                                           ? ' col-md-' . $atts['md'] : '';
        $class .= ( $atts['sm'] )                                           ? ' col-sm-' . $atts['sm'] : '';
        $class .= ( $atts['xs'] )                                           ? ' col-xs-' . $atts['xs'] : '';
        $class .= ( $atts['offset_lg'] || $atts['offset_lg'] === "0" )      ? ' col-lg-offset-' . $atts['offset_lg'] : '';
        $class .= ( $atts['offset_md'] || $atts['offset_md'] === "0" )      ? ' col-md-offset-' . $atts['offset_md'] : '';
        $class .= ( $atts['offset_sm'] || $atts['offset_sm'] === "0" )      ? ' col-sm-offset-' . $atts['offset_sm'] : '';
        $class .= ( $atts['offset_xs'] || $atts['offset_xs'] === "0" )      ? ' col-xs-offset-' . $atts['offset_xs'] : '';
        $class .= ( $atts['pull_lg']   || $atts['pull_lg'] === "0" )        ? ' col-lg-pull-' . $atts['pull_lg'] : '';
        $class .= ( $atts['pull_md']   || $atts['pull_md'] === "0" )        ? ' col-md-pull-' . $atts['pull_md'] : '';
        $class .= ( $atts['pull_sm']   || $atts['pull_sm'] === "0" )        ? ' col-sm-pull-' . $atts['pull_sm'] : '';
        $class .= ( $atts['pull_xs']   || $atts['pull_xs'] === "0" )        ? ' col-xs-pull-' . $atts['pull_xs'] : '';
        $class .= ( $atts['push_lg']   || $atts['push_lg'] === "0" )        ? ' col-lg-push-' . $atts['push_lg'] : '';
        $class .= ( $atts['push_md']   || $atts['push_md'] === "0" )        ? ' col-md-push-' . $atts['push_md'] : '';
        $class .= ( $atts['push_sm']   || $atts['push_sm'] === "0" )        ? ' col-sm-push-' . $atts['push_sm'] : '';
        $class .= ( $atts['push_xs']   || $atts['push_xs'] === "0" )        ? ' col-xs-push-' . $atts['push_xs'] : '';
        $class .= ( $atts['hide_lg'] )			                            ? ' hidden-lg' : '';
        $class .= ( $atts['hide_md'] )                                      ? ' hidden-md' : '';
        $class .= ( $atts['hide_sm'] )                                      ? ' hidden-sm' : '';
        $class .= ( $atts['hide_xs'] )                                      ? ' hidden-xs' : '';
        $class .= ( $atts['xclass'] )                                       ? ' ' . $atts['xclass'] : '';

        $data_props = $this->parse_data_attributes( $atts['data'] );

        return sprintf(
          '<div class="%s"%s>%s</div>',
          esc_attr( $class ),
          ( $data_props ) ? ' ' . $data_props : '',
          do_shortcode( $content )
        );
    }

	/*
     * mediplus_bs_clearfix
     */
    function mediplus_bs_clearfix( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			"xclass" => false,
			"data" 	 => false
		), $atts );

		$class  = 'clearfix mediplus';
		$class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

		$data_props = $this->parse_data_attributes( $atts['data'] );

		return sprintf(
		  '<div class="%s"%s>%s</div>',
		  esc_attr( $class ),
		  ( $data_props ) ? ' ' . $data_props : '',
		  do_shortcode( $content )
		);
	}

	/*
     * mediplus_bs_divider
     */
    function mediplus_bs_divider( $atts, $content = null ) {

		$atts = shortcode_atts( array(
			"xclass" => false,
			"data" 	 => false
		), $atts );

		$class  = 'divider mediplus';
		$class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

		$data_props = $this->parse_data_attributes( $atts['data'] );

		return sprintf(
		  '<li class="%s"%s>%s</li>',
		  esc_attr( $class ),
		  ( $data_props ) ? ' ' . $data_props : '',
		  do_shortcode( $content )
		);
	}

	/*
     * mediplus_bs_image
     */
    function mediplus_bs_image( $atts, $content = null ) {

		$atts = shortcode_atts( array(
		  "type"       => false,
		  "src"        => false,
		  "responsive" => true,
		  "xclass"     => false,
		  "data"       => false
		), $atts );

		$class  = ( $atts['type'] )       ? 'img-' . $atts['type'] . ' ' : '';
		$class .= ( $atts['responsive']   == 'true' ) ? ' img-responsive' : '';
		$class .= ( $atts['xclass'] )     ? ' ' . $atts['xclass'] : '';

		return sprintf(
		  '<img src="%s" class="%s"%s>',
          ( $atts['src'] ) ? $atts['src'] : '',
		  esc_attr( $class ),
		  ( $data_props ) ? ' ' . $data_props : ''
		);
	}

	/*
     * mediplus_bs_li
     */
    function mediplus_bs_li( $atts, $content = null ) {

		$atts = shortcode_atts( array(
		  "xclass" => false,
		  "data"   => false
		), $atts );

		$class = ( $atts['xclass'] ) ? ' class="' . $atts['xclass'] . '"' : '';

		$data_props = $this->parse_data_attributes( $atts['data'] );

		return sprintf(
		  '<li%s%s>%s</li>',
		  $class,
		  ( $data_props ) ? ' ' . $data_props : '',
		  do_shortcode( $content )
		);
	}

	/*
     * mediplus_bs_list
     */
    function mediplus_bs_list( $atts, $content = null ) {

		$atts = shortcode_atts( array(
		  "type"   => false,
		  "xclass" => false,
		  "data"   => false
		), $atts );

		$class  = 'mediplus ';
		$class .= ( $atts['type'] ) ? $atts['type'] . '-list' : 'default-list';
		$class .= ( $atts['xclass'] ) ? ' ' . $atts['xclass'] : '';

		$data_props = $this->parse_data_attributes( $atts['data'] );

		return sprintf(
		  '<%1$s class="%2$s"%3$s>%4$s</%1$s>',
		  ( $atts['type'] == 'number' ) ? 'ol' : 'ul',
		  esc_attr( $class ),
		  ( $data_props ) ? ' ' . $data_props : '',
		  do_shortcode( $content )
		);
	}

	/*
     * mediplus_bs_slides
     */
	function mediplus_bs_slides( $atts, $content = null ) {

		if( isset( $GLOBALS['slides_count'] ) )
		  $GLOBALS['slides_count']++;
		else
		  $GLOBALS['slides_count'] = 0;

		$GLOBALS['slides_default_count'] = 0;

		$atts = shortcode_atts( array(
		  "bullets"  => false,
		  "interval" => false,
		  "pause"    => false,
		  "wrap"     => false,
		  "xclass"   => false,
		  "data"     => false,
		), $atts );

		$div_class  = 'carousel mediplus slide';
		$div_class .= ( $atts['xclass'] ) ? ' ' . $atts['xclass'] : '';

		$inner_class = 'carousel-inner';

		$id = 'custom-carousel-'. $GLOBALS['slides_count'];

		$data_props = $this->parse_data_attributes( $atts['data'] );

		$atts_map = $this->attribute_map( $content );

		// Extract the slide titles for use in the carousel widget.
		if ( $atts_map ) {
		  $GLOBALS['slides_default_active'] = true;
		  foreach( $atts_map as $check ) {
			if( !empty($check["slide"]["active"]) ) {
			  $GLOBALS['slides_default_active'] = false;
			}
		  }
		  $indicators = array();
		  if ( $atts['bullets'] ) {
			  $i = 0;
			  foreach( $atts_map as $slide ) {
				$indicators[] = sprintf(
				  '<li class="%s" data-target="%s" data-slide-to="%s"></li>',
				  ( !empty($slide["slide"]["active"]) || ($GLOBALS['slides_default_active'] && $i == 0) ) ? 'active' : '',
				  esc_attr( '#' . $id ),
				  esc_attr( $i )
				);
				$i++;
			  }
		  }
		}

		return sprintf(
		  '<div class="%s" id="%s" data-ride="carousel"%s%s%s%s>%s<div class="%s" role="listbox">%s</div>%s</div>',
		  esc_attr( $div_class ),
		  esc_attr( $id ),
		  ( $atts['interval'] )   ? sprintf( ' data-interval="%d"', $atts['interval'] ) : '',
		  ( $atts['pause'] )      ? sprintf( ' data-pause="%s"', esc_attr( $atts['pause'] ) ) : '',
		  ( $atts['wrap'] == 'true' )       ? sprintf( ' data-wrap="%s"', esc_attr( $atts['wrap'] ) ) : '',
		  ( $data_props ) ? ' ' . $data_props : '',
		  ( $atts['bullets'] ) ? '<ol class="carousel-indicators">' . implode( $indicators ) . '</ol>' : '',
		  esc_attr( $inner_class ),
		  do_shortcode( $content ),
		  '<p class="rem"><a class="left carousel-control" role="button" href="' . esc_url( '#' . $id ) . '" data-slide="prev"><span class="fa fa-chevron-left fa-lg"></span></a><a class="right carousel-control" role="button" href="' . esc_url( '#' . $id ) . '" data-slide="next"><span class="fa fa-chevron-right fa-lg"></span></a></p>'
		);
	}

	/*
     * mediplus_bs_slide
     */
	function mediplus_bs_slide( $atts, $content = null ) {

		$atts = shortcode_atts( array(
		  "active"  => false,
		  "title"   => false,
		  "caption" => false,
		  "image"   => false,
		  "xclass"  => false,
		  "data"    => false
		), $atts );

		if( $GLOBALS['slides_default_active'] && $GLOBALS['slides_default_count'] == 0 ) {
			$atts['active'] = true;
		}
		$GLOBALS['slides_default_count']++;

		$class  = 'item';
		$class .= ( $atts['active'] ) ? ' active' : '';
		$class .= ( $atts['xclass'] ) ? ' ' . $atts['xclass'] : '';

        $caption = '';
        if( $atts['caption'] || $atts['title'] ){
            $caption .= '<div class="carousel-caption">';
            if($atts['title']) $caption .= '<h3>'.esc_html( $atts['title'] ).'</h3>';
            if($atts['caption']) $caption .= '<p>'.esc_html( $atts['caption'] ).'</p>';
            $caption .= '</div>';
        }

		$data_props = $this->parse_data_attributes( $atts['data'] );

		//$content = preg_replace('/class=".*?"/', '', $content);

		if( $atts['image'] ){
			$content = '<img src="'.$atts['image'].'" alt="" class="img-responsive">';
		}

		return sprintf(
		  '<div class="%s"%s>%s%s</div>',
		  esc_attr( $class ),
		  ( $data_props ) ? ' ' . $data_props : '',
		  $content,
		  $caption
		);
	}

	/*
     * mediplus_bs_thumbnail
     */
    function mediplus_bs_thumbnail( $atts, $content = null ) {

		$atts = shortcode_atts( array(
		  "xclass"    => false,
          "link"      => false,
          "target"    => false,
		  "src"       => false,
		  "alt"       => false,
		  "data"      => false
		), $atts );

		$class  = 'thumbnail mediplus';
		$class .= ($atts['xclass']) ? ' ' . $atts['xclass'] : '';

        if($atts['link']) {
            $alink  = '<a ';
            $alink .= ($atts['link']) ? ' href="' . esc_url($atts['link']) . '"' : '';
            $alink .= ($atts['alt']) ? ' title="' . esc_html($atts['alt']) . '"' : '';
            $alink .= ($atts['target']) ? ' target="' . $atts['target'] . '"' : '';
            $alink .= '>';
        }

		if($atts['src']) {
		  $img  = '<img src="'.$atts['src'].'"';
          $img .= ($atts['alt']) ? ' alt="' . esc_html($atts['alt']) . '"' : '';
          $img .= '>';
		}

        $data_props = $this->parse_data_attributes( $atts['data'] );

		return sprintf(
		  '<div class="%s"%s>%s%s%s</div>',
		  esc_attr( $class ),
		  ( $data_props ) ? ' ' . $data_props : '',
		  ( $atts['link'] ) ? $alink : '',
          ( $atts['src'] ) ? $img : '',
          ( $atts['link'] ) ? '</a>' : ''
		);
	}

    /*
     * mediplus_bs_tabs
     */
    function mediplus_bs_tabs( $atts, $content = null ) {

        if( isset( $GLOBALS['tabs_count'] ) )
          $GLOBALS['tabs_count']++;
        else
          $GLOBALS['tabs_count'] = 0;

        $GLOBALS['tabs_default_count'] = 0;

        $atts = shortcode_atts( array(
          "type"   => false,
          "xclass" => false,
          "data"   => false
        ), $atts );

        $ul_class  = 'nav mediplus';
        $ul_class .= ( $atts['type'] )     ? ' nav-' . $atts['type'] : ' nav-tabs';
        $ul_class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

        $div_class = 'tab-content';

        $id = 'custom-tabs-'. $GLOBALS['tabs_count'];

        $data_props = $this->parse_data_attributes( $atts['data'] );

        $atts_map = $this->attribute_map( $content );

        // Extract the tab titles for use in the tab widget.
        if ( $atts_map ) {
          $tabs = array();
          $GLOBALS['tabs_default_active'] = true;
          foreach( $atts_map as $check ) {
              if( !empty($check["tab"]["active"]) ) {
                  $GLOBALS['tabs_default_active'] = false;
              }
          }
          $i = 0;
          foreach( $atts_map as $tab ) {

            $class  ='';
            $class .= ( !empty($tab["tab"]["active"]) || ($GLOBALS['tabs_default_active'] && $i == 0) ) ? 'active' : '';
            $class .= ( !empty($tab["tab"]["xclass"]) ) ? ' ' . $tab["tab"]["xclass"] : '';

            $tabs[] = sprintf(
              '<li%s><a href="#%s" data-toggle="tab">%s</a></li>',
              ( !empty($class) ) ? ' class="' . $class . '"' : '',
              'custom-tab-' . $GLOBALS['tabs_count'] . '-' . md5($tab["tab"]["title"]),
              $tab["tab"]["title"]
            );
            $i++;
          }
        }
        return sprintf(
          '<ul class="%s" id="%s"%s>%s</ul><div class="%s">%s</div>',
          esc_attr( $ul_class ),
          esc_attr( $id ),
          ( $data_props ) ? ' ' . $data_props : '',
          ( $tabs )  ? implode( $tabs ) : '',
          esc_attr( $div_class ),
          do_shortcode( $content )
        );
    }

    /*
     * mediplus_bs_tab
     */
    function mediplus_bs_tab( $atts, $content = null ) {

        $atts = shortcode_atts( array(
          'title'   => false,
          'active'  => false,
          'fade'    => false,
          'xclass'  => false,
          'data'    => false
        ), $atts );

        if( $GLOBALS['tabs_default_active'] && $GLOBALS['tabs_default_count'] == 0 ) {
            $atts['active'] = true;
        }
        $GLOBALS['tabs_default_count']++;

        $class  = 'tab-pane mediplus';
        $class .= ( $atts['fade']   == 'true' )                            ? ' fade' : '';
        $class .= ( $atts['active'] == 'true' )                            ? ' active' : '';
        $class .= ( $atts['active'] == 'true' && $atts['fade'] == 'true' ) ? ' in' : '';
        $class .= ( $atts['xclass'] )                                      ? ' ' . $atts['xclass'] : '';


        $id = 'custom-tab-'. $GLOBALS['tabs_count'] . '-'. md5( $atts['title'] );

        $data_props = $this->parse_data_attributes( $atts['data'] );

        return sprintf(
          '<div id="%s" class="%s"%s>%s</div>',
          esc_attr( $id ),
          esc_attr( $class ),
          ( $data_props ) ? ' ' . $data_props : '',
          do_shortcode( $content )
        );

    }

    /*
     * mediplus_bs_title
     */
    function mediplus_bs_title( $atts, $content = null ) {

        $atts = shortcode_atts( array(
          "size"   => false,
          "xclass" => false,
          "data"   => false
        ), $atts );

        $class  = 'font-title mediplus';
        $class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

        $data_props = $this->parse_data_attributes( $atts['data'] );

        return sprintf(
          '<h%s class="%s"%s>%s</h%s>',
          ( $atts['size'] ) ? $atts['size'] : '3',
          esc_attr( $class ),
          ( $data_props ) ? ' ' . $data_props : '',
          do_shortcode( $content ),
          ( $atts['size'] ) ? $atts['size'] : '3'
        );
    }

    /*
     * mediplus_bs_toggles
     */
    function mediplus_bs_toggles( $atts, $content = null ) {

        if( isset($GLOBALS['toggles_count']) )
          $GLOBALS['toggles_count']++;
        else
          $GLOBALS['toggles_count'] = 0;

        $atts = shortcode_atts( array(
          "xclass" => false,
          "data"   => false
        ), $atts );

        $class = 'panel-group mediplus';
        $class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

        $id = 'custom-collapse-'. $GLOBALS['toggles_count'];

        $data_props = $this->parse_data_attributes( $atts['data'] );

        return sprintf(
          '<div class="%s" id="%s" role="tablist" aria-multiselectable="true"%s>%s</div>',
          esc_attr( $class ),
          esc_attr( $id ),
          ( $data_props ) ? ' ' . $data_props : '',
          do_shortcode( $content )
        );

    }

    /*
     * mediplus_bs_toggle
     */
    function mediplus_bs_toggle( $atts, $content = null ) {

        $atts = shortcode_atts( array(
          "title"   => false,
          "type"    => false,
          "active"  => false,
          "xclass"  => false,
          "data"    => false
        ), $atts );

        $panel_class = 'panel mediplus';
        $panel_class .= ( $atts['type'] )     ? ' panel-' . $atts['type'] : ' panel-default';
        $panel_class .= ( $atts['xclass'] )   ? ' ' . $atts['xclass'] : '';

        $collapse_class = 'panel-collapse';
        $collapse_class .= ( $atts['active'] == 'true' )  ? ' in' : ' collapse';

        $a_class = '';
        $a_class .= ( $atts['active'] == 'true' )  ? '' : 'collapsed';

        $parent = 'custom-collapse-'. $GLOBALS['toggles_count'];
        $current_collapse = $parent . '-'. md5( $atts['title'] );

        $data_props = $this->parse_data_attributes( $atts['data'] );

        return sprintf(
          '<div class="%1$s"%2$s>
            <div class="panel-heading" role="tab">
              <h4 class="panel-title">
                <a role="button" class="%3$s" data-toggle="collapse" data-parent="#%4$s" href="#%5$s" aria-expanded="true" aria-controls="%5$s">%6$s</a>
              </h4></div>
            <div role="tabpanel" id="%5$s" class="%7$s">
              <div class="panel-body">%8$s</div></div></div>',
          esc_attr( $panel_class ),
          ( $data_props ) ? ' ' . $data_props : '',
          $a_class,
          $parent,
          $current_collapse,
          $atts['title'],
          esc_attr( $collapse_class ),
          do_shortcode( $content )
        );
    }

	/*--------------------------------------------------------------------------------------
	*
	* Parse data-attributes for shortcodes
	*
	*-------------------------------------------------------------------------------------*/
	function parse_data_attributes( $data ) {

		$data_props = '';

		if( $data ) {
			$data = explode( '|', $data );

			foreach( $data as $d ) {
				$d = explode( ',', $d );
				$data_props .= sprintf( 'data-%s="%s" ', esc_html( $d[0] ), esc_attr( trim( $d[1] ) ) );
			}
		} else {
			$data_props = false;
		}
		return $data_props;
	}

	/*--------------------------------------------------------------------------------------
	*
	* get DOMDocument element and apply shortcode parameters to it. Create the element also
	*
	*-------------------------------------------------------------------------------------*/
	private function get_dom_element( $tag, $content, $class, $title = '', $data = null ) {

		//clean up content
		$content = trim(trim($content), chr(0xC2).chr(0xA0));
		$previous_value = libxml_use_internal_errors(TRUE);

		$dom = new DOMDocument;
		$dom->loadXML(utf8_encode($content));

		libxml_clear_errors();
		libxml_use_internal_errors($previous_value);

		if(!$dom->documentElement) {
			$element = $dom->createElement($tag, utf8_encode($content));
			$dom->appendChild($element);
		}

		$dom->documentElement->setAttribute('class', $dom->documentElement->getAttribute('class') . ' ' . esc_attr( utf8_encode($class) ));

		if( $title ) {
			$dom->documentElement->setAttribute('title', utf8_encode($title) );
		}
		if( $data ) {
			$data = explode( '|', $data );
			foreach( $data as $d ):
				$d = explode(',',$d);
				$dom->documentElement->setAttribute('data-'.utf8_encode($d[0]),trim(utf8_encode($d[1])));
			endforeach;
		}
		return $dom->saveXML($dom->documentElement);
	}

	/*--------------------------------------------------------------------------------------
	*
	* Scrape the shortcode's contents for a particular DOMDocument tag or tags,
	* pull them out, apply attributes, and return just the tags.
	*
	*-------------------------------------------------------------------------------------*/
	private function scrape_dom_element( $tag, $content, $class, $title = '', $data = null ) {

		$previous_value = libxml_use_internal_errors(TRUE);

		$dom = new DOMDocument;
		$dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));

		libxml_clear_errors();
		libxml_use_internal_errors($previous_value);
		foreach ($tag as $find) {
			$tags = $dom->getElementsByTagName($find);
			foreach ($tags as $find_tag) {
				$outputdom = new DOMDocument;
				$new_root = $outputdom->importNode($find_tag, true);
				$outputdom->appendChild($new_root);

				if(is_object($outputdom->documentElement)) {
					$outputdom->documentElement->setAttribute('class', $outputdom->documentElement->getAttribute('class') . ' ' . esc_attr( $class ));
					if( $title ) {
						$outputdom->documentElement->setAttribute('title', $title );
					}
					if( $data ) {
						$data = explode( '|', $data );
						foreach( $data as $d ):
							$d = explode(',',$d);
							$outputdom->documentElement->setAttribute('data-'.$d[0],trim($d[1]));
						endforeach;
					}
				}
				return $outputdom->saveHTML($outputdom->documentElement);
			}
		}
	}

	/*--------------------------------------------------------------------------------------
	*
	* Find if content contains a particular tag, if not, create it, either way wrap it
	* Example: Check if the contents of [page-header] include an h1, if not, add one,
	* then wrap it all in a div so we can add classes to that.
	*
	*-------------------------------------------------------------------------------------*/
	function nest_dom_element($find, $append, $content) {

		$previous_value = libxml_use_internal_errors(TRUE);

		$dom = new DOMDocument;
		$dom->loadXML(utf8_encode($content));

		libxml_clear_errors();
		libxml_use_internal_errors($previous_value);

		//Does $content include the tag we're looking for?
		$hasFind = $dom->getElementsByTagName($find);

		//If not, add it and wrap it all in our append tag
		if( $hasFind->length == 0 ) {
			$wrapper = $dom->createElement($append);
			$dom->appendChild($wrapper);

			$tag = $dom->createElement($find, $content);
			$wrapper->appendChild($tag);
		} else { //If so, just wrap everything in our append tag
			$new_root = $dom->createElement($append);
			$new_root->appendChild($dom->documentElement);
			$dom->appendChild($new_root);
		}
		return $dom->saveXML($dom->documentElement);
	}

	/**
	 * Add dividers to data attributes content if needed
	 */
	private function check_for_data( $data ) {
		if( $data )
			return "|";
	}
    /**
     * Remove wpautop
     */
    private function strip_paragraph( $content ) {
  //       $content = str_ireplace( '<p>','',$content );
  //       $content = str_ireplace( '</p>','',$content );
  //       $content = str_ireplace( '<br>','',$content );
		// $content = htmlentities( $content, ENT_IGNORE, 'UTF-8', false );
        return $content;
    }

    private function attribute_map($str, $att = null) {
        $res = array();
        $return = array();
        $reg = get_shortcode_regex();
        preg_match_all('~'.$reg.'~',$str, $matches);
        foreach($matches[2] as $key => $name) {
            $parsed = shortcode_parse_atts($matches[3][$key]);
            $parsed = is_array($parsed) ? $parsed : array();

                $res[$name] = $parsed;
                $return[] = $res;
            }
        return $return;
    }

	/**
	 * CleanUp DOM Document element
	 */
	function cleanup_domdocument($content) {
		$content = preg_replace('#(( ){0,}<br( {0,})(/{0,1})>){1,}$#i', '', $content);
		return $content;
	}

} //end Class

/*--------------------------------------------------------------------------------------
*
* add_shortcodes button as TinyMCE Plugin
*
*-------------------------------------------------------------------------------------*/
add_action('admin_head', 'mediplus_shortcode_buttons');

function mediplus_shortcode_buttons(){
    global $typenow;
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') )
        return;

    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return;

    if (get_user_option('rich_editing') == 'true') {
        add_filter( 'mce_external_plugins', 'mediplus_mce_buttons' );
        add_filter( 'mce_buttons', 'mediplus_add_buttons' ); //1375.261
    }
}
/*
 * hook the new plugin to TinyMCE and all dependencies
 */
function mediplus_mce_buttons( $plugin_array ){
    wp_enqueue_script('jquery');
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_script('jquery-ui-slider');
    $plugin_array['mediplus_sc_button'] = MEDIPLUS_THEME_JS . 'editor/editor.plugin.js';
    $elements = new MediPlus_BoostrapShortcodes();
    foreach( $elements->button_shortcodes() as $element => $value ){
        $plugin_array['mediplus_sc_button_' . $element] = MEDIPLUS_THEME_JS . 'editor/' . $element . '_plugin.js';
    }
    return $plugin_array;
}
/*
 * Hook is used to tell the TinyMCE editor which buttons in our plugin we want to show
 */
function mediplus_add_buttons( $buttons ){
    array_push($buttons, "mediplus_sc_button");
    return $buttons;
}
new MediPlus_BoostrapShortcodes();
