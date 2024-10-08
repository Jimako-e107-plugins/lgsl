<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2013 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * e107 LGSL Plugin credits: Richard Perry (www.greycube.com) + tltneon (https://github.com/tltneon)
 *
 * #######################################
 * #     e107 website system plugin      #
 * #     by Jimako                    	 #
 * #     https://www.e107sk.com          #
 * #######################################
 */

//------------------------------------------------------------------------------------------------------------+

if (!defined('e107_INIT'))
{
  require_once("../../class2.php");
}

require("lgsl_files/lgsl_config.php");
 
if ($lgsl_prefs['style'])
{
  e107::css('lgsl', 'lgsl_files/styles/' . $lgsl_prefs['style']);
}

if (isset($lgsl_config['scripts']))
{
  foreach ($lgsl_config['scripts'] as $script)
  {
    //e107::js('lgsl', 'lgsl_files/scripts/' . $script, 'jquery'); paralax issue
    e107::js('footer', e_PLUGIN.'lgsl/lgsl_files/scripts/' . $script, 'jquery');
  }
}




/* examples for theme customization
  $detail_icon = "<i class=\'fa fa-search\'></fa>";
  
  $('.details_icon').addClass('btn btn-primary');
  $('.details_icon').html('".$detail_icon."');
 */

/* fix for darken + LZ2 images 
  .game_icon {
   position: absolute;
  }
  .details_cell > a {  position: absolute;
  }
  .contry_icon {
    position: absolute;
    right: 0;
  }
*/
if ($lgsl_prefs['bootstrap3_table'])
{
  $start = "$(document).ready(function() {";
  $end   = "});	";

  $inline_script .= " 
        $('#server_list_table').addClass('table table-striped');
        $('#totals').addClass('row text-center');
        $('#totals div').addClass('col-sm-4 col-xs-12');      
        ";
}
if ($lgsl_prefs['bootstrap3_imagefix'])
{
  $css .=  "
       .game_icon {
         position: absolute;
        }
        .details_cell > a {  position: absolute;
        }
        .contry_icon {
          position: absolute;
          right: 0;
        }
    ";
}
e107::css('inline', $css);
e107::js('inline', $start . $inline_script . $end);



require_once HEADERF;

global $output, $lgsl_server_id;
//------------------------------------------------------------------------------------------------------------+

$start = '<div id="container" style="background-position:initial">';

$s = isset($_GET['s']) ? $_GET['s'] : null;
$ip = isset($_GET['ip']) ? $_GET['ip'] : null;
$port = isset($_GET['port']) ? $_GET['port'] : null;


$ns->tablerender($lgsl_config['title'][0], "", 'lgsl-title');

 
if (is_numeric($s))
{
  require "lgsl_files/lgsl_details.php";
}
elseif (isset($ip) && isset($port))
{
  require "lgsl_files/lgsl_details.php"; 
}
 
else
{
  require "lgsl_files/lgsl_list.php";
}
$end .= "</div>";
$output = '';
if (!$lgsl_config['preloader'])
{
  $ns->tablerender("", $start.$output.$end, 'lgsl-content' );
}


unset($output);

//------------------------------------------------------------------------------------------------------------+

require_once FOOTERF;

//------------------------------------------------------------------------------------------------------------+
