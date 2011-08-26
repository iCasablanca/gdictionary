<?php
function dict($query) {
	$sl = (isset($query['sourceLanguage']))?$query['sourceLanguage']:DEFAULT_SOURCE_LANGUAGE;
	$tl = (isset($query['targetLanguage']))?$query['targetLanguage']:DEFAULT_TARGET_LANGUAGE;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'http://www.google.com/dictionary/json?callback=dict_api.callbacks.id100&q='.$query['query'].'&sl='.$sl.'&tl='.$tl.'&restrict=pr%2Cde&client=te');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	$r = curl_exec($ch);
	$r = substr($r, strpos($r, '{'), strrpos($r, '}')-strlen($r)+1);
	$httpinfo = curl_getinfo($ch);
	curl_close($ch);
	$result=str_replace('\x', '%', $r);
	return $result;
}
