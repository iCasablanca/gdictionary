<?php
define('DEF_SLAN', 'en');
define('DEF_TLAN', 'zh-Hans');
define('MONGODB_CACHE', TRUE);

function mdb() {
	$m = new Mongo("localhost", array("persist" => "x"));
	return $m->dictionary->wordlist;
}
