<?php

require "vendor/autoload.php";




$consoles = [
	[
		"name" => "Yamaha MSX",
		"image" => "http://msx.hansotten.com/uploads/msximages/TURBOR10.jpg"
	],
	[
		"name" => "Sega Dreamcast",
		"image" => "http://www.retrogamer.net/wp-content/uploads/2015/02/dreamcast.png"
	],
	[	
		"name" => "Amiga 500",
		"image" => "http://img03.deviantart.net/f960/i/2005/111/0/f/amiga_500_system_by_amiga1200.jpg"
	]
];

use Illuminate\Database\Capsule\Manager as DB;

$db = new DB;
$db->addConnection([
    'driver'    => 'mysql',
    'database'  => 'consoles',
    'username'  => 'root',
    'password'  => '',
    'host'      => 'localhost',
    'charset'   => 'latin1',
    'collation' => 'latin1_swedish_ci',
    'prefix'    => ''
]);
$db->setAsGlobal();

$db->schema()->dropIfExists('classics');

$db->schema()->create('classics', function ($table) {
    $table->string('name');
    $table->string('image');
});

$db->table('classics')->insert($consoles);

$classics = $db->table('classics')->get();

foreach($classics as $classic) {
	print "<img src=" . $classic->image . ">";
}