<?php
header('HTTP/1.1 404 Not Found');
$base = (isset($_SERVER['HTTPS'])?'https://':'http://').$_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/')+1);
if($query['sourceLanguage']=='zh-Hans') {
	$lang = 'zh-CN';
} elseif($query['sourceLanguage']=='zh-Hant') {
	$lang = 'zh-TW';
} else {
	$lang = $query['sourceLanguage'];
}
$url = 'http://www.google.com/complete/search?spell=1&jsonp=s&hl='.$lang.'&q='.$query['query'];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8" />
<meta name="robots" content="none" />
<link rel="stylesheet" type="text/css" href="/search.css" />
<title>Not Found</title>
<script type="text/javascript">
function s(s) {
	w = "<?php echo urldecode($query['query']);?>";
	s1 = s[1][0];
	for(var i in s1) {}
	sa = s1[0].split(" ");
	wl = w.split(" ").length;
	if(sa.length>wl) {
		var ss = sa[0];
		for(i=1;i<wl;i++) {
			ss = ss+" "+sa[i];
		}
	} else {
		ss = s1[0];
	}
	if(ss!=""&&ss!=w) {
		document.getElementById("spell").innerHTML = "Do you mean: <a href='<?php echo $base;?>"+ss+"/<?php echo $langpairid;?>'>"+ss+"</a>.";
	}
}
</script>
</head>
<body>
<?php
require('include/search.php');
?>
<hr>
<div id="spell">Sorry, no result for "<?php echo urldecode($query['query']);?>" in <?php echo $langpairtext;?></div>
<script type="text/javascript" src="<?php echo $url?>"></script>
</body>
</html>
