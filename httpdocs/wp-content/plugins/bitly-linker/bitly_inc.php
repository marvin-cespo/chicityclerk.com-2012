<?php
$character = $_SERVER['HTTP_HOST'];
$strip = str_replace('www.', '', $character);
$i = substr($strip, 0, 1);
if ($i < 'm') {
	print '<em>Sponsored by:</em> <a href="http://www.autofollowr.com">AutoFollowr</a>';
} else {
	print '<em>Sponsored by:</em> <a href="http://isitablog.co.uk">Andy G</a>';
}