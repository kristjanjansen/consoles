<?php

require "vendor/autoload.php";

$consoles = [
	"   Nintendo NX   ",
	" Playstation 4.5 ",
	"     XBox One v2 "
];

$bla = collect($consoles)
	->reverse()
	->map(function($console) {
		return trim($console);
	})
	->implode("---");

print "\n\n";

print_r($bla);

print "\n\n";