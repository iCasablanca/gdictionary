<?php
function convert($data, $type = 'container'){
	echo '<div class="'.$type.'">';
	list($main_type, $sub_type) = explode(' ', $type, 2);
	switch($sub_type) {
		case 'labels':
			echo '<span class="'.$type.'" title="'.$data['title'].'">'.urldecode($data['text']).'</span>';
		break;
		default:
			switch($data['type']) {
				case 'text':
				case 'phonetic':
					echo '<span class="'.$type.' text">'.urldecode($data['text']).'</span>';
				break;
				case 'url':
					echo urldecode($data['text']);
				break;
				case 'sound':
?>
<div class="sound" onclick="(function(){function g(i){return document.getElementById(i);}g('blank').innerHTML='<object data=\'//ssl.gstatic.com/dictionary/static/sounds/0/SoundApp.swf\' type=\'application/x-shockwave-flash\' width=\'1\' height=\'1\'><param name=\'movie\' value=\'//ssl.gstatic.com/dictionary/static/sounds/0/SoundApp.swf\'><param name=\'flashvars\' value=\'sound_name=<?php echo urlencode($data['text']);?>\'><param name=\'wmode\' value=\'transparent\'><audio id=\'audio\' autoplay=\'autoplay\' src=\'<?php echo $data['text'];?>\'></audio></object>';a=g('audio');if(a.autoplay!=true){a.load();a.play();}})();"></div>
<?php
				break;
			}
		break;
	}
	foreach($data as $key => $datum) {
		if(is_array($datum)&&is_string($key)) {
			foreach($datum as &$d) {
				convert($d, (isset($data['type']))?$data['type'].' '.$key:$key);
			}
		}
	}
	echo '</div>';
}
?><!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8" />
<meta name="robots" content="none" />
<title><?php echo urldecode($word).' &lsaquo; '.$l['text'];?></title>
<link href="/define.css" rel="stylesheet" type="text/css" />
<link href="/search.css" rel="stylesheet" type="text/css" />
<link href="/hide-examples.css" rel="stylesheet" type="text/css" title="hide-examples" />
<?php if(file_exists('header.php')) {require('header.php');}?>
</head>
<body>
<?php if(file_exists('plugin.php')) {require('plugin.php');}?>
<div class="tools">
<?php require('include/search.php');?>
<button type="button" onclick="(function(t){s=document.styleSheets;for(i=0;i<s.length;i++){if(s[i].title=='hide-examples'){s[i].disabled=(s[i].disabled==false)?true:false;t.innerHTML=(s[i].disabled==false)?'Show Examples':'Hide Examples';}}})(this);">Show Examples</button>
</div><div id="blank" class="blank"></div>
<?php
convert($define);
?>
</body>
</html>
