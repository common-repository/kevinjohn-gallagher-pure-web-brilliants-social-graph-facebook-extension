<?php
/*
	Plugin Name: 			Kevinjohn Gallagher: Pure Web Brilliant's Social Graph Facebook Extention
	Description: 			Adds Facebook specific Open Graph meta tags to your WordPress header
	Version: 				0.8
	Author: 				Kevinjohn Gallagher
	Author URI: 			http://kevinjohngallagher.com/
	
	Contributors:			kevinjohngallagher, purewebbrilliant 
	Donate link:			http://kevinjohngallagher.com/
	Tags: 					kevinjohn gallagher, pure web brilliant, framework, cms, facebook, opengraph, open graph, social, social media, app, page
	Requires at least:		3.0
	Tested up to: 			3.4
	Stable tag: 			0.8
*/
/**
 *
 *	Kevinjohn Gallagher: Pure Web Brilliant's Social Graph Facebook Extention
 * ==========================================================
 *
 *	Adds Facebook data to the Pure Web Brilliant's Social Graph control
 *
 *
 *	This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 *	General Public License as published by the Free Software Foundation; either version 3 of the License, 
 *	or (at your option) any later version.
 *
 * 	This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; 
 *	without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 *	See the GNU General Public License (http://www.gnu.org/licenses/gpl-3.0.txt) for more details.
 *
 *	You should have received a copy of the GNU General Public License along with this program.  
 * 	If not, see http://www.gnu.org/licenses/ or http://www.gnu.org/licenses/gpl-3.0.txt
 *
 *
 *	Copyright (C) 2008-2012 Kevinjohn Gallagher / http://www.kevinjohngallagher.com
 *
 *
 *	@package				Pure Web Brilliant
 *	@version 				0.8
 *	@author 				Kevinjohn Gallagher <wordpress@kevinjohngallagher.com>
 *	@copyright 				Copyright (c) 2012, Kevinjohn Gallagher
 *	@link 					http://kevinjohngallagher.com
 *	@license 				http://www.gnu.org/licenses/gpl-3.0.txt
 *
 *
 */


 	if ( ! defined( 'ABSPATH' ) )
 	{ 
 			die( 'Direct access not permitted.' ); 
 	}
 	
 	
 	

	define( '_kevinjohn_gallagher___social_graph_facebook_extention', '0.8' );



	if (class_exists('kevinjohn_gallagher')) 
	{
		
		
		class	kevinjohn_gallagher___social_graph_facebook_extention 
		extends kevinjohn_gallagher
		{
		
				/*
				**
				**		VARIABLES
				**
				*/
				const PM		=	'_kevinjohn_gallagher___social_graph_facebook_extention';
				
				var					$instance;
				var 				$plugin_name;
				var					$uniqueID;
				var					$plugin_dir;
				var					$plugin_url;
				var					$plugin_page_title; 
				var					$plugin_menu_title; 					
				var 				$plugin_slug;
				var 				$http_or_https;
				var 				$plugin_options;
				
				var 				$meta_array;
				var 				$post_type;

				

		
				/*
				**
				**		CONSTRUCT
				**
				*/
				public	function	__construct() 
				{
						$this->instance 								=	&$this;
						$this->plugin_dir								=	plugin_dir_path(__FILE__);	
						$this->plugin_url								=	plugin_dir_url(__FILE__);							
						$this->plugin_name								=	"Kevinjohn Gallagher: Pure Web Brilliant's Social Graph Facebook extention";
						
						
						add_action( 'init',									array( $this, 'init' ) );
						add_action( 'init',									array( $this, 'init_child' ) );
												
				}
				

				
				
				
				/*
				**
				**		INIT_CHILD
				**
				*/
			
				public function init_child() 
				{
					
						add_filter( 	'kjg_pwb_hook_child_settings_sections__kevinjohn_gallagher___social_graph_control', 
										array(	
												$this, 
												'hook_into___kjg_pwb_hook_child_settings_sections__kevinjohn_gallagher___social_graph_control'
											), 	
										100, 	
										1
									);


						add_filter( 	'kjg_pwb_hook_child_settings_array__kevinjohn_gallagher___social_graph_control', 
										array(	
												$this, 
												'hook_into___kjg_pwb_hook_child_settings_array__kevinjohn_gallagher___social_graph_control'
											), 	
										100, 	
										1
									);



						add_filter( 	'kjg_pwb_hook_social_graph_data_get___kevinjohn_gallagher___social_graph_control', 
										array(	
												$this, 
												'hook_into___kjg_pwb_hook_social_graph_data_get___kevinjohn_gallagher___social_graph_control'
											), 	
										100, 	
										2
									);					


						add_filter( 	'kjg_pwb_hook_social_graph_data_set___kevinjohn_gallagher___social_graph_control', 
										array(	
												$this, 
												'hook_into___kjg_pwb_hook_social_graph_data_set___kevinjohn_gallagher___social_graph_control'
											), 	
										100, 	
										2
									);	
									
						add_filter(		'user_contactmethods',						array( 	&$this, 	'modernise_contacts'), 				100, 	1);


				}
				
				

				public 	function 	hook_into___kjg_pwb_hook_child_settings_sections__kevinjohn_gallagher___social_graph_control($args)
				{
				
						$this->child_settings_sections['section_fb']					= ' Facebook: ';
						
						$args 															= 	array_merge($args, $this->child_settings_sections);
						
						return $args;
					
				}

						
										


				public 	function 	hook_into___kjg_pwb_hook_child_settings_array__kevinjohn_gallagher___social_graph_control($args)
				{

						$this->child_settings_array['facebook_app_id'] 	= array(
																				'id'      		=> 'facebook_app_id',
																				'title'   		=> 'Facebook App ID:',
																				'description'	=> '',
																				'type'    		=> 'text',
																				'section' 		=> 'section_fb',
																				'choices' 		=> array(																	
																									),
																				'class'   		=> ''
																			);



						$this->child_settings_array['facebook_page_id'] 	= array(
																				'id'      		=> 'facebook_page_id',
																				'title'   		=> 'Facebook Page ID:',
																				'description'	=> '',
																				'type'    		=> 'text',
																				'section' 		=> 'section_fb',
																				'choices' 		=> array(																	
																									),
																				'class'   		=> ''
																			);



						$this->child_settings_array['facebook_admin_id'] 	= array(
																				'id'      		=> 'facebook_admin_id',
																				'title'   		=> 'Facebook Admin ID:',
																				'description'	=> ' Separate multiple admin ID\'s with comma\'s.',
																				'type'    		=> 'text',
																				'section' 		=> 'section_fb',
																				'choices' 		=> array(																	
																									),
																				'class'   		=> ''
																			);
																	
						
						$args 		= 	array_merge($args, $this->child_settings_array);
						
						
						return $args;
					
				}
				
				
				

				
				


				
				
				
				

				
				/**
				 *		Adds the Open Graph Schema to the Language attributes.
				 *		 
				 * 		@args  		array 		passed args by WP function
				 * 		@return		array
				 */
				public 	function 	modernise_contacts($contact_option)
				{

						if ( !isset( $contact_option['facebook'] ) )
						{
									$contact_option['facebook'] 			=	'facebook';
						}	
						
					
						return 		$contact_option;
				}





				


				/**
				 *		
				 *		 
				 * 		
				 * 		
				 */
				 				
				public 		function  	define_page_facebook( $post , $parent )
				{
					
						if ( !empty( $parent->plugin_options['facebook_app_id'] ) )
						{
								if (is_numeric (trim($parent->plugin_options['facebook_app_id']))) 
								{
										$parent->fb_app_id		=		esc_attr(  trim( $this->plugin_options['facebook_app_id'] ) );
								}
						}

						//
						//		Facebook depreciated this on 1 April 2012.
						//
						if ( !empty( $parent->plugin_options['facebook_page_id'] ) )
						{
								if (is_numeric (trim($parent->plugin_options['facebook_page_id']))) 
								{
										$parent->fb_page_id		=		esc_attr(  trim( $parent->plugin_options['facebook_page_id'] ) );
								}							
						}

						if ( !empty( $parent->plugin_options['facebook_admin_id'] ) )
						{
								$fb_admin_array = explode( "," , trim( $parent->plugin_options['facebook_admin_id'] ));
								
								foreach($fb_admin_array as $value)
								{
										if (is_numeric ( $value ) ) 
										{
												$parent->fb_admins[] 		=		esc_attr(  trim( $value ) );
										}								
								}
						}					
					
				}				









				/**
				 *		
				 *		 
				 * 		
				 * 		
				 */
				 
				public 		function 	set_page_facebook( $post , $parent )
				{		
						$parent->add_meta_data_full('fb:app_id',				 	$parent->fb_app_id );
						$parent->add_meta_data_full('fb:page_id',				 	$parent->fb_page_id );
						
						foreach($parent->fb_admins as $value)
						{
						
								$parent->add_meta_data_full('fb:admins',			$value );
								
						}						
					
				}


				
				
				
				/**
				 *		Adds Open graph data to the HEAD.
				 *		 
				 * 		@param  	string $image_html
				 * 		@return		string
				 */
				public	function	hook_into__kjg_pwb_social_graph_data( $parent, $post, $class  )
				{
						
						
						
						
				}
				
				
				
				public 	function 	hook_into___kjg_pwb_hook_social_graph_data_get___kevinjohn_gallagher___social_graph_control( $parent, $post )
				{
					
						$this->define_page_facebook( $post , $parent );
				}



				public 	function 	hook_into___kjg_pwb_hook_social_graph_data_set___kevinjohn_gallagher___social_graph_control( $parent, $post )
				{
					
						$this->set_page_facebook( $post , $parent );
						
				}



				
		
		}	//	class
		
	
		$kevinjohn_gallagher___social_graph_facebook_extention			=	new kevinjohn_gallagher___social_graph_facebook_extention();
		
	
	} else {
	

			function kevinjohn_gallagher___social_graph_facebook_extention___parent_needed()
			{
					echo	"<div id='message' class='error'>";
					
					echo	"<p>";
					echo	"<strong>Kevinjohn Gallagher: Social Graph facebook extension</strong> ";	
					echo	"requires the parent framework to be installed and activated";
					echo	"</p>";
			} 

			add_action('admin_footer', 'kevinjohn_gallagher___social_graph_facebook_extention___parent_needed');	
	
	}

