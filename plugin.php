<?php
/*
Plugin Name: CrazyEgg Integrator for WordPress
Plugin URI: http://www.pbwebdev.com.au/blog/crazyegg-integrator-wordpress
Description: <p>This plugin allows for insertion of the CrazyEgg JavaScript into your WordPress website. <br><br>
You will also need a <a href="http://www.crazyegg.com" title="CrazyEgg" target="_blank">CrazyEgg</a> account to integrate with this plugin. <br>
  <br>Please also view the <a href="http://www.pbwebdev.com.au/blog/crazyegg-integrator-wordpress" title="link to documentation" target="_blank">documentation</a> on our document support page.</p>

<p>Created by <a href="http://www.pbwebdev.com.au/" title="link to PB Web Development" target="_blank">PB Web Development</a>, please donate if you like this plug-in</p>

Version: 1.0
Author: Peter Bui
Author URI: http://www.pbwebdev.com.au
Disclaimer: Use at your own risk. No warranty expressed or implied is provided.
*/

/*	Copyright 2008-2010  Peter Bui  (email : peter@pbwebdev.com.au)

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

$crazyegg_options = get_option('crazyegg');

add_action('admin_menu', 'crazyegg_admin_menu');
function crazyegg_admin_menu()
{
    add_options_page('CrazyEgg Integrator', 'CrazyEgg Integrator', 'manage_options', 'crazyegg-integrator/options.php');
}

add_action('wp_footer', 'crazyegg_wp_footer');
function crazyegg_wp_footer()
{
    global $crazyegg_options;
	
	$accountNo = $crazyegg_options['code'];
		
		//Calling the string split function to divide the account number in to two string of length 4
		$accountArray = stringSplit($accountNo,4)	;
		
		echo '
<!-- CrazyEgg Tracking Code by PB Web Development find out more at http://www.pbwebdev.com.au/blog/crazyegg-integrator-wordpress -->
<script type="text/javascript" src="http://dnn506yrbagrg.cloudfront.net/pages/scripts/'.$accountArray[0].'/'.$accountArray[1].'.js"> </script>	
<!-- //End CrazyEgg Tracking Code -->
';
}

function stringSplit($thetext,$num)
	{
		if (!$num)
		{
			$num=1;
		}
			$arr=array();
			$x=floor(strlen($thetext)/$num);
		while ($i<=$x)
		{
			$y=substr($thetext,$j,$num);
		if ($y)
		{
			array_push($arr,$y);
		}
			$i++;
			$j=$j+$num;
		}
		return $arr;
	}
?>
