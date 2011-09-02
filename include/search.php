<div class="search">
<form action="javascript:window.location='<?php echo (isset($_SERVER['HTTPS'])?'https://':'http://').$_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/')+1);?>'+document.getElementById('search').value+'/'+document.getElementById('language').value;">
<select id="language" name="langpair">
<?php
require_once('languages.php');
foreach(languages() as $k => $text) {
	if($k==$langpairid) {
		echo '<option selected="selected" value="'.$k.'">'.$text.'</option>';
	} else {
		echo '<option value="'.$k.'">'.$text.'</option>';
	}
}
?>
</select>
<div class="swap" onclick="(function(){l=document.getElementById('language');p=l.value.split('|');for(i=0;i<l.length;i++){if(l.options[i].value==p[1]+'|'+p[0]){l.options[i].selected=true;}}void 0;})();"><span class="swap"></span></div>
<input type="text" id="search" autofocus="autofocus"/>
<button type="submit">Search</button>
<button type="button" onclick="(function(){function g(i){return document.getElementById(i).value;};d='<?php echo $query['query'];?>';q=g('search');q=(q=='')?d:q;window.open('http://www.google.com/search?q='+q+'&amp;tbs=dfn:1&amp;defl='+g('language').split('|')[0]);})();">Google Dict</button>
</form>
</div>
