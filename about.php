<?php
require_once('include/languages.php');
$base = (isset($_SERVER['HTTPS'])?'https://':'http://').$_SERVER['HTTP_HOST'].substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/')+1);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>About Dictionary</title>
		<meta charset="UTF-8" />
		<link href="about.css" rel="stylesheet" type="text/css" />
<?php if(file_exists('analytics')) {require('analytics');}?>
	</head>
	<body>
		<header>
			<h1>$<a href="<?php echo $base?>">this</a>-&gt;about();</h1>
		</header>
		<div class="about">
			<div class="contents">
				<h2>Tips</h2>
				<div class="details">
					<h3>Save bookmarklets</h3>
					<div>
						<h4>Save the bookmarklet on the right side, you can use it in two ways:</h4>
						<ul>
							<li>Select a word in any web page then click the bookmarklet to search the word</li>
							<li>Directly click the bookmarklet to go to the homepage</li>
						</ul>
					</div>
					<h3>Setup custom search engine</h3>
					<div>
						<h4>Url:</h4>
						<ul>
							<li><?php echo $base;?>%s</li>
							<li><?php echo $base;?>%s/from/&lt;lang&gt;/to/&lt;lang&gt;/</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="contents">
				<h2>How to build on your own</h2>
				<div class="details">
					<h3>Requirements:</h3>
					<div>
						<ul>
							<li><h4>Nginx, Apache or other web server works with PHP</h4></li>
							<li><h4>PHP</h4></li>
							<li><h4>MongoDB <sub>* Also works without MongoDB</sub></h4></li>
						</ul>
					</div>
					<h3>Get source code:</h3>
					<div>
						<ul>
							<li><h4>Use Git:</h4><code>git clone git://github.com/easisee/dictionary.git</code></li>
							<li><h4>Directly Download:</h4><span><a href="https://github.com/easisee/dictionary" target="_blank">github.com/easisee/dictionary</a></span></li>
						</ul>
					</div>
					<h3>Rewrite rule:</h3>
					<div>
						<ul>
							<li><h4>Nginx:</h4><code>if (!-e $request_filename) {rewrite (.*) /index.php last;}</code></li>
							<li><h4>Apache:</h4><span>Just turn on Rewrite Mod</span></li>
							<li><h4>Others:</h4><span>You should set it by yourself</span></li>
						</ul>
					</div>
					<h3>MongoDB settings:</h3>
					<div>
						<h4>Edit 'config.php'</h4>
						<ul>
							<li>Edit your MongoDB settings</li>
							<li>If you want to work without MongoDB, simply set <code>MONGODB_CACHE</code> to <code>FALSE</code></li>
						</ul>
					</div>
					<h3>Relative path settings:</h3>
					<div>
						<h4>If you runs the instance on web root path, skip this step</h4>
						<ul>
							<li>e.g. http://dictionary.easisee.com/</li>
						</ul>
						<h4>Otherwise, edit these files</h4>
						<ul>
							<li>home.php</li>
							<li>define.php</li>
						</ul>
						<h4>Find out these lines</h4>
						<ul>
							<li><code>&lt;link href="/home.css" rel="stylesheet" type="text/css" /&gt;</code></li>
							<li><code>&lt;link href="/search.css" rel="stylesheet" type="text/css" /&gt;</code></li>
							<li><code>&lt;link href="/define.css" rel="stylesheet" type="text/css" /&gt;</code></li>
						</ul>
						<h4>Change every '<code>/*.css</code>' to '<code>/your/web/path/*.css</code>'</h4>
					</div>
					<h3>That's all</h3>
					<div>
						<h4>Congratulations!</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="bookmarklets">
			<h2>Bookmarklets</h2>
			<ul>
<?php
foreach(languages() as $k => $lang) {
	echo '<li><a href="javascript:(function(){if(window.getSelection){s=window.getSelection().toString();}else if(document.selection.createRange){s=document.selection.createRange().text;}window.open(\''.$base.'\'+s+\'/from/'.$lang['from'].'/to/'.$lang['to'].'/\');void 0;})();">'.$lang['text'].'</a></li>';
}
?>
			</ul>
		</div>
		<footer class="clearboth">
			<h1> echo 'by <a href="http://ntk.me/" target="_blank">@easisee</a>' . $<a href="https://twitter.com/easisee" target="_blank">twitter</a>;</h1>
		</footer>
	</body>
</html>
