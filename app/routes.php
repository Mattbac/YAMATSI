<?php
	
	$w_routes = array(
		['GET|POST', 	'/api/search_city/[a:slug][/]?'		, 'Api#search_city'				, 'api_search_city'],

		['GET', 		'/[home]?[/]?'						, 'Default#home'				, 'default_home'],

		['GET', 		'/map[/]?[]?[/]?'					, 'Search#map'					, 'search_map'],
		['GET', 		'/map/[i:lat]/[i:lng][/]?'			, 'Search#mapPosition'			, 'search_mapposition'],		
		['GET', 		'/map/[i:lat]/[i:lng]/[i:id][/]?'	, 'Search#mapPositionEvent'		, 'search_mapPositionEvent'],

		['GET',			'/register[/]?'						, 'Register#type'				, 'register_type'],
		['GET|POST',	'/register/user[/]?'				, 'Register#user'				, 'register_user'],
		['GET|POST',	'/register/assoc[/]?'				, 'Register#assoc'				, 'register_assoc'],
		['GET|POST',	'/register/comp[/]?'				, 'Register#company'			, 'register_company'],

		['GET|POST',	'/create/map[/]?'					, 'Create#map'					, 'create_map'],
		['GET|POST',	'/create/event/[i:lat]/[i:lng][/]?'	, 'Create#event'				, 'create_event'],

		['GET',			'/page/user[/]?[i:id]?[/]?'			, 'Page#user'					, 'page_user'],
		['GET',			'/page/assoc[/]?[i:id]?[/]?'		, 'Page#assoc'					, 'page_assoc'],
		['GET',			'/page/company[/]?[i:id]?[/]?'		, 'Page#company'				, 'page_company'],
		['GET',			'/page/event[/]?[i:id]?[/]?'		, 'Page#event'					, 'page_event'],
		
		['GET|POST',	'/edit/user[/]?'					, 'Edit#user'					, 'edit_user'],
		['GET|POST',	'/edit/assoc[/]?'					, 'Edit#assoc'					, 'edit_assoc'],
		['GET|POST',	'/edit/company[/]?'					, 'Edit#company'				, 'edit_company'],
		['GET|POST',	'/edit/event/[i:id][/]?'			, 'Edit#event'					, 'edit_event']
	);

?>