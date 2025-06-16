<?php

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}

// GET DEFAULT LANGUAGE
$vcLang = $this->admin_load_voicecommander_module('qa-voicecommander-lang-default.php');

$voiceOptions = array(
	0 => 'Microsoft Helia - Portuguese (Portugal)',
	1 => 'Microsoft Mark - English (United States)',
	2 => 'Microsoft Zira - English (United States)',
	3 => 'Microsoft David - English (United States)',
	4 => 'Microsoft Huihui - Chinese (Simplified, PRC)',
	5 => 'Microsoft Kangkang - Chinese (Simplified, PRC)',
	6 => 'Microsoft Yaoyao - Chinese (Simplified, PRC)',
	7 => 'Google Deutsch',
	8 => 'Google US English',
	9 => 'Google UK English Female',
	10 => 'Google UK English Male',
	11 => 'Google español (es-ES)',
	12 => 'Google español de Estados Unidos (es-US)',
	13 => 'Google français (fr-FR)',
	14 => 'Google हिन् (hi-IN)',
	15 => 'Google Bahasa Indonesia (id-ID)',
	16 => 'Google italiano (it-IT)',
	17 => 'Google 日本語 (ja-JP)',
	18 => 'Google 한국의 (ko-KR)',
	19 => 'Google Nederlands (nl-NL)',
	20 => 'Google polski (pl-PL)',
	21 => 'Google português do Brasil (pt-BR)',
	22 => 'Google русский (ru-RU)',
	23 => 'Google 普通话（中国大陆）(zh-CN)',
	24 => 'Google 粤語（香港）(zh-HK)',
	25 => 'Google 國語（臺灣）(zh-TW)',
);


$fields = array(
	// Section Title
	array(
		'label' => '<h2 class="q2avctitle" id="q2avct-general">Voice Commander settings</h2>',
		'type' => 'static',
		'class' => 'vc_header',
		'note' => <<<HTML
			<blockquote class="vc-blockquote">
			<ul>
				<li>Words inside parentheses are optional and can be ignored when speaking a command. For example the following command "<b>Go (to) home(page)</b>" can be triggered by saying "<b>Go to homepage</b>" or simply by saying "<b>Go home</b>".</li>
				<li>"<b>Feedback phrases</b>" are automatic responses shown or spoken by the Voice Commander when a matching command is detected.</li>
				<li>If you need to include an apostrophe (’), use a backslash before it, like this: <code>\'</code>. Quotation marks (<code>"</code>) do not require escaping.</li>
				<li>The placeholder <code>USERNAME</code> will be automatically replaced with the user's name when the phrase is used.<br>
					For example: <code>Welcome back, USERNAME!</code>
				</li>
			</ul>
			</blockquote>
		HTML,
	),
	
	array(
		'label' => 'Voice Commander Language (voice input)',
		'type' => 'text',
		'value' => $vcLang["vcLanguage"],
		'tags' => 'NAME="vc_language_text" ID="vc_language"',
		'note' => 'What language or accent do your users primarily speak? Check out the <a href="https://rxchun.github.io/shop/voice-commander/?ref=q2a-voice-commander-post#supported-languages" target="_blank"><b>list of shortcodes</b></a> for different languages.',
	),
	
	// Only allow loggedin users?
	array(
		'label' => 'Only allow logged-in users to use Voice Commander.',
		'type' => 'checkbox',
		'value' => qa_opt('vc_loggedin_only_check'),
		'tags' => 'NAME="vc_loggedin_only_check" ID="vc_loggedin_only_check"',
	),

	// VC Trigger Toggle
	array(
		'label' => 'Add a trigger word for the Voice Commander',
		'type' => 'checkbox',
		'value' => qa_opt('vc_trigger_check'),
		'tags' => 'NAME="vc_trigger_check" ID="vc_trigger_check"',
	),
	
	// VC Trigger
	array(
		'label' => 'Add a trigger word/short phrase to the Voice Commander. For example: "Hey Google".',
		'id' => 'vc_nickname_display',
		'type' => 'text',
		'value' => $vcLang["vcTrigger"],
		'tags' => 'NAME="vc_trigger_text"',
		'note' => 'This helps prevent triggering a Voice Command by accident while having a conversation with another person in the room. So the bot will only respond after the "trigger command" is recognized.',
	),
	
	array(
		'type' => 'blank',
	),
	
	// Feedback ---------
	
	// Section Title
	array(
		'label' => '<h2 class="q2avctitle" id="q2avct-feedback">Feedback (voice output)</h2>',
		'type' => 'static',
		'class' => 'vc_header',
		'note' => 'Note: Not all voices support adjusting parameters. The default parameters below are tweaked for the "Google UK English Female" voice.',
	),
	
	// Voice Options
	array(
		'label' => 'VC Feedback Voice',
		'id' => 'vc_feedback_voice',
		'type' => 'select',
		'value' => (int)qa_opt('vc_feedback_voice'),
		'tags' => 'NAME="vc_feedback_voice"',
		'options' => $voiceOptions,
		'match_by' => 'key',
	),
	array(
		'label' => 'Voice Feedback Volume <span class="qa-form-tall-note" style="font-family: monospace;"> – (0.1 to 1)</span>',
		'type' => 'number',
		'value' => $vcLang["voiceFeedbackVolume"],
		'tags' => 'NAME="vc_feedback_voice_volume" ID="vc_feedback_voice_volume"',
	),
	array(
		'label' => 'Voice Feedback Rate <span class="qa-form-tall-note" style="font-family: monospace;"> – (0.1 to 10. Typical usable range: 0.5 to 2)</span>',
		'type' => 'number',
		'value' => $vcLang["voiceFeedbackRate"],
		'tags' => 'NAME="vc_feedback_voice_rate" ID="vc_feedback_voice_rate"',
	),
	array(
		'label' => 'Voice Feedback Pitch <span class="qa-form-tall-note" style="font-family: monospace;"> – (0.1 to 2)</span>',
		'type' => 'number',
		'value' => $vcLang["voiceFeedbackPitch"],
		'tags' => 'NAME="vc_feedback_voice_pitch" ID="vc_feedback_voice_pitch"',
		'note' => '<hr>',
	),
	
	// VC Toggle Text Feedback
	array(
		'label' => 'Display text Notification/Feedback at the bottom when a command is recognized.',
		'type' => 'checkbox',
		'value' => qa_opt('vc_textFeedback_check'),
		'tags' => 'NAME="vc_textFeedback_check" ID="vc_textFeedback_check"',
	),
	array(
		'label' => 'Feedback Box Background Color',
		'id' => 'vc_feedbackBoxColor_display',
		'type' => 'text',
		'value' => $vcLang["vcFeedbackBoxColor"],
		'tags' => 'NAME="vc_feedback_box_color_text"',
		'note' => 'Default color: <code>#f83052</code> (Magenta)',
	),
	array(
		'label' => 'Feedback Box Text Color',
		'id' => 'vc_feedbackTextColor_display',
		'type' => 'text',
		'value' => $vcLang["vcFeedbackBoxTextColor"],
		'tags' => 'NAME="vc_feedback_text_color_text"',
		'note' => 'Default color: <code>#ffffff</code> (White)',
	),
	
	array(
		'type' => 'blank',
	),
	
	// COMBO WORDS ---------
	
	// Section Title
	array(
		'label' => '<h2 class="q2avctitle" id="q2avct-navigation">Combo words</h2>',
		'type' => 'static',
		'class' => 'vc_header',
		'note' => '
		To avoid creating duplicate variations of multiple commands, combo words will be used instead.<br>
		For example <b>[ <code>Go to</code> OR <code>Open</code> my profile ]</b> both will be used as a either/or combo variation to open your profile page.<br>
		For example <b>[ <code>Go</code> OR <code>Scroll</code> down ]</b> both will be used as a either/or variation.
		',
	),
	
	array(
		'label' => 'Navigation combo word "Go (to)"',
		'type' => 'text',
		'value' => $vcLang["vcComboGo"],
		'tags' => 'NAME="vc_combo_go_text"',
		'note' => 'Also used as an <b>Action word</b> instead of "Scroll"',
	),
	array(
		'label' => 'Navigation combo word "Open"',
		'type' => 'text',
		'value' => $vcLang["vcComboOpen"],
		'tags' => 'NAME="vc_combo_open_text"',
	),
	array(
		'label' => 'Scroll combo word "Scroll"',
		'type' => 'text',
		'value' => $vcLang["vcComboScroll"],
		'tags' => 'NAME="vc_combo_scroll_text"',
	),
	
	array(
		'type' => 'blank',
	),
	
	
	// SEARCH ---------
	
	// Section Title
	array(
		'label' => '<h2 class="q2avctitle" id="q2avct-search">Search command</h2>',
		'type' => 'static',
		'class' => 'vc_header',
	),
	
	// Search
	array(
		'label' => 'Voice command for Search. Example [Search for "word/rest of phrase"]',
		'type' => 'text',
		'value' => $vcLang["vcSearch"],
		'tags' => 'NAME="vc_search_text"',
	),
	
	// Feedback Searching Text
	array(
		'label' => 'Feedback text for "Searching"',
		'type' => 'text',
		'value' => $vcLang["vcFeedbackSearching"], 
		'tags' => 'NAME="vc_searching_text"',
	),
	
	array(
		'type' => 'blank',
	),
	
	// GREETINGS / MISCELLANEOUS ---------
	
	// Section Title
	array(
		'label' => '<h2 class="q2avctitle" id="q2avct-interactivity">Greetings</h2>',
		'type' => 'static',
		'class' => 'vc_header',
		'note' => 'The following list of Greeting commands are designed to keep the conversation going.',
	),
	
	// Nickname
	array(
		'label' => 'Set a nickname to the Voice Commander.',
		'type' => 'text',
		'value' => $vcLang["vcNickname"],
		'tags' => 'NAME="vc_nickname_text"',
	),
	
	// Startup / Initializing
	array(
		'label' => 'Starting up text',
		'type' => 'text',
		'value' => $vcLang["vcMiscStartUp"],
		'tags' => 'NAME="vc_misc_starting_text"',
	),
	
	// Hello
	array(
		'label' => 'Voice command "Hello"',
		'type' => 'text',
		'value' => $vcLang["vcMiscHello"],
		'tags' => 'NAME="vc_misc_hello_text"',
	),
	// Hello Feedback
	array(
		'label' => 'Feedback response to "'.$vcLang["vcMiscHello"].'". And prompts the user to start a conversation.',
		'type' => 'text',
		'value' => $vcLang["vcMiscHelloFdbk"],
		'tags' => 'NAME="vc_misc_hello_fdbk_text"',
	),
	
	// What's your name?
	array(
		'label' => 'Voice command: "What\'s your name?"',
		'type' => 'text',
		'value' => $vcLang["vcMiscAskAIName"],
		'tags' => 'NAME="vc_misc_whatsname_text"',
	),
	// What's your name? - Feedback
	array(
		'label' => 'Feedback response to "'.$vcLang["vcMiscAskAIName"].'"',
		'type' => 'text',
		'value' => $vcLang["vcMiscAskAINameFdbk"],
		'tags' => 'NAME="vc_misc_whatsname_fdbk_text"',
	),
	
	// My name is
	array(
		'label' => 'Voice command: My name is "Username"',
		'type' => 'text',
		'value' => $vcLang["vcMiscUserNameis"],
		'tags' => 'NAME="vc_misc_myname_text"',
	),
	// Nite to meet you
	array(
		'label' => 'Feedback response. Nice to meet you "username"',
		'type' => 'text',
		'value' => $vcLang["vcMiscNicetomeet"],
		'tags' => 'NAME="vc_misc_nicetomeet_fdbk_text"',
	),
	// User Name Feedback
	array(
		'label' => 'Feedback: '.$vcLang["vcMiscUserNameis"].'',
		'type' => 'text',
		'value' => $vcLang["vcMiscUserNameFdbk"],
		'tags' => 'NAME="vc_misc_username_fdbk_text"',
	),
	
	// How are you?
	array(
		'label' => 'Voice command: "How are you?"',
		'type' => 'text',
		'value' => $vcLang["vcMiscHowareyou"],
		'tags' => 'NAME="vc_misc_howareyou_text"',
	),
	// How are you? - Feedback
	array(
		'label' => 'Feedback response to "'.$vcLang["vcMiscHowareyou"].'" - I\'m fine "nickname"',
		'type' => 'text',
		'value' => $vcLang["vcMiscHowareyouFdbk"],
		'tags' => 'NAME="vc_misc_howareyou_fdbk_text"',
	),
	
	array(
		'type' => 'blank',
	),
	
	
	// INTERACTIVITY ---------
	
	// Section Title
	array(
		'label' => '<h2 class="q2avctitle" id="q2avct-interactivity">Interactivity commands</h2>',
		'type' => 'static',
		'class' => 'vc_header',
	),
	
	array(
		'label' => 'Help. (Will show a brief list of commands)',
		'type' => 'text',
		'value' => $vcLang["vcInterHelp"],
		'tags' => 'NAME="vc_inter_help_text"',
	),
	
	array(
		'label' => 'Shows a brief list of commands.',
		'type' => 'text',
		'value' => $vcLang["vcInterCommands"],
		'tags' => 'NAME="vc_inter_commands_text"',
	),
	
	array(
		'label' => 'Shows a brief list of commands (2nd variation).',
		'type' => 'text',
		'value' => $vcLang["vcInterCommandsAlt"],
		'tags' => 'NAME="vc_inter_commands_alt_text"',
	),
	
	array(
		'label' => 'Feeback for: '.$vcLang["vcInterHelp"].' / '.$vcLang["vcInterCommands"].' , along with a list of commands.',
		'type' => 'text',
		'value' => $vcLang["vcInterHelpFdbk"],
		'tags' => 'NAME="vc_inter_help_fdbk_text"',
	),
	array(
		'label' => 'Close Command List.',
		'type' => 'text',
		'value' => $vcLang["vcInterCloseCommandsList"],
		'tags' => 'NAME="vc_inter_close_commandslist_text"',
	),
	array(
		'label' => 'Popup Box - Commands List section title: Navigation',
		'type' => 'text',
		'value' => $vcLang["vcCommandsTitleNavigation"],
		'tags' => 'NAME="vc_commandstitle_navigation_text"',
		'note' => 'Title for the "Navigation" section, inside the Command List Pop Up',
	),
	array(
		'label' => 'Popup Box - Commands List description',
		'type' => 'text',
		'value' => $vcLang["vcCommandsTitleExplanation"],
		'tags' => 'NAME="vc_commandstitle_explanation_text"',
		'note' => 'This short description will be shown below the Commands List title, as an explanation to users in regards to optional words inside parentheses. Examples will be provided below the phrase.',
	),
	
	array(
		'label' => 'Refresh (Page).',
		'type' => 'text',
		'value' => $vcLang["vcInterRefresh"],
		'tags' => 'NAME="vc_inter_refresh_text"',
	),
	
	array(
		'label' => 'Feedback for: '.$vcLang["vcInterRefresh"].'.',
		'type' => 'text',
		'value' => $vcLang["vcInterRefreshFdbk"],
		'tags' => 'NAME="vc_inter_refresh_fdbk_text"',
	),
	
	array(
		'label' => 'Greeting to get things going and suggest the Commands List, on VC start up.',
		'type' => 'text',
		'value' => $vcLang["vcInterSayHello"],
		'tags' => 'NAME="vc_inter_sayhello_text"',
	),
	array(
		'label' => 'Feedback: Voice Commander Activated',
		'type' => 'text',
		'value' => $vcLang["vcInterActivatedFdbk"],
		'tags' => 'NAME="vc_inter_activated_fdbk_text"',
	),
	array(
		'label' => 'Feedback: Say Hello.',
		'type' => 'text',
		'value' => $vcLang["vcInterSayHelloFdbk"],
		'tags' => 'NAME="vc_inter_sayhello_fdbk_text"',
		'note' => 'This will be merged as a second part of the feeback phrase above. Example: <code>'.$vcLang["vcInterActivatedFdbk"].' '.$vcLang["vcInterSayHelloFdbk"].'</code>',
	),
	array(
		'label' => 'Turns off Microphone.',
		'type' => 'text',
		'value' => $vcLang["vcInterTurnoff"],
		'tags' => 'NAME="vc_inter_turnoff_text"',
	),
	array(
		'label' => 'Feedback for: '.$vcLang["vcInterTurnoff"].'.',
		'type' => 'text',
		'value' => $vcLang["vcInterTurnoffFdbk"],
		'tags' => 'NAME="vc_inter_turnoff_fdbk_text"',
	),
	array(
		'label' => 'Shutdown Voice Commander.',
		'type' => 'text',
		'value' => $vcLang["vcInterShutdown"],
		'tags' => 'NAME="vc_inter_shutdown_text"',
	),
	array(
		'label' => 'Feedback for: '.$vcLang["vcInterShutdown"].'.',
		'type' => 'text',
		'value' => $vcLang["vcInterShutdownFdbk"],
		'tags' => 'NAME="vc_inter_shutdown_fdbk_text"',
	),
	array(
		'label' => 'Feedback for: No matched commands',
		'type' => 'text',
		'value' => $vcLang["vcInterNoMatches"],
		'tags' => 'NAME="vc_inter_nomatches_fdbk_text"',
	),
	
	array(
		'type' => 'static',
		'note' => <<<HTML
			<hr>
			<h3 style="margin-bottom:-.5rem;">
				Note: <code>*tag</code> and <code>*tag2</code> are used to extract values for the equation. Do not delete them.
			</h3>
		HTML,
	),
	
	array(
		'label' => 'Performs addition of two numbers.',
		'type' => 'text',
		'value' => $vcLang["vcInterMathAdd"],
		'tags' => 'NAME="vc_inter_mathadd_text"',
	),
	
	array(
		'label' => 'Performs subtraction between two numbers.',
		'type' => 'text',
		'value' => $vcLang["vcInterMathMinus"],
		'tags' => 'NAME="vc_inter_mathminus_text"',
	),
	
	array(
		'label' => 'Performs multiplication of two numbers.',
		'type' => 'text',
		'value' => $vcLang["vcInterMathTimes"],
		'tags' => 'NAME="vc_inter_mathtimes_text"',
	),
	
	array(
		'label' => 'Performs division between two numbers.',
		'type' => 'text',
		'value' => $vcLang["vcInterMathDivide"],
		'tags' => 'NAME="vc_inter_mathdivide_text"',
	),
	
	array(
		'type' => 'blank',
	),
	
	
	// CONVERSATIONAL ---------
	
	// Section Title
	array(
		'label' => '<h2 class="q2avctitle" id="q2avct-interactivity-q">Interactivity Question Page</h2>',
		'type' => 'static',
		'class' => 'vc_header',
	),
	
	array(
		'label' => 'Set title. (sets question title)',
		'type' => 'text',
		'value' => $vcLang["vcInterSetTitle"],
		'tags' => 'NAME="vc_inter_settitle_text"',
	),
	array(
		'label' => 'Set category. (sets question category)',
		'type' => 'text',
		'value' => $vcLang["vcInterSetCategory"],
		'tags' => 'NAME="vc_inter_setcategory_text"',
	),
	array(
		'label' => 'Starts writing question.',
		'type' => 'text',
		'value' => $vcLang["vcInterSetBody"],
		'tags' => 'NAME="vc_inter_setbody_text"',
	),
	array(
		'label' => 'Set tags. (sets question tags)',
		'type' => 'text',
		'value' => $vcLang["vcInterSetTags"],
		'tags' => 'NAME="vc_inter_settags_text"',
	),
	array(
		'label' => 'Set tags dash/hyphen.',
		'type' => 'text',
		'value' => $vcLang["vcInterSetTagsDash"],
		'tags' => 'NAME="vc_inter_settagsdash_text"',
		'note' => 'This will convert the word dash, into an actual dash when adding tags. For example: this(dash)tag, will be converted to this-tag.',
	),
	
	array(
		'label' => 'Write Answer (1st variation).',
		'type' => 'text',
		'value' => $vcLang["vcInterDoAnswer"],
		'tags' => 'NAME="vc_inter_doanswer_text"',
	),
	array(
		'label' => 'Write Answer (2nd variation).',
		'type' => 'text',
		'value' => $vcLang["vcInterAnswerQuestion"],
		'tags' => 'NAME="vc_inter_answerquestion_text"',
	),
	array(
		'label' => 'Write Answer (3rd variation).',
		'type' => 'text',
		'value' => $vcLang["vcInterWriteAnswer"],
		'tags' => 'NAME="vc_inter_writeanswer_text"',
	),
	
	array(
		'label' => 'Write Comment.',
		'type' => 'text',
		'value' => $vcLang["vcInterDoComment"],
		'tags' => 'NAME="vc_inter_docomment_text"',
	),
	
	array(
		'type' => 'static',
		'class' => 'vc_header',
		'note' => '
		<blockquote class="vc-blockquote" style="margin-bottom:0;">
		<p>In case VC gets confused on what answer you are currently watching, it will ask you what answer do you wish to comment.</p>
		</blockquote>',
	),
	array(
		'label' => 'Comment in what answer? (The VC will visually show a number for the multiple answers you\'re watching).',
		'type' => 'text',
		'value' => $vcLang["vcInterCommentWhatAnswer"],
		'tags' => 'NAME="vc_inter_commentwhatanswer_text"',
	),
	array(
		'label' => 'Comment the first one.',
		'type' => 'text',
		'value' => $vcLang["vcInterCommentFirst"],
		'tags' => 'NAME="vc_inter_commentfirst_text"',
	),
	array(
		'label' => 'Comment the second one.',
		'type' => 'text',
		'value' => $vcLang["vcInterCommentSecond"],
		'tags' => 'NAME="vc_inter_commentsecond_text"',
	),
	array(
		'label' => 'Comment the third one.',
		'type' => 'text',
		'value' => $vcLang["vcInterCommentThird"],
		'tags' => 'NAME="vc_inter_commentthird_text"',
	),
	
	array(
		'type' => 'blank',
	),
	
	array(
		'label' => 'Go/Scroll to answers. Combo triggered - ["'.$vcLang["vcComboGo"].' "answers" / '.$vcLang["vcComboScroll"].' "answers"',
		'type' => 'text',
		'value' => $vcLang["vcInterScrollToAnswers"],
		'tags' => 'NAME="vc_inter_gotoanswers_text"',
	),
	
	array(
		'label' => 'Feedback for '.$vcLang["vcInterScrollToAnswers"].', in case there\'s no answers.',
		'type' => 'text',
		'value' => $vcLang["vcFeedbackNoAnswers"],
		'tags' => 'NAME="vc_inter_noanswers_fdbk_text"',
	),
	
	array(
		'label' => 'Go/Scroll to previous answer.',
		'type' => 'text',
		'value' => $vcLang["vcInterPreviousAnswer"],
		'tags' => 'NAME="vc_inter_previousanswer_text"',
	),
	
	array(
		'label' => 'Go/Scroll to next answer.',
		'type' => 'text',
		'value' => $vcLang["vcInterNextAnswer"],
		'tags' => 'NAME="vc_inter_nextanswer_text"',
	),
	array(
		'label' => 'Delete text until [word provived by user]. (1st variation)',
		'type' => 'text',
		'value' => $vcLang["vcInterDeleteText"],
		'tags' => 'NAME="vc_inter_deletetext_text"',
	),
	array(
		'label' => 'Erase text until [word provived by user]. (2nd variation)',
		'type' => 'text',
		'value' => $vcLang["vcInterEraseText"],
		'tags' => 'NAME="vc_inter_erasetext_text"',
	),
	array(
		'label' => 'Delete all text. (1st variation)',
		'type' => 'text',
		'value' => $vcLang["vcInterDeleteAllText"],
		'tags' => 'NAME="vc_inter_deletealltext_text"',
	),
	array(
		'label' => 'Erase all text. (2nd variation)',
		'type' => 'text',
		'value' => $vcLang["vcInterEraseAllText"],
		'tags' => 'NAME="vc_inter_erasealltext_text"',
	),
	array(
		'label' => 'Submit answer/comment (1st variation).',
		'type' => 'text',
		'value' => $vcLang["vcInterSubmit"],
		'tags' => 'NAME="vc_inter_submit_text"',
	),
	array(
		'label' => 'Submit answer/comment (2nd variation).',
		'type' => 'text',
		'value' => $vcLang["vcInterSubmitSend"],
		'tags' => 'NAME="vc_inter_submit_send_text"',
	),
	array(
		'label' => 'Cancel action/button.',
		'type' => 'text',
		'value' => $vcLang["vcInterCancel"],
		'tags' => 'NAME="vc_inter_cancel_text"',
	),
	array(
		'label' => 'Stop writing.',
		'type' => 'text',
		'value' => $vcLang["vcInterStopWriting"],
		'tags' => 'NAME="vc_inter_stopwriting_text"',
	),
	
	array(
		'type' => 'blank',
	),
	
	
	// CONVERSATIONAL ---------
	
	// Section Title
	array(
		'label' => '<h2 class="q2avctitle" id="q2avct-navigation">Conversational</h2>',
		'type' => 'static',
		'class' => 'vc_header',
	),
	
	array(
		'label' => 'What time is it?',
		'type' => 'text',
		'value' =>  $vcLang["vcConvWhatTime"],
		'tags' => 'NAME="vc_conv_whattime_text"',
	),
	array(
		'label' => 'What day is today?',
		'type' => 'text',
		'value' =>  $vcLang["vcConvWhatDay"],
		'tags' => 'NAME="vc_conv_whatday_text"',
	),
	array(
		'label' => 'Are you real?',
		'type' => 'text',
		'value' =>  $vcLang["vcConvAreyoureal"],
		'tags' => 'NAME="vc_conv_areyoureal_text"',
	),
	array(
		'label' => 'Are you sentient?',
		'type' => 'text',
		'value' =>  $vcLang["vcConvSentient"],
		'tags' => 'NAME="vc_conv_sentient_text"',
	),
	array(
		'label' => 'Are you conscious?',
		'type' => 'text',
		'value' =>  $vcLang["vcConvConscious"],
		'tags' => 'NAME="vc_conv_conscious_text"',
	),
	array(
		'label' => 'Feedback for: '.$vcLang["vcConvAreyoureal"].', '.$vcLang["vcConvSentient"].', '.$vcLang["vcConvConscious"].'?',
		'type' => 'text',
		'value' => $vcLang["vcConvSentientFdbk"],
		'tags' => 'NAME="vc_conv_sentient_fdbk_text"',
	),
	
	array(
		'label' => 'Who are you?',
		'type' => 'text',
		'value' => $vcLang["vcConvWhoareyou"],
		'tags' => 'NAME="vc_conv_whoareyou_text"',
	),
	array(
		'label' => 'Feedback for: '.$vcLang["vcConvWhoareyou"].'?',
		'type' => 'text',
		'value' => $vcLang["vcConvWhoareyouFdbk"],
		'tags' => 'NAME="vc_conv_whoareyou_fdbk_text"',
	),
	array(
		'label' => 'I\'m not talking to you (AI)',
		'type' => 'text',
		'value' => $vcLang["vcConvNotTalkingToYou"],
		'tags' => 'NAME="vc_conv_nottalkingtoyou_text"',
	),
	array(
		'label' => 'Feedback for: '.$vcLang["vcConvNotTalkingToYou"],
		'type' => 'text',
		'value' => $vcLang["vcConvNotTalkingToYouFdbk"],
		'tags' => 'NAME="vc_conv_nottalkingtoyou_fdbk_text"',
	),
	array(
		'label' => 'I\'m talking to you (AI)',
		'type' => 'text',
		'value' => $vcLang["vcConvTalkingToYou"],
		'tags' => 'NAME="vc_conv_talkingtoyou_text"',
	),
	array(
		'label' => 'Feedback for: '.$vcLang["vcConvTalkingToYou"],
		'type' => 'text',
		'value' => $vcLang["vcConvTalkingToYouFdbk"],
		'tags' => 'NAME="vc_conv_talkingtoyou_fdbk_text"',
	),
	array(
		'label' => 'Thank you (AI)',
		'type' => 'text',
		'value' => $vcLang["vcConvThankYou"],
		'tags' => 'NAME="vc_conv_thankyou_text"',
	),
	array(
		'label' => 'Feedback for: '.$vcLang["vcConvThankYou"],
		'type' => 'text',
		'value' => $vcLang["vcConvThankYouFdbk"],
		'tags' => 'NAME="vc_conv_thankyou_fdbk_text"',
	),
	
	array(
		'type' => 'blank',
	),
	
	
	// USER NAVIGATION ---------
	
	// Section Title
	array(
		'label' => '<h2 class="q2avctitle" id="q2avct-navigation">User Navigation</h2>',
		'type' => 'static',
		'class' => 'vc_header',
		'note' => 'Words inside parentheses are optional and can be ignored when speaking a command. For example the followig command "Go (to) home(page)" can be triggered by saying "Go to homepage" or simply by saying "Go home", ignoring the text inside parentheses.',
	),
	
	// My Profile
	array(
		'label' => 'Opens "My Profile" page. Combo triggered - ['.$vcLang["vcComboGo"].' "My profile"/'.$vcLang["vcComboOpen"].' "My profile"]',
		'type' => 'text',
		'value' => $vcLang["vcUserNavProfile"],
		'tags' => 'NAME="vc_usernav_profile_text"',
	),
	
	// Edit Profile
	array(
		'label' => 'Opens "Edit Profile" page.',
		'type' => 'text',
		'value' => $vcLang["vcUserNavEditProfile"],
		'tags' => 'NAME="vc_usernav_editprofile_text"',
	),
	
	// Messages
	array(
		'label' => 'Opens "Messages" page. Combo triggered - ["'.$vcLang["vcComboGo"].' "Messages"/'.$vcLang["vcComboOpen"].' "Messages"]',
		'type' => 'text',
		'value' => $vcLang["vcUserNavMessages"],
		'tags' => 'NAME="vc_usernav_messages_text"',
	),
	
	// Favorites
	array(
		'label' => 'Opens "Favorites" page. Combo triggered - ['.$vcLang["vcComboGo"].' "Favorites"/'.$vcLang["vcComboOpen"].' "Favorites"]',
		'type' => 'text',
		'value' => $vcLang["vcUserNavFavorites"],
		'tags' => 'NAME="vc_usernav_favorites_text"',
	),
	
	// My Updates
	array(
		'label' => 'Opens "My Updates" page. Combo triggered - ['.$vcLang["vcComboGo"].' "My Updates"/'.$vcLang["vcComboOpen"].' "My Updates"]',
		'type' => 'text',
		'value' => $vcLang["vcUserNavUpdates"],
		'tags' => 'NAME="vc_usernav_updates_text"',
	),
	
	array(
		'type' => 'blank',
	),
	
	// SITE NAVIGATION ---------
	
	// Section Title
	array(
		'label' => '<h2 class="q2avctitle" id="q2avct-navigation">Site Navigation Commands</h2>',
		'type' => 'static',
		'class' => 'vc_header',
		'note' => 'Text inside parentheses will be optional/ignored. For example the followig command "Go (to) home(page)" can be triggered by saying "Go to homepage" or simply by saying "Go home", ignoring the text inside parentheses.',
	),
	
	// Ask Question
	array(
		'label' => 'Opens "Ask a Question" page.',
		'type' => 'text',
		'value' => $vcLang["vcNavAsk"],
		'tags' => 'NAME="vc_nav_ask_text"',
	),

	// Admin Nav
	array(
		'label' => 'Opens "Admin" page. Combo triggered - ["'.$vcLang["vcComboGo"].' "Admin"/'.$vcLang["vcComboOpen"].' "Admin"]',
		'type' => 'text',
		'value' => $vcLang["vcNavAdmin"],
		'tags' => 'NAME="vc_nav_admin_text"',
	),
	
	// Activity Nav
	array(
		'label' => 'Opens "Activity" page. Combo triggered - ["'.$vcLang["vcComboGo"].' "Activity"/'.$vcLang["vcComboOpen"].' "Activity"]',
		'type' => 'text',
		'value' => $vcLang["vcNavActivity"],
		'tags' => 'NAME="vc_nav_activity_text"',
	),
	
	// Home/Q&A Nav
	array(
		'label' => 'Opens "Home/Q&amp;A" page.',
		'type' => 'text',
		'value' => $vcLang["vcNavHome"],
		'tags' => 'NAME="vc_nav_home_text"',
	),
	
	// Questions Nav
	array(
		'label' => 'Opens "Questions" page. Combo triggered - ["'.$vcLang["vcComboGo"].' "Questions"/'.$vcLang["vcComboOpen"].' "Questions"]',
		'type' => 'text',
		'value' => $vcLang["vcNavQuestions"],
		'tags' => 'NAME="vc_nav_questions_text"',
	),
	
	// Hot Nav
	array(
		'label' => 'Opens "Hot" page. Combo triggered - ["'.$vcLang["vcComboGo"].' "Hot"/'.$vcLang["vcComboOpen"].' "Hot"]. For this specific case, combo is optional.',
		'type' => 'text',
		'value' => $vcLang["vcNavHot"],
		'tags' => 'NAME="vc_nav_hot_text"',
	),
	
	// Unanswered Nav
	array(
		'label' => 'Opens "Unanswered" page. Combo triggered - ["'.$vcLang["vcComboGo"].' "Unanswered"/'.$vcLang["vcComboOpen"].' "Unanswered"]',
		'type' => 'text',
		'value' => $vcLang["vcNavUnanswered"],
		'tags' => 'NAME="vc_nav_unanswered_text"',
	),
	
	// Tags Nav
	array(
		'label' => 'Opens "Tags" page. Combo triggered - ["'.$vcLang["vcComboGo"].' "Tags"/'.$vcLang["vcComboOpen"].' "Tags"]',
		'type' => 'text',
		'value' => $vcLang["vcNavTags"],
		'tags' => 'NAME="vc_nav_tags_text"',
	),
	
	// Categories Nav
	array(
		'label' => 'Opens "Categories" page. Combo triggered - ["'.$vcLang["vcComboGo"].' "Categories"/'.$vcLang["vcComboOpen"].' "Categories"]',
		'type' => 'text',
		'value' => $vcLang["vcNavCategories"],
		'tags' => 'NAME="vc_nav_categories_text"',
	),
	
	// Users Nav
	array(
		'label' => 'Opens "Users" page. Combo triggered - ["'.$vcLang["vcComboGo"].' "Users"/'.$vcLang["vcComboOpen"].' "Users"]',
		'type' => 'text',
		'value' => $vcLang["vcNavUsers"],
		'tags' => 'NAME="vc_nav_users_text"',
	),
	
	// Badges Nav
	array(
		'label' => 'Opens "Badges" page. Combo triggered - ["'.$vcLang["vcComboGo"].' "Badges"/'.$vcLang["vcComboOpen"].' "Badges"]',
		'type' => 'text',
		'value' => $vcLang["vcNavBadges"],
		'tags' => 'NAME="vc_nav_badges_text"',
	),
	
	// Go back to previous page
	array(
		'label' => 'Goes back to previous page. (1st variation)',
		'type' => 'text',
		'value' => $vcLang["vcNavPreviousPage"],
		'tags' => 'NAME="vc_nav_previous_text"',
	),
	
	// Go back to previous page
	array(
		'label' => 'Goes back to previous page. (2nd variation)',
		'type' => 'text',
		'value' => $vcLang["vcNavGoBack"],
		'tags' => 'NAME="vc_nav_goback_text"',
	),
	
	array(
		'label' => 'Scroll to the top of the page. Combo triggered - ["'.$vcLang["vcComboGo"].' "top" / '.$vcLang["vcComboScroll"].' "top"',
		'type' => 'text',
		'value' => $vcLang["vcScrollTop"],
		'tags' => 'NAME="vc_scrolltop_text"',
	),
	array(
		'label' => 'Scroll to the bottom of the page. Combo triggered - ["'.$vcLang["vcComboGo"].' "bottom" / '.$vcLang["vcComboScroll"].' "bottom"',
		'type' => 'text',
		'value' => $vcLang["vcScrollBottom"],
		'tags' => 'NAME="vc_scrollbottom_text"',
	),
	array(
		'label' => 'Scroll up a bit. Combo triggered - ["'.$vcLang["vcComboGo"].' "up" / '.$vcLang["vcComboScroll"].' "up"',
		'type' => 'text',
		'value' => $vcLang["vcScrollUpABit"],
		'tags' => 'NAME="vc_scrollupabit_text"',
	),
	array(
		'label' => 'Scroll down a bit. Combo triggered - ["'.$vcLang["vcComboGo"].' "down" / '.$vcLang["vcComboScroll"].' "down"',
		'type' => 'text',
		'value' => $vcLang["vcScrollDownABit"],
		'tags' => 'NAME="vc_scrolldownabit_text"',
	),
	
	
	// Feedback Navigating Text
	array(
		'label' => 'Feedback text for "Navigating to pages"',
		'type' => 'text',
		'value' => $vcLang["vcFeedbackNavigating"],
		'tags' => 'NAME="vc_navigating_text"',
	),
	
	array(
		'type' => 'blank',
	),
	
	
	// OPEN QUESTION ---------
	
	// Section Title
	array(
		'label' => '<h2 class="q2avctitle" id="q2avct-qitemnav">Open nth Question commands</h2>',
		'type' => 'static',
		'note' => 'Only works when there\'s question lists.',
	),
	
	// Open First Post
	array(
		'label' => 'Opens first Question/Post.',
		'type' => 'text',
		'value' => $vcLang["vcQopenFirst"],
		'tags' => 'NAME="vc_qopen_first_text"',
	),
	
	// Open second Post
	array(
		'label' => 'Opens second Question.',
		'type' => 'text',
		'value' => $vcLang["vcQopenSecond"],
		'tags' => 'NAME="vc_qopen_second_text"',
	),
	
	// Open third Post
	array(
		'label' => 'Opens third Question.',
		'type' => 'text',
		'value' => $vcLang["vcQopenThird"],
		'tags' => 'NAME="vc_qopen_third_text"',
	),
	
	// Open fourth Post
	array(
		'label' => 'Opens fourth Question.',
		'type' => 'text',
		'value' => $vcLang["vcQopenFourth"],
		'tags' => 'NAME="vc_qopen_fourth_text"',
	),
	
	// Open fifth Post
	array(
		'label' => 'Opens fifth Question.',
		'type' => 'text',
		'value' => $vcLang["vcQopenFifth"],
		'tags' => 'NAME="vc_qopen_fifth_text"',
	),
	
	// Open sixth Post
	array(
		'label' => 'Opens sixth Question.',
		'type' => 'text',
		'value' => $vcLang["vcQopenSixth"],
		'tags' => 'NAME="vc_qopen_sixth_text"',
	),
	
	// Open seventh Post
	array(
		'label' => 'Opens seventh Question.',
		'type' => 'text',
		'value' => $vcLang["vcQopenSeventh"],
		'tags' => 'NAME="vc_qopen_seventh_text"',
	),
	
	// Open eighth Post
	array(
		'label' => 'Opens eighth Question.',
		'type' => 'text',
		'value' => $vcLang["vcQopenEighth"],
		'tags' => 'NAME="vc_qopen_eighth_text"',
	),
	
	// Open nineth Post
	array(
		'label' => 'Opens nineth Question.',
		'type' => 'text',
		'value' => $vcLang["vcQopenNineth"],
		'tags' => 'NAME="vc_qopen_nineth_text"',
	),
	
	// Open tenth Post
	array(
		'label' => 'Opens tenth Question.',
		'type' => 'text',
		'value' => $vcLang["vcQopenTenth"],
		'tags' => 'NAME="vc_qopen_tenth_text"',
	),
	
	// Open eleventh Post
	array(
		'label' => 'Opens eleventh Question.',
		'type' => 'text',
		'value' => $vcLang["vcQopenEleventh"],
		'tags' => 'NAME="vc_qopen_eleventh_text"',
	),
	
	// Open twelfth Post
	array(
		'label' => 'Opens twelfth Question.',
		'type' => 'text',
		'value' => $vcLang["vcQopenTwelfth"],
		'tags' => 'NAME="vc_qopen_twelfth_text"',
	),
	
	// Open thirteenth Post
	array(
		'label' => 'Opens thirteenth Question.',
		'type' => 'text',
		'value' => $vcLang["vcQopenThirteenth"],
		'tags' => 'NAME="vc_qopen_thirteenth_text"',
	),
	
	// Open fourteenth Post
	array(
		'label' => 'Opens fourteenth Question.',
		'type' => 'text',
		'value' => $vcLang["vcQopenFourteenth"],
		'tags' => 'NAME="vc_qopen_fourteenth_text"',
	),
	
	// Open fifteenth Post
	array(
		'label' => 'Opens fifteenth Question.',
		'type' => 'text',
		'value' =>  $vcLang["vcQopenFifteenth"],
		'tags' => 'NAME="vc_qopen_fifteenth_text"',
	),
	
	// Open last Post
	array(
		'label' => 'Opens last Question.',
		'type' => 'text',
		'value' => $vcLang["vcQopenLast"],
		'tags' => 'NAME="vc_qopen_last_text"',
	),
	
	// Feedback Opening Post Text
	array(
		'label' => 'Feedback text for "Opening link post ..."',
		'type' => 'text',
		'value' =>  $vcLang["vcFeedbackOpeningQuestion"],
		'tags' => 'NAME="vc_opening_text"',
	),
	
	array(
		'type' => 'blank',
	),
	
	array(
		'label' => '',
		'type' => 'static',
		'class' => 'vc_header',
		'note' => <<<HTML
			<p>Oooff, at last we've reached the end!</p>
			<blockquote class="vc-blockquote">
				Note: If you're resetting to defaults, make sure to click <kbd>Save Settings</kbd> again to save the new values.
			</blockquote>
		HTML,
	)
);

return $fields;

/*
Omit PHP closing tag to help avoid accidental output
*/

