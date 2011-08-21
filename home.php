<!DOCTYPE HTML>
<head>
<meta charset="UTF-8" /> 
<title>Dictionary</title>
<link href="/home.css" rel="stylesheet" type="text/css" />
<link href="/search.css" rel="stylesheet" type="text/css" />
<?php if(file_exists('analytics')) {require('analytics');}?>
</head>
<body>
<header><h1>Dictionary</h1></header>
<?php
require('include/search.php');
?>
<footer>
<div>Powered by <a href="http://googlesystem.blogspot.com/2009/12/on-googles-unofficial-dictionary-api.html" target="_blank">Google's Unofficial Dictionary API</a>
<br>
<a href="<?php echo (isset($_SERVER['HTTPS'])?'https://':'http://').$_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/')+1);?>about.php">About & Tips</a></div>
</footer>
</body>
</html> 
