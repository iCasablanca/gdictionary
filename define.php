<?php
function convert($data, $type = 'container'){
	echo '<div class="'.$type.'">';
	list($main_type, $sub_type) = explode(' ', $type, 2);
	switch($sub_type) {
		case 'labels':
			echo '<span class="'.$type.'" title="'.$data['title'].'">'.$data['text'].'</span>';
		break;
		default:
			switch($data['type']) {
				case 'text':
				case 'phonetic':
					echo '<span class="'.$type.' text">'.$data['text'].'</span>';
				break;
				case 'url':
					echo $data['text'];	
				break;
				case 'sound':
?>
<object data="http://www.google.com/dictionary/flash/SpeakerApp16.swf" type="application/x-shockwave-flash" width="16" height="16">
	<param name="movie" value="http://www.google.com/dictionary/flash/SpeakerApp16.swf">
	<param name="flashvars" value="sound_name=<?php echo urlencode($data['text']);?>">
	<param name="wmode" value="transparent">
		<video poster="http://www.google.com/dictionary/flash/SpeakerOffA16.png" onClick="this.play();" width="16" height="16" src="<?php echo $data['text'];?>">
			<a href="<?php echo $data['text'];?>"><img src="http://www.google.com/dictionary/flash/SpeakerOffA16.png" alt="listen"></a>
		</video>
</object>
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
<title><?php echo urldecode($word).' &lsaquo; '.$l['text'];?></title>
<link href="/define.css" rel="stylesheet" type="text/css" />
<link href="/search.css" rel="stylesheet" type="text/css" />
<link href="/hide-examples.css" rel="stylesheet" type="text/css" title="hide-examples" />
<?php if(file_exists('analytics')) {require('analytics');}?>
</head>
<body>
<div class="tools">
<?php
require('include/search.php');
?>
<button type="button" onclick="(function(t){s=document.styleSheets;for(i=0;i<s.length;i++){if(s[i].title=='hide-examples'){s[i].disabled=(s[i].disabled==false)?true:false;t.innerHTML=(s[i].disabled==false)?'Show Examples':'Hide Examples';}}})(this);">Show Examples</button>
</div><div class="blank"></div>
<?php
convert($define);
?>
</body>
</html>
