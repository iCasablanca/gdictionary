<?php
require_once('config.php');
require_once('include/api.php');
require_once('include/languages.php');
$uri = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['SCRIPT_NAME'], '/')+1);
list($word, $a1, $p1, $a2, $p2, $a3) = explode('/', $uri, 6);
if(empty($word)){
	require('index.html');
	exit;
}
$query['query'] = $word;
switch($a1) {
	case 'from':
		$query['sourceLanguage'] = $p1;
		switch($a2) {
			case 'to':
				$query['targetLanguage'] = $p2;
			break;
			case null:
			break;
			default:
				$error = true;
			break;
		}
	break;
	case 'to':
		$query['targetLanguage'] = $p1;
		switch($a2) {
			case 'from':
				$query['sourceLanguage'] = $p2;
			break;
			case null:
			break;
			default:
				$error = true;
			break;
		}
	break;
	case null:
	break;
	default:
		$error = true;
	break;
}
if(empty($query['sourceLanguage'])) {
	$query['sourceLanguage'] = DEF_SLAN;
}
if(empty($query['targetLanguage'])) {
	$query['targetLanguage'] = DEF_TLAN;
}
$langpair = language_fliter($query);
if($error==TRUE||$langpair===FALSE) {
	echo 'Bad Request';
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
	require('notfound.php');
}
