<?php
header("HTTP/1.1 404 Not Found");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8" />
<title>Not Found</title>
</head>
<body>
<?php
require('include/search.php');
$lang_t = languages($langpair);
echo '<hr>Sorry, search of "'.$query['query'].'" in '.$lang_t['text'].' returns NO result.<br>Please try another search.';
?>
</body>
</html>
