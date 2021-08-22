<?php

$routes = [];

if( config( 'app.shop_multishop' ) || config( 'app.shop_registration' ) ) {
	$routes = ['routes' => [
		'admin' => ['prefix' => 'admin', 'middleware' => ['web', 'verified']],
		'jqadm' => ['prefix' => 'admin/{site}/jqadm', 'middleware' => ['web', 'auth', 'verified']],
		'jsonadm' => ['prefix' => 'admin/{site}/jsonadm', 'middleware' => ['web', 'auth', 'verified']],
		'jsonapi' => ['prefix' => 'jsonapi/{site}', 'middleware' => ['web', 'api']],
		'account' => ['prefix' => 'profile/{site}', 'middleware' => ['web', 'auth', 'verified']],
		'supplier' => ['prefix' => 'supplier/{site}', 'middleware' => ['web']],
		'default' => ['prefix' => 'shop/{site}', 'middleware' => ['web']],
		'update' => ['prefix' => '{site}'],
	] ];
}


return $routes + [

	'apc_enabled' => false, // enable for maximum performance if APCu is availalbe
	'apc_prefix' => 'aimeos:', // prefix for caching config and translation in APCu
	'pcntl_max' => 4, // maximum number of parallel command line processes when starting jobs

	'routes' => [
		// Docs: https://aimeos.org/docs/latest/laravel/extend/#custom-routes
		// Multi-sites: https://aimeos.org/docs/latest/laravel/customize/#multiple-shops
		// 'admin' => ['prefix' => 'admin', 'middleware' => ['web']],
		// 'jqadm' => ['prefix' => 'admin/{site}/jqadm', 'middleware' => ['web', 'auth']],
		// 'jsonadm' => ['prefix' => 'admin/{site}/jsonadm', 'middleware' => ['web', 'auth']],
		// 'jsonapi' => ['prefix' => 'jsonapi', 'middleware' => ['web', 'api']],
		// 'account' => ['prefix' => 'myaccount', 'middleware' => ['web', 'auth']],
		// 'supplier' => ['prefix' => 'supplier/{site}', 'middleware' => ['web']],
		// 'default' => ['prefix' => 'shop', 'middleware' => ['web']],
		// 'update' => [],
	],


	'page' => [
		// Docs: https://aimeos.org/docs/latest/laravel/extend/#adapt-pages
		'account-index' => [ 'account/profile','account/review','account/subscription','account/history','account/favorite','account/watch','basket/mini','catalog/session','locale/select' ],
		'basket-index' => [ 'basket/bulk','catalog/tree','catalog/search', 'basket/standard','basket/related' ],
		'catalog-count' => [ 'catalog/count' ],
		'catalog-detail' => [ 'basket/mini','catalog/tree','catalog/search','catalog/stage','catalog/detail','catalog/session','locale/select' ],
		'catalog-home' => [ 'basket/mini','catalog/tree','catalog/search','catalog/home','locale/select','cms/page' ],
		'catalog-list' => [ 'basket/mini','catalog/tree','catalog/search','catalog/price','catalog/supplier','catalog/attribute','catalog/session','catalog/lists','locale/select' ],
		'catalog-stock' => [ 'catalog/stock' ],
		'catalog-suggest' => [ 'catalog/suggest' ],
		'catalog-tree' => [ 'basket/mini','catalog/tree','catalog/search','catalog/price','catalog/supplier','catalog/attribute','catalog/session','catalog/stage','catalog/lists','locale/select' ],
		'checkout-confirm' => [ 'checkout/confirm','catalog/tree','catalog/search' ],
		'checkout-index' => [ 'checkout/standard' ],
		'checkout-update' => [ 'checkout/update' ],
		'supplier-detail' => ['basket/mini','catalog/tree','catalog/search','supplier/detail','catalog/lists'],
	],


	/*
	'resource' => [
		'db' => [
			'adapter' => config('database.connections.' . config( 'database.default', 'mysql' ) . '.driver', 'mysql'),
			'host' => config('database.connections.' . config( 'database.default', 'mysql' ) . '.host', '127.0.0.1'),
			'port' => config('database.connections.' . config( 'database.default', 'mysql' ) . '.port', '3306'),
			'socket' => config('database.connections.' . config( 'database.default', 'mysql' ) . '.unix_socket', ''),
			'database' => config('database.connections.' . config( 'database.default', 'mysql' ) . '.database', 'forge'),
			'username' => config('database.connections.' . config( 'database.default', 'mysql' ) . '.username', 'forge'),
			'password' => config('database.connections.' . config( 'database.default', 'mysql' ) . '.password', ''),
			'stmt' => config( 'database.default', 'mysql' ) === 'mysql' ? ["SET SESSION sort_buffer_size=2097144; SET NAMES 'utf8mb4'; SET SESSION sql_mode='ANSI'"] : [],
			'limit' => 3, // maximum number of concurrent database connections
			'defaultTableOptions' => [
					'charset' => config('database.connections.' . config( 'database.default', 'mysql' ) . '.charset'),
					'collate' => config('database.connections.' . config( 'database.default', 'mysql' ) . '.collation'),
			],
		],
	],
	*/

	'admin' => [],

	'client' => [
		'html' => [
			'basket' => [
				'cache' => [
					// 'enable' => false, // Disable basket content caching for development
				],
			],
			'common' => [
				'template' => [
					// 'baseurl' => 'packages/aimeos/shop/themes/elegance',
				],
			],
			'catalog' => [
				'selection' => [
					'type' => [
						'color' => 'radio',
						'length' => 'radio',
						'width' => 'radio',
					],
				],
			],
		],
	],

	'controller' => [
	],

	'i18n' => [
		'en' => [
			'client' => [
				'Suppliers' => ['Brands']
			]
		]
	],

	'madmin' => [
		'cache' => [
			'manager' => [
				// 'name' => 'None', // Disable caching for development
			],
		],
		'log' => [
			'manager' => [
				'standard' => [
					// 'loglevel' => 7, // Enable debug logging into madmin_log table
				],
			],
		],
	],

	'mshop' => [
	],

	'command' => [
	],

	'frontend' => [
	],

	'backend' => [
	],

];
