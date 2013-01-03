<?php
/*
Plugin Name: Tippy
Plugin URI: http://croberts.me/tippy/
Description: Simple plugin to display tooltips within your WordPress blog.
Version: 3.8.1
Author: Chris Roberts
Author URI: http://croberts.me/
*/

/*  Copyright 2012 Chris Roberts (email : columcille@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// Add to the Admin function list
if (! function_exists('tippy_addoptions')) {
  function tippy_addoptions() {
    if (function_exists('add_options_page')) {
      add_options_page('Tippy Plugin Options', 'Tippy', 9, basename(__FILE__), 'tippy_options_subpanel');
    }
  }
}

if (! function_exists('tippy_options_subpanel')) {
  function tippy_options_subpanel() {
    global $wpdb, $table_prefix;

    if (isset($_POST['info_update'])) {
		update_option('tippy_tipPosition', $_POST['tippy_tipPosition']);
		update_option('tippy_openTip', $_POST['tippy_openTip']);
		update_option('tippy_fadeTip', $_POST['tippy_fadeTip']);
		update_option('tippy_tipPosition', $_POST['tippy_tipPosition']);
		update_option('tippy_tipOffsetX', $_POST['tippy_tipOffsetX']);
		update_option('tippy_tipOffsetY', $_POST['tippy_tipOffsetY']);
		update_option('tippy_linkWindow', $_POST['tippy_linkWindow']);
		update_option('tippy_sticky', $_POST['tippy_sticky']);
		update_option('tippy_showTitle', $_POST['tippy_showTitle']);
		
		if (get_option('tippy_sticky', 'false') == 'true')
		{
			update_option('tippy_showClose', 'true');
		} else {
			update_option('tippy_showClose', $_POST['tippy_showClose']);
		}

		echo '<div class="updated"><p><strong>Your options have been updated.</strong></p></div>';
    }
?>

<style type="text/css">
	div.wrap {
		max-width: 700px;
	}
	
	div.tippyOptionSection {
		margin-bottom: 20px;
		margin-left: 10px;
	}
	
	span.tippyOptionLabel {
		font-size: 16px;
	}
	
	div.tippyOptions {
		margin-left: 15px;
	}
	
	div.tippyOptionLeft {
		width: 125px;
		float: left;
	}
	
	div.tippyOptionRight {
		float: left;
	}
	
	div.clearOptions {
		margin-bottom: 5px;
		clear: both;
	}
</style>

<div class="wrap">
	<h2>Tippy Options</h2>
	<form method="post">

	<div class="tippyOptionSection">
	    Here you can set default options for the tooltip. Note that some of these options will not work right together and may be changed by the plugin.<br /><br />

		<div class="tippyOptions">
        	How should the tooltip be activated?<br />
			<input id="tippy_openTip_hover" name="tippy_openTip"  type="radio" value="hover" <?php if (get_option('tippy_openTip', 'hover') == "hover") echo "checked" ?> />
				<label for="tippy_openTip_hover" title="Tooltip opens when user hovers over the link">
					Tooltip opens when hovering over the Tippy item
				</label><br />

			<input id="tippy_openTip_click" name="tippy_openTip" type="radio" value="click" <?php if (get_option('tippy_openTip', 'hover') == "click") echo "checked" ?> />
				<label for="tippy_openTip_click" title="Tooltip opens when user clicks the link">
					Tooltip opens when clicking the Tippy item
				</label><br /><br />
		</div>

		<div class="tippyOptions">
        	Do you want the tooltip to fade in/out or to show/hide instantly?<br />
			<input id="tippy_fadeTip_fade" name="tippy_fadeTip"  type="radio" value="fade" <?php if (get_option('tippy_fadeTip', 'fade') == "fade") echo "checked" ?> />
				<label for="tippy_fadeTip_fade" title="Tooltip fades in and out">
					Tooltip fades in and out
				</label><br />

			<input id="tippy_fadeTip_instant" name="tippy_fadeTip" type="radio" value="instant" <?php if (get_option('tippy_fadeTip', 'fade') == "instant") echo "checked" ?> />
				<label for="tippy_fadeTip_instant" title="Tooltip displays and disappears immediately, no fade effect">
					Tooltip displays and hides instantly
				</label><br /><br />
		</div>
		
		<div class="tippyOptions">
        	Should the tooltip close automatically when the user mouses away, or be sticky until the user manually closes it or activates another tooltip?<br />
			<input id="tippy_sticky_auto" name="tippy_sticky" type="radio" value="false" <?php if (get_option('tippy_sticky', 'false') == "false") echo "checked" ?> />
				<label for="tippy_sticky_auto" title="Tooltip automatically closes">
					Automatically closes when user mouses away from the link
				</label><br />
			
			<input id="tippy_sticky_stick" name="tippy_sticky"  type="radio" value="true" <?php if (get_option('tippy_sticky', 'false') == "true") echo "checked" ?> />
				<label for="tippy_sticky_stick" title="Tooltip is visible until user closes it">
					Remain sticky until user closes or activates another tooltip
				</label><br /><br />
		</div>
		
		<div class="tippyOptions">
        	Do you want the tooltip to display a Close link? (Useful for mobile browsers; required for sticky tooltips)<br />
			<input id="tippy_showClose_show" name="tippy_showClose" type="radio" value="true" <?php if (get_option('tippy_showClose', 'true') == "true") echo "checked" ?> />
				<label for="tippy_showClose_show" title="Tooltip displays a close link">
					Show close link
				</label><br />
			
			<input id="tippy_showClose_noshow" name="tippy_showClose"  type="radio" value="false" <?php if (get_option('tippy_showClose', 'true') == "false") echo "checked" ?> />
				<label for="tippy_showClose_noshow" title="Tooltip does not display a close link">
					Do not show close link
				</label><br /><br />
		</div>
		
		<div class="tippyOptions">
        	Should Tippy links and Header links open in the same window or a new window?<br />
			<input id="tippy_linkWindow_same" name="tippy_linkWindow" type="radio" value="same" <?php if (get_option('tippy_linkWindow', 'same') == "same") echo "checked" ?> />
				<label for="tippy_linkWindow_same" title="Tippy and Header links open in the same window">
					Open links in the same window
				</label><br />
			
			<input id="tippy_linkWindow_new" name="tippy_linkWindow"  type="radio" value="new" <?php if (get_option('tippy_linkWindow', 'same') == "new") echo "checked" ?> />
				<label for="tippy_linkWindow_new" title="Tippy and Header links open in a new window">
					Open links in a new window
				</label><br /><br />
		</div>
		
		<div class="tippyOptions">
        	Should the tooltip be positioned under the mouse pointer or under the link?<br />
			<input id="tippy_tipPosition_link" name="tippy_tipPosition" type="radio" value="link" <?php if (get_option('tippy_tipPosition', 'link') == "link") echo "checked" ?> />
				<label for="tippy_tipPosition_link" title="Tooltip positioned under the Tippy link">
					Tooltip positioned under the Tippy link
				</label><br />
			
			<input id="tippy_tipPosition_mouse" name="tippy_tipPosition"  type="radio" value="mouse" <?php if (get_option('tippy_tipPosition', 'link') == "mouse") echo "checked" ?> />
				<label for="tippy_tipPosition_mouse" title="Tooltip positioned under the mouse pointer">
					Tooltip positioned under the mouse pointer
				</label><br /><br />
		</div>
		
		<div class="tippyOptions">
        	How many pixels down and to the right should the tooltip be offset? Use negative values to pull it up and/or to the left.<br />
        	If your tooltip is being positioned too far down, set a negative value in the second box below.<br />
			<div style="display: inline-block; width: 260px;">
				<label for="tippy_tipOffsetX" title="How far to the right to move the tooltip">
					How far to the right to move the tooltip:
				</label>
			</div>
			<input id="tippy_tipOffsetX" name="tippy_tipOffsetX" size="3" type="text" value="<?php echo get_option('tippy_tipOffsetX', 0); ?>" />px<br />
			
			<div style="display: inline-block; width: 260px;">
				<label for="tippy_tipOffsetY" title="How far down to move the tooltip">
					How far down to move the tooltip:
				</label>
			</div>
			<input id="tippy_tipOffsetY" name="tippy_tipOffsetY" size="3" type="text" value="<?php echo get_option('tippy_tipOffsetY', 10); ?>" />px<br /><br />
			
		</div>
		
		<div class="tippyOptions">
        	Should Tippy links use the title attribute (may cover part of the tooltip)?<br />
        	<input id="tippy_showTitle" name="tippy_showTitle" size="3" type="checkbox" value="true" <?php if (get_option('tippy_showTitle', 'true') == "true") echo "checked" ?> /> 
				<label for="tippy_showTitle" title="Check to use the title attribute in Tippy links">
					Use title attribute in Tippy links
				</label>
		</div>
	</div>
	
	<input type="submit" name="info_update" value="Update Options" /><br /><br />

	</form>
	
	<span class="tippyOptionLabel">How to use Tippy</span><br />
	<div class="tippyOptionSection">
		Examples:<br />
        [tippy title="example tooltip" href="http://croberts.me/" header="on"]This is my nifty tooltip![/tippy]<br /><br />
        
        You can also specify height and width per-tooltip to provide adjustments as desired. Enter numbers only; size will be set in pixels.<br />
        [tippy title="Specifically sized" height="100" width="450"]This is my specifically sized tooltip.[/tippy]<br /><br />
        
		Be sure and include the title attribute or nothing will happen. You can include html between the tippy tags. The href tag is optional. If set, the tooltip header will link to the href. Header is also optional and controls whether or not the tooltip displays a header.<br /><br />
		Styling is defined in the file dom_tooltip.factory.css. The best way to adjust styling is to copy this file to your theme's directory and edit it there. Tippy will automatically detect dom_tooltip.factory.css located in your theme's folder.
	</div>
</div>

<?php
  }
}

// Receive necessary data and shape it into a Tippy link
if (! function_exists('tippy_formatLink') ) {
	function tippy_formatLink($tippyShowHeader, $tippyTitle, $tippyHref, $tippyText, $tippyCustomClass, $tippyItem, $tippyWidth = 0, $tippyHeight = 0)
	{
		$addHref = "";
		$tippyHeader = "";
		$tippyWindow = "";
		$tippyMouseOut = "";
		$tippyShowTitle = "";
		
		if (get_option('tippy_openTip', 'hover') == "hover")
		{
			$activateTippy = "onmouseover";
			
			$tipRef = trim($tippyHref);
			if (!empty($tipRef))
			{
				$addHref = 'href="'. $tipRef .'" ';
			}
		} else {
			$activateTippy = "onmouseup";
		}

		if ($tippyShowHeader == "on" || $tippyShowHeader == "yes" || $tippyShowHeader == "")
		{
			$tippyHeader = trim($tippyTitle);
		}
		
		if (get_option('tippy_linkWindow', 'same') == "new")
		{
			$tippyWindow = 'target="_blank" ';
		}
		
		if (get_option('tippy_sticky', 'false') == 'false')
		{
			$tippyMouseOut = 'onmouseout="Tippy.fadeTippyOut();"';
		}
		
		if (get_option('tippy_showTitle', 'true') == 'true')
		{
			$tippyShowTitle = 'title="'. $tippyHeader .'" ';
		}
		
		$randomIdentifier = rand(100, 9999);
		$tippyId = 'tippy_tip'. $tippyItem .'_'. $randomIdentifier;

		$tippyLink = sprintf('<a id="%s" %s %s class="%s tippy_link" %s %s="Tippy.loadTip({ text: \'%s\', width: %d, height: %d, id: \'%s\', title: \'%s\', event: event });" %s>%s</a>', $tippyId, $addHref, $tippyWindow, $tippyCustomClass, $tippyShowTitle, $activateTippy, htmlentities($tippyText, ENT_QUOTES, 'UTF-8'), $tippyWidth, $tippyHeight, $tippyId, $tippyHeader, $tippyMouseOut, $tippyTitle);
		
		return $tippyLink;
	}
}

// Pull data out of the shortcode and pass it to format link
if (! function_exists('tippy_shortcode'))
{
	// Keep track of how many tooltips showing
	$tippy_tipCount = 0;
	function tippy_shortcode($tippy_attributes, $tippyText = '')
	{
		global $tippy_tipCount;
		
		extract( shortcode_atts( array(
			'title' => '', 
			'reference' => '', 
			'href' => '', 
			'header' => '', 
			'class' => '', 
			'height' => 0, 
			'width' => 0
		), $tippy_attributes ) );
		
		$tippyTitle = tippy_format_title($title);
		$tippyNewText = tippy_format_text($tippyText);
		
		if (!empty($href))
		{
			$link = $href;
		} else if (!empty($reference)) {
			$link = $reference;
		}
		
		$tippyLink = tippy_formatLink($header, $tippyTitle, $link, $tippyNewText, $class, $tippy_tipCount, $width, $height);
		
		$tippy_tipCount++;
		
		return $tippyLink;
	}
}

if (! function_exists('tippy_format_title'))
{
	function tippy_format_title($tippy_title)
	{
		$tippy_title = str_replace("\\", "\\\\", $tippy_title);
		$tippy_title = str_replace("'", "&#8217;", $tippy_title);
		
		return $tippy_title;
	}
}

if (! function_exists('tippy_format_text'))
{
	function tippy_format_text($tippy_text)
	{
		// Just need to replace a few items so do it manually rather than using a function like htmlentities()
		$tippy_text = str_replace("\n", "", $tippy_text);
		$tippy_text = str_replace("\r", "", $tippy_text);
		$tippy_text = str_replace("'", "&#8217;", $tippy_text);
		$tippy_text = str_replace("\\", "&#92;", $tippy_text);
		$tippy_text = str_replace("(", "&#40;", $tippy_text);
		$tippy_text = str_replace(")", "&#41;", $tippy_text);
		
		return $tippy_text;
	}
}

if (! function_exists('tippy_load_scripts')) {
	function tippy_load_scripts()
	{
		// Load jQuery, if not already present
		wp_enqueue_script('jquery');
		
		// Load the Tippy script
		wp_register_script('Tippy', plugins_url() .'/tippy/dom_tooltip.js', array('jquery'), '3.8.1');
		wp_enqueue_script('Tippy');
	}
}

if (! function_exists('tippy_load_styles')) {
	function tippy_load_styles()
	{
		// Load the Tippy css. Checks for several possibilities with the css file.
		if (file_exists(get_theme_root() .'/dom_tooltip.css'))
		{
			$tippyCSS = get_bloginfo('template_url') .'/dom_tooltip.css';
		} else if (file_exists(get_theme_root() .'/dom_tooltip.factory.css')) {
			$tippyCSS = get_bloginfo('template_url') .'/dom_tooltip.factory.css';
		} else if (file_exists(WP_PLUGIN_DIR .'/tippy/dom_tooltip.css')) {
			$tippyCSS = plugins_url() .'/tippy/dom_tooltip.css';
		} else if (file_exists(WP_PLUGIN_DIR .'/tippy/dom_tooltip.factory.css')) {
			$tippyCSS = plugins_url() .'/tippy/dom_tooltip.factory.css';
		}
		
		wp_register_style('Tippy', $tippyCSS);
		wp_enqueue_style('Tippy');
	}
}

if (! function_exists('tippy_load_settings')) {
	function tippy_load_settings()
	{
		if (get_option('tippy_fadeTip', 'fade') == "fade")
		{
			$tippyFadeRate = 300;
		} else {
			$tippyFadeRate = 0;
		}
		
		echo '
			<script type="text/javascript">
				Tippy.initialize({
					tipPosition: "'. get_option("tippy_tipPosition", "link") .'",
					tipOffsetX: '. get_option("tippy_tipOffsetX", 0) .',
					tipOffsetY: '. get_option("tippy_tipOffsetY", 10) .',
					fadeRate: '. $tippyFadeRate .',
					sticky: '. get_option("tippy_sticky", "false") .',
					showClose: '. get_option("tippy_showClose", "true") .'
				});
			</script>

		';
	}
}

add_action('admin_menu', 'tippy_addoptions');
add_action('wp_print_scripts', 'tippy_load_scripts');
add_action('wp_print_styles', 'tippy_load_styles');
add_action('wp_head', 'tippy_load_settings');

add_shortcode( 'tippy', 'tippy_shortcode' );

?>