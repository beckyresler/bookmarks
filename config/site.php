<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Website Title
	|--------------------------------------------------------------------------
	|
	| The title of the website. This value is displayed in the meta title,
	| footer credits, and other locations throughout the website.
	|
	*/
	'website_title' => env('APP_NAME', 'Bookmarks'),


	/*
	|--------------------------------------------------------------------------
	| Website Timezone
	|--------------------------------------------------------------------------
	|
	| The timezone that all dates should be displayed in. This is different from
	| the application timezone.
	| NOTE: Dates in the database are UTC.
	|
	*/
	'timezone' => 'America/Chicago',


	/*
	|--------------------------------------------------------------------------
	| Google Analytics Tracking Code
	|--------------------------------------------------------------------------
	|
	| The tracking code for the Google Analytics account used by the website.
	| Example: UA-19483569-6
	|
	*/
	'google_analytics_tracking_code' => env('GOOGLE_ANALYTICS_TRACKING_CODE', null),


	/*
	|--------------------------------------------------------------------------
	| Meta Title Divider
	|--------------------------------------------------------------------------
	|
	| The character (or string) to use to separate the pages in the meta title.
	|
	*/
	'meta_title_divider' => '|',

];