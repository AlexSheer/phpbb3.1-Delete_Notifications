<?php
/**
*
* @package phpBB Extension - Delete unnecessary notifications
* @copyright (c) 2015 phpBB Group
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'UCP_DELNOTIFICATIONS'				=> 'Delete notifications',
	'UCP_NOTIFICATIONS_DELETE'			=> 'Delete unnecessary notifications',
	'UCP_NOTIFICATIONS_DELETE_EXPLAIN'	=> 'Here you can select and delete any unnecessary notifications.',
	'NOTIFICATIONS_DELETE_SUCCESS'		=> 'Selected notifications were successfully removed.',
));
