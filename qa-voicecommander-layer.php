<?php


class qa_html_theme_layer extends qa_html_theme_base {
		
	private $vc_version = '?v=38';
	
	// Check if the plugin is allowed globally or only for logged-in users
	public function is_vc_allowed_globally() {
		$vcLoggedInOnly = qa_opt('vc_loggedin_only_check') ? true : false;
		return ($vcLoggedInOnly && qa_is_logged_in() || $vcLoggedInOnly == false) && $this->template != 'admin' ? true : false;
	}
	
	// Loads the Language file
	private function load_voicecommander_lang()
	{
		static $lang = null;
		
		// Load the specified file if not already loaded
		if ($lang === null) {
			$lang = include QA_HTML_THEME_LAYER_DIRECTORY . 'qa-voicecommander-lang-default.php';
		}
		
		return $lang;
	}
	
	// Components
	public function raw_component_vc_button()
	{
		return <<<HTML
		<div class="drmpc-wrapper" title="AI Voice Commander">
			<div class="drmpc">
				<svg class="vcicon drmpc-officon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0, 0, 400,400"><g class="vcsvgg"><path class="vcpath0" d="M121.094 1.007 C 115.224 3.714,114.844 5.418,114.844 29.004 L 114.844 47.656 111.719 47.656 C 110.000 47.656,108.594 48.008,108.594 48.438 C 108.594 48.913,105.078 49.219,99.609 49.219 C 94.542 49.219,90.625 48.900,90.625 48.487 C 90.625 48.084,89.307 47.936,87.695 48.158 C 75.906 49.783,71.617 62.032,81.067 67.090 C 82.389 67.797,109.913 68.011,196.101 67.982 C 314.789 67.942,317.188 68.006,317.188 71.184 C 317.188 71.564,317.745 71.875,318.427 71.875 C 319.966 71.875,328.125 80.120,328.125 81.676 C 328.125 82.301,328.461 82.813,328.871 82.813 C 329.281 82.813,329.848 84.047,330.131 85.556 C 330.414 87.064,330.963 88.495,331.351 88.734 C 331.765 88.990,332.040 136.387,332.018 203.611 L 331.981 318.052 333.764 320.223 C 338.101 325.505,344.550 325.525,348.073 320.266 C 348.918 319.005,349.873 317.972,350.195 317.971 C 350.518 317.970,350.781 312.168,350.781 305.078 C 350.781 297.005,351.073 292.188,351.563 292.188 C 351.992 292.188,352.344 290.781,352.344 289.063 L 352.344 285.938 370.996 285.938 C 394.960 285.938,396.548 285.555,399.140 279.153 C 400.705 275.288,398.365 268.750,395.416 268.750 C 394.929 268.750,394.529 268.486,394.525 268.164 C 394.504 266.166,389.565 265.625,371.329 265.625 L 352.344 265.625 352.344 262.891 C 352.344 261.387,351.992 260.156,351.563 260.156 C 351.061 260.156,350.781 252.474,350.781 238.672 C 350.781 224.870,351.061 217.188,351.563 217.188 C 351.992 217.188,352.344 215.781,352.344 214.063 L 352.344 210.938 370.996 210.938 C 394.960 210.937,396.548 210.555,399.140 204.153 C 400.705 200.288,398.365 193.750,395.416 193.750 C 394.929 193.750,394.529 193.486,394.525 193.164 C 394.504 191.166,389.565 190.625,371.329 190.625 L 352.344 190.625 352.344 187.891 C 352.344 186.387,351.992 185.156,351.563 185.156 C 351.060 185.156,350.781 177.214,350.781 162.891 C 350.781 148.568,351.060 140.625,351.563 140.625 C 351.992 140.625,352.344 139.219,352.344 137.500 L 352.344 134.375 370.996 134.375 C 394.960 134.375,396.548 133.992,399.140 127.591 C 400.705 123.725,398.365 117.188,395.416 117.188 C 394.929 117.188,394.529 116.924,394.525 116.602 C 394.504 114.603,389.565 114.062,371.329 114.063 L 352.344 114.063 352.344 111.328 C 352.344 109.824,351.992 108.594,351.563 108.594 C 351.075 108.594,350.781 103.990,350.781 96.344 C 350.781 84.396,348.975 74.219,346.854 74.219 C 346.529 74.219,346.023 73.263,345.730 72.094 C 345.110 69.624,338.695 62.381,332.736 57.423 C 330.402 55.481,322.805 51.562,321.374 51.562 C 320.790 51.563,320.313 51.211,320.313 50.781 C 320.313 50.352,319.680 50.000,318.906 50.000 C 318.133 50.000,317.166 49.693,316.758 49.318 C 315.702 48.348,307.031 47.613,307.031 48.494 C 307.031 48.893,303.691 49.219,299.609 49.219 C 295.182 49.219,292.188 48.904,292.188 48.438 C 292.188 48.008,290.957 47.656,289.453 47.656 L 286.719 47.656 286.719 28.671 C 286.719 10.435,286.178 5.496,284.180 5.475 C 283.857 5.471,283.594 5.071,283.594 4.584 C 283.594 1.635,277.056 -0.705,273.191 0.860 C 266.789 3.452,266.406 5.040,266.406 29.004 L 266.406 47.656 263.281 47.656 C 261.563 47.656,260.156 48.008,260.156 48.438 C 260.156 48.940,252.214 49.219,237.891 49.219 C 223.568 49.219,215.625 48.940,215.625 48.438 C 215.625 48.008,214.395 47.656,212.891 47.656 L 210.156 47.656 210.156 28.671 C 210.156 10.435,209.616 5.496,207.617 5.475 C 207.295 5.471,207.031 5.071,207.031 4.584 C 207.031 1.635,200.494 -0.705,196.628 0.860 C 190.227 3.452,189.844 5.040,189.844 29.004 L 189.844 47.656 186.719 47.656 C 185.000 47.656,183.594 48.008,183.594 48.438 C 183.594 48.939,175.911 49.219,162.109 49.219 C 148.307 49.219,140.625 48.939,140.625 48.438 C 140.625 48.008,139.395 47.656,137.891 47.656 L 135.156 47.656 135.156 28.671 C 135.156 10.435,134.616 5.496,132.617 5.475 C 132.295 5.471,132.031 5.092,132.031 4.632 C 132.031 1.365,125.215 -0.894,121.094 1.007 M55.078 76.721 C 54.219 77.212,53.068 78.239,52.522 79.003 C 51.975 79.767,50.956 80.964,50.257 81.662 C 48.337 83.583,47.728 88.260,47.690 101.367 L 47.656 113.281 28.671 113.281 C 10.435 113.281,5.496 113.822,5.475 115.820 C 5.471 116.143,5.071 116.406,4.584 116.406 C 1.635 116.406,-0.705 122.944,0.860 126.809 C 3.452 133.211,5.040 133.594,29.004 133.594 L 47.656 133.594 47.656 136.719 C 47.656 138.438,48.008 139.844,48.438 139.844 C 48.940 139.844,49.219 147.786,49.219 162.109 C 49.219 176.432,48.940 184.375,48.438 184.375 C 48.008 184.375,47.656 185.605,47.656 187.109 L 47.656 189.844 28.671 189.844 C 10.435 189.844,5.496 190.384,5.475 192.383 C 5.471 192.705,5.071 192.969,4.584 192.969 C 1.635 192.969,-0.705 199.506,0.860 203.372 C 3.452 209.773,5.040 210.156,29.004 210.156 L 47.656 210.156 47.656 213.281 C 47.656 215.000,48.008 216.406,48.438 216.406 C 48.939 216.406,49.219 224.089,49.219 237.891 C 49.219 251.693,48.939 259.375,48.438 259.375 C 48.008 259.375,47.656 260.605,47.656 262.109 L 47.656 264.844 28.671 264.844 C 10.435 264.844,5.496 265.384,5.475 267.383 C 5.471 267.705,5.071 267.969,4.584 267.969 C 1.635 267.969,-0.705 274.506,0.860 278.372 C 3.452 284.773,5.040 285.156,29.004 285.156 L 47.656 285.156 47.656 288.672 C 47.656 290.605,48.008 292.188,48.438 292.188 C 48.924 292.188,49.219 296.661,49.219 304.046 C 49.219 315.603,51.058 325.781,53.146 325.781 C 53.471 325.781,53.977 326.737,54.270 327.906 C 54.890 330.376,61.305 337.619,67.264 342.577 C 69.598 344.519,77.195 348.438,78.626 348.438 C 79.210 348.438,79.688 348.789,79.688 349.219 C 79.688 349.648,80.370 350.000,81.204 350.000 C 82.038 350.000,82.938 350.352,83.204 350.782 C 83.510 351.278,86.891 351.381,92.435 351.064 C 97.246 350.790,104.256 350.821,108.013 351.134 L 114.844 351.703 114.844 370.285 C 114.844 394.171,115.230 395.768,121.628 398.358 C 125.494 399.923,132.031 397.583,132.031 394.635 C 132.031 394.148,132.295 393.747,132.617 393.744 C 134.613 393.723,135.156 388.784,135.156 370.656 L 135.156 351.780 139.258 351.287 C 144.633 350.642,178.875 350.639,185.042 351.283 L 189.844 351.785 189.844 370.326 C 189.844 394.167,190.231 395.769,196.628 398.358 C 200.494 399.923,207.031 397.583,207.031 394.635 C 207.031 394.148,207.295 393.747,207.617 393.744 C 209.613 393.723,210.156 388.784,210.156 370.656 L 210.156 351.780 214.258 351.287 C 219.635 350.642,255.435 350.638,261.604 351.283 L 266.406 351.785 266.406 370.326 C 266.406 394.167,266.794 395.769,273.191 398.358 C 277.056 399.923,283.594 397.583,283.594 394.635 C 283.594 394.148,283.857 393.747,284.180 393.744 C 286.176 393.723,286.719 388.784,286.719 370.656 L 286.719 351.780 290.820 351.287 C 297.539 350.480,305.469 350.679,305.469 351.654 C 305.469 352.754,315.182 351.825,317.427 350.510 C 324.392 346.428,326.080 339.834,321.468 334.724 C 318.986 331.974,319.243 331.980,203.899 332.018 C 85.211 332.058,82.813 331.994,82.813 328.816 C 82.813 328.436,82.255 328.125,81.573 328.125 C 80.034 328.125,71.875 319.880,71.875 318.324 C 71.875 317.699,71.539 317.188,71.129 317.188 C 70.719 317.188,70.152 315.953,69.869 314.444 C 69.586 312.936,69.037 311.505,68.649 311.266 C 68.235 311.010,67.960 263.613,67.982 196.389 L 68.019 81.948 66.236 79.720 C 63.220 75.949,58.602 74.708,55.078 76.721 M190.712 94.985 C 176.385 98.838,165.652 108.663,160.658 122.496 C 158.747 127.789,157.682 195.513,159.337 206.519 C 165.825 249.680,229.421 252.511,239.422 210.084 C 241.356 201.880,241.169 131.225,239.195 124.106 C 233.492 103.538,210.426 89.683,190.712 94.985 M207.005 113.736 C 215.045 116.124,221.525 124.672,223.907 136.032 C 225.977 145.907,225.118 197.768,222.766 204.898 C 214.976 228.512,187.357 229.441,177.611 206.417 L 175.391 201.172 175.153 170.443 C 174.999 150.435,175.212 138.289,175.765 135.627 C 179.279 118.700,192.507 109.431,207.005 113.736 M129.219 177.656 L 126.563 180.313 126.563 195.690 C 126.563 219.619,131.084 232.577,145.202 249.113 C 154.465 259.962,172.930 270.180,187.118 272.308 L 190.625 272.834 190.625 280.557 L 190.625 288.281 175.488 288.281 C 167.163 288.281,159.240 288.503,157.882 288.775 C 149.960 290.360,148.202 299.866,154.974 304.506 L 157.519 306.250 199.928 306.250 C 241.621 306.250,242.375 306.223,244.618 304.626 C 251.223 299.922,249.892 291.190,242.246 289.066 C 240.710 288.639,232.510 288.288,224.023 288.286 L 208.594 288.281 208.594 280.542 L 208.594 272.803 212.619 272.249 C 237.199 268.869,260.978 248.322,269.580 223.031 C 272.755 213.697,273.191 180.194,270.175 177.383 C 267.928 175.290,266.030 174.750,262.948 175.328 C 257.016 176.441,255.625 180.635,255.526 197.703 C 255.218 250.672,197.072 275.904,160.089 239.117 C 147.596 226.690,144.589 218.673,143.856 195.838 L 143.359 180.348 140.441 177.674 C 136.421 173.991,132.890 173.985,129.219 177.656 " stroke="none" fill-rule="evenodd"></path></g></svg>
				<div class="vcicon drmpc-onicon">
					<div class="drmpc-bar"></div>
					<div class="drmpc-bar"></div>
					<div class="drmpc-bar"></div>
				</div>
			</div>
		</div>
		HTML;
	}

	private function component_script_last_active()
	{
		return <<<HTML
		<script>
			/* Check if last active */
			function vcFirstCheck(){
				let vcButtons = document.getElementsByClassName("drmpc-wrapper"),
					len = vcButtons !== null ? vcButtons.length : 0,
					i = 0;
				for(i; i < len; i++) {
					vcButtons[i].className += " active-pulse";
				}
			}
			if (localStorage.LSQ2AVCstate === "Q2AVCactive") {
				vcFirstCheck();
			}
		</script>
		HTML;
	}

	private function component_script_reset_to_defaults()
	{
		return <<<HTML
		<script>
			document.addEventListener('DOMContentLoaded', () => {
				const resetButton = document.querySelector('button[name="vc_reset_settings"]');
				if (resetButton) {
					resetButton.addEventListener('click', () => {
						document.querySelectorAll('.qa-part-form-plugin-options input:not([name="qa_form_security_code"])').forEach(input => {
							input.value = '';
						});
						
						// Chang to default Voice selection
						document.querySelectorAll('[name="vc_feedback_voice"] option').forEach(option => {
							option.selected = false; // Deselect all
						});
						document.querySelector('[name="vc_feedback_voice"] option[value="9"]').selected = true;
					});
				}
			});
		</script>
		HTML;
	}
	
	private function component_feedback_box()
	{
		$vcLang = $this->load_voicecommander_lang();
		
		$isFeedbackBoxOn = qa_opt('vc_textFeedback_check') ? '' : 'style="display:none;"';

		$this->output('
		<div id="vcstatus" class="vcBox" '.$isFeedbackBoxOn.'>
			<div id="vcstatus-icon">
				'. $this->raw_component_vc_button() .'
			</div>
			<div id="vcstatus-message">'.$vcLang["vcMiscStartUp"].'</div>
			<div class="vcstatus-bg"></div>
		</div>
		');
	}
	
	// Styles
	public function head_css()
	{
		qa_html_theme_base::head_css();
		
		if ($this->is_vc_allowed_globally()) {
			
			$vcLang = $this->load_voicecommander_lang();
			
			// Preconnect to CloudFlare
			$this->output('
				<link rel="preconnect" href="//cdnjs.cloudflare.com">
				<link rel="preload" as="style" href="'.QA_HTML_THEME_LAYER_URLTOROOT.'css/vc-styles.min.css'.$this->vc_version.'" onload="this.onload=null;this.rel=\'stylesheet\'">
				<noscript><link rel="stylesheet" href="'.QA_HTML_THEME_LAYER_URLTOROOT.'css/vc-styles.min.css'.$this->vc_version.'"></noscript>
			');
			
			$earlyCSS ='
			<style>
				/* AIVC */
				.vcBox {
					color: '.$vcLang["vcFeedbackBoxTextColor"].';
				}
				#vcstatus .active-pulse .dri {
					background-color: '.$vcLang["vcFeedbackBoxTextColor"].';
				}
				#vcstatus .active-pulse .vcicon {
					fill: '.$vcLang["vcFeedbackBoxTextColor"].';
				}
				.vcstatus-bg {
					background-color: '.$vcLang["vcFeedbackBoxColor"].';
				}
			</style>
			';
			
			if (qa_opt('site_theme') == 'Polaris' && method_exists($this, 'minify_code')) {
				$this->output($this->minify_code($earlyCSS));
			} else {
				$this->output($earlyCSS);
			}
		}
	}
	
	// Add Trigger Button to the header
	public function nav_user_search() {
		if ($this->is_vc_allowed_globally()) {
			
			// Add Component + Check last_active early, so it animates right away without delay
			$this->output( 
				$this->raw_component_vc_button() . $this->component_script_last_active()
			);
		}
		qa_html_theme_base::nav_user_search();
	}
	
	// VC Scripts + Feedback Box
	private function voice_commander_scripts()
	{
		if ($this->is_vc_allowed_globally()) {
			$this->output('<div class="vc-container">');
				
				$this->component_feedback_box();
				
				$this->output('
					<script src="https://cdnjs.cloudflare.com/ajax/libs/annyang/2.6.0/annyang.min.js" defer></script>
					<script src="'.QA_HTML_THEME_LAYER_URLTOROOT.'js/voice-commander.min.js'.$this->vc_version.'" defer></script>
				');
			$this->output('</div>');
		}
		
		if ($this->template == 'admin' && qa_get_logged_in_level() >= QA_USER_LEVEL_ADMIN) {
			if (qa_clicked('vc_save_button')) {
				
				$getJSFile = QA_HTML_THEME_LAYER_DIRECTORY .'js/voice-commander.min.js'; // Get JS file to store in
				$saveVoiceCommanderJS = $this->voice_commander_js(); // Get JS code
				
				if (qa_opt('site_theme') == 'Polaris' && method_exists($this, 'minify_code')) {
					file_put_contents($getJSFile, $this->minify_code($saveVoiceCommanderJS));
				} else {
					file_put_contents($getJSFile, $saveVoiceCommanderJS);
				}
			}
			
			// Script - Reset to defaults
			$this->output($this->component_script_reset_to_defaults());
		}
	}
	
	// Adds Scripts and Feedback Box to the bottom of the DOM
	public function body_hidden()
	{
		qa_html_theme_base::body_hidden();
		$this->voice_commander_scripts();
	}
	
	// Get Admin Settings and save it to the 'voice-commander.min.js' file
	private function voice_commander_js()
	{
		$vcLang = $this->load_voicecommander_lang();
		
		// $vc_audio_path = QA_HTML_THEME_LAYER_URLTOROOT;
		// $vc_audio_path = qa_opt('site_url') . substr(QA_HTML_THEME_LAYER_URLTOROOT, 5);
		
		$vc_audio_path = dirname($_SERVER['PHP_SELF']) . QA_HTML_THEME_LAYER_URLTOROOT;
		
		$aiVcScript = '
			document.addEventListener("DOMContentLoaded", () => {
				const isChromium = window.chrome,
					winNav = window.navigator,
					vendorName = winNav.vendor,
					isOpera = winNav.userAgent.indexOf("OPR") > -1,
					isIEedge = winNav.userAgent.indexOf("Edge") > -1,
					isIEedgeChromium = winNav.userAgent.indexOf("Edg") > -1,
					isIOSChrome = winNav.userAgent.match("CriOS");
				
				const htmlBody = [document.documentElement, document.body];
				const chatStatus = document.getElementById("vcstatus");
				const chatMessage = document.querySelector("#vcstatus #vcstatus-message");
				const drmpcWrapper = document.querySelectorAll(".drmpc-wrapper");
				let statusVar;
				
				const qaAListItem = document.querySelector(".qa-a-list-item");
				const qaAListItems = document.querySelectorAll(".qa-a-list .vcWatching");
				const vcWhichElement = document.querySelector(".vc-whichone");
				const vcWhichElementAll = document.querySelectorAll(".vc-whichone");
				const qaAList = document.querySelector(".qa-a-list");
				const tagsInput = document.querySelector("#tags");
				const qaQList = document.querySelector(".qa-q-list");
				
				const audioPath = "'.$vc_audio_path.'";
				
				const vcastart = new Audio(`${audioPath}audio/lovelyboot1-103697.mp3`);
				const vcashutdown = new Audio(`${audioPath}audio/harp-motif2-36586.mp3`);
				const vcamatch = new Audio(`${audioPath}audio/strange-notification-36458.mp3`);
				
				/* 
					Trick to play sound, 
					Because autoplay sounds are only aloud after first interaction with a website. 
				*/
				let vcSoundPlay = false;
				
				document.addEventListener("click", () => {
					vcSoundPlay = true;
				});
				
				let vcLocalUsername = "";
				if (localStorage.vcLocalName) vcLocalUsername = localStorage.vcLocalName;
				
				let isRecording = false;
				
				/* Check if last active */
				if (localStorage.LSQ2AVCstate === "Q2AVCactive") {
					annyang.start();
					isRecording = true;
					vcFirstCheck(); /* Check again because DOM load */
				}
				
				const startVoiceCommander = () => {
					vcastart.play();
					chatStatus.classList.add("active");
					
					setTimeout(function () {
						annyang.start();
						isRecording = true;
						localStorage.LSQ2AVCstate = "Q2AVCactive";
						
						if (vcLocalUsername) {
							statusVar = "'.$vcLang["vcMiscHello"].' " + vcLocalUsername + "!";
							/* statusVar = statusVar.replace("USERNAME", vcLocalUsername); */
							chatMessage.innerHTML = statusVar;
						} else {
							statusVar = "'.$vcLang["vcInterActivatedFdbk"].' '.$vcLang["vcInterSayHelloFdbk"].'";
							chatMessage.innerHTML = statusVar;
						}
						msg.text = statusVar;
						speechSynthesis.speak(msg);
					},1200);
				};
				
				const runAI = () => {
					drmpcWrapper.forEach((el) => {
						if (el.classList.contains("active-pulse")) {
							setTimeout(() => {
								el.classList.remove("active-pulse");
								el.classList.add("vc-temp-animation");
							}, 2000);
						} else {
							el.classList.add("active-pulse");

							const animationEnd = () => {
								el.classList.remove("active-pulse");
								el.classList.add("vc-temp-animation");

								// Clean up event listeners to avoid duplicates
								el.removeEventListener("animationend", animationEnd);
								el.removeEventListener("webkitAnimationEnd", animationEnd);
								el.removeEventListener("oanimationend", animationEnd);
								el.removeEventListener("msAnimationEnd", animationEnd);
							};

							el.addEventListener("animationend", animationEnd);
							el.addEventListener("webkitAnimationEnd", animationEnd);
							el.addEventListener("oanimationend", animationEnd);
							el.addEventListener("msAnimationEnd", animationEnd);
						}
					});

					if (isRecording) {
						abortVoiceCommander();
					} else {
						startVoiceCommander();
					}
				};
				
				const abortVoiceCommander = () => {
					
					chatStatus.classList.add("active");
					statusVar = "'.$vcLang["vcInterShutdownFdbk"].'";
					chatMessage.innerHTML = statusVar;
					
					msg.text = statusVar;
					speechSynthesis.speak(msg);
					
					vcShutdown();
				};
				
				const vcShutdown = () => {
					annyang.abort();
					isRecording = false;
					localStorage.LSQ2AVCstate = "Q2AVCdeactivated";
					
					setTimeout(() => {
						vcashutdown.volume = 0.6;
						
						if (vcSoundPlay === true) {
							vcashutdown.play();
						}
						
						drmpcWrapper.forEach(wrapper => wrapper.classList.remove("active-pulse"));
					}, 2200);
					
					setTimeout(() => {
						chatStatus.classList.remove("active");
						
						/* Reset to the initial text, before starting VC */
						chatMessage.innerHTML = "'.$vcLang["vcMiscStartUp"].'";
					}, 4000);
				};
				
				function toggleCommander() {
					const isSupportedBrowser = (
						isIOSChrome ||
						(isChromium !== null &&
						isChromium !== undefined &&
						vendorName === "Google Inc." &&
						!isOpera &&
						!isIEedge &&
						!isIEedgeChromium)
					);

					if (isSupportedBrowser) {
						runAI();
					} else {
						drmpcWrapper.forEach(wrapper => wrapper.remove());
						
						chatMessage.innerHTML = "Uh Oh! Browser not supported.<br/>Use Google Chrome to fully experience the AI bot.";
						chatStatus.classList.add("active");
						
						setTimeout(() => {
							chatStatus.classList.remove("active");
						}, 4000);
					}
				}
				
				document.querySelectorAll(".drmpc").forEach((el) => {
					el.addEventListener("click", (event) => {
						/* event.preventDefault(); */
						toggleCommander();
					});
				});
				
				if(chatStatus){
					chatStatus.addEventListener("click", (event) => {
						/* event.preventDefault(); */
						chatStatus.classList.remove("active");
					});
				}
					
				if (isIOSChrome || isChromium !== null && isChromium !== undefined && vendorName === "Google Inc." && isOpera == false && isIEedge == false && isIEedgeChromium == false)
				{
					
					const getCommandsList = () => {
						const commandList = document.querySelector(".vc-command-list");
						
						if (!commandList) {
							chatStatus.insertAdjacentHTML("afterend", "\
							<div class=\"vc-command-list vcBox\">\
								<h3>'.$vcLang["vcInterHelpFdbk"].'<span class=\"vc-close-command-list\">&#x2715;</span></h3>\
								<blockquote>'.$vcLang["vcCommandsTitleExplanation"].'</blockquote>\
								<h4>'.$vcLang["vcCommandsTitleNavigation"].':</h4>\
								<ul>\
									<li>'.$vcLang["vcSearch"].' [word]</li>\
									<li>'.$vcLang["vcComboGo"].' '.$vcLang["vcNavHome"].'</li>\
									<li>'.$vcLang["vcComboGo"] .' ' .$vcLang["vcNavQuestions"].'</li>\
									<li>...</li>\
									<li>'.$vcLang["vcQopenFirst"].'</li>\
									<li>'.$vcLang["vcQopenSecond"].'</li>\
									<li>...</li>\
									<li>'.$vcLang["vcNavGoBack"].'</li>\
								</ul>\
								<h4>' . qa_lang_html("main/nav_ask") . ':</h4>\
								<ul>\
									<li>'.$vcLang["vcNavAsk"].'</li>\
									<li>'.$vcLang["vcInterSetTitle"].'</li>\
									<li>'.$vcLang["vcInterSetBody"].'</li>\
									<li>'.$vcLang["vcInterSetTags"].'</li>\
								</ul>\
								<h4>' . qa_lang_html("question/add_answer_button") . ' / ' . qa_lang_html("question/comment_button") . ':</h4>\
								<ul>\
									<li>'.$vcLang["vcInterAnswerQuestion"].'</li>\
									<li>'.$vcLang["vcInterDoAnswer"].'</li>\
									<li>'.$vcLang["vcInterDoComment"].'</li>\
									<li>'. $vcLang["vcInterStopWriting"].'</li>\
									<li>'.$vcLang["vcInterCancel"].'</li>\
									<li>'. $vcLang["vcInterSubmitSend"].'</li>\
								</ul>\
							</div>");
						}
						setTimeout(() => {
							const newCommandList = document.querySelector(".vc-command-list");
							if (newCommandList) {
								newCommandList.classList.add("active");
							}
						}, 2000);
					};
					
					const closeCommandsList = () => {
						const dynamicCommandList = document.querySelector(".vc-command-list"); /* re-select it dynamically */
						if (dynamicCommandList) {
							dynamicCommandList.classList.remove("active");
							setTimeout(() => {
								dynamicCommandList.remove();
							}, 1000);
						}
					};
					
					document.addEventListener("click", (event) => {
						if (event.target.matches(".vc-close-command-list")) {
							closeCommandsList();
						}
					});
					
					const debounce = (func, wait, immediate) => {
						let timeout;
						return (...args) => {
							const context = this;
							const later = () => {
								timeout = null;
								if (!immediate) func.apply(context, args);
							};
							const callNow = immediate && !timeout;
							clearTimeout(timeout);
							timeout = setTimeout(later, wait);
							if (callNow) func.apply(context, args);
						};
					};
					
					/* Answer is in Viewport */
					const updateWatchingItem = () => {
						const items = document.querySelectorAll(".qa-a-list-item");
						let closestItem = null;
						let closestDistance = Infinity;
						const viewportCenter = window.innerHeight / 2;

						items.forEach(item => {
							const rect = item.getBoundingClientRect();
							const itemCenter = rect.top + rect.height / 2;

							/* Skip invisible/collapsed elements */
							if (rect.height === 0 || rect.top > window.innerHeight || rect.bottom < 0) return;

							const distanceToCenter = Math.abs(itemCenter - viewportCenter);
							if (distanceToCenter < closestDistance) {
								closestDistance = distanceToCenter;
								closestItem = item;
							}
						});

						/* Only update if there\'s a visible candidate */
						if (closestItem) {
							items.forEach(item => {
								item.classList.toggle("vcWatching", item === closestItem);
							});
						}
					};

					/* Wrap it with debounce (e.g., 100ms delay) */
					const debouncedUpdateWatchingItem = debounce(updateWatchingItem, 100);

					/* Attach events */
					window.addEventListener("scroll", debouncedUpdateWatchingItem);
					window.addEventListener("resize", debouncedUpdateWatchingItem);
					document.addEventListener("DOMContentLoaded", updateWatchingItem); /* Initial run, no debounce */
					
					
					document.addEventListener("click", (event) => {
						const clicked = event.target.closest(".vc-whichone");
						if (clicked) {
							clicked.classList.add("fadeOut");
							setTimeout(() => {
								clicked.remove();
							}, 1000); /* Duration should match CSS animation time */
						}
					});
					
					const setVoice = () => {
						/* This have to be var */
						var voices = window.speechSynthesis.getVoices();
						
						if (voices.length === 0) {
							/* If voices havent loaded yet, wait and try again */
							setTimeout(setVoice, 100);
						} else {
							/* Set the voice (replace 10 with the desired index) */
							msg.voice = voices['.$vcLang["feedbackVoice"].'];
							/* Now you can use msg to speak */
							speechSynthesis.speak(msg);
						}
					};

					if (annyang) {
						/* console.log(window.speechSynthesis.getVoices()) */
						
						/* This have to be var */
						var msg = new SpeechSynthesisUtterance();
						setVoice();
						msg.voiceURI = "native";
						msg.volume = '.$vcLang["voiceFeedbackVolume"].'; /* 0 to 1 */
						msg.rate = '.$vcLang["voiceFeedbackRate"].'; /* 0.1 to 10 - Typical usable range: 0.5 to 2 */
						msg.pitch = '.$vcLang["voiceFeedbackPitch"].'; /* 0 to 2 */
						msg.lang = "'.$vcLang["vcLanguage"].'";

						annyang.setLanguage("'.$vcLang["vcLanguage"].'");
						
						/* Search */
						const jsVCsearch = search => {
							statusVar = "'.$vcLang["vcFeedbackSearching"].' " + search;
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							setTimeout(() => {
								const navigateToUrl = "' . qa_path( qa_opt('site_url') . 'search') . '?q=" + search;
								location.href = navigateToUrl.replace(/(:\/\/)|(\/)+/g, "$1$2");
							}, 2000);
						};
						
						/* Greetings / Miscellaneous */
						const vcGreeting = () => {
							
							if (vcLocalUsername) {
								statusVar = "'.$vcLang["vcMiscHello"].' " + vcLocalUsername + "!";
							} else {
								statusVar = "'.$vcLang["vcMiscHelloFdbk"].'";
							}
							
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
						};
						const vcAskAIName = () => {
							statusVar = "'.$vcLang["vcMiscAskAINameFdbk"].' '.$vcLang["vcNickname"].'".replace("USERNAME", vcLocalUsername);
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
						};
						const vcUserNameIs = (setUsername) => {
							setUsername = setUsername.substr(0, 1).toUpperCase() + setUsername.substr(1);

							statusVar = "'.$vcLang["vcMiscNicetomeet"].' " + setUsername + "! " + "'.$vcLang["vcMiscUserNameFdbk"].'";
							chatMessage.innerHTML = "'.$vcLang["vcMiscNicetomeet"].' " + setUsername + "!<br>" + "'.$vcLang["vcMiscUserNameFdbk"].'";
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							vcLocalUsername = setUsername;
							localStorage.setItem("vcLocalName", setUsername);
							getCommandsList();
						};
						const vcHowAreYou = () => {
							statusVar = "'.$vcLang["vcMiscHowareyouFdbk"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
						};
						
						/* Interactivity */
						const vcCommandList = () => {
							statusVar = "'.$vcLang["vcInterHelpFdbk"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							getCommandsList();
						};
						const vcCloseCommandsList = () => {
							closeCommandsList();
						};
						const vcRefreshPage = () => {
							statusVar = `'.$vcLang["vcInterRefreshFdbk"].'`;
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							setTimeout(() => {
								location.reload();
							}, 1000);
						};

						const vcTurnOff = () => {
							statusVar = `'.$vcLang["vcInterTurnoffFdbk"].'`;
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;

							chatStatus.classList.add("active");
							speechSynthesis.speak(msg);
							
							vcShutdown();

							const speakingStatus = document.querySelector(".speakingStatus");
							if (speakingStatus) {
								speakingStatus.innerHTML = `'.$vcLang["vcInterTurnoffFdbk"].'`;
							}
						};

						const vcMathAdd = (tag, tag2) => {
							/* Had to regex as well to remove prepended text that may come with numbers */
							const intTag = Number(tag.replace(/\D/g,""));
							const intTag2 = Number(tag2.replace(/\D/g,""));
							
							const addResult = intTag + intTag2;
							statusVar = `${intTag} + ${intTag2} = ${addResult}`;
							
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
						};

						const vcMathMinus = (tag, tag2) => {
							const intTag = Number(tag.replace(/\D/g,""));
							const intTag2 = Number(tag2.replace(/\D/g,""));
							
							const minusResult = intTag - intTag2;
							statusVar = `${intTag} - ${intTag2} = ${minusResult}`;
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
						};

						const vcMathTimes = (tag, tag2) => {
							const intTag = Number(tag.replace(/\D/g,""));
							const intTag2 = Number(tag2.replace(/\D/g,""));
							
							const timesResult = intTag * intTag2;
							statusVar = `${intTag} * ${intTag2} = ${timesResult}`;
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
						};

						const vcMathDivide = (tag, tag2) => {
							const intTag = Number(tag.replace(/\D/g,""));
							const intTag2 = Number(tag2.replace(/\D/g,""));
							
							const divideResult = intTag / intTag2;
							statusVar = `${intTag} ÷ ${intTag2} = ${divideResult}`;
							
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
						};
						
						/* Interactivity Question Page */
						const vcSetTitle = () => {
							const titleElement = document.getElementById("title");
							window.scrollTo({
								top: titleElement.offsetTop - 300,
								behavior: "smooth"
							});
							titleElement.focus();
							chatMessage.innerHTML = "writingText";
						};

						const vcSetCategory = () => {
							const contentElement = document.querySelector("[name=\"content\"]");
							window.scrollTo({
								top: contentElement.offsetTop - 300,
								behavior: "smooth"
							});
							contentElement.focus();
							chatMessage.innerHTML = "writingText";
						};

						const vcSetBody = () => {
							const contentElement = document.querySelector("[name=\"content\"]");
							window.scrollTo({
								top: contentElement.offsetTop - 300,
								behavior: "smooth"
							});
							contentElement.focus();
							chatMessage.innerHTML = "writingText";
						};

						const vcSetTags = () => {
							const tagsElement = document.getElementById("tags");
							window.scrollTo({
								top: tagsElement.offsetTop - 300,
								behavior: "smooth"
							});
							tagsElement.focus();
							chatMessage.innerHTML = "writingText";
						};

						const vcWriteAnswer = () => {
							qa_toggle_element("anew");
							const anewElement = document.getElementById("anew");
							window.scrollTo({
								top: anewElement.offsetTop - 200,
								behavior: "smooth"
							});
							const answerContentElement = document.querySelector("[name=\"a_content\"]");
							answerContentElement.focus();
							chatMessage.innerHTML = "writingText";
						};
						
						const vcWriteComment = () => {
							const countWatching = document.querySelectorAll(".vcWatching").length;

							if (countWatching === 1) {
								document.querySelector(".vcWatching .qa-form-light-button-comment").click();
								document.querySelector(".vcWatching .qa-c-form [name*=\"_content\"]").focus();
								chatMessage.innerHTML = "writingText";
							} else if (countWatching === 2 || countWatching === 3) {
								setTimeout(() => {
									const vcWhichoneElements = document.querySelectorAll(".vc-whichone");
									vcWhichoneElements.forEach(el => el.remove());

									qaAListItems.forEach((item, index) => {
										if (index < countWatching) {
											const commentText = (index === 0) ? "'.$vcLang["vcInterCommentFirst"].'" :
																(index === 1) ? "'.$vcLang["vcInterCommentSecond"].'" :
																(index === 2) ? "'.$vcLang["vcInterCommentThird"].'" : "";
											const newElement = document.createElement("div");
											newElement.classList.add("vc-whichone");
											newElement.textContent = commentText;
											item.appendChild(newElement);
										}
									});
								}, 2000);

								statusVar = "'.$vcLang["vcInterCommentWhatAnswer"].'";
								chatMessage.innerHTML = statusVar;
								msg.text = statusVar;
								speechSynthesis.speak(msg);
							}
						};
						const vcCommentFirstOption = () => {
							/* This ensures it always fetches the current .vcWatching element */
							const vcWatching = document.querySelector(".vcWatching");
							
							if (qaAListItems.length > 1) {
								qaAListItems[1].classList.remove("vcWatching");
							}
							if (qaAListItems.length > 2) {
								qaAListItems[2].classList.remove("vcWatching");
							}

							vcWatching.querySelector(".qa-form-light-button-comment").click();
							vcWatching.querySelector(".qa-c-form [name*=\"_content\"]").focus();

							chatMessage.innerHTML = "writingText";

							vcWhichElementAll.forEach(el => {
								el.classList.add("fadeOut");
								setTimeout(() => {
									el.remove();
								}, 1000); /* Wait for the fadeOut animation to complete before removing */
							});
						};

						const vcCommentSecondOption = () => {
							const vcWatching = document.querySelector(".vcWatching");
							
							if (qaAListItems.length > 0) {
								qaAListItems[0].classList.remove("vcWatching");
							}
							if (qaAListItems.length > 2) {
								qaAListItems[2].classList.remove("vcWatching");
							}

							vcWatching.querySelector(".qa-form-light-button-comment").click();
							vcWatching.querySelector(".qa-c-form [name*=\"_content\"]").focus();

							chatMessage.innerHTML = "writingText";

							vcWhichElementAll.forEach(el => {
								el.classList.add("fadeOut");
								setTimeout(() => {
									el.remove();
								}, 1000); /* Wait for the fadeOut animation to complete before removing */
							});
						};

						const vcCommentThirdOption = () => {
							const vcWatching = document.querySelector(".vcWatching");
							
							if (qaAListItems.length > 0) {
								qaAListItems[0].classList.remove("vcWatching");
							}
							if (qaAListItems.length > 1) {
								qaAListItems[1].classList.remove("vcWatching");
							}

							vcWatching.querySelector(".qa-form-light-button-comment").click();
							vcWatching.querySelector(".qa-c-form [name*=\"_content\"]").focus();

							chatMessage.innerHTML = "writingText";

							vcWhichElementAll.forEach(el => {
								el.classList.add("fadeOut");
								setTimeout(() => {
									el.remove();
								}, 1000); /* Wait for the fadeOut animation to complete before removing */
							});
						};
						const vcScrollToAnswers = () => {
							const qaAListItem = document.querySelectorAll(".qa-a-list-item");
							if (qaAListItem.length !== 0) {
								const targetPosition = document.querySelector(".qa-part-a-list").getBoundingClientRect().top + window.pageYOffset - 75;
								window.scrollTo({
									top: targetPosition,
									behavior: "smooth"
								});
							} else {
								statusVar = "'.$vcLang["vcFeedbackNoAnswers"].'";
								chatMessage.innerHTML = statusVar;
								msg.text = statusVar;
								speechSynthesis.speak(msg);
								
								const targetPosition = document.querySelector(".qa-part-a-list").getBoundingClientRect().top + window.pageYOffset - 300;
								window.scrollTo({
									top: targetPosition,
									behavior: "smooth"
								});
							}
						};
						const vcPreviousAnswer = () => {
							const vcWatching = document.querySelector(".vcWatching");
							if (!vcWatching) return;

							const previousAnswer = vcWatching.previousElementSibling;
							
							if (previousAnswer) {
								const targetPosition = previousAnswer.getBoundingClientRect().top + window.pageYOffset - 66;
								window.scrollTo({
									top: targetPosition,
									behavior: "smooth"
								});
							}
						};
						const vcNextAnswer = () => {
							const vcWatching = document.querySelector(".vcWatching");
							if (!vcWatching) return;
							
							const nextAnswer = vcWatching.nextElementSibling;

							if (nextAnswer) {
								const targetPosition = nextAnswer.getBoundingClientRect().top + window.pageYOffset - 66;
								window.scrollTo({
									top: targetPosition,
									behavior: "smooth"
								});
							}
						};
						const vcWriteText = writingText => {
							const focusedInput = document.querySelector("input:focus") ? document.querySelector("input:focus").value : "";
							const focusedTextarea = document.querySelector("textarea:focus") ? document.querySelector("textarea:focus").value : "";
							
							if (tagsInput === document.activeElement) {
								writingText = writingText.toLowerCase();
								writingText = writingText.replace(/ '.$vcLang["vcInterSetTagsDash"].' /g, "-");
								writingText = writingText.replace(/ /g, ",");
								tagsInput.value = focusedInput + writingText + ",";
							} else if (document.querySelector("input:not(#tags):focus")) {
								writingText = writingText.toLowerCase();
								document.querySelector("input:focus").value = focusedInput + " " + writingText;
							} else if (document.querySelector("textarea:focus")) {
								document.querySelector("textarea:focus").value = focusedTextarea + " " + writingText;
							}
						};
						const vcDeleteText = deleteWord => {
							const focusedTextarea = (document.querySelector("input:focus, textarea:focus") 
													? document.querySelector("input:focus, textarea:focus").value.toLowerCase()
													: "");

							const focusedCaseSensitive = deleteWord;

							if (tagsInput === document.activeElement) {
								tagsInput.value = focusedTextarea.split("," + focusedCaseSensitive)[0];
							} else if (document.querySelector("input:not(#tags):focus")) {
								document.querySelector("input:focus").value = focusedTextarea.split(" " + focusedCaseSensitive)[0];
							} else if (document.querySelector("textarea:focus")) {
								document.querySelector("textarea:focus").value = focusedTextarea.split(" " + focusedCaseSensitive)[0];
							}
						};
						const vcDeleteAllText = () => {
							const focusedTextarea = document.querySelector("input:focus, textarea:focus");
							if (focusedTextarea) {
								focusedTextarea.value = "";
							}
						};

						const vcSubmitText = () => {
							const focusedElement = document.querySelector("input:focus, textarea:focus");
							if (focusedElement) {
								const form = focusedElement.closest("form");
								if (form) {
									form.submit();
								}
							}
						};

						const vcCancelAction = () => {
							qa_toggle_element();
						};

						const vcStopWriting = () => {
							const focusedElement = document.querySelector("input:focus, textarea:focus");
							if (focusedElement) {
								focusedElement.blur();
							}
						};
						
						/* User Navigation */
						const vcOpenUserProfile = () => {
							statusVar = "'.$vcLang["vcFeedbackNavigating"].' '.qa_lang_html('misc/nav_my_details').'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							setTimeout(() => {
								const navigateToUrl = "'.qa_path( qa_opt('site_url') . 'user').'";
								location.href = navigateToUrl.replace(/(:\/\/)|(\/)+/g, "$1$2");
							}, 1000);
						};

						const vcOpenEditProfile = () => {
							statusVar = "'.$vcLang["vcFeedbackNavigating"].' '.qa_lang_html('users/edit_profile').'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							setTimeout(() => {
								const navigateToUrl = "'.qa_path( qa_opt('site_url') . 'account').'";
								location.href = navigateToUrl.replace(/(:\/\/)|(\/)+/g, "$1$2");
							}, 1000);
						};

						const vcOpenUserMessages = () => {
							statusVar = "'.$vcLang["vcFeedbackNavigating"].' '.qa_lang_html('misc/nav_user_pms').'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							setTimeout(() => {
								const navigateToUrl = "'.qa_path( qa_opt('site_url') . 'messages').'";
								location.href = navigateToUrl.replace(/(:\/\/)|(\/)+/g, "$1$2");
							}, 1000);
						};

						const vcOpenUserFavorites = () => {
						statusVar = "'.$vcLang["vcFeedbackNavigating"].' '.qa_lang_html('misc/my_favorites_title').'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							setTimeout(() => {
								const navigateToUrl = "'.qa_path( qa_opt('site_url') . 'favorites').'";
								location.href = navigateToUrl.replace(/(:\/\/)|(\/)+/g, "$1$2");
							}, 1000);
						};

						const vcOpenUserUpdates = () => {
							statusVar = "'.$vcLang["vcFeedbackNavigating"].' '.qa_lang_html('misc/nav_all_my_updates').'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							setTimeout(() => {
								const navigateToUrl = "'.qa_path( qa_opt('site_url') . 'updates').'";
								location.href = navigateToUrl.replace(/(:\/\/)|(\/)+/g, "$1$2");
							}, 1000);
						};
						
						/* Site Navigation */
						const jsOpenAsk = () => {
							statusVar = "'.$vcLang["vcFeedbackNavigating"].' '.qa_lang_html('main/nav_ask').'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							setTimeout(() => {
								const navigateToUrl = "'.qa_path( qa_opt('site_url') . 'ask').'";
								location.href = navigateToUrl.replace(/(:\/\/)|(\/)+/g, "$1$2");
							}, 1000);
						};

						const jsOpenAdmin = () => {
							statusVar = "'.$vcLang["vcFeedbackNavigating"].' '.qa_lang_html('main/nav_admin').'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							setTimeout(() => {
								const navigateToUrl = "'.qa_path( qa_opt('site_url') . 'admin').'";
								location.href = navigateToUrl.replace(/(:\/\/)|(\/)+/g, "$1$2");
							}, 1000);
						};

						const jsOpenActivity = () => {
							statusVar = "'.$vcLang["vcFeedbackNavigating"].' '.qa_lang_html('main/nav_activity').'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							setTimeout(() => {
								const navigateToUrl = "'.qa_path( qa_opt('site_url') . 'activity').'";
								location.href = navigateToUrl.replace(/(:\/\/)|(\/)+/g, "$1$2");
							}, 1000);
						};

						const jsOpenHome = () => {
							statusVar = "'.$vcLang["vcFeedbackNavigating"].' '.qa_lang_html('main/nav_home').'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							setTimeout(() => {
								const navigateToUrl = "'.qa_path( qa_opt('site_url') . 'qa').'";
								location.href = navigateToUrl.replace(/(:\/\/)|(\/)+/g, "$1$2");
							}, 1000);
						};

						const jsOpenQuestions = () => {
							statusVar = "'.$vcLang["vcFeedbackNavigating"].' '.qa_lang_html('main/nav_qs').'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							setTimeout(() => {
								const navigateToUrl = "'.qa_path( qa_opt('site_url') . 'questions').'";
								location.href = navigateToUrl.replace(/(:\/\/)|(\/)+/g, "$1$2");
							}, 1000);
						};

						const jsOpenHot = () => {
							statusVar = "'.$vcLang["vcFeedbackNavigating"].' '.qa_lang_html('main/nav_hot').'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							setTimeout(() => {
								const navigateToUrl = "'.qa_path( qa_opt('site_url') . 'hot').'";
								location.href = navigateToUrl.replace(/(:\/\/)|(\/)+/g, "$1$2");
							}, 1000);
						};

						const jsOpenUnanswered = () => {
							statusVar = "'.$vcLang["vcFeedbackNavigating"].' '.qa_lang_html('main/nav_unanswered').'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							setTimeout(() => {
								const navigateToUrl = "'.qa_path( qa_opt('site_url') . 'unanswered').'";
								location.href = navigateToUrl.replace(/(:\/\/)|(\/)+/g, "$1$2");
							}, 1000);
						};

						const jsOpenTags = () => {
							statusVar = "'.$vcLang["vcFeedbackNavigating"].' '.qa_lang_html('main/nav_tags').'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							setTimeout(() => {
								const navigateToUrl = "'.qa_path( qa_opt('site_url') . 'tags').'";
								location.href = navigateToUrl.replace(/(:\/\/)|(\/)+/g, "$1$2");
							}, 1000);
						};

						const jsOpenCategories = () => {
							statusVar = "'.$vcLang["vcFeedbackNavigating"].' '.qa_lang_html('main/nav_categories').'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							setTimeout(() => {
								const navigateToUrl = "'.qa_path( qa_opt('site_url') . 'categories').'";
								location.href = navigateToUrl.replace(/(:\/\/)|(\/)+/g, "$1$2");
							}, 1000);
						};

						const jsOpenUsers = () => {
							statusVar = "'.$vcLang["vcFeedbackNavigating"].' '.qa_lang_html('main/nav_users').'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							setTimeout(() => {
								const navigateToUrl = "'.qa_path( qa_opt('site_url') . 'users').'";
								location.href = navigateToUrl.replace(/(:\/\/)|(\/)+/g, "$1$2");
							}, 1000);
						};

						const jsOpenBadges = () => {
							statusVar = "'.$vcLang["vcFeedbackNavigating"].' '.qa_lang('badges/badges').'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							setTimeout(() => {
								const navigateToUrl = "'.qa_opt('site_url').'/badges";
								location.href = navigateToUrl.replace(/(:\/\/)|(\/)+/g, "$1$2");
							}, 1000);
						};

						/* Open Questions */
						const jsPostOpenFirst = () => {
							statusVar = "'.$vcLang["vcFeedbackOpeningQuestion"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							
							setTimeout(() => {
								window.location.href = qaQList.querySelector(".qa-q-list-item:nth-child(1) .qa-q-item-title a").href;
							}, 1000);
						};
						const jsPostOpenSecond = () => {
							statusVar = "'.$vcLang["vcFeedbackOpeningQuestion"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							
							setTimeout(() => {
								window.location.href = qaQList.querySelector(".qa-q-list-item:nth-child(2) .qa-q-item-title a").href;
							}, 1000);
						};
						const jsPostOpenThird = () => {
							statusVar = "'.$vcLang["vcFeedbackOpeningQuestion"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							
							setTimeout(() => {
								window.location.href = qaQList.querySelector(".qa-q-list-item:nth-child(3) .qa-q-item-title a").href;
							}, 1000);
						};
						const jsPostOpenFourth = () => {
							statusVar = "'.$vcLang["vcFeedbackOpeningQuestion"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							
							setTimeout(() => {
								window.location.href = qaQList.querySelector(".qa-q-list-item:nth-child(4) .qa-q-item-title a").href;
							}, 1000);
						};
						const jsPostOpenFifth = () => {
							statusVar = "'.$vcLang["vcFeedbackOpeningQuestion"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							
							setTimeout(() => {
								window.location.href = qaQList.querySelector(".qa-q-list-item:nth-child(5) .qa-q-item-title a").href;
							}, 1000);
						};
						const jsPostOpenSixth = () => {
							statusVar = "'.$vcLang["vcFeedbackOpeningQuestion"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							
							setTimeout(() => {
								window.location.href = qaQList.querySelector(".qa-q-list-item:nth-child(6) .qa-q-item-title a").href;
							}, 1000);
						};
						const jsPostOpenSeventh = () => {
							statusVar = "'.$vcLang["vcFeedbackOpeningQuestion"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							
							setTimeout(() => {
								window.location.href = qaQList.querySelector(".qa-q-list-item:nth-child(7) .qa-q-item-title a").href;
							}, 1000);
						};
						const jsPostOpenEight = () => {
							statusVar = "'.$vcLang["vcFeedbackOpeningQuestion"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							
							setTimeout(() => {
								window.location.href = qaQList.querySelector(".qa-q-list-item:nth-child(8) .qa-q-item-title a").href;
							}, 1000);
						};
						const jsPostOpenNineth = () => {
							statusVar = "'.$vcLang["vcFeedbackOpeningQuestion"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							
							setTimeout(() => {
								window.location.href = qaQList.querySelector(".qa-q-list-item:nth-child(9) .qa-q-item-title a").href;
							}, 1000);
						};
						const jsPostOpenTenth = () => {
							statusVar = "'.$vcLang["vcFeedbackOpeningQuestion"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							
							setTimeout(() => {
								window.location.href = qaQList.querySelector(".qa-q-list-item:nth-child(10) .qa-q-item-title a").href;
							}, 1000);
						};
						const jsPostOpenEleventh = () => {
							statusVar = "'.$vcLang["vcFeedbackOpeningQuestion"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							
							setTimeout(() => {
								window.location.href = qaQList.querySelector(".qa-q-list-item:nth-child(11) .qa-q-item-title a").href;
							}, 1000);
						};
						const jsPostOpenTwelfth = () => {
							statusVar = "'.$vcLang["vcFeedbackOpeningQuestion"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							
							setTimeout(() => {
								window.location.href = qaQList.querySelector(".qa-q-list-item:nth-child(12) .qa-q-item-title a").href;
							}, 1000);
						};
						const jsPostOpenThirteenth = () => {
							statusVar = "'.$vcLang["vcFeedbackOpeningQuestion"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							
							setTimeout(() => {
								window.location.href = qaQList.querySelector(".qa-q-list-item:nth-child(13) .qa-q-item-title a").href;
							}, 1000);
						};
													const jsPostOpenFourteenth = () => {
							statusVar = "'.$vcLang["vcFeedbackOpeningQuestion"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							
							setTimeout(() => {
								window.location.href = qaQList.querySelector(".qa-q-list-item:nth-child(14) .qa-q-item-title a").href;
							}, 1000);
						};

						const jsPostOpenFifteenth = () => {
							statusVar = "'.$vcLang["vcFeedbackOpeningQuestion"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							
							setTimeout(() => {
								window.location.href = qaQList.querySelector(".qa-q-list-item:nth-child(15) .qa-q-item-title a").href;
							}, 1000);
						};

						const jsPostOpenLast = () => {
							statusVar = "'.$vcLang["vcFeedbackOpeningQuestion"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
							
							setTimeout(() => {
								window.location.href = qaQList.querySelector(".qa-q-list-item:last-child .qa-q-item-title a").href;
							}, 1000);
						};

						const vcBackPrevPage = () => {
							statusVar = "'.$vcLang["vcFeedbackNavigating"].' '.$vcLang["vcNavPreviousPage"].'";
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);

							setTimeout(() => {
								window.location.href = document.referrer;
							}, 2000);
						};
						
						/* Scroll to */
						const vcScrollToTop = () => {
							window.scrollTo({
								top: 0,
								behavior: "smooth"
							});
						};

						const vcScrollToBottom = () => {
							window.scrollTo({
								top: document.documentElement.scrollHeight,
								behavior: "smooth"
							});
						};

						const vcScrollUpABit = () => {
							window.scrollBy({
								top: -300,
								left: 0,
								behavior: "smooth"
							});
						};

						const vcScrollDownABit = () => {
							window.scrollBy({
								top: 300,
								left: 0,
								behavior: "smooth"
							});
						};
						
						/* Conversational */
						const vcTime = () => {
							const checkDate = new Date();
							const currentTime = checkDate.toLocaleTimeString();
							statusVar = currentTime;
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
						};

						const vcDay = () => {
							const checkDate = new Date();
							const currentDay = checkDate.toLocaleDateString();
							statusVar = currentDay;
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
						};

						const vcSentient = () => {
							statusVar = `'.$vcLang["vcConvSentientFdbk"].'`;
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
						};

						const vcWhoAreYou = () => {
							statusVar = `'.$vcLang["vcConvWhoareyouFdbk"].'`;
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
						};

						const vcNotTalkingToYou = () => {
							statusVar = `'.$vcLang["vcConvNotTalkingToYouFdbk"].'`.replace("USERNAME", vcLocalUsername);
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
						};

						const vcTalkingToYou = () => {
							statusVar = `'.$vcLang["vcConvTalkingToYouFdbk"].'`.replace("USERNAME", vcLocalUsername);
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
						};

						const vcThankYou = () => {
							statusVar = `'.$vcLang["vcConvThankYouFdbk"].'`.replace("USERNAME", vcLocalUsername);
							chatMessage.innerHTML = statusVar;
							msg.text = statusVar;
							speechSynthesis.speak(msg);
						};
						
						annyang.addCommands({
							
							/* Search */
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcSearch"].' *tag": jsVCsearch,
							
							/* Greetings / Miscellaneous */
							"'.$vcLang["vcMiscHello"].' ('.$vcLang["vcNickname"].')": vcGreeting,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcMiscAskAIName"].'": vcAskAIName,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcMiscUserNameis"].' *tag": vcUserNameIs,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcMiscHowareyou"].'": vcHowAreYou,
							
							/* Interactivity */
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterHelp"].'": vcCommandList,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterCommands"].'": vcCommandList,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterCommandsAlt"].'": vcCommandList,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterCloseCommandsList"].'": vcCloseCommandsList,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterRefresh"].'": vcRefreshPage,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterTurnoff"].'": vcTurnOff,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterShutdown"].'": vcTurnOff,
							
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterMathAdd"].'": vcMathAdd,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterMathMinus"].'": vcMathMinus,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterMathTimes"].'": vcMathTimes,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterMathDivide"].'": vcMathDivide,
							
							/* Interactivity Single Page */
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterSetTitle"].'": vcSetTitle,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterSetCategory"].'": vcSetCategory,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterSetBody"].'": vcSetBody,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterSetTags"].'": vcSetTags,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterDoAnswer"].'": vcWriteAnswer,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterAnswerQuestion"].'": vcWriteAnswer,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterWriteAnswer"].'": vcWriteAnswer,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterDoComment"].'": vcWriteComment,
							"'.$vcLang["vcInterCommentFirst"].'": vcCommentFirstOption,
							"'.$vcLang["vcInterCommentSecond"].'": vcCommentSecondOption,
							"'.$vcLang["vcInterCommentThird"].'": vcCommentThirdOption,

							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcInterScrollToAnswers"].'": vcScrollToAnswers,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboScroll"].' '.$vcLang["vcInterScrollToAnswers"].'": vcScrollToAnswers,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterPreviousAnswer"].'": vcPreviousAnswer,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcInterNextAnswer"].'": vcNextAnswer,
							
							"'.$vcLang["vcInterDeleteText"].' *tag": vcDeleteText,
							"'.$vcLang["vcInterEraseText"].' *tag": vcDeleteText,
							"'.$vcLang["vcInterDeleteAllText"].'": vcDeleteAllText,
							"'.$vcLang["vcInterEraseAllText"].'": vcDeleteAllText,
							"'.$vcLang["vcInterSubmit"].'": vcSubmitText,
							"'.$vcLang["vcInterSubmitSend"].'": vcSubmitText,
							"'.$vcLang["vcInterCancel"].'": vcCancelAction,
							"'.$vcLang["vcInterStopWriting"].'": vcStopWriting,
							
							/* Conversational */
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcConvWhatTime"].'": vcTime,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcConvWhatDay"].'": vcDay,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcConvAreyoureal"].'": vcSentient,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcConvSentient"].'": vcSentient,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcConvConscious"].'": vcSentient,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcConvWhoareyou"].'": vcWhoAreYou,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcConvNotTalkingToYou"].'": vcNotTalkingToYou,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcConvTalkingToYou"].'": vcTalkingToYou,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcConvThankYou"].'": vcThankYou,
							
							/* User Navigation */
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcUserNavProfile"].'": vcOpenUserProfile,
							"'.$vcLang["checkVcTrigger"].'('.$vcLang["vcComboGo"].') '.$vcLang["vcUserNavEditProfile"].'": vcOpenEditProfile,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcUserNavMessages"].'": vcOpenUserMessages,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcUserNavFavorites"].'": vcOpenUserFavorites,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcUserNavUpdates"].'": vcOpenUserUpdates,

							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboOpen"].' '.$vcLang["vcUserNavProfile"].'": vcOpenUserProfile,
							"'.$vcLang["checkVcTrigger"].'('.$vcLang["vcComboOpen"].') '.$vcLang["vcUserNavEditProfile"].'": vcOpenEditProfile,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboOpen"].' '.$vcLang["vcUserNavMessages"].'": vcOpenUserMessages,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboOpen"].' '.$vcLang["vcUserNavFavorites"].'": vcOpenUserFavorites,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboOpen"].' '.$vcLang["vcUserNavUpdates"].'": vcOpenUserUpdates,
							
							/* Site Navigation */
							"'.$vcLang["checkVcTrigger"].'('.$vcLang["vcComboGo"].') '.$vcLang["vcNavAsk"].'": jsOpenAsk,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcNavAdmin"].'": jsOpenAdmin,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcNavActivity"].'": jsOpenActivity,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcNavHome"].'": jsOpenHome,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcNavQuestions"].'": jsOpenQuestions,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcNavHot"].'": jsOpenHot,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcNavUnanswered"].'": jsOpenUnanswered,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcNavTags"].'": jsOpenTags,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcNavCategories"].'": jsOpenCategories,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcNavUsers"].'": jsOpenUsers,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcNavBadges"].'": jsOpenBadges,
							
							"'.$vcLang["checkVcTrigger"].'('.$vcLang["vcComboOpen"].') '.$vcLang["vcNavAsk"].'": jsOpenAsk,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboOpen"].' '.$vcLang["vcNavAdmin"].'": jsOpenAdmin,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboOpen"].' '.$vcLang["vcNavActivity"].'": jsOpenActivity,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboOpen"].' '.$vcLang["vcNavHome"].'": jsOpenHome,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboOpen"].' '.$vcLang["vcNavQuestions"].'": jsOpenQuestions,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboOpen"].' '.$vcLang["vcNavHot"].'": jsOpenHot,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboOpen"].' '.$vcLang["vcNavUnanswered"].'": jsOpenUnanswered,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboOpen"].' '.$vcLang["vcNavTags"].'": jsOpenTags,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboOpen"].' '.$vcLang["vcNavCategories"].'": jsOpenCategories,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboOpen"].' '.$vcLang["vcNavUsers"].'": jsOpenUsers,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboOpen"].' '.$vcLang["vcNavBadges"].'": jsOpenBadges,
							
							"'.$vcLang["checkVcTrigger"].'('.$vcLang["vcComboGo"].') '.$vcLang["vcNavPreviousPage"].'": vcBackPrevPage,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcNavGoBack"].'": vcBackPrevPage,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcScrollTop"].'": vcScrollToTop,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboScroll"].' '.$vcLang["vcScrollTop"].'": vcScrollToTop,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcScrollBottom"].'": vcScrollToBottom,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboScroll"].' '.$vcLang["vcScrollBottom"].'": vcScrollToBottom,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcScrollUpABit"].'": vcScrollUpABit,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboScroll"].' '.$vcLang["vcScrollUpABit"].'": vcScrollUpABit,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboGo"].' '.$vcLang["vcScrollDownABit"].'": vcScrollDownABit,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcComboScroll"].' '.$vcLang["vcScrollDownABit"].'": vcScrollDownABit,
							
							/* Open Questions */
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcQopenFirst"].'": jsPostOpenFirst,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcQopenSecond"].'": jsPostOpenSecond,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcQopenThird"].'": jsPostOpenThird,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcQopenFourth"].'": jsPostOpenFourth,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcQopenFifth"].'": jsPostOpenFifth,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcQopenSixth"].'": jsPostOpenSixth,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcQopenSeventh"].'": jsPostOpenSeventh,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcQopenEighth"].'": jsPostOpenEight,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcQopenNineth"].'": jsPostOpenNineth,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcQopenTenth"].'": jsPostOpenTenth,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcQopenEleventh"].'": jsPostOpenEleventh,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcQopenTwelfth"].'": jsPostOpenTwelfth,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcQopenThirteenth"].'": jsPostOpenThirteenth,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcQopenFourteenth"].'": jsPostOpenFourteenth,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcQopenFifteenth"].'": jsPostOpenFifteenth,
							"'.$vcLang["checkVcTrigger"] . $vcLang["vcQopenLast"].'": jsPostOpenLast,
							
						});
						
						document.querySelectorAll("input,textarea").forEach(input => {
							input.addEventListener("focusin", () => {
								chatMessage.innerHTML = "writingText";
								
								setTimeout(() => {
									if (chatMessage.textContent === "writingText") {
										annyang.addCommands({
											"*tag": vcWriteText,
										});
									}
								}, 250);
							});

							input.addEventListener("focusout", () => {
								chatMessage.textContent = "";
							});
						});

						
						/*
							annyang.addCallback("soundstart", () => {
								chatMessage.innerHTML = "Listening...";
							});

							annyang.addCallback("result", () => {
								chatMessage.innerHTML = "sound stopped";
							});

							annyang.addCallback("resultNoMatch", () => {
								chatMessage.innerHTML = "'.$vcLang["vcInterNoMatches"].'";
								chatStatus.classList.add("active");

								setTimeout(() => {
									chatStatus.classList.remove("active");
								}, 2000);

								if (vcSoundPlay === true) {
									vcanomatch.play();
								}
							});
						*/
						
						annyang.addCallback("resultMatch", () => {
							if (vcSoundPlay === true) {
								vcamatch.play();
							}

							const statusEl = document.getElementById("vcstatus-message");
							
							if (
								document.querySelectorAll(".vc-command-list").length && 
								chatMessage.textContent !== "'.$vcLang["vcInterHelpFdbk"].'" && 
								(!statusEl || !statusEl.textContent.includes("'.$vcLang["vcMiscNicetomeet"].'"))
							) {
								closeCommandsList();
							}
						});
						
					}

					const drSpeaks = document.querySelectorAll(".drmpc-bar");

					msg.onstart = () => {
						chatStatus.classList.add("active");
						
						drSpeaks.forEach((el) => {
							el.classList.add("dri");
						});
					};

					msg.onend = () => {
						let shouldRemove = null;
						clearTimeout(shouldRemove); /* Clear in case commands requested back to back */

						shouldRemove = setTimeout(() => {
							chatStatus.classList.remove("active");

							if (document.querySelectorAll(".vc-command-list").length) {
								chatMessage.innerHTML = "'.$vcLang["vcMiscStartUp"].'";
							}
						}, 2000);

						drSpeaks.forEach((el) => {
							el.classList.remove("dri");
						});
					};
				}
			}); /* DOC READY */
		';
		
		return $aiVcScript;
	}
}

/*
	Omit PHP closing tag to help avoid accidental output
*/
