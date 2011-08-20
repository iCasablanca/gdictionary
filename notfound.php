<?php
header("HTTP/1.1 404 Not Found");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8" />
<link href="/search.css" rel="stylesheet" type="text/css" />
<title>Not Found</title>
</head>
<body>
<?php
require('include/search.php');
echo '<hr>Sorry, search of "'.$query['query'].'" returns NO result.<br>Please try another search.';
?>
</body>
</html>
