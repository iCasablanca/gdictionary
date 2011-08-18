<div class="search">
<form action="javascript:window.location='http://dictionary.easisee.com/'+document.getElementById('search').value+document.getElementById('language').value;">
<select id="language" name="langpair">
<?php
require_once('languages.php');
foreach(languages() as $key => $lang) {
	if($key==$langpair) {
		echo '<option selected="selected" value="/from/'.$lang['from'].'/to/'.$lang['to'].'/">'.$lang['text'].'</option>';
	} else {
		echo '<option value="/from/'.$lang['from'].'/to/'.$lang['to'].'/">'.$lang['text'].'</option>';
	}
}
?>
</select>
<input type="text" id="search"/>
<button type="submit" style="background: #FFF; border: solid 1px #7F9DB9;">Search Dictionary</button>
</form>
</div>
