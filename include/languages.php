<?php
function language_fliter($pair) {
	foreach(languages() as $key => $langpair) {
		if($pair['sourceLanguage']==$langpair['from']&&$pair['targetLanguage']==$langpair['to']) {
			return $key;
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
		foreach($l as $k => $lang) {
			if($lang['from']==$s_lang&&$lang['to']==$langcode){
				return $k;
			}
		}
	}
	if($s_lang=='en') {
		return 18;
	} else {
		return FALSE;
	}
}

function languages($id = null) {
	$l = array(
		array('from' => 'ar', 'to' => 'en', 'text' => 'Arabic &lt;&gt; English'),
		array('from' => 'bn', 'to' => 'en', 'text' => 'Bengali &lt;&gt; English'),
		array('from' => 'bg', 'to' => 'en', 'text' => 'Bulgarian &lt;&gt; English'),
		array('from' => 'zh-Hans', 'to' => 'zh-Hans', 'text' => 'Chinese (Simplified) dictionary'),
		array('from' => 'zh-Hans', 'to' => 'en', 'text' => 'Chinese (Simplified) &lt;&gt; English'),
		array('from' => 'zh-Hant', 'to' => 'zh-Hant', 'text' => 'Chinese (Traditional) dictionary'),
		array('from' => 'zh-Hant', 'to' => 'en', 'text' => 'Chinese (Traditional) &lt;&gt; English'),
		array('from' => 'hr', 'to' => 'en', 'text' => 'Croatian &lt;&gt; English'),
		array('from' => 'cs', 'to' => 'cs', 'text' => 'Czech dictionary'),
		array('from' => 'cs', 'to' => 'en', 'text' => 'Czech &lt;&gt; English'),
		array('from' => 'nl', 'to' => 'nl', 'text' => 'Dutch dictionary'),
		array('from' => 'en', 'to' => 'ar', 'text' => 'English &lt;&gt; Arabic'),
		array('from' => 'en', 'to' => 'bn', 'text' => 'English &lt;&gt; Bengali'),
		array('from' => 'en', 'to' => 'bg', 'text' => 'English &lt;&gt; Bulgarian'),
		array('from' => 'en', 'to' => 'zh-Hans', 'text' => 'English &lt;&gt; Chinese (Simplified)'),
		array('from' => 'en', 'to' => 'zh-Hant', 'text' => 'English &lt;&gt; Chinese (Traditional)'),
		array('from' => 'en', 'to' => 'hr', 'text' => 'English &lt;&gt; Croatian'),
		array('from' => 'en', 'to' => 'cs', 'text' => 'English &lt;&gt; Czech'),
		array('from' => 'en', 'to' => 'en', 'text' => 'English dictionary'),
		array('from' => 'en', 'to' => 'fi', 'text' => 'English &lt;&gt; Finnish'),
		array('from' => 'en', 'to' => 'fr', 'text' => 'English &lt;&gt; French'),
		array('from' => 'en', 'to' => 'de', 'text' => 'English &lt;&gt; German'),
		array('from' => 'en', 'to' => 'el', 'text' => 'English &lt;&gt; Greek'),
		array('from' => 'en', 'to' => 'gu', 'text' => 'English &lt;&gt; Gujarati'),
		array('from' => 'en', 'to' => 'iw', 'text' => 'English &lt;&gt; Hebrew'),
		array('from' => 'en', 'to' => 'hi', 'text' => 'English &lt;&gt; Hindi'),
		array('from' => 'en', 'to' => 'it', 'text' => 'English &lt;&gt; Italian'),
		array('from' => 'en', 'to' => 'kn', 'text' => 'English &lt;&gt; Kannada'),
		array('from' => 'en', 'to' => 'ko', 'text' => 'English &lt;&gt; Korean'),
		array('from' => 'en', 'to' => 'ml', 'text' => 'English &lt;&gt; Malayalam'),
		array('from' => 'en', 'to' => 'mr', 'text' => 'English &lt;&gt; Marathi'),
		array('from' => 'en', 'to' => 'pt', 'text' => 'English &lt;&gt; Portuguese'),
		array('from' => 'en', 'to' => 'ru', 'text' => 'English &lt;&gt; Russian'),
		array('from' => 'en', 'to' => 'sr', 'text' => 'English &lt;&gt; Serbian'),
		array('from' => 'en', 'to' => 'es', 'text' => 'English &lt;&gt; Spanish'),
		array('from' => 'en', 'to' => 'ta', 'text' => 'English &lt;&gt; Tamil'),
		array('from' => 'en', 'to' => 'te', 'text' => 'English &lt;&gt; Telugu'),
		array('from' => 'en', 'to' => 'th', 'text' => 'English &lt;&gt; Thai'),
		array('from' => 'fi', 'to' => 'en', 'text' => 'Finnish &lt;&gt; English'),
		array('from' => 'fr', 'to' => 'en', 'text' => 'French &lt;&gt; English'),
		array('from' => 'fr', 'to' => 'fr', 'text' => 'French dictionary'),
		array('from' => 'de', 'to' => 'en', 'text' => 'German &lt;&gt; English'),
		array('from' => 'de', 'to' => 'de', 'text' => 'German dictionary'),
		array('from' => 'el', 'to' => 'en', 'text' => 'Greek &lt;&gt; English'),
		array('from' => 'gu', 'to' => 'en', 'text' => 'Gujarati &lt;&gt; English'),
		array('from' => 'iw', 'to' => 'en', 'text' => 'Hebrew &lt;&gt; English'),
		array('from' => 'hi', 'to' => 'en', 'text' => 'Hindi &lt;&gt; English'),
		array('from' => 'it', 'to' => 'en', 'text' => 'Italian &lt;&gt; English'),
		array('from' => 'it', 'to' => 'it', 'text' => 'Italian dictionary'),
		array('from' => 'kn', 'to' => 'en', 'text' => 'Kannada &lt;&gt; English'),
		array('from' => 'ko', 'to' => 'en', 'text' => 'Korean &lt;&gt; English'),
		array('from' => 'ko', 'to' => 'ko', 'text' => 'Korean dictionary'),
		array('from' => 'ml', 'to' => 'en', 'text' => 'Malayalam &lt;&gt; English'),
		array('from' => 'mr', 'to' => 'en', 'text' => 'Marathi &lt;&gt; English'),
		array('from' => 'pt', 'to' => 'en', 'text' => 'Portuguese &lt;&gt; English'),
		array('from' => 'pt', 'to' => 'pt', 'text' => 'Portuguese dictionary'),
		array('from' => 'ru', 'to' => 'en', 'text' => 'Russian &lt;&gt; English'),
		array('from' => 'ru', 'to' => 'ru', 'text' => 'Russian dictionary'),
		array('from' => 'sr', 'to' => 'en', 'text' => 'Serbian &lt;&gt; English'),
		array('from' => 'sk', 'to' => 'sk', 'text' => 'Slovak dictionary'),
		array('from' => 'es', 'to' => 'en', 'text' => 'Spanish &lt;&gt; English'),
		array('from' => 'es', 'to' => 'es', 'text' => 'Spanish dictionary'),
		array('from' => 'ta', 'to' => 'en', 'text' => 'Tamil &lt;&gt; English'),
		array('from' => 'te', 'to' => 'en', 'text' => 'Telugu &lt;&gt; English'),
		array('from' => 'th', 'to' => 'en', 'text' => 'Thai &lt;&gt; English')
	);
	if($id==null) {
		return $l;
	} else {
		return $l[$id];
	}
}
