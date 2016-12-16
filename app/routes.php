<?php

	$w_routes = array(
		['GET', 		'/api/search_city/[:slug][/]?'			, 'Api#search_city'					, 'api_search_city'],
		['GET', 		'/api/search_event[/]?'					, 'Api#search_event'				, 'api_search_event'],
		['GET', 		'/api/search_event_element/[i:id][/]?'	, 'Api#search_event_element'		, 'api_search_event_element'],
		['GET|POST', 	'/api/send_com[/]?'						, 'Api#send_com'					, 'api_send_com'],
		['GET|POST', 	'/api/register_event[/]?'				, 'Api#register_event'				, 'api_register_event'],
		['GET|POST', 	'/api/cancel_registeration_event[/]?'	, 'Api#cancel_registeration_event'	, 'cancel_registeration_event'],

		['GET|POST', 	'/login'							, 'Security#login'				, 'security_login'],
		['GET', 		'/logout'							, 'Security#logout'				, 'security_logout'],
		['GET|POST', 	'/forget[/]?[:token]?[/]?'			, 'Security#forget'				, 'security_forget'],

		['GET|',		'/user[/]?[i:id]?[/]?'				, 'User#profil'					, 'user_profil'], //liste de tout les membres
		['GET|POST',	'/user/edit[/]?'					, 'User#edit'					, 'user_edit'], //liste de tout les membres
		['GET|POST',	'/user/register[/]?'				, 'User#register'				, 'user_register'], //liste de tout les membres

		['GET|',		'/event/page/[i:id][/]?'			, 'Event#page'					, 'event_page'], //liste de tout les membres
		['GET|POST',	'/event/edit[/]?[i:id]?[/]?'		, 'Event#edit'					, 'event_edit'], //liste de tout les membres
		['GET|POST',	'/event/create/[*:lat]/[*:lng][/]?'	, 'Event#create'				, 'event_create'], //liste de tout les membres
		['GET',			'/event[/]?[map]?[/]?'				, 'Event#map'					, 'event_map'], //liste de tout les membres

		['GET', 		'/'									, 'Default#home'				, 'default_home'],
		['GET', 		'/map[/]?[]?[/]?'					, 'Default#map'					, 'default_map'],
		['GET', 		'/map/[*:lat]/[*:lng][/]?'			, 'Default#mapPosition'			, 'default_mapposition'],
		['GET', 		'/map/[*:lat]/[*:lng]/[i:id][/]?'	, 'Default#mapPositionEvent'	, 'default_mapPositionEvent']
	);
