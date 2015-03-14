<?php
/**
*
* @package phpBB Extension - Delete unnecessary notifications
* @copyright (c) 2015 sheer
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace sheer\delnotifications\ucp;

class notifications_module
{
	var $p_master;
	var $u_action;

	function __construct(&$p_master)
	{
		$this->p_master = &$p_master;
	}

	function main($id, $mode)
	{
		global $db, $user, $template, $request, $phpbb_container, $config;

		$start = $request->variable('start', 0);
		$this->u_action = ''. str_replace('-sheer-delnotifications-ucp-notifications_module&amp;mode=manage','', $this->u_action) . '&amp;mode=manage';

		$phpbb_notifications = $phpbb_container->get('notification_manager');
		$pagination = $phpbb_container->get('pagination');

		$notifications = $phpbb_notifications->load_notifications(array(
			'start'			=> $start,
			'limit'			=> $config['topics_per_page'],
			'count_total'	=> true,
		));

		foreach ($notifications['notifications'] as $notification)
		{
			$template->assign_block_vars('notification_list', $notification->prepare_for_display());
		}
		$start = $pagination->validate_start($start, $config['topics_per_page'], $notifications['total_count']);
		$pagination->generate_template_pagination($this->u_action, 'pagination', 'start', $notifications['total_count'], $config['topics_per_page'], $start);

		$template->assign_vars(array(
			'TOTAL_COUNT'	=> $notifications['total_count'],
		));

		if ($request->is_set_post('submit'))
		{
			$mark_delete = $request->variable('mark', array(0));
			if (!empty($mark_delete))
			{
				if (confirm_box(true))
				{
					$sql = 'DELETE FROM ' . NOTIFICATIONS_TABLE . '
						WHERE ' . $db->sql_in_set('notification_id', $mark_delete) . '
						AND user_id = '. $user->data['user_id'] .'';
					$db->sql_query($sql);
					$message = $user->lang['NOTIFICATIONS_DELETE_SUCCESS'];
					$message .= '<br /><br />' . $user->lang('RETURN_UCP', '<a href="' . $this->u_action . '">', '</a>');
					meta_refresh(3, $this->u_action);
					trigger_error($message);
				}
				else
				{
					confirm_box(false, $user->lang['CONFIRM_OPERATION'], build_hidden_fields(array(
						'mark'		=> $mark_delete,
						'submit'	=> true))
					);
				}
			}
		}

		$template->assign_vars(array(
			'S_UCP_ACTION'			=> $this->u_action,
		));

		$this->tpl_name = 'ucp_delnotifications_body';
	}
}
