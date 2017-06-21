<?php

/*

As of 6/21/17

1. 	Do not use Simple HTML Parser. 
	DCoder gives a great explanation: https://stackoverflow.com/questions/15805805/php-native-domdocument-and-simple-dom-parser-is-there-a-size-limit

2. 	Use http://php.net/DOMDocument.loadHTML

3. 	Warning messages should be suppressed. Going the htmlentities() route didn't yield useful results for me.
	https://stackoverflow.com/questions/1685277/warning-domdocumentloadhtml-htmlparseentityref-expecting-in-entity

OUTDATED LINKS (ie don't use)
1. 	https://code.tutsplus.com/tutorials/html-parsing-and-screen-scraping-with-the-simple-html-dom-library--net-11856
*/

$url 	= 	"http://www.google.com";

$text 	= 	file_get_contents($url);

$internalErrors = libxml_use_internal_errors(true);

$doc = new DOMDocument();
$doc->loadHTML( mb_convert_encoding($text, 'HTML-ENTITIES', 'UTF-8') );

libxml_use_internal_errors($internalErrors);

//echo $doc->saveHTML();

foreach($doc->getElementsByTagName('a') as $link) {
        # Show the <a href>
        echo $link->getAttribute('href');
        echo PHP_EOL;
}


?>