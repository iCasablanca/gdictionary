<!DOCTYPE HTML>
<head>
<meta charset="UTF-8" /> 
<title>Dictionary</title>
<link href="/home.css" rel="stylesheet" type="text/css" />
<link href="/search.css" rel="stylesheet" type="text/css" />
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
