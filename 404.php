<?php
header('HTTP/1.1 404 Not Found');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8" />
<meta name="robots" content="none" />
<link href="/search.css" rel="stylesheet" type="text/css" />
<title>Not Found</title>
</head>
<body>
<?php
require('include/search.php');
echo '<hr>Sorry, search of "'.$word.'" in '.$l['text'].' returns NO result.<br>Please try another search.';
?>
</body>
</html>