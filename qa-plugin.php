<?php

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
}

qa_register_plugin_layer('qa-voicecommander-layer.php', 'Voice Commander Layer');
qa_register_plugin_module('module', 'qa-voicecommander-admin.php', 'qa_voicecommander_admin', 'Voice Commander Admin');

