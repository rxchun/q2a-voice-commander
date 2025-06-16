<?php


class qa_voicecommander_admin {

	function allow_template($template)
	{
		return ($template!='admin');
	}
	
	/**
	 * Loads the content of a specified Voice Commander module file.
	 *
	 * This method expects the filename of a module as a parameter, which can either be:
	 * 1. `qa-voicecommander-options.php` - Contains the voice options and settings for the Voice Commander.
	 * 2. `qa-voicecommander-lang-default.php` - Contains the default language and trigger phrases used by the Voice Commander.
	 *
	 * Depending on the file passed, this method returns the content of the corresponding module. 
	 * The content is usually an array that can include language settings, options, and other relevant configurations.
	 *
	 * Example usage:
	 * - `$this->admin_load_voicecommander_module('qa-voicecommander-lang-default.php')` returns the language settings.
	 * - `$this->admin_load_voicecommander_module('qa-voicecommander-options.php')` returns the options and fields for settings.
	 *
	 * @param string $file The name of the module file to load. The valid values are:
	 *                     - 'qa-voicecommander-options.php'
	 *                     - 'qa-voicecommander-lang-default.php'
	 *
	 * @return array The content of the loaded module, typically an array of configuration settings.
	 *               The structure of the array depends on the specific module:
	 *               - `qa-voicecommander-options.php`: An array of voice options and settings.
	 *               - `qa-voicecommander-lang-default.php`: An array containing language settings and trigger phrases.
	 */
	private function admin_load_voicecommander_module($file)
	{
		static $lang = null;
		
		// Load the specified file if not already loaded
		if ($lang === null) {
			$lang = include dirname(__FILE__) . '/' . $file;
		}

		return $lang;
	}

	function admin_form(&$qa_content)
	{

		$ok = null;
		if (qa_clicked('vc_save_button') || qa_clicked('vc_reset_settings'))
		{
			// Define language
			qa_opt('vc_language', qa_post_text('vc_language_text'));
			
			// Trigger
			qa_opt('vc_trigger_check',(bool)qa_post_text('vc_trigger_check'));
			qa_opt('vc_trigger', qa_post_text('vc_trigger_text'));
			
			// Display bottom right feedback
			qa_opt('vc_textFeedback_check',(bool)qa_post_text('vc_textFeedback_check'));
			qa_opt('vc_feedback_box_color', qa_post_text('vc_feedback_box_color_text'));
			qa_opt('vc_feedback_text_color', qa_post_text('vc_feedback_text_color_text'));
			
			// Bot Feedback
			qa_opt('vc_navigating', qa_post_text('vc_navigating_text'));
			qa_opt('vc_opening', qa_post_text('vc_opening_text'));
			
			// Only allow loggedin users
			qa_opt('vc_loggedin_only_check',(bool)qa_post_text('vc_loggedin_only_check'));
			
			// Set Feedback Voice
			qa_opt('vc_feedback_voice',(int)qa_post_text('vc_feedback_voice'));
			qa_opt('vc_feedback_voice_volume',(float)qa_post_text('vc_feedback_voice_volume'));
			qa_opt('vc_feedback_voice_rate',(float)qa_post_text('vc_feedback_voice_rate'));
			qa_opt('vc_feedback_voice_pitch',(float)qa_post_text('vc_feedback_voice_pitch'));
			
			// Combo Words
			qa_opt('vc_combo_go', qa_post_text('vc_combo_go_text'));
			qa_opt('vc_combo_open', qa_post_text('vc_combo_open_text'));
			qa_opt('vc_combo_scroll', qa_post_text('vc_combo_scroll_text'));
			
			// Search
			qa_opt('vc_search', qa_post_text('vc_search_text'));
			qa_opt('vc_searching', qa_post_text('vc_searching_text'));
			
			// Greetings
			qa_opt('vc_nickname', qa_post_text('vc_nickname_text'));
			
			qa_opt('vc_misc_starting', qa_post_text('vc_misc_starting_text'));
			qa_opt('vc_misc_hello', qa_post_text('vc_misc_hello_text'));
			qa_opt('vc_misc_hello_fdbk', qa_post_text('vc_misc_hello_fdbk_text'));
			qa_opt('vc_misc_whatsname', qa_post_text('vc_misc_whatsname_text'));
			qa_opt('vc_misc_whatsname_fdbk', qa_post_text('vc_misc_whatsname_fdbk_text'));
			qa_opt('vc_misc_myname', qa_post_text('vc_misc_myname_text'));
			qa_opt('vc_misc_nicetomeet_fdbk', qa_post_text('vc_misc_nicetomeet_fdbk_text'));
			qa_opt('vc_misc_username_fdbk', qa_post_text('vc_misc_username_fdbk_text'));
			qa_opt('vc_misc_howareyou', qa_post_text('vc_misc_howareyou_text'));
			qa_opt('vc_misc_howareyou_fdbk', qa_post_text('vc_misc_howareyou_fdbk_text'));
			
			// Interactivity
			qa_opt('vc_inter_help', qa_post_text('vc_inter_help_text'));
			qa_opt('vc_inter_commands', qa_post_text('vc_inter_commands_text'));
			qa_opt('vc_inter_commands_alt', qa_post_text('vc_inter_commands_alt_text'));
			qa_opt('vc_inter_help_fdbk', qa_post_text('vc_inter_help_fdbk_text'));
			qa_opt('vc_inter_close_commandslist', qa_post_text('vc_inter_close_commandslist_text'));
			qa_opt('vc_commandstitle_navigation', qa_post_text('vc_commandstitle_navigation_text'));
			qa_opt('vc_commandstitle_explanation', qa_post_text('vc_commandstitle_explanation_text'));
			qa_opt('vc_inter_refresh', qa_post_text('vc_inter_refresh_text'));
			qa_opt('vc_inter_refresh_fdbk', qa_post_text('vc_inter_refresh_fdbk_text'));
			
			qa_opt('vc_inter_sayhello', qa_post_text('vc_inter_sayhello_text'));
			qa_opt('vc_inter_activated_fdbk', qa_post_text('vc_inter_activated_fdbk_text'));
			qa_opt('vc_inter_turnoff', qa_post_text('vc_inter_turnoff_text'));
			qa_opt('vc_inter_turnoff_fdbk', qa_post_text('vc_inter_turnoff_fdbk_text'));
			qa_opt('vc_inter_shutdown', qa_post_text('vc_inter_shutdown_text'));
			qa_opt('vc_inter_shutdown_fdbk', qa_post_text('vc_inter_shutdown_fdbk_text'));
			qa_opt('vc_inter_nomatches_fdbk', qa_post_text('vc_inter_nomatches_fdbk_text'));
			
			qa_opt('vc_inter_mathadd', qa_post_text('vc_inter_mathadd_text'));
			qa_opt('vc_inter_mathminus', qa_post_text('vc_inter_mathminus_text'));
			qa_opt('vc_inter_mathtimes', qa_post_text('vc_inter_mathtimes_text'));
			qa_opt('vc_inter_mathdivide', qa_post_text('vc_inter_mathdivide_text'));
			
			// Interactivity Single Page
			qa_opt('vc_inter_settitle', qa_post_text('vc_inter_settitle_text'));
			qa_opt('vc_inter_setcategory', qa_post_text('vc_inter_setcategory_text'));
			qa_opt('vc_inter_setbody', qa_post_text('vc_inter_setbody_text'));
			qa_opt('vc_inter_settags', qa_post_text('vc_inter_settags_text'));
			qa_opt('vc_inter_settagsdash', qa_post_text('vc_inter_settagsdash_text'));
			qa_opt('vc_inter_doanswer', qa_post_text('vc_inter_doanswer_text'));
			qa_opt('vc_inter_answerquestion', qa_post_text('vc_inter_answerquestion_text'));
			qa_opt('vc_inter_writeanswer', qa_post_text('vc_inter_writeanswer_text'));
			qa_opt('vc_inter_docomment', qa_post_text('vc_inter_docomment_text'));
			qa_opt('vc_inter_commentwhatanswer', qa_post_text('vc_inter_commentwhatanswer_text'));
			qa_opt('vc_inter_commentfirst', qa_post_text('vc_inter_commentfirst_text'));
			qa_opt('vc_inter_commentsecond', qa_post_text('vc_inter_commentsecond_text'));
			qa_opt('vc_inter_commentthird', qa_post_text('vc_inter_commentthird_text'));
			qa_opt('vc_inter_gotoanswers', qa_post_text('vc_inter_gotoanswers_text'));
			qa_opt('vc_inter_noanswers_fdbk', qa_post_text('vc_inter_noanswers_fdbk_text'));
			qa_opt('vc_inter_previousanswer', qa_post_text('vc_inter_previousanswer_text'));
			qa_opt('vc_inter_nextanswer', qa_post_text('vc_inter_nextanswer_text'));
			qa_opt('vc_inter_deletetext', qa_post_text('vc_inter_deletetext_text'));
			qa_opt('vc_inter_erasetext', qa_post_text('vc_inter_erasetext_text'));
			qa_opt('vc_inter_deletealltext', qa_post_text('vc_inter_deletealltext_text'));
			qa_opt('vc_inter_erasealltext', qa_post_text('vc_inter_erasealltext_text'));
			qa_opt('vc_inter_submit', qa_post_text('vc_inter_submit_text'));
			qa_opt('vc_inter_submit_send', qa_post_text('vc_inter_submit_send_text'));
			qa_opt('vc_inter_cancel', qa_post_text('vc_inter_cancel_text'));
			qa_opt('vc_inter_stopwriting', qa_post_text('vc_inter_stopwriting_text'));
			
			// Conversational
			qa_opt('vc_conv_whattime', qa_post_text('vc_conv_whattime_text'));
			qa_opt('vc_conv_whatday', qa_post_text('vc_conv_whatday_text'));
			qa_opt('vc_conv_areyoureal', qa_post_text('vc_conv_areyoureal_text'));
			qa_opt('vc_conv_sentient', qa_post_text('vc_conv_sentient_text'));
			qa_opt('vc_conv_conscious', qa_post_text('vc_conv_conscious_text'));
			qa_opt('vc_conv_sentient_fdbk', qa_post_text('vc_conv_sentient_fdbk_text'));
			qa_opt('vc_conv_whoareyou', qa_post_text('vc_conv_whoareyou_text'));
			
			qa_opt('vc_conv_whoareyou_fdbk', qa_post_text('vc_conv_whoareyou_fdbk_text'));
			qa_opt('vc_conv_nottalkingtoyou', qa_post_text('vc_conv_nottalkingtoyou_text'));
			qa_opt('vc_conv_nottalkingtoyou_fdbk', qa_post_text('vc_conv_nottalkingtoyou_fdbk_text'));
			qa_opt('vc_conv_talkingtoyou', qa_post_text('vc_conv_talkingtoyou_text'));
			qa_opt('vc_conv_talkingtoyou_fdbk', qa_post_text('vc_conv_talkingtoyou_fdbk_text'));
			
			// User Navigation
			qa_opt('vc_usernav_profile', qa_post_text('vc_usernav_profile_text'));
			qa_opt('vc_usernav_editprofile', qa_post_text('vc_usernav_editprofile_text'));
			qa_opt('vc_usernav_messages', qa_post_text('vc_usernav_messages_text'));
			qa_opt('vc_usernav_favorites', qa_post_text('vc_usernav_favorites_text'));
			qa_opt('vc_usernav_updates', qa_post_text('vc_usernav_updates_text'));
			
			// Site Navigation
			qa_opt('vc_nav_ask', qa_post_text('vc_nav_ask_text'));
			qa_opt('vc_nav_admin', qa_post_text('vc_nav_admin_text'));
			qa_opt('vc_nav_activity', qa_post_text('vc_nav_activity_text'));
			qa_opt('vc_nav_home', qa_post_text('vc_nav_home_text'));
			qa_opt('vc_nav_questions', qa_post_text('vc_nav_questions_text'));
			qa_opt('vc_nav_hot', qa_post_text('vc_nav_hot_text'));
			qa_opt('vc_nav_unanswered', qa_post_text('vc_nav_unanswered_text'));
			qa_opt('vc_nav_tags', qa_post_text('vc_nav_tags_text'));
			qa_opt('vc_nav_categories', qa_post_text('vc_nav_categories_text'));
			qa_opt('vc_nav_users', qa_post_text('vc_nav_users_text'));
			qa_opt('vc_nav_badges', qa_post_text('vc_nav_badges_text'));
			
			qa_opt('vc_nav_previous', qa_post_text('vc_nav_previous_text'));
			qa_opt('vc_nav_goback', qa_post_text('vc_nav_goback_text'));
			qa_opt('vc_scrolltop', qa_post_text('vc_scrolltop_text'));
			qa_opt('vc_scrollbottom', qa_post_text('vc_scrollbottom_text'));
			qa_opt('vc_scrollupabit', qa_post_text('vc_scrollupabit_text'));
			qa_opt('vc_scrolldownabit', qa_post_text('vc_scrolldownabit_text'));
			
			// Open Questions
			qa_opt('vc_qopen_first', qa_post_text('vc_qopen_first_text'));
			qa_opt('vc_qopen_second', qa_post_text('vc_qopen_second_text'));
			qa_opt('vc_qopen_third', qa_post_text('vc_qopen_third_text'));
			qa_opt('vc_qopen_fourth', qa_post_text('vc_qopen_fourth_text'));
			qa_opt('vc_qopen_fifth', qa_post_text('vc_qopen_fifth_text'));
			qa_opt('vc_qopen_sixth', qa_post_text('vc_qopen_sixth_text'));
			qa_opt('vc_qopen_seventh', qa_post_text('vc_qopen_seventh_text'));
			qa_opt('vc_qopen_eighth', qa_post_text('vc_qopen_eighth_text'));
			qa_opt('vc_qopen_nineth', qa_post_text('vc_qopen_nineth_text'));
			qa_opt('vc_qopen_tenth', qa_post_text('vc_qopen_tenth_text'));
			qa_opt('vc_qopen_eleventh', qa_post_text('vc_qopen_eleventh_text'));
			qa_opt('vc_qopen_twelfth', qa_post_text('vc_qopen_twelfth_text'));
			qa_opt('vc_qopen_thirteenth', qa_post_text('vc_qopen_thirteenth_text'));
			qa_opt('vc_qopen_fourteenth', qa_post_text('vc_qopen_fourteenth_text'));
			qa_opt('vc_qopen_fifteenth', qa_post_text('vc_qopen_fifteenth_text'));
			qa_opt('vc_qopen_last', qa_post_text('vc_qopen_last_text'));
			
			
			$ok = qa_lang('admin/options_saved');
		}
		
		qa_set_display_rules($qa_content, array(
			'vc_nickname_display' => 'vc_trigger_check',
			'vc_feedbackBoxColor_display' => 'vc_textFeedback_check',
			'vc_feedbackTextColor_display' => 'vc_textFeedback_check',
		));
		
		
		// GET $fields AKA OPTIONS
		$vcOptions = $this->admin_load_voicecommander_module('qa-voicecommander-options.php');
		
		// SAVE SETTINGS
		return array(
			'ok' => ($ok && !isset($error)) ? $ok : null,
			'fields' => $vcOptions,
			'buttons' => array(
				array(
				'label' => qa_lang_html('admin/reset_options_button'),
				'class' => 'reset',
				'tags' => 'NAME="vc_reset_settings"',
				),
				array(
				'label' => qa_lang_html('main/save_button'),
				'tags' => 'NAME="vc_save_button"',
				),
			),
		);
	}

}
/*
	Omit PHP closing tag to help avoid accidental output
*/

