<?php
/**
*
* @package phpBB Extension - Delete unnecessary notifications
* @copyright (c) 2015 Sheer
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace sheer\delnotifications\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
/**
* Assign functions defined in this class to event listeners in the core
*
* @return array
* @static
* @access public
*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'			=> 'load_language_on_setup',
			'core.modify_module_row'	=> 'modify_extra_url',
		);
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'sheer/delnotifications',
			'lang_set' => 'delnotifications_lng',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}
	/**
	* Constructor
	*/
	public function __construct($phpbb_root_path)
	{
		$this->phpbb_root_path = $phpbb_root_path;
	}

	public function modify_extra_url($event)
	{
		$row = $event['row'];
		$module_row = $event['module_row'];
		if ($row['module_basename'] == '\sheer\delnotifications\ucp\notifications_module')
		{
			if($row['module_langname'] == 'UCP_NOTIFICATIONS_DELETE')
			{
				$module_row['url_extra'] = $row['module_id'];
			}

			$event['module_row'] = $module_row;
		}
	}
}
