<?php
/**
*
* @package phpBB Extension - Delete unnecessary notifications
* @copyright (c) 2015 sheer
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace sheer\delnotifications\ucp;

class notifications_info
{
	function module()
	{
		return array(
			'filename'	=> '\sheer\delnotifications\ucp\notifications_module',
			'title'		=> 'UCP_DELNOTIFICATIONS',
			'version'	=> '1.0.0',
			'modes'		=> array(
				'manage'		=> array('title' => 'UCP_NOTIFICATIONS_DELETE',
				'auth' => 'ext_sheer/delnotifications',
				'cat' => array('UCP_MAIN')),
			),
		);
	}

	function install()
	{
	}

	function uninstall()
	{
	}
}
