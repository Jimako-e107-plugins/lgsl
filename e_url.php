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
 
if (!defined('e107_INIT')) { exit; }

class lgsl_url // plugin-folder + '_url'
{
	function config() 
	{
		$config = array();

		$config['userbar'] = array(
			'alias'         => 'LGSL',
			'regex'			=> '^{alias}/userbar.php\?(.*)$',
			'sef'			=> '{alias}/userbar.php{query_path}',
			'redirect'		=> '{e_PLUGIN}lgsl/userbar.php?$1',
		);

		$config['detail'] = array(
			'alias'         => 'LGSL',                         
			'regex'			=> '^{alias}/\?(.*)$',				 
			'sef'			=> '{alias}/{query_path}', 						 
			'redirect'		=> '{e_PLUGIN}lgsl/index.php?$1', 
		);
        
		$config['index'] = array(
			'alias'         => 'LGSL',                         
			'regex'			=> '^{alias}\/$', 					 
			'sef'			=> '{alias}/', 						 
			'redirect'		=> '{e_PLUGIN}lgsl/index.php',  
		);

		return $config;
	}
	

	
}