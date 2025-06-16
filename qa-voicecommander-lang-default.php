<?php

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
    header('Location: ../../');
    exit;
}
    
return [

    // DEFINE LANGUAGE DEFAULT
    'vcLanguage' => qa_opt('vc_language') ?: 'en-GB',

    // Trigger
    'vcTrigger' => qa_opt('vc_trigger') ?: 'Hey Google',
    'checkVcTrigger' => qa_opt('vc_trigger_check') ? (qa_opt('vc_trigger') ?: 'Hey Google') . ' ' : '',

    // Feedback box color
    'vcFeedbackBoxColor' => qa_opt('vc_feedback_box_color') ?: '#f83052',
    'vcFeedbackBoxTextColor' => qa_opt('vc_feedback_text_color') ?: '#ffffff',

    // Feedback Voice
    'feedbackVoice' => qa_opt('vc_feedback_voice') ?: '9',
    'voiceFeedbackVolume' => qa_opt('vc_feedback_voice_volume') ?: 1,
    'voiceFeedbackRate' => qa_opt('vc_feedback_voice_rate') ?: 1.15,
    'voiceFeedbackPitch' => qa_opt('vc_feedback_voice_pitch') ?: 1.3,

    // Combo Words
    'vcComboGo' => qa_opt('vc_combo_go') ?: 'Go (to) (the)',
    'vcComboOpen' => qa_opt('vc_combo_open') ?: 'Open',
    'vcComboScroll' => qa_opt('vc_combo_scroll') ?: 'Scroll',

    // Search
    'vcSearch' => qa_opt('vc_search') ?: 'search for',
    'vcFeedbackSearching' => qa_opt('vc_searching') ?: 'Here are the results I\'ve found for:',

    // Greetings / Miscellaneous
    'vcNickname' => qa_opt('vc_nickname') ?: 'AI Voice commander',
    
    'vcMiscStartUp' => qa_opt('vc_misc_starting') ?: 'Initializing...',
    'vcMiscHello' => qa_opt('vc_misc_hello') ?: 'Hello',
    'vcMiscHelloFdbk' => qa_opt('vc_misc_hello_fdbk') ?: 'Hello! What\'s your name?',
    'vcMiscAskAIName' => qa_opt('vc_misc_whatsname') ?: 'What\'s your name',
    'vcMiscAskAINameFdbk' => qa_opt('vc_misc_whatsname_fdbk') ?: 'You can call me:',
    'vcMiscUserNameis' => qa_opt('vc_misc_myname') ?: 'My name is',
    'vcMiscNicetomeet' => qa_opt('vc_misc_nicetomeet_fdbk') ?: 'Nice to meet you',
    'vcMiscUserNameFdbk' => qa_opt('vc_misc_username_fdbk') ?: 'Here\'s a list of commands to get you started!',
    'vcMiscHowareyou' => qa_opt('vc_misc_howareyou') ?: '(I\'m fine) (I\'m good) (I\'m great) How are you?',
    'vcMiscHowareyouFdbk' => qa_opt('vc_misc_howareyou_fdbk') ?: 'I\'m fine. Thanks for asking',

    // Interactivity
    'vcInterHelp' => qa_opt('vc_inter_help') ?: 'Help',
    'vcInterCommands' => qa_opt('vc_inter_commands') ?: '(Show) (me) (the) Command(s) List',
    'vcInterCommandsAlt' => qa_opt('vc_inter_commands_alt') ?: '(Show) (me) (the) (a) List of Command(s)',
    'vcInterHelpFdbk' => qa_opt('vc_inter_help_fdbk') ?: 'Here\'s a list of commands',
    'vcInterCloseCommandsList' => qa_opt('vc_inter_close_commandslist') ?: 'close (command list)(that)',
    'vcCommandsTitleNavigation' => qa_opt('vc_commandstitle_navigation') ?: 'Navigation',
    'vcCommandsTitleExplanation' => qa_opt('vc_commandstitle_explanation') ?: 'Words in parentheses are optional — you can say them or skip them.<br> For example: <code>Go Home</code> or <code>Go to the homepage</code> all work the same.',
    'vcInterRefresh' => qa_opt('vc_inter_refresh') ?: 'refresh (page)',
    'vcInterRefreshFdbk' => qa_opt('vc_inter_refresh_fdbk') ?: 'Refreshing page!',

    'vcInterSayHello' => qa_opt('vc_inter_sayhello') ?: 'Say: Hello / Command List',
    'vcInterActivatedFdbk' => qa_opt('vc_inter_activated_fdbk') ?: (qa_opt('vc_nickname') ?: 'AI Voice commander') . ' Activated.',
    'vcInterSayHelloFdbk' => qa_opt('vc_inter_sayhello_fdbk') ?: 'Say Hello!',
    'vcInterTurnoff' => qa_opt('vc_inter_turnoff') ?: 'Turn off (the) (microphone)',
    'vcInterTurnoffFdbk' => qa_opt('vc_inter_turnoff_fdbk') ?: 'Turning off microphone... Goodbye!',
    'vcInterShutdown' => qa_opt('vc_inter_shutdown') ?: 'Shut down',
    'vcInterShutdownFdbk' => qa_opt('vc_inter_shutdown_fdbk') ?: (qa_opt('vc_nickname') ?: 'AI Voice commander') . ' is now offline.',
    'vcInterNoMatches' => qa_opt('vc_inter_nomatches_fdbk') ?: 'No matched Commands!',

    'vcInterMathAdd' => qa_opt('vc_inter_mathadd') ?: '(how much is) *tag plus *tag2',
    'vcInterMathMinus' => qa_opt('vc_inter_mathminus') ?: '(how much is) *tag minus *tag2',
    'vcInterMathTimes' => qa_opt('vc_inter_mathtimes') ?: '(how much is) *tag times *tag2',
    'vcInterMathDivide' => qa_opt('vc_inter_mathdivide') ?: '(how much is) *tag divided (by) *tag2',
    
    // Interactivity Question Page
    'vcInterSetTitle' => qa_opt('vc_inter_settitle') ?: 'set title',
    'vcInterSetCategory' => qa_opt('vc_inter_setcategory') ?: 'set category',
    'vcInterSetBody' => qa_opt('vc_inter_setbody') ?: 'set (the)(question) body',
    'vcInterSetTags' => qa_opt('vc_inter_settags') ?: 'set tags',
    'vcInterSetTagsDash' => qa_opt('vc_inter_settagsdash') ?: 'dash',
    'vcInterDoAnswer' => qa_opt('vc_inter_doanswer') ?: '(Do) (Add) (an) answer',
    'vcInterAnswerQuestion' => qa_opt('vc_inter_answerquestion') ?: 'Answer question',
    'vcInterWriteAnswer' => qa_opt('vc_inter_writeanswer') ?: 'write (an) answer',
    'vcInterDoComment' => qa_opt('vc_inter_docomment') ?: '(Do) (Add) (write) (a) comment',
    'vcInterCommentWhatAnswer' => qa_opt('vc_inter_commentwhatanswer') ?: 'In what answer do you wish to comment?',
    'vcInterCommentFirst' => qa_opt('vc_inter_commentfirst') ?: 'Comment the first one',
    'vcInterCommentSecond' => qa_opt('vc_inter_commentsecond') ?: 'Comment the second one',
    'vcInterCommentThird' => qa_opt('vc_inter_commentthird') ?: 'Comment the third one',
    'vcInterScrollToAnswers' => qa_opt('vc_inter_gotoanswers') ?: '(down) (to) answers',
    'vcFeedbackNoAnswers' => qa_opt('vc_inter_noanswers_fdbk') ?: 'I\'m sorry, but there are no answers to this question yet.',
    'vcInterPreviousAnswer' => qa_opt('vc_inter_previousanswer') ?: '(Go to) (Scroll to) previous answer',
    'vcInterNextAnswer' => qa_opt('vc_inter_nextanswer') ?: '(Go to) (Scroll to) next answer',
    'vcInterDeleteText' => qa_opt('vc_inter_deletetext') ?: 'delete (everything) (all) until',
    'vcInterEraseText' => qa_opt('vc_inter_erasetext') ?: 'erase (everything) (all) until',
    'vcInterDeleteAllText' => qa_opt('vc_inter_deletealltext') ?: 'delete everything',
    'vcInterEraseAllText' => qa_opt('vc_inter_erasealltext') ?: 'erase everything',
    'vcInterSubmit' => qa_opt('vc_inter_submit') ?: 'submit (answer) (comment)',
    'vcInterSubmitSend' => qa_opt('vc_inter_submit_send') ?: 'send (it) (answer) (comment)',
    'vcInterCancel' => qa_opt('vc_inter_cancel') ?: 'cancel (it) (that)',
    'vcInterStopWriting' => qa_opt('vc_inter_stopwriting') ?: 'stop (writing)',

    // Conversational
    'vcConvWhatTime' => qa_opt('vc_conv_whattime') ?: 'what time is it',
    'vcConvWhatDay' => qa_opt('vc_conv_whatday') ?: 'what day is (it) (today)',
    'vcConvAreyoureal' => qa_opt('vc_conv_areyoureal') ?: 'are you real',
    'vcConvSentient' => qa_opt('vc_conv_sentient') ?: 'are you sentient',
    'vcConvConscious' => qa_opt('vc_conv_conscious_fdbk') ?: 'are you conscious',
    'vcConvSentientFdbk' => qa_opt('vc_conv_conscious_fdbk') ?: 'I do not possess consciousness, but I can mimic human behavior.',
    'vcConvWhoareyou' => qa_opt('vc_conv_whoareyou') ?: 'who are you',
    'vcConvWhoareyouFdbk' => qa_opt('vc_conv_whoareyou_fdbk') ?: 'I\'m your AI assistant for this website.',

    'vcConvNotTalkingToYou' => qa_opt('vc_conv_nottalkingtoyou') ?: '(I am)(I\'m) not talking to you',
    'vcConvNotTalkingToYouFdbk' => qa_opt('vc_conv_nottalkingtoyou_fdbk') ?: 'Oh, I\'m sorry USERNAME. I thought you were talking to me.',
    'vcConvTalkingToYou' => qa_opt('vc_conv_talkingtoyou') ?: '(I am)(I\'m) talking to you',
    'vcConvTalkingToYouFdbk' => qa_opt('vc_conv_talkingtoyou_fdbk') ?: 'I\'m sorry USERNAME. I wasn\'t paying attention.',

    'vcConvThankYou' => qa_opt('vc_conv_thankyou') ?: 'Thank you',
    'vcConvThankYouFdbk' => qa_opt('vc_conv_thankyou_fdbk') ?: 'You\'re welcome USERNAME. I\'m here to help',

    // User Navigation
    'vcUserNavProfile' => qa_opt('vc_usernav_profile') ?: '(my) profile',
    'vcUserNavEditProfile' => qa_opt('vc_usernav_editprofile') ?: 'edit (my) profile',
    'vcUserNavMessages' => qa_opt('vc_usernav_messages') ?: '(my) messages',
    'vcUserNavFavorites' => qa_opt('vc_usernav_favorites') ?: '(my) favorites',
    'vcUserNavUpdates' => qa_opt('vc_usernav_updates') ?: '(my) updates',
    
    // Site Navigation
    'vcNavAsk' => qa_opt('vc_nav_ask') ?: 'ask (a) question',
    'vcNavAdmin' => qa_opt('vc_nav_admin') ?: 'admin (page)',
    'vcNavActivity' => qa_opt('vc_nav_activity') ?: 'activity (page)',
    'vcNavHome' => qa_opt('vc_nav_home') ?: 'home(page)',
    'vcNavQuestions' => qa_opt('vc_nav_questions') ?: 'questions (page)',
    'vcNavHot' => qa_opt('vc_nav_hot') ?: 'hot (page)',
    'vcNavUnanswered' => qa_opt('vc_nav_unanswered') ?: 'unanswered (page)',
    'vcNavTags' => qa_opt('vc_nav_tags') ?: 'tags (page)',
    'vcNavCategories' => qa_opt('vc_nav_categories') ?: 'categories (page)',
    'vcNavUsers' => qa_opt('vc_nav_users') ?: 'users (page)',
    'vcNavBadges' => qa_opt('vc_nav_badges') ?: 'badges (page)',

    'vcNavPreviousPage' => qa_opt('vc_nav_previous') ?: 'previous page',
    'vcNavGoBack' => qa_opt('vc_nav_goback') ?: 'go back',
    'vcScrollTop' => qa_opt('vc_scrolltop') ?: '(to) (the) top',
    'vcScrollBottom' => qa_opt('vc_scrollbottom') ?: '(to) (the) bottom',
    'vcScrollUpABit' => qa_opt('vc_scrollupabit') ?: 'up (a bit)',
    'vcScrollDownABit' => qa_opt('vc_scrolldownabit') ?: 'down (a bit)',

    // Navigation feedback
    'vcFeedbackNavigating' => qa_opt('vc_navigating') ?: 'Navigating to',

    // Open Questions
    'vcQopenFirst' => qa_opt('vc_qopen_first') ?: 'Open (the) first question',
    'vcQopenSecond' => qa_opt('vc_qopen_second') ?: 'Open (the) second question',
    'vcQopenThird' => qa_opt('vc_qopen_third') ?: 'Open (the) third question',
    'vcQopenFourth' => qa_opt('vc_qopen_fourth') ?: 'Open (the) fourth question',
    'vcQopenFifth' => qa_opt('vc_qopen_fifth') ?: 'Open (the) fifth question',
    'vcQopenSixth' => qa_opt('vc_qopen_sixth') ?: 'Open (the) sixth question',
    'vcQopenSeventh' => qa_opt('vc_qopen_seventh') ?: 'Open (the) seventh question',
    'vcQopenEighth' => qa_opt('vc_qopen_eighth') ?: 'Open (the) eighth question',
    'vcQopenNineth' => qa_opt('vc_qopen_nineth') ?: 'Open (the) nineth question',
    'vcQopenTenth' => qa_opt('vc_qopen_tenth') ?: 'Open (the) tenth question',
    'vcQopenEleventh' => qa_opt('vc_qopen_eleventh') ?: 'Open (the) eleventh question',
    'vcQopenTwelfth' => qa_opt('vc_qopen_twelfth') ?: 'Open (the) twelfth question',
    'vcQopenThirteenth' => qa_opt('vc_qopen_thirteenth') ?: 'Open (the) thirteenth question',
    'vcQopenFourteenth' => qa_opt('vc_qopen_fourteenth') ?: 'Open (the) fourteenth question',
    'vcQopenFifteenth' => qa_opt('vc_qopen_fifteenth') ?: 'Open (the) fifteenth question',
    'vcQopenLast' => qa_opt('vc_qopen_last') ?: 'Open (the) last question',

    // Feedback for opening questions
    'vcFeedbackOpeningQuestion' => qa_opt('vc_opening') ?: 'Opening question',
];
    

/*
    Omit PHP closing tag to help avoid accidental output
*/
