<?php
ob_start();
require_once('config.php');
require_once('include/api.php');
require_once('include/languages.php');
$uri = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['SCRIPT_NAME'], '/')+1);
list($query['query'], $langpair, $plugin) = explode('/', $uri, 3);
$langpair = urldecode($langpair);
list($query['sourceLanguage'], $query['targetLanguage']) = explode('|', $langpair, 2);
if(empty($query['targetLanguage'])) {
	$langpairid = (empty($query['sourceLanguage']))?request_language_fliter():request_language_fliter($query['sourceLanguage']);
} else {
	if(empty($query['sourceLanguage'])) {
		$query['sourceLanguage'] = 'en';
	}
	$langpairid = language_fliter($query['sourceLanguage'].'|'.$query['targetLanguage']);
}
if($langpairid===FALSE) {
	header('HTTP/1.1 400 Bad Request');
	echo 'Bad Request';
	exit;
} else {
	list($query['sourceLanguage'], $query['targetLanguage']) = explode('|', $langpairid, 2);
	$langpairtext = languages($langpairid);
}
if(empty($query['query'])) {
	require('home.php');
	exit;
}
if(MONGODB_CACHE==TRUE){
	$dict = mdb();
	$define = $dict->findOne($query);
}
if($define==null) {
	$define = json_decode(dict($query), TRUE);
	if(MONGODB_CACHE==TRUE&&(isset($define['primaries'])||isset($define['webDefinitions']))) {
		$dict->insert($define);
	}
}
if(isset($define['primaries'])||isset($define['webDefinitions'])) {
	require('define.php');
} else {
	require('404.php');
}
ob_end_flush();
