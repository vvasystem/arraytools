Array Tools
============

Some tools for PHP array.

How to use?

```php
//...
require __DIR__ . '/vendor/autoload.php';

$groupData = \Assistance\ArrayTools\ArrayTools::group(
	[
		[
			'name' => 'name1',
			'sum' => 12,
		],
			[
			'name' => 'name2',
			'sum' => 20,
		],
			[
			'name' => 'name1',
			'sum' => 15,
		]
	], 
	['name'],
	['sum']
);

var_dump($groupData);

$searchData = \Assistance\ArrayTools\ArrayTools::search(
	[
		[
			'name' => 'name2',
			'type' => 'type2',
			'sum' => 19,
		],
				[
			'name' => 'name1',
			'type' => 'type1',
			'sum' => 12,
		],			
		[
			'name' => 'name3',
			'type' => 'type3',
			'sum' => 33,
		],

	],
	[
		'name' => 'name1',
		'type' => 'type1',
	]
);

var_dump($searchData);

$pluckData = \Assistance\ArrayTools\ArrayTools::pluck(
	[
		[
			'name' => 'name2',
			'type' => 'type2',
			'sum' => 19,
		],
				[
			'name' => 'name1',
			'type' => 'type1',
			'sum' => 12,
		],			
		[
			'name' => 'name3',
			'type' => 'type3',
			'sum' => 33,
		],

	],
	'type'
);

var_dump($pluckData);

```