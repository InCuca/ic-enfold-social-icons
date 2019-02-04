<?php
/**
 * Button
 * Displays a button that links to any url of your choice
 */

if ( !class_exists( 'social_media_icons' ) )
{
	class social_media_icons extends aviaShortcodeTemplate
	{
			/**
			 * Create the config array for the shortcode button
			 */
			function shortcode_insert_button()
			{
				$this->config['name']		= __('Social Media Icons', 'avia_framework' );
				$this->config['icon']		= plugin_dir_url(__FILE__) . '../images/ic-template-icon.png';
				$this->config['target']		= 'avia-target-insert';
				$this->config['shortcode'] 	= 'social_media_icons';
				$this->config['tooltip'] 	= __('Creates social media list of icons', 'avia_framework' );
				$this->config['tinyMCE']    = array('tiny_always'=>true);
				$this->config['preview'] 	= true;
			}

			/**
			 * Popup Elements
			 *
			 * If this function is defined in a child class the element automatically turns into a social media icon list
			 *
			 * @return void
			 */
			function popup_elements()
			{
				$this->elements = array();

			}



			/**
			 * Editor Element - this function defines the visual appearance of an element on the AviaBuilder Canvas
			 * Most common usage is to define some markup in the $params['innerHtml'] which is then inserted into the drag and drop container
			 * Less often used: $params['data'] to add data attributes, $params['class'] to modify the className
			 *
			 *
			 * @param array $params this array holds the default values for $content and $args.
			 * @return $params the return array usually holds an innerHtml key that holds item specific markup.
			 */
			function editor_element($params)
			{
				return $params;
			}



			/**
			 * Frontend Shortcode Handler
			 *
			 * @param array $atts array of attributes
			 * @param string $content text within enclosing form of shortcode element
			 * @param string $shortcodename the shortcode found, when == callback name
			 * @return string $output returns the modified html string
			 */
			function shortcode_handler($atts, $content = "", $shortcodename = "", $meta = "")
			{
				$social_args 	= array('outside'=>'ul', 'inside'=>'li', 'append' => '');
			  $icons 			= avia_social_media_icons($social_args, false);

				$output  = "</p><div class='social_media_icons_shortcode'>";
				$output .= $icons . $content;
				$output .= "</div><p>";
				return $output;
			}
	}
}
