<?php
header("HTTP/1.1 404 Not Found");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Not Found</title>
</head>
<body>
<?php
require('include/search.php');
echo '<hr>Sorry, search of "'.$query['query'].'" from '.$query['sourceLanguage'].' to '.$query['targetLanguage'].' returns NO result.<br>Please try another search.';
?>
</body>
</html>
