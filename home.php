<!DOCTYPE HTML>
<head>
<meta charset="UTF-8" /> 
<meta name="description" content="An open source Dictionary based on Google's Unofficial Dictionary API" />
<title>Dictionary</title>
<link rel="apple-touch-icon" href="/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png.png" />
<link rel="stylesheet" type="text/css" href="/home.css" />
<link rel="stylesheet" type="text/css" href="/search.css" />
<?php if(file_exists('header.php')) {require('header.php');}?>
</head>
<body>
<?php if(file_exists('plugin.php')) {require('plugin.php');}?>
<header><h1>Dictionary</h1></header>
<?php require('include/search.php');?>
<footer>
<div>Powered by <a href="http://googlesystem.blogspot.com/2009/12/on-googles-unofficial-dictionary-api.html" target="_blank">Google's Unofficial Dictionary API</a>
<br>
<a href="<?php echo (isset($_SERVER['HTTPS'])?'https://':'http://').$_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/')+1);?>about.php">About & Tips</a></div>
</footer>
</body>
</html> 
