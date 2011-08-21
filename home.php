<!DOCTYPE HTML>
<head>
<meta charset="UTF-8" /> 
<title>Dictionary</title>
<link href="/home.css" rel="stylesheet" type="text/css" />
<link href="/search.css" rel="stylesheet" type="text/css" />
<?php if(file_exists('analytics')) {require('analytics');}?>
</head>
<body onload="document.getElementById('search').focus();">
<h1>Dictionary</h1>
<?php
require('include/search.php');
?>
<footer>
<span>Powered by <a href="http://googlesystem.blogspot.com/2009/12/on-googles-unofficial-dictionary-api.html" target="_blank">Google's Unofficial Dictionary API</a> | Code by <a href="https://twitter.com/easisee" target="_blank">@easisee</a> | <a href="https://easisee.com/2011/08/dictionary/" target="_blank">About & Tips</a></span>
</footer>
</body>
</html> 
