<?php
	
	$w_routes = array(
		['GET', 		'/'									, 'Default#home'				, 'default_home'],

		['GET', 		'/map[/]?'							, 'Search#map'					, 'search_map'],
		['GET', 		'/map/[i:lat]/[i:lng][/]?'			, 'Search#mapPosition'			, 'search_mapposition'],		
		['GET', 		'/map/[i:lat]/[i:lng]/[i:id][/]?'	, 'Search#mapPositionEvent'		, 'search_mapPositionEvent'],

		['GET',			'/register[/]?'						, 'Register#type'				, 'register_type'],
		['GET|POST',	'/register/user[/]?'				, 'Register#user'				, 'register_user'],
		['GET|POST',	'/register/assoc[/]?'				, 'Register#assoc'				, 'register_assoc'],
		['GET|POST',	'/register/comp[/]?'				, 'Register#company'			, 'register_company'],

		['GET|POST',	'/create/event[/]?'					, 'Create#event'				, 'create_event'],

		['GET',			'/page/user/[:id][/]?'				, 'Page#user'					, 'page_user'],
		['GET',			'/page/assoc/[:id][/]?'				, 'Page#assoc'					, 'page_assoc'],
		['GET',			'/page/company/[:id][/]?'			, 'Page#company'				, 'page_company'],
		['GET',			'/page/event/[:id][/]?'				, 'Page#event'					, 'page_event'],
		
		['GET|POST',	'/edit/user/[:id][/]?'				, 'Edit#user'					, 'edit_user'],
		['GET|POST',	'/edit/assoc/[:id][/]?'				, 'Edit#assoc'					, 'edit_assoc'],
		['GET|POST',	'/edit/company/[:id][/]?'			, 'Edit#company'				, 'edit_company'],
		['GET|POST',	'/edit/event/[:id][/]?'				, 'Edit#event'					, 'edit_event']
	);