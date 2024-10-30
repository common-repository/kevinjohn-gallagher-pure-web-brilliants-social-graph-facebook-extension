=== Pure Web Brilliant's Social Graph Facebook Extension ===
	Contributors:			kevinjohngallagher, purewebbrilliant 
	Donate link:			http://kevinjohngallagher.com/
	Tags: 					kevinjohn gallagher, pure web brilliant, framework, cms, facebook, opengraph, open graph, social, social media, app, page
	Requires at least:		3.0
	Tested up to: 			3.4
	Stable tag: 			0.8



Adds Facebook specific Open Graph meta tags to your WordPress header


== Description ==

Adds the following tags to your header for better connection to facebook...

* fb:admins
* fb:app_id
* fb:page_id


This is an extension for the Pure Web Brilliant: Social Graph control plugin ( http://wordpress.org/extend/plugins/kevinjohn-gallagher-pure-web-brilliants-social-graph-control/ )





== Installation ==

1. Upload `kevinjohn_gallagher___social_graph_output` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress



== Frequently Asked Questions ==

= I am seeing "… requires the parent framework to be installed and activated" =

This program is part of the Pure Web Brilliant family, and requires the parent framework to be installed and activated.
You can find that at: http://wordpress.org/extend/plugins/kevinjohn-gallagher-pure-web-brilliants-base-framework/

= I am seeing "… requires the parent Control ( Pure Web Brilliant: Social Graph control ) to be installed and activated" =

This plugin is an extension for the Pure Web Brilliant: Social Graph control plugin.
It can be found at http://wordpress.org/extend/plugins/kevinjohn-gallagher-pure-web-brilliants-social-graph-control/






== Changelog ==


= 0.8 =

* Updated security check


= 0.75 =

* tidying of __construct
* streamlining of init_child
* Added hook: _child_settings_sections__kevinjohn_gallagher___social_graph_control
* Added hook: _child_settings_array__kevinjohn_gallagher___social_graph_control
* Added hook: _social_graph_data_get___kevinjohn_gallagher___social_graph_control
* Added hook: _social_graph_data_set___kevinjohn_gallagher___social_graph_control
* Added "Facebook" option to user profile
* Fixed a number of $this to $parent options to de-duplicate code.
* Correctly referenced the Parent/Control plug-ins options in get_options(), and not added additional data to the database  
* Setarated GET and SET methods for data storage.
* Added warning that Facebok Page ID has been deprecated by Facebook as of 1st April 2012. I'll keep it in until the end of the year though.



= 0.5 =
* Publish to WP.org repository.
* fb:admins
* fb:app_id
* fb:page_id



== Upgrade Notice ==

= 0.5 =
* Initial upgrade to public / GPL compatible version.



== Arbitrary section ==


**Kevinjohn Gallagher:** [Kevinjohn Gallagher](http://kevinjohngallagher.com/ "Kevinjohn Gallagher .com")

**Agency:** [Pure Web Brilliant](http://purewebbrilliant.com/ "Pure Web Brilliant")

Framework release blog post: [Pure Web Brilliant’s plugin framework released](http://kevinjohngallagher.com/2012/05/pure-web-brilliants-plugin-framework-released/ "Pure Web Brilliant’s plugin framework released")

> " I want to go on record thanking my colleagues and many of our current & past clients, who were (mostly) happy to negotiate changes in the licence of our past work so that we could make it open source. "

* Package:						Pure Web Brilliant
* Version:						2.0.1
* Author:						Kevinjohn Gallagher <framework@KevinjohnGallagher.com>
* Copyright:					Copyright (c) 2012, Kevinjohn Gallagher
* Link:							http://KevinjohnGallagher.com
* Licence:						http://www.gnu.org/licenses/gpl-3.0.txt
