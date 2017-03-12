<?php

return [
	'settings' => [
		'displayErrorDetails' => true,
		'db' => [
			'host'	=>	'localhost',
			'user'	=>	'root',
			'pass'	=>	'root',
			'name'	=>	'slim_framework',
		],

		'view'	=> [
			'path'	=>	__DIR__ . '/../view',
			'twig'	=> [
				'cache'	=> false,
				'debug' => true,
                'auto_reload' => true,
			],
		],

		'lang'	=>	[
			'default'	=>	'en',
		],
	]
];