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
<title><?php echo $word.' &lsaquo; '.$l['text'];?></title>
<link rel="stylesheet" type="text/css" href="/define.css" />
<link rel="stylesheet" type="text/css" href="/search.css" />
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-18947047-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<?php
require('include/search.php');
convert($define);
?>
</body>
</html>
