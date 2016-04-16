Array Tools
============

Some tools for PHP array.

## Install

```
composer require vvasystem/arraytools

```

## How to use?

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
array(2) {
  [0]=>
  array(2) {
    ["name"]=>
    string(5) "name1"
    ["sum"]=>
    int(27)
  }
  [1]=>
  array(2) {
    ["name"]=>
    string(5) "name2"
    ["sum"]=>
    int(20)
  }
}

--------------------------------------

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
array(1) {
  [1]=>
  array(3) {
    ["name"]=>
    string(5) "name1"
    ["type"]=>
    string(5) "type1"
    ["sum"]=>
    int(12)
  }
}

--------------------------------------

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
array(3) {
  [0]=>
  string(5) "type2"
  [1]=>
  string(5) "type1"
  [2]=>
  string(5) "type3"
}

```