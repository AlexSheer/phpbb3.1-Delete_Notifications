<?php
/**
*
* @package phpBB Extension - delnotifications_0_0_1.php
* @copyright (c) 2015 sheer
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace sheer\delnotifications\migrations;

class delnotifications_0_0_1 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return;
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\dev');
	}

	public function update_schema()
	{
		return array(
		);
	}

	public function revert_schema()
	{
		return array(
		);
	}

	public function update_data()
	{
		return array(
			// Current version
			array('config.add', array('delnotifications', '0.0.1')),
			// UCP
			array('module.add', array('ucp', 'UCP_MAIN', 'UCP_DELNOTIFICATIONS')),
			array('module.add', array('ucp', 'UCP_DELNOTIFICATIONS', array(
				'module_basename'	=> '\sheer\delnotifications\ucp\notifications_module',
				'module_langname'	=> 'UCP_NOTIFICATIONS_DELETE',
				'module_mode'		=> 'manage',
				'module_auth'		=> 'ext_sheer/delnotifications',
				'module_enabled'	=> true,
			))),
		);
	}
}
