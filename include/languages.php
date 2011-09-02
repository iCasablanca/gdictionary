<?php
function language_fliter($langpair) {
	foreach(languages() as $k => $t) {
		if($k==$langpair) {
			return $k;
		}
	}
	return FALSE;
}

function request_language_fliter($s_lang = 'en') {
	$accept_langs = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
	foreach($accept_langs as $k => $lang) {
		list($langs[$k]['lang'], $langs[$k]['q']) = explode(';', $lang);
		list($langs[$k]['2dig'], $null) = explode('-', $langs[$k]['lang']);
	}
	$l = languages();
	foreach($langs as &$accept_lang) {
		if(strtolower($accept_lang['2dig'])=='zh') {
			if(strtolower($accept_lang['lang'])=='zh-tw'||strtolower($accept_lang['lang'])=='zh-hk') {
				$langcode = 'zh-Hant';
			} else {
				$langcode = 'zh-Hans';
			}
		} else {
			$langcode = strtolower($accept_lang['2dig']);
		}
		foreach($l as $k => $t) {
			if($k==$s_lang.'|'.$langcode){
				return $k;
			}
		}
	}
	if($s_lang=='en') {
		return 'en|en';
	} else {
		return FALSE;
	}
}

function languages($k = null) {
	$l = array(
		'ar|en' => 'Arabic &lt;&gt; English',
		'bn|en' => 'Bengali &lt;&gt; English',
		'bg|en' => 'Bulgarian &lt;&gt; English',
		'zh-Hans|zh-Hans' => 'Chinese (Simplified) dictionary',
		'zh-Hans|en' => 'Chinese (Simplified) &lt;&gt; English',
		'zh-Hant|zh-Hant' => 'Chinese (Traditional) dictionary',
		'zh-Hant|en' => 'Chinese (Traditional) &lt;&gt; English',
		'hr|en' => 'Croatian &lt;&gt; English',
		'cs|cs' => 'Czech dictionary',
		'cs|en' => 'Czech &lt;&gt; English',
		'nl|nl' => 'Dutch dictionary',
		'en|ar' => 'English &lt;&gt; Arabic',
		'en|bn' => 'English &lt;&gt; Bengali',
		'en|bg' => 'English &lt;&gt; Bulgarian',
		'en|zh-Hans' => 'English &lt;&gt; Chinese (Simplified)',
		'en|zh-Hant' => 'English &lt;&gt; Chinese (Traditional)',
		'en|hr' => 'English &lt;&gt; Croatian',
		'en|cs' => 'English &lt;&gt; Czech',
		'en|en' => 'English dictionary',
		'en|fi' => 'English &lt;&gt; Finnish',
		'en|fr' => 'English &lt;&gt; French',
		'en|de' => 'English &lt;&gt; German',
		'en|el' => 'English &lt;&gt; Greek',
		'en|gu' => 'English &lt;&gt; Gujarati',
		'en|iw' => 'English &lt;&gt; Hebrew',
		'en|hi' => 'English &lt;&gt; Hindi',
		'en|it' => 'English &lt;&gt; Italian',
		'en|kn' => 'English &lt;&gt; Kannada',
		'en|ko' => 'English &lt;&gt; Korean',
		'en|ml' => 'English &lt;&gt; Malayalam',
		'en|mr' => 'English &lt;&gt; Marathi',
		'en|pt' => 'English &lt;&gt; Portuguese',
		'en|ru' => 'English &lt;&gt; Russian',
		'en|sr' => 'English &lt;&gt; Serbian',
		'en|es' => 'English &lt;&gt; Spanish',
		'en|ta' => 'English &lt;&gt; Tamil',
		'en|te' => 'English &lt;&gt; Telugu',
		'en|th' => 'English &lt;&gt; Thai',
		'fi|en' => 'Finnish &lt;&gt; English',
		'fr|en' => 'French &lt;&gt; English',
		'fr|fr' => 'French dictionary',
		'de|en' => 'German &lt;&gt; English',
		'de|de' => 'German dictionary',
		'el|en' => 'Greek &lt;&gt; English',
		'gu|en' => 'Gujarati &lt;&gt; English',
		'iw|en' => 'Hebrew &lt;&gt; English',
		'hi|en' => 'Hindi &lt;&gt; English',
		'it|en' => 'Italian &lt;&gt; English',
		'it|it' => 'Italian dictionary',
		'kn|en' => 'Kannada &lt;&gt; English',
		'ko|en' => 'Korean &lt;&gt; English',
		'ko|ko' => 'Korean dictionary',
		'ml|en' => 'Malayalam &lt;&gt; English',
		'mr|en' => 'Marathi &lt;&gt; English',
		'pt|en' => 'Portuguese &lt;&gt; English',
		'pt|pt' => 'Portuguese dictionary',
		'ru|en' => 'Russian &lt;&gt; English',
		'ru|ru' => 'Russian dictionary',
		'sr|en' => 'Serbian &lt;&gt; English',
		'sk|sk' => 'Slovak dictionary',
		'es|en' => 'Spanish &lt;&gt; English',
		'es|es' => 'Spanish dictionary',
		'ta|en' => 'Tamil &lt;&gt; English',
		'te|en' => 'Telugu &lt;&gt; English',
		'th|en' => 'Thai &lt;&gt; English'
	);
	if($k==null) {
		return $l;
	} else {
		return $l[$k];
	}
}
