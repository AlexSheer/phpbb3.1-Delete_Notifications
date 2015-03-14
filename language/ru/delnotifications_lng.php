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
	'UCP_DELNOTIFICATIONS'				=> 'Удаление уведомлений',
	'UCP_NOTIFICATIONS_DELETE'			=> 'Удаление ненужных уведомлений',
	'UCP_NOTIFICATIONS_DELETE_EXPLAIN'	=> 'Здесь вы можете выбрать и удалить ненужные уведомления.',
	'ALL_NOTIFICATIONS_DELETE_SUCCESS'	=> 'Все уведомления были успешно удалены.',
	'NOTIFICATIONS_DELETE_SUCCESS'		=> 'Выбранные уведомления были успешно удалены.',
));
